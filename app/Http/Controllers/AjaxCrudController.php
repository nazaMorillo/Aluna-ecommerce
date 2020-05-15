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
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Editar</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Eliminar</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('ajax_index');
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

        return response()->json(['success' => 'Los datos de guardaron Exitosamente.']);
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

        return response()->json(['success' => 'Datos actualizados correctamente']);
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