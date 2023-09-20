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
Route::get("receta_menu/{id}","RecetaController@obtenerRecetasConMenu");
Route::get("recetaid","RecetaController@idreceta");
Route::delete("deleteinventario/{inventario}","InventarioController@destroy");
Route::delete("deletereceta/{receta}","RecetaController@destroy");
Route::delete("deletemenu/{menu}","MenuController@destroy");
Route::delete("deletemesa/{mesa}","MesasController@destroy");
route::put("updatereceta/{upreceta}","RecetaController@update");
route::put("updamenu/{upmenu}","MenuController@update");
route::put("updamesa/{upmenu}","MesasController@update");
route::put("updinveta/{upinveta}","InventarioController@update");


