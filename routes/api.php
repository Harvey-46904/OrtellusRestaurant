<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('cliente','ClienteController',['except'=>['create','edit']]);
Route::resource('restaurantes','RestauranteController',['except'=>['create','edit']]);
Route::resource('domicilio','DomiciliosController',['except'=>['create','edit']]);
Route::resource('empleado','EmpleadosController',['except'=>['create','edit']]);
Route::resource('factura','FacturacionController',['except'=>['create','edit']]);
Route::resource('mesa','MesasController',['except'=>['create','edit']]);
Route::resource('pedido','PedidosController',['except'=>['create','edit']]);
Route::resource('producto','ProductosController',['except'=>['create','edit']]);
Route::resource('inventario','InventarioController',['except'=>['create','edit']]);
Route::resource('receta','RecetaController',['except'=>['create','edit']]);
Route::resource('menu','MenuController',['except'=>['create','edit']]);
Route::get("inventario_label","InventarioController@inventario_label");
Route::get("receta_label","RecetaController@Recetabables");


