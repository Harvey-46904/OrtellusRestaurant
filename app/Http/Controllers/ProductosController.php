<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\Validator;
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
        $guardar = [
            'Nombre_producto' => 'required | string',
            'Fecha_producto' => 'required | date',
            'Descripcion_producto' => 'required | string',
            
            
            
         ];

         $messages = [
            'Nombre_producto'  => 'The :attribute and :other must match.',
            'Fecha_producto' => 'The :attribute must be exactly :size.',
            'Descripcion_producto' => 'The :attribute value :input is not between :min - :max.',
            
           
            
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $guardar_productos=new Productos;
        $guardar_productos->Nombre_producto=$request->Nombre_producto;
        $guardar_productos->Fecha_producto=$request->Fecha_producto;
        $guardar_productos->Descripcion_producto=$request->Descripcion_producto;
        $guardar_productos->save();
        return response(["data"=>"guardado exitosamente"]);
        }
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
        return response (["data"=>$consulta]);
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
        $guardar = [
            'Nombre_producto' => 'required | string',
            'Fecha_producto' => 'required | date',
            'Descripcion_producto' => 'required | string',
            
            
            
         ];

         $messages = [
            'Nombre_producto'  => 'The :attribute and :other must match.',
            'Fecha_producto' => 'The :attribute must be exactly :size.',
            'Descripcion_producto' => 'The :attribute value :input is not between :min - :max.',
            
           
            
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $actualizar=Productos::findOrFail($productos);
        $actualizar->Nombre_producto=$request->Nombre_producto;
        $actualizar->Fecha_producto=$request->Fecha_producto;
        $actualizar->Descripcion_producto=$request->Descripcion_producto;
        $actualizar->save();
        return response (["data"=>"datos actualizados"]);
        }
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
        $productos->delete();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
