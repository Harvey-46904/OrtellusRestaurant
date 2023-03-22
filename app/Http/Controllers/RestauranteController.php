<?php

namespace App\Http\Controllers;

use App\Models\restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consulta = restaurante::all();
        return response (["data"=> $consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //no crear archivo
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guardar_restaurante=new restaurante;
        $guardar_restaurante->nombre=$request->nombre;
        $guardar_restaurante->direccion=$request->direccion;
        $guardar_restaurante->save();
        return response (["data"=>"registro guardado exitosamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show($restaurante)
    {
        $consulta=restaurante::findOrFail($restaurante);
        return response (["data"=>$consulta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    /*public function edit($restaurante)
    {
        $restaurante=aves::findOrFail($restaurante);
        return response (["data"=>"datos editados"]);
    }
    */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $restaurante)
    {
            $restaurante=restaurante::FindOrFail($restaurante);
            $restaurante->nombre=$request->nombre;
            $restaurante->direccion=$request->direccion;
            $restaurante->save();
            return response (["data"=>"datos actualizados"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurante)
    {
        $restaurante=restaurante::findOrFail($restaurante);
        $restaurante->delete();
        return response (["data"=>"dato eliminado"]);
    }
}
