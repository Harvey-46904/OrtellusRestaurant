<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultar=Mesas::all();
        return response (["data"=>$consultar]);
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
        $guardar = [
            'Disponibilidad_mesa' => 'required | string',
            'Registrar_mesa' => 'required | string',
            'Observacion' => 'required | string',
            
            
         ];

         $messages = [
            'Disponibilidad_mesa'  => 'The :attribute and :other must match.',
            'Registrar_mesa' => 'The :attribute must be exactly :size.',
            'Observacion' => 'The :attribute value :input is not between :min - :max.',
           
            
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $guardar_mesa=new Mesas;
        $guardar_mesa->Disponibilidad_mesa=$request->Disponibilidad_mesa;
        $guardar_mesa->Registrar_mesa=$request->Registrar_mesa;
        $guardar_mesa->Observacion=$request->Observacion;
        $guardar_mesa->save();
        return response(["data"=>"guardado exitosamente"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesas  $mesas
     * @return \Illuminate\Http\Response
     */
    public function show($mesas)
    {
        $consultar=Mesas::findOrFail($mesas);
        return response (["data"=>$consultar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesas  $mesas
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesas $mesas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesas  $mesas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mesas)
    {
        $guardar = [
            'Disponibilidad_mesa' => 'required | string',
            'Registrar_mesa' => 'required | string',
            'Observacion' => 'required | string',
            
            
         ];

         $messages = [
            'Disponibilidad_mesa'  => 'The :attribute and :other must match.',
            'Registrar_mesa' => 'The :attribute must be exactly :size.',
            'Observacion' => 'The :attribute value :input is not between :min - :max.',
           
            
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $actualizar=Mesas::findOrFail($mesas);
        $actualizar->Disponibilidad_mesa=$request->Disponibilidad_mesa;
        $actualizar->Registrar_mesa=$request->Registrar_mesa;
        $actualizar->Observacion=$request->Observacion;
        $actualizar->save();
        return response (["data"=>"dato actualizado"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesas  $mesas
     * @return \Illuminate\Http\Response
     */
    public function destroy($mesas)
    {
        $mesas=mesas::findOrFail($mesas);
        $mesas->delete();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
