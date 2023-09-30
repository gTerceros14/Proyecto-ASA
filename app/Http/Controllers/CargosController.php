<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class CargosController extends Controller
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
        $nuevo_cargo = new Cargos();
        $nuevo_cargo->nombre_cargo = $request->input('nombre cargo');
        $nuevo_cargo->save();
    }
    public function show()
    {
        $mostrarCargos = Cargos::all();
        return response()->json($mostrarCargos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $editar_cargo=Cargos::find($request->input('id'));
        if ($editar_cargo){
            $editar_cargo->nombre_cargo=$request->input('nombre cargo');
            $editar_cargo->save();
            return response()->json(['mensaje' => 'Registro de cargo actualizado con éxito']);
        }
        else {
            return response()->json(['error' => 'Cargo no encontrado'], 404);
        }
    }
    public function destroy($id)
    {
        $eliminar_cargo=Cargos::find($id);
        if($eliminar_cargo){
            $trabajadores=Trabajador::where('id_cargo',$id)->get();
            foreach ($trabajadores as $indice){
                $indice->id_cargo=null;
                $indice->save();
            }
            $eliminar_cargo->delete();
           return response()->json(['mensaje'=>'Cargo eliminado con exito']);
        }
        else{
            return response()->json(['error'=>'No existe el cargo']);
        }
    }   
}
