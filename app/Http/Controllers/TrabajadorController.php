<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
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
        $trabajador = new Trabajador();
        $trabajador->nombre = $request->input('nombre');
        $trabajador->apellido = $request->input('apellido');
        $trabajador->edad = $request->input('edad');
        $trabajador->telefono = $request->input('telefono');
        $trabajador->correo_electronico = $request->input('correo electronico');
        $trabajador->direccion =$request->input('direccion');
        $trabajador->id_cargo = $request->input('id cargo');
        $trabajador->save();
        
    }
    public function show()
    {
        $mostrar_trabajador = Trabajador::all();
        return response()->json($mostrar_trabajador);
    }
    public function edit(Request $request)
    {
        $editar_trabajador = Trabajador::find($request->input('id'));
        if($editar_trabajador){
            $editar_trabajador->nombre = $request->input('nombre');
            $editar_trabajador->apellido = $request->input('apellido');
            $editar_trabajador->edad = $request->input('edad');
            $editar_trabajador->telefono = $request->input('telefono');
            $editar_trabajador->correo_electronico = $request->input('correo electronico');
            $editar_trabajador->direccion =$request->input('direccion');
            if (Cargos::find($request->input('id cargo'))){
                $editar_trabajador->id_cargo = $request->input('id cargo');
                $editar_trabajador->save();
                return response()->json(['mensaje'=>'Trabajador editado con exito']);
            }
            else{
                return response()->json(['error'=>'no existe el cargo']);
            }
            
        }
        else{
            return response()->json(['error'=>'Trabajador no encontrado']);
        }
    }
    public function update(Request $request, Trabajador $trabajador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trabajador $trabajador)
    {
        //
    }
}
