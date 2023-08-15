<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta=Menu::all();
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
            'Id_Receta' => 'required | integer',
            'Precio' => 'required | integer',
           
            
            
         ];

         $messages = [
            'Id_Receta'  => 'The :attribute and :other must match.',
            'Precio' => 'The :attribute must be exactly :size.',
            
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $guardar_menu=new Menu;
        $guardar_menu->Id_Receta=$request->Id_Receta;
        $guardar_menu->Precio=$request->Precio;
        $guardar_menu->save();
        return self::index();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show( $menu)
    {
        $menu=Menu::findOrFail($menu);
        return response (["data"=>$menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $menu)
    {
        $guardar = [
            'Id_Receta' => 'required | integer',
            'Precio' => 'required | integer',
           
            
            
         ];

         $messages = [
            'Id_Receta'  => 'The :attribute and :other must match.',
            'Precio' => 'The :attribute must be exactly :size.',
            
        ];
        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $actualizar_menu=Menu::findOrFail($menu);
        $actualizar_menu->Id_Receta=$request->Id_Receta;
        $actualizar_menu->Precio=$request->Precio;
        $actualizar_menu->save();
        return self::index();
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy( $menu)
    {
        
        $menu=Menu::findOrFail($menu);                          
        $menu->delete();
        return response(["data"=> "Eliminado exitosamente"]);
    }
}
