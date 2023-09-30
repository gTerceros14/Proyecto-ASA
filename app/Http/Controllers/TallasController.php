<?php

namespace App\Http\Controllers;

use App\Models\Tallas;
use Illuminate\Http\Request;

class TallasController extends Controller
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
        $nueva_talla = new Tallas();
        $nueva_talla->talla = $request->input('nueva talla');
        $nueva_talla->save();
    }
    public function show(Tallas $tallas)
    {
        $mostrar_tallas = Tallas::all();
        return response()->json($mostrar_tallas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $editar_talla  = Tallas::find($request->input('id'));
        if ($editar_talla){
            $editar_talla->talla = $request->input('nueva talla');
            $editar_talla->save();

            return response()->json(['mensaje'=>'Talla editado con exito']);
        }
        else{
            return response()->json(['error'=>'Talla no encontrado en el registro'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tallas $tallas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tallas $tallas)
    {
        //
    }
}
