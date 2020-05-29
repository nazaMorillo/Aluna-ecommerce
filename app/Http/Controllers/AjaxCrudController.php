<?php

namespace App\Http\Controllers;

use Validator;
use App\Product;
use Illuminate\Http\Request;

class AjaxCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Product::latest()->get())
                ->addColumn('action', function($data){
                    $btnsAction = '
                    <div width="100%" class="d-flex flex-column justify-content-between">
                    <button type="button" name="edit" id="'.$data->id.'" class="m-1 edit btn btn-primary btn-sm "><i class="fas fa-edit"></i></button>
                    <button type="button" name="delete" id="'.$data->id.'" class="m-1 delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>
                    </button>
                    </div>';
                    return $btnsAction;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.gestion');
    }

    public function getProducts()
    {
        $products = Product::all();    
        return view('pages.gestion', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
                'description'     =>  'required',
                'price'    =>  'required',
                'stock'     =>  'required',
                'brand'    =>  'required',
                'category'     =>  'required',
            'image'         =>  'required|image|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(storage_path('app/public/product'), $new_name);

        $form_data = array(
            'name'       =>   $request->name,
            'description'        =>   $request->description,
            'price'       =>   $request->price,
            'stock'        =>   $request->stock,
            'brand'       =>   $request->brand,
            'category'        =>   $request->category,
            'image'             =>  $new_name
        );

        Product::create($form_data);

        return response()->json(['success' => 'Los datos se guardaron Exitosamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Product::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'name'    =>  'required',
                'description'     =>  'required',
                'price'    =>  'required',
                'stock'     =>  'required',
                'brand'    =>  'required',
                'category'     =>  'required',
                'image'         =>  'image|max:2048'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/product'), $image_name);
        }
        else
        {
            $rules = array(
                'name'    =>  'required',
                'description'     =>  'required',
                'price'    =>  'required',
                'stock'     =>  'required',
                'brand'    =>  'required',
                'category'     =>  'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'name'       =>   $request->name,
            'description'        =>   $request->description,
            'price'       =>   $request->price,
            'stock'        =>   $request->stock,
            'brand'       =>   $request->brand,
            'category'        =>   $request->category,
            'image'            =>   $image_name
        );
        Product::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Los datos se actualizaron correctamente!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
    }
}