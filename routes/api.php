<?php

use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\CategoriaAlimentosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductoAlimenticioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProductoVestimentaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\RegistroMovimientosController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\SalidaMovimientosController;
use App\Http\Controllers\TallasController;
use App\Http\Controllers\TrabajadorController;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Reorderable;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// registro
Route::post('/agregarBeneficiario',[BeneficiarioController::class,'create']);
Route::post('/agregarCargo',[CargosController::class,'create']);
Route::post('/agregarTrabajador',[TrabajadorController::class,'create']);
Route::post('/agregarCategoriaAlimentos',[CategoriaAlimentosController::class,'create']);
Route::post('/agregarCategoria',[CategoriasController::class,'create']);
Route::post('/agregarTalla',[TallasController::class,'create']);
Route::post('/agregarProducto',[ProductosController::class,'create']);
Route::post('/agregarSalida',[SalidaMovimientosController::class,'create']);
Route::post('/agregarRegistro',[RegistroMovimientosController::class,'create']);
Route::post('/agregarProductoVestimenta',[ProductoVestimentaController::class,'create']);
Route::post('/agregarProductoAlimenticio',[ProductoAlimenticioController::class,'create']);

//mostrar
Route::get('/mostrarBeneficiarios',[BeneficiarioController::class,'show']);
Route::get('/mostrarCargos',[CargosController::class,'show']);
Route::get('/mostrarCategoriasAlimentos',[CategoriaAlimentosController::class,'show']);
Route::get('/mostrarCategorias',[CategoriasController::class,'show']);
Route::get('/mostrarProductos',[ProductosController::class,'show']);
Route::get('/mostrarRegistroMovimientos',[RegistroMovimientosController::class,'show']);
Route::get('/mostrarRegistroSalidas',[SalidaMovimientosController::class,'show']);
Route::get('/mostrarTallas',[TallasController::class,'show']);
Route::get('/mostrarTrabajador',[TrabajadorController::class,'show']);

//editar
Route::put('/editarBeneficiario',[BeneficiarioController::class,'edit']);
Route::put('/editarCargos',[CargosController::class,'edit']);
Route::put('/editarCategoriaAlimentos',[CategoriaAlimentosController::class,'edit']);
Route::put('/editarCategorias',[CategoriasController::class,'edit']);
Route::put('/editarProducto',[ProductosController::class,'edit']);
Route::put('/editarRegistro',[RegistroMovimientosController::class,'edit']);
Route::put('/editarSalida',[SalidaMovimientosController::class,'edit']);
Route::put('/editarTallas',[TallasController::class,'edit']);
Route::put('/editarTrabajador',[TrabajadorController::class,'edit']);

//eliminar
Route::delete('/eliminarBeneficiario/{id}',[BeneficiarioController::class,'destroy']);
Route::delete('/eliminarCargo/{id}',[CargosController::class,'destroy']);
Route::delete('/eliminarCategoriaAlimentos/{id}',[CategoriaAlimentosController::class,'destroy']);
Route::delete('/eliminarCategorias/{id}',[CategoriasController::class,'destroy']);//falta
Route::delete('/eliminarProducto/{id}',[ProductosController::class,'destroy']);

Route::delete('/eliminarRegistroMovimientos/{id}',[RegistroController::class,'destroy']); //falta
Route::delete('/eliminarSalida/{id}',[SalidaController::class,'destroy']); //falta
Route::delete('/eliminarSalidaMovimientos/{id}',[SalidaMovimientosController::class,'destroy']); //falta
Route::delete('/eliminarTallas/{id}',[TallasController::class,'destroy']); //falta
Route::delete('/eliminarTrabajador/{id}',[TrabajadorController::class,'destroy']); //falta



