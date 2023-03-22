<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use Illuminate\Http\Request;

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
        $guardar_mesa=new Mesas;
        $guardar_mesa->Disponibilidad_mesa=$request->Disponibilidad_mesa;
        $guardar_mesa->Registrar_mesa=$request->Registrar_mesa;
        $guardar_mesa->Observacion=$request->Observacion;
        $guardar_mesa->save();
        return response(["data"=>"guardado exitosamente"]);
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
        return response (["data"=>"dato consultado"]);
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
        $actualizar=Mesas::findOrFail($mesas);
        $actualizar->Disponibilidad_mesa=$request->Disponibilidad_mesa;
        $actualizar->Registrar_mesa=$request->Registrar_mesa;
        $actualizar->Observacion=$request->Observacion;
        $actualizar->save();
        return response (["data"=>"dato actualizado"]);
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
        $mesas->detele();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
