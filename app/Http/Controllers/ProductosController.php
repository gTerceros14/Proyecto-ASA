<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    /*public function create(Request $request)
    {
        $nuevo_producto = new Productos();
        $nuevo_producto->nombre_producto = $request->input('nombre producto');
        $nuevo_producto->cantidad = $request->input('cantidad');
        $nuevo_producto->id_categoria = $request->input('id categoria');
        $nuevo_producto->id_talla = $request->input('id talla');
        $nuevo_producto->id_categoria_Alimentos = $request->input('id categoria alimentos');
        $nuevo_producto->save();
    }*/
    public function create($data){
        $producto = new Productos();

    // Asigna los valores a las propiedades del modelo
        $producto->nombre_producto = $data['nombre_producto'];
        $producto->cantidad = $data['cantidad'];
        $producto->id_categoria = $data['id_categoria'];
        $producto->id_categoria_Alimentos = $data['id_categoria_Alimentos'];
        $producto->save();
        return $producto->id;
    }
    public function show(Productos $productos)
    {
        $productos = Productos::all();
        return response()->json($productos);
    }
    public function edit(Request $request)
    {
        $data = $request->json()->all();
        $producto=Productos::find($data['producto']['id']);
        if ($producto){
            $producto->nombre_producto = $data['producto']['nombre_producto'];
            $producto->cantidad = $data['producto']['cantidad'];
            $producto->id_categoria = $data['producto']['id_categoria'];
            $producto->id_talla=$data['producto']['id_talla'];
            $producto->id_categoria_Alimentos = $data['producto']['id_categoria_Alimentos'];
            $producto->save();
            return response()->json(['mensaje'=>'Producto editado con exito']);
        }
        else{
            return response()->json(['error'=>'No exite el producto en el registro']);  
        }
    }
    public function destroy($id)
    {
        $eliminar_producto=Productos::find($id);
        if ($eliminar_producto){
            $eliminar_producto->delete();
            return response()->json(['mensaje'=>'Producto eliminado con exito']);
        }
        else{
            return response()->json(['error'=>'No existe el producto en el registro']);
        }
    }
}
