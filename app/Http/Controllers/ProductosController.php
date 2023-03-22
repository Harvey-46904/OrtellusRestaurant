<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $consulta=Productos::all();
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
        $guardar_productos=new Productos;
        $guardar_productos->Nombre_producto=$request->Nombre_producto;
        $guardar_productos->Fecha_producto=$request->Fecha_producto;
        $guardar_productos->Descripcion_producto=$request->Descripcion_producto;
        $guardar_productos->save();
        return response(["data"=>"guardado exitosamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show($productos)
    {
        $consulta=Productos::findOrFail($productos);
        return response (["data"=>"dato buscado"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productos)
    {
        $actualizar=$productos;
        $actualizar->Nombre_producto=$request->Nombre_producto;
        $actualizar->Fecha_producto=$request->Fecha_producto;
        $actualizar->Descripcion=$request->Descripcion;
        $actualizar->save();
        return response (["data"=>"datos actualizados"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($productos)
    {
        $productos=productos::findOrFail($productos);
        $productos->detele();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
