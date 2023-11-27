<?php

namespace App\Http\Controllers;
use Validator;
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
        $guardar = [
            'nombre' => 'required | string',
            'direccion_domicilio' => 'required | string',
            'numero_factura' => 'required | string',
            'feha_domicilio' => 'required | date',
            'tipo_comida' => 'required | string',
         ];

         $messages = [
            'nombre'  => 'The :attribute and :other must match.',
            'direccion_domicilio' => 'The :attribute must be exactly :size.',
            'numero_factura' => 'The :attribute value :input is not between :min - :max.',
            'feha_domicilio'=> 'The :attribute must be one of the following types: :values',
            'tipo_comida'=> 'The :attribute must be one of the following types: :values',
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $guardar_domicilio=new domicilios();
        $guardar_domicilio->nombre=$request->nombre;
        $guardar_domicilio->direccion_domicilio=$request->direccion_domicilio;
        $guardar_domicilio->numero_factura=$request->numero_factura;
        $guardar_domicilio->feha_domicilio=$request->feha_domicilio;
        $guardar_domicilio->tipo_comida=$request->tipo_comida;
        $guardar_domicilio->save();
        return self::index();
        }
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
        return response (["data"=>$domicilios]);
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
        $guardar = [
            'nombre' => 'required | string',
            'direccion_domicilio' => 'required | string',
            'numero_factura' => 'required | string',
            'feha_domicilio' => 'required | date',
            'tipo_comida' => 'required | string',
         ];

         $messages = [
            'nombre'  => 'The :attribute and :other must match.',
            'direccion_domicilio' => 'The :attribute must be exactly :size.',
            'numero_factura' => 'The :attribute value :input is not between :min - :max.',
            'feha_domicilio'=> 'The :attribute must be one of the following types: :values',
            'tipo_comida'=> 'The :attribute must be one of the following types: :values',
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $domicilios=domicilios::findOrFail($domicilios);
        
        $domicilios->nombre=$request->nombre;
        $domicilios->direccion_domicilio=$request->direccion_domicilio;
        $domicilios->numero_factura=$request->numero_factura;
        $domicilios->feha_domicilio=$request->feha_domicilio;
        $domicilios->tipo_comida=$request->tipo_comida;
        $domicilios->save();
        return response (["data"=>"registro actualizado"]);
        }
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
