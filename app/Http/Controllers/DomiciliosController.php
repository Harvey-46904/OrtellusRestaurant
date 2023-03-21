<?php

namespace App\Http\Controllers;

use App\Models\domicilios;
use Illuminate\Http\Request;

class DomiciliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultar = domicilios::all();
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
        $guardar_domicilio=new domicilios();
        $guardar_domicilio->nombre=$request->nombre;
        $guardar_domicilio->direccion_domicilio=$request->direccion_domicilio;
        $guardar_domicilio->numero_factura=$request->numero_factura;
        $guardar_domicilio->feha_domicilio=$request->feha_domicilio;
        $guardar_domicilio->tipo_comida=$request->tipo_comida;
        $guardar_domicilio->save();
        return response (["data"=>"registro guardado"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\domicilios  $domicilios
     * @return \Illuminate\Http\Response
     */
    public function show($domicilios)
    {
        $domicilios=domicilios::findOrFail($domicilios);
        return response (["data"=>"dato buscado"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\domicilios  $domicilios
     * @return \Illuminate\Http\Response
     */
    public function edit(domicilios $domicilios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\domicilios  $domicilios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $domicilios)
    {
        $domicilios=domicilios::findOrFail($domicilios);
        $domicilios->nombre=$request->nombre;
        $domicilios->direccion_domicilio=$request->direccion_domicilio;
        $domicilios->numero_factura=$request->numero_factura;
        $domicilios->feha_domicilio=$request->feha_domicilio;
        $domicilios->tipo_comida=$request->tipo_comida;
        $domicilios->save();
        return response (["data"=>"registro actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\domicilios  $domicilios
     * @return \Illuminate\Http\Response
     */
    public function destroy($domicilios)
    {
        $domicilios=domicilios::findOrFail($domicilios);
        $domicilios->delete();
        return response (["data"=>"registro eliminado"]);
    }
}
