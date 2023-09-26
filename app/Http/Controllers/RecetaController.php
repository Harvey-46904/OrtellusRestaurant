<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
use DB;
class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=Receta::all();
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
            'Nombre_Plato' => 'required | string',
            'Fotografia' => 'required | string',
            'Ingredientes' => 'required | string',
            ];

         $messages = [
            'Nombre_Plato'  => 'The :attribute and :other must match.',
            'Fotografia' => 'The :attribute must be exactly :size.',
            'Ingredientes' => 'The :attribute must be exactly :size.',
            
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $guardar_receta=new Receta;
        $guardar_receta->Nombre_Plato=$request->Nombre_Plato;
        $guardar_receta->Fotografia=$request->Fotografia;
        $guardar_receta->Ingredientes=$request->Ingredientes;
        $guardar_receta->save();
        return self::index();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show( $receta)
    {
        $receta=Receta::findOrFail($receta);
        return response (["data"=>$receta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $receta)
    {
        $guardar = [
            'Nombre_Plato' => 'required | string',
            'Fotografia' => 'required | string',
            'Ingredientes' => 'required | string',
            ];

         $messages = [
            'Nombre_Plato'  => 'The :attribute and :other must match.',
            'Fotografia' => 'The :attribute must be exactly :size.',
            'Ingredientes' => 'The :attribute must be exactly :size.',
            
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $actualizar_receta=Receta::findOrFail($receta);
        $actualizar_receta->Nombre_Plato=$request->Nombre_Plato;
        $actualizar_receta->Fotografia=$request->Fotografia;
        $actualizar_receta->Ingredientes=$request->Ingredientes;
        $actualizar_receta->save();
        return self::index();
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy( $receta)
    {
        $receta=Receta::findOrFail($receta);                          
        $receta->delete();
        return response(["data"=> "Eliminado exitosamente"]);
    }

    public function receta_ingrediente(){
        $inventario=DB::table("inventarios")->select("id","Nombre_Producto")->get();
        $consultas=DB::table("recetas")->get();
        $receta_ingrediente=array();
       foreach ($consultas as $consulta) {
            $ingredientesArray = json_decode($consulta->Ingredientes);
            $ingredientes=array();
            foreach ($ingredientesArray as $ingrediente) {
                $prodcuto_inventario=self::obtenerNombreProducto($ingrediente,$inventario);
                array_push($ingredientes,$prodcuto_inventario);
            }
            $producto = array("producto"=>$consulta->Nombre_Plato,"ingrediente"=>$ingredientes);
            array_push($receta_ingrediente,$producto);
       }
       return response(["data"=>$receta_ingrediente]);
       // return response(["data"=>$consultas]);
    }

    function obtenerNombreProducto($id, $productoArray) {
        foreach ($productoArray as $producto) {
            if ($producto->id === $id) {
                return $producto->Nombre_Producto;
            }
        }
        return "Producto no encontrado";
    }
}
