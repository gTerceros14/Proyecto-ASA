<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Salida;
use App\Models\Salida_movimientos;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
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
        $beneficiario  = new Beneficiario();
        $beneficiario->nombre = $request->input('nombre');
        $beneficiario->apellido = $request->input('apellido');
        $beneficiario->edad = $request->input('edad');
        $beneficiario->telefono = $request->input('telefono');
        $beneficiario->correo_electronico = $request->input('correo electronico');
        $beneficiario->direccion =$request->input('direccion');
        $beneficiario->save();
    }

    public function show()
    {
        $beneficiarios = Beneficiario::all();
        return response()->json($beneficiarios);

    }

    public function edit(Request $request)
    {
        $beneficiario = Beneficiario::find($request->input('id'));
        if ($beneficiario){

            $beneficiario->nombre = $request->input('nombre');
            $beneficiario->apellido = $request->input('apellido');
            $beneficiario->edad = $request->input('edad');
            $beneficiario->telefono = $request->input('telefono');
            $beneficiario->correo_electronico=$request->input('correo electronico');
            $beneficiario->direccion=$request->input('direccion');

            $beneficiario->save();
            return response()->json(['mensaje' => 'Registro de beneficiario actualizado con éxito']);
        }
        else {
            return response()->json(['error' => 'Beneficiario no encontrado'], 404);
        }
        
    }

    public function destroy($id)
    {
        $eliminar_beneficiario= Beneficiario::find($id);
        if ($eliminar_beneficiario){
            $salidas=Salida::where('id_beneficiario',$id)->get();
            if ($salidas){

                foreach ($salidas as $registros){
                    $salidasMovimientos = Salida_movimientos::find($registros->id_salida_movimientos);

                    if ($salidasMovimientos) {
                        $salidasMovimientos->delete();
                    }
                }
                $eliminar_beneficiario->delete();
                return response()->json(['mensaje'=>'Beneficiario y registros eliminados con exito']);
            }
        }
        else{
            return response()->json(['error'=>'No existe beneficiario']);
        }
    }
}
