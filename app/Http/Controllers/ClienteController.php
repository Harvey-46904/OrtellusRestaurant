<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

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

        return response(["data"=>$consulta]);
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
        $guardar_cliente=new Cliente;
        $guardar_cliente->Nombre_Completo=$request->Nombre_Completo;
        $guardar_cliente->Cedula=$request->Cedula;
        $guardar_cliente->Telefono=$request->Telefono;
        $guardar_cliente->Email=$request->Email;
        $guardar_cliente->Direccion=$request->Direccion;
        $guardar_cliente->save();
        return response(["data"=>"guardado exitosamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
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
    public function update(Request $request, Cliente $cliente)
    {
        $actualizar=$cliente;
        $actualizar_cliente->Nombre_Completo=$request->Nombre_Completo;
        $actualizar_cliente->Cedula=$request->Cedula;
        $actualizar_cliente->Telefono=$request->Telefono;
        $actualizar_cliente->Email=$request->Email;
        $actualizar_cliente->Direccion=$request->Direccion;
        $actualizar->save();
        return response(["data"=>cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente=cliente::findOrFail($cliente);
        $cliente->detele();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
