<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $consulta=Cliente::all();

        return response (["data"=>$consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $guardar = [
            'Nombre_Completo' => 'required | string',
            'Cedula' => 'required | string',
            'Telefono' => 'required | string',
            'Email' => 'required | string',
            'Direccion' => 'required | string',
         ];

         $messages = [
            'Nombre_Completo'  => 'The :attribute and :other must match.',
            'Cedula' => 'The :attribute must be exactly :size.',
            'Telefono' => 'The :attribute value :input is not between :min - :max.',
            'Email'=> 'The :attribute must be one of the following types: :values',
            'Direccion'=> 'The :attribute must be one of the following types: :values',
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $guardar_cliente=new Cliente;
        $guardar_cliente->Nombre_Completo=$request->Nombre_Completo;
        $guardar_cliente->Cedula=$request->Cedula;
        $guardar_cliente->Telefono=$request->Telefono;
        $guardar_cliente->Email=$request->Email;
        $guardar_cliente->Direccion=$request->Direccion;
        $guardar_cliente->save();
        return self::index();
    }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($cliente)
    {
        $cliente=Cliente::findOrFail($cliente);
        return response (["data"=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente)
    {
        $guardar = [
            'Nombre_Completo' => 'required | string',
            'Cedula' => 'required | string',
            'Telefono' => 'required | string',
            'Email' => 'required | string',
            'Direccion' => 'required | string',
         ];

         $messages = [
            'Nombre_Completo'  => 'The :attribute and :other must match.',
            'Cedula' => 'The :attribute must be exactly :size.',
            'Telefono' => 'The :attribute value :input is not between :min - :max.',
            'Email'=> 'The :attribute must be one of the following types: :values',
            'Direccion'=> 'The :attribute must be one of the following types: :values',
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{

        $actualizar_cliente=Cliente::findOrFail($cliente);
        
        $actualizar_cliente->Nombre_Completo=$request->Nombre_Completo;
        $actualizar_cliente->Cedula=$request->Cedula;
        $actualizar_cliente->Telefono=$request->Telefono;
        $actualizar_cliente->Email=$request->Email;
        $actualizar_cliente->Direccion=$request->Direccion;
        $actualizar_cliente->save();
        return response(["data"=>"datos actualizados"]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente)
    {
        $cliente=cliente::findOrFail($cliente);                          
        $cliente->delete();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
