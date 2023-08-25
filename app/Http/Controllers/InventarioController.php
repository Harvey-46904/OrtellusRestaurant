<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
use DB;
class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=Inventario::all();
        return response (["data"=> $consulta]);
    }
    public function inventario_label(){
        $consulta=DB::table("inventarios")
        ->select("id AS value","Nombre_Producto AS label")
        ->get();
        return response (["data"=> $consulta]);
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
            'Nombre_Producto' => 'required | string',
            'Categoria' => 'required | string',
            'Cantidad' => 'required | string',
            'Unidad_Medida' => 'required | string',
            'Precio_Unitario' => 'required | integer',
            'Precio_Total' => 'required | integer',
            'Fecha_Ingreso' => 'required | string',
            'Fecha_Vencimiento' => 'required | string',
            
            
         ];

         $messages = [
            'Nombre_Producto'  => 'The :attribute and :other must match.',
            'Categoria' => 'The :attribute must be exactly :size.',
            'Cantidad' => 'The :attribute value :input is not between :min - :max.',
            'Unidad_Medida'=> 'The :attribute must be one of the following types: :values',
            'Precio_Unitario'=> 'The :attribute must be one of the following types: :values',
            'Precio_Total'=> 'The :attribute must be one of the following types: :values',
            'Fecha_Ingreso'=> 'The :attribute must be one of the following types: :values',
            'Fecha_Vencimiento'=> 'The :attribute must be one of the following types: :values',
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $guardar_inventario=new Inventario;
        $guardar_inventario->Nombre_Producto=$request->Nombre_Producto;
        $guardar_inventario->Categoria=$request->Categoria;
        $guardar_inventario->Cantidad=$request->Cantidad;
        $guardar_inventario->Unidad_Medida=$request->Unidad_Medida;
        $guardar_inventario->Precio_Unitario=$request->Precio_Unitario;
        $guardar_inventario->Precio_Total=$request->Precio_Total;
        $guardar_inventario->Fecha_Ingreso=$request->Fecha_Ingreso;
        $guardar_inventario->Fecha_Vencimiento=$request->Fecha_Vencimiento;
        $guardar_inventario->save();
        return self::index();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show($inventario)
    {
        $inventario=Inventario::findOrFail($inventario);
        return response (["data"=>$inventario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$inventario)
    {
        $guardar = [
            'Nombre_Producto' => 'required | string',
            'Categoria' => 'required | string',
            'Cantidad' => 'required | string',
            'Unidad_Medida' => 'required | string',
            'Precio_Unitario' => 'required | integer',
            'Precio_Total' => 'required | integer',
            'Fecha_Ingreso' => 'required | string',
            'Fecha_Vencimiento' => 'required | string',
         ];

         $messages = [
            'Nombre_Producto'  => 'The :attribute and :other must match.',
            'Categoria' => 'The :attribute must be exactly :size.',
            'Cantidad' => 'The :attribute value :input is not between :min - :max.',
            'Unidad_Medida'=> 'The :attribute must be one of the following types: :values',
            'Precio_Unitario'=> 'The :attribute must be one of the following types: :values',
            'Precio_Total'=> 'The :attribute must be one of the following types: :values',
            'Fecha_Ingreso'=> 'The :attribute must be one of the following types: :values',
            'Fecha_Vencimiento'=> 'The :attribute must be one of the following types: :values',
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{

        $actualizar_inventario=Inventario::findOrFail($inventario);
        $actualizar_inventario->Nombre_Producto=$request->Nombre_Producto;
        $actualizar_inventario->Categoria=$request->Categoria;
        $actualizar_inventario->Cantidad=$request->Cantidad;
        $actualizar_inventario->Unidad_Medida=$request->Unidad_Medida;
        $actualizar_inventario->Precio_Unitario=$request->Precio_Unitario;
        $actualizar_inventario->Precio_Total=$request->Precio_Total;
        $actualizar_inventario->Fecha_Ingreso=$request->Fecha_Ingreso;
        $actualizar_inventario->Fecha_Vencimiento=$request->Fecha_Vencimiento;
        $actualizar_inventario->save();
        return response(["data"=>"datos actualizados"]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy( $inventario)
    {
        $inventario=Inventario::findOrFail($inventario);                          
        $inventario->delete();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
