<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use Illuminate\Http\Request;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guardar_facturacion=new Facturacion;
        $guardar_facturacion->Nombre_producto=$request->Nombre_producto;
        $guardar_facturacion->Fecha_producto=$request->Fecha_producto;
        $guardar_facturacion->Descripcion_producto=$request->Descripcion_producto;
        $guardar_facturacion->save();
        return response(["data"=>"guardado exitosamente"]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function show(Facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturacion $facturacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        $actualizar=$productos;
        $actualizar_facturacion->Nombre_producto=$request->Nombre_producto;
        $actualizar_facturacion->Fecha_producto=$request->Fecha_producto;
        $actualizar_facturacion->Descripcion_producto=$request->Descripcion_producto;
        $actualizar->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturacion $facturacion)
    {
        $facturacion=facturacion::findOrFail($facturacion);
        $facturacion->detele();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
