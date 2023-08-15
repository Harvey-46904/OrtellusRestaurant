<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\Validator;
use App\Models\empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta = empleados::all();
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
            'nombre' => 'required | string',
            'cedula' => 'required | string',
            'telefono' => 'required | string',
            'cargo' => 'required | string',
            'direccion' => 'required | string',
            'email' => 'required | string',
            'fecha_ingreso' => 'required | date',
         ];

         $messages = [
            'nombre'  => 'The :attribute and :other must match.',
            'cedula' => 'The :attribute must be exactly :size.',
            'telefono' => 'The :attribute value :input is not between :min - :max.',
            'cargo'=> 'The :attribute must be one of the following types: :values',
            'direccion'=> 'The :attribute must be one of the following types: :values',
            'email'=> 'The :attribute must be one of the following types: :values',
            'fecha_ingreso'=> 'The :attribute must be one of the following types: :values',
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $guardar_empleados = new empleados;
        $guardar_empleados->nombre=$request->nombre;
        $guardar_empleados->cedula=$request->cedula;
        $guardar_empleados->telefono=$request->telefono;
        $guardar_empleados->cargo=$request->cargo;
        $guardar_empleados->direccion=$request->direccion;
        $guardar_empleados->email=$request->email;
        $guardar_empleados->fecha_ingreso=$request->fecha_ingreso;
        $guardar_empleados->save();
        return self::index();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show($empleados)
    {
        //show significa buscar, encontrar 
        $empleados=empleados::findOrFail($empleados);
        return response (["data"=>$empleados]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($empleados)
    {
        $empleados=empleados::findOrFail($empleados);
        return response (["data"=>"datos actualizados"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $empleados)
    {
        //actualizar
        $guardar = [
            'nombre' => 'required | string',
            'cedula' => 'required | string',
            'telefono' => 'required | string',
            'cargo' => 'required | string',
            'direccion' => 'required | string',
            'email' => 'required | string',
            'fecha_ingreso' => 'required | date',
         ];

         $messages = [
            'nombre'  => 'The :attribute and :other must match.',
            'cedula' => 'The :attribute must be exactly :size.',
            'telefono' => 'The :attribute value :input is not between :min - :max.',
            'cargo'=> 'The :attribute must be one of the following types: :values',
            'direccion'=> 'The :attribute must be one of the following types: :values',
            'email'=> 'The :attribute must be one of the following types: :values',
            'fecha_ingreso'=> 'The :attribute must be one of the following types: :values',
        ];
       
       

        $validator = Validator::make($request->all(), $guardar,  $messages);
       
        if ($validator->fails()) {
            return response(['Error de los datos'=>$validator->errors()]);
        }
        else{
        $empleados=empleados::findOrfail($empleados);
        $empleados->nombre=$request->nombre;
        $empleados->cedula=$request->cedula;
        $empleados->telefono=$request->telefono;
        $empleados->cargo=$request->cargo;
        $empleados->direccion=$request->direccion;
        $empleados->email=$request->email;
        $empleados->fecha_ingreso=$request->fecha_ingreso;
        $empleados->save();
        return response (["data"=>"datos actualizados"]);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($empleados)
    {
        $empleados=empleados::findOrfail($empleados);
        $empleados->delete();
        return response (["data"=>"datos eliminados"]);
    }
}
