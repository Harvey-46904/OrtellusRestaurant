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
        $consulta=Facturacion::all();
        return response (["data"=>$consulta]);
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
        $guardar_facturacion=new Facturacion;
        $guardar_facturacion->Cliente=$request->Cliente;
        $guardar_facturacion->Producto=$request->Producto;
        $guardar_facturacion->total=$request->total;
        $guardar_facturacion->mesa=$request->mesa;
        $guardar_facturacion->save();
        return response(["data"=>"guardado exitosamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function show($facturacion)
    {
        $facturacion=Facturacion::findOrFail($facturacion);
        return response (["data"=>$facturacion]);
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
    public function update(Request $request, $facturacion)
    {
        $actualizar=Facturacion::findOrFail($facturacion);
        $actualizar->Cliente=$request->Cliente;
        $actualizar->Producto=$request->Producto;
        $actualizar->total=$request->total;
        $actualizar->mesa=$request->mesa;
        $actualizar->save();
        return response (["data"=>"datos actualizados"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($facturacion)
    {
        $facturacion=Facturacion::findOrFail($facturacion);
        $facturacion->delete();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
