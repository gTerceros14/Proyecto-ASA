<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
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
    public function create(Request $request)
    {
        $nueva_categoria = new Categorias();
        $nueva_categoria->nombre_categoria = $request->input('nombre categoria');
        $nueva_categoria->save();
    }

    public function show()
    {
        $mostrarCategorias =Categorias::all();
        return response()->json($mostrarCategorias);
    }
    public function edit(Request $request)
    {
        $editar_categoria = Categorias::find($request->input('id'));
        if ($editar_categoria){
            $editar_categoria->nombre_categoria = $request->input('nombre categoria');
            $editar_categoria->save();
            return response()->json(['mensaje'=>'Categoria actualizada con exito']);
        }
        else{
            return response()->json(['eror'=>'Categoria no encontrado'],404);
        }
    }

    public function destroy($id)
    {
        
    }
}
