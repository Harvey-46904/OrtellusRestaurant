<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta= pedidos::all();
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
        $guardar_pedido= new pedidos();
        $guardar_pedido->nombre_pedido=$request->nombre_pedido;
        $guardar_pedido->fecha_pedido=$request->fecha_pedido;
        $guardar_pedido->precio=$request->precio;
        $guardar_pedido->descuento=$request->descuento;
        $guardar_pedido->envio=$request->envio;
        $guardar_pedido->tipo_pago=$request->tipo_pago;
        $guardar_pedido->estado=$request->estado;
        $guardar_pedido->direccion=$request->direccion;
        $guardar_pedido->telefono=$request->telefono;
        $guardar_pedido->descripcion=$request->descripcion;
        $guardar_pedido->save();
        return response (["data"=>"registro gusrdado exitosamente"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show($pedidos)
    {
        $pedidos=pedidos::findOrFail($pedidos);
        return response (["data"=>$pedidos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
   /* public function edit(pedidos $pedidos)
    {
        $pedidos=pedidos::findOrFail($pedidos);
        return response (["data"=>"datos actualizados"]);
    }
    */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pedidos)
    {
        //
        $pedidos=pedidos::findOrFail($pedidos);
        $pedidos->nombre_pedido=$request->nombre_pedido;
        $pedidos->fecha_pedido=$request->fecha_pedido;
        $pedidos->precio=$request->precio;
        $pedidos->descuento=$request->descuento;
        $pedidos->envio=$request->envio;
        $pedidos->tipo_pago=$request->tipo_pago;
        $pedidos->estado=$request->estado;
        $pedidos->direccion=$request->direccion;
        $pedidos->telefono=$request->telefono;
        $pedidos->descripcion=$request->descripcion;
        $pedidos->save();
        return response (["data"=>"datos actualizados"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy($pedidos)
    {
        $pedidos=pedidos::findOrFail($pedidos);
        $pedidos->delete();
        return response (["data"=>"datos eliminados"]);
    }
}
