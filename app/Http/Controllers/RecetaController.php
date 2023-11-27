<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\Inventario;
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
            'Fotografia' => 'required | image',
            'Ingredientes' => 'required | string',
            ];

         $messages = [
            'Nombre_Plato'  => 'The :attribute and :other must match.',
            'Fotografia' => 'The :attribute must be an image.',
            'Ingredientes' => 'The :attribute must be exactly :size.',
            
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $guardar_receta=new Receta;
        
        
        $guardar_receta->Nombre_Plato=$request->Nombre_Plato;
        
        if ($request->hasFile('Fotografia') && $request->file('Fotografia')->isValid()){
           
            $file = $request->file('Fotografia');
            $destinatario = 'receta_images/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('Fotografia')->move($destinatario, $filename);
            $guardar_receta->Fotografia=$destinatario . $filename;
            
        }
       // $guardar_receta->Fotografia=$request->Fotografia;
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
    public function update(Request $request, $receta)
{
    // Obtener la receta actual
    $actualizar_receta = Receta::findOrFail($receta);
    
    // Obtener la ubicación de la fotografía actual
    $fotoActual = $actualizar_receta->Fotografia;

    // Validar y actualizar la receta
    $guardar = [
        'Nombre_Plato' => 'nullable | string',
        'Fotografia' => 'nullable | image',
        'Ingredientes' => 'nullable | string',
    ];

    $messages = [
        'Nombre_Plato' => 'The :attribute and :other must match.',
        'Fotografia' => 'The :attribute must be an string.',
        'Ingredientes' => 'The :attribute must be exactly :size.',
    ];

    $validator = Validator::make($request->all(), $guardar, $messages);

    if ($validator->fails()) {
        return response(['Error de los datos' => $validator->errors()]);
    } else {
        // Actualizar los campos de la receta
        $actualizar_receta->Nombre_Plato = $request->Nombre_Plato;

        if ($request->hasFile('Fotografia') && $request->file('Fotografia')->isValid()) {
            // Subir la nueva fotografía
            $file = $request->file('Fotografia');
            $destinatario = 'receta_images/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('Fotografia')->move($destinatario, $filename);
            $actualizar_receta->Fotografia = $destinatario . $filename;

            // Eliminar la fotografía anterior si existe
            if (!empty($fotoActual) && file_exists(public_path($fotoActual))) {
                unlink(public_path($fotoActual));
            }
        }

        $actualizar_receta->Ingredientes = $request->Ingredientes;

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
    { $receta = Receta::findOrFail($receta);
    
        // Obtén la ruta completa de la fotografía actual
        $fotoActual = public_path($receta->Fotografia);
    
        // Elimina la fotografía actual si existe
        if (!empty($fotoActual) && file_exists($fotoActual)) {
            unlink($fotoActual);
        }
    
        $receta->delete();
        
        return response(["data" => "Eliminado exitosamente"]);
    }

    //public function Recetabables () {
      //  $consultalable= DB::table('recetas')->select("id AS value","Nombre_Plato AS label")
       // ->get();
        //return response(["data"=>$consultalable]);
    //}

    public function Recetabables() {
        $consultaLabels = DB::table('recetas')->select("id AS value", "Nombre_Plato AS label", "Ingredientes")
            ->get();
        // pluck se utiliza para traer valores especificos de una columnas de valores
        // de una tabla
        $ingredientes = Inventario::pluck('Nombre_Producto', 'id');
        //busca del array ingredientes los numeros para relacionar
        //y los guarda en buscarmike
        $resultado = $consultaLabels->map(function ($buscarmike) use ($ingredientes) {
            //aqui con json se decodifica el json a un arreglo esto crea un arreglo de ids
            //de ingredientes que estaban almacenados en el json
            $ingredientesIds = json_decode($buscarmike->Ingredientes, true);
            //aqui creo una varable vacia
            $nombresIngredientes = [];
            
            foreach ($ingredientesIds as $ingredienteId) {
                //si el id del ingrediente existe en el arreglo $ingredientes
                //se agrega a $nombresIngredientes
                if (isset($ingredientes[$ingredienteId])) {
                    $nombresIngredientes[] = $ingredientes[$ingredienteId];
                }
            }
    
            $buscarmike->mike_Ingrediente = $nombresIngredientes;
    
            return $buscarmike;
        });
    
        return response(["data" => $resultado]);
    }
      public function obtenerRecetasConMenu($id){
        $menu = $id;
        $foto = DB::table('recetas')
        ->join('menus', 'recetas.id', '=', 'menus.Id_Receta')
        ->select('recetas.Fotografia','recetas.Nombre_Plato','menus.Precio', 'menus.descripcion')
        ->where("menus.Id_Receta","=",$menu)
        ->get();

        return response  (["data"=>$foto]);
    }

    public function idreceta(){
        
        $recetas = DB::table('recetas')->select('id', 'Nombre_Plato')->get();
        return response (["data"=>$recetas]);
    }
    

}
