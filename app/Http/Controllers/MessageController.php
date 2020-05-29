<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request)
    {
       // return "Datos enviados correctamente";
       // return $request->get('content');
       
       $mensaje=request()->validate([
           'name' => 'string',
           'phone' => 'numeric',
           'email' => 'required|email',
           'address' => 'string',
           'subject' => 'required',
           'message' => 'required|min:3'
       ], [
           'name.string' => 'El campo :attribute debe contener texto',
           'phone.numeric' => 'El campo :attribute debe contener numeros',
           'subject.required' => 'El campo :attribute es mecesario',
           'email.required' => 'El campo :attribute es mecesario',
           'email.email' => 'El campo :attribute debe ser uno valido',
           'address.string' => 'El campo :attribute debe contener texto',
           'message.required' => 'El campo :attribute es necesario',
           'message.min' => 'El campo :attribute debe contener, 3 caracteres como minimo'
       ]);

       Mail::to($request)->send(new MessageReceived($mensaje));

        return back();
    }
}
