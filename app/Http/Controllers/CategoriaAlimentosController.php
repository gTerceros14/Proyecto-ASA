<?php

namespace App\Http\Controllers;

use App\Models\Categoria_alimentos;
use App\Models\Producto_alimenticio;
use App\Models\Productos;
use Illuminate\Http\Request;

class CategoriaAlimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    public function create(Request $request)
    {
        $nueva_categoria = new Categoria_alimentos();
        $nueva_categoria->tipo_producto = $request->input('tipo producto');
        $nueva_categoria->save();
    }

    public function show(){
        $mostrarCategorias = Categoria_alimentos::all();
        return response()->json($mostrarCategorias);
    }
    public function edit(Request $request){
        $editar_categoria = Categoria_alimentos::find($request->input('id'));
        if($editar_categoria){
            $editar_categoria->tipo_producto = $request->input('tipo producto');
            $editar_categoria->save();
            return response()->json(['mensaje' => 'Categoria Alimentos actualizado con éxito']);
        }
        else {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
    }
    public function destroy($id){
        $eliminar_categoria = Categoria_alimentos::find($id);
        if ($eliminar_categoria){
            $productos=Productos::where('id_categoria_Alimentos',$id)->get();
            foreach ($productos as $indice){
                $indice->id_categoria_Alimentos=null;
                $indice->save();
            }
            $eliminar_categoria->delete();
            return response()->json(['mensaje'=>'Categoria alimentos eliminado con exito']);
        }
        else{
            return response()->json(['error'=>'No existe la categoria']);
        }
    }
}
