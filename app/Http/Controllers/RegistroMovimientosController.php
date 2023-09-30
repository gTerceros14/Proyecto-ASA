<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Registro_movimientos;
use Illuminate\Http\Request;

class RegistroMovimientosController extends Controller
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
        $data = $request->json()->all();
        $producto = Productos::where('nombre_producto',$data['productos']['nombre_producto'])->first();
        $registroMovimientos = new Registro_movimientos();
        if($producto){
            $productoId = $producto->id;
            
            $registroMovimientos->cantidad = $data['registro']['cantidad'];
            $producto->cantidad +=$registroMovimientos->cantidad;
            $registroMovimientos->fecha_registro = $data['registro']['fecha_registro'];
            $registroMovimientos->id_productos = $productoId; // Asigna el ID del producto
            $producto->save();
        }
        else{
            //$producto = Productos::create($data['productos']);
            $producto = new ProductosController();
            $productoId=$producto->create($data['productos']);
            if ($productoId) {
                $registroMovimientos->cantidad = $data['productos']['cantidad'];
                $registroMovimientos->fecha_registro = $data['registro']['fecha_registro'];
                $registroMovimientos->id_productos = $productoId; // Asigna el ID del producto
                
            }
        }
        $registroMovimientos->save();
    }

    public function show()
    {
        $registros = Productos::with('registro_movimiento')->get();
        return response()->json(['registros' => $registros]);
    }
    public function edit(Request $request)
    {
        $editar_registro = Registro_movimientos::find($request->input('id'));
        if ($editar_registro){
            $producto = Productos::find($request->input('id producto'));
            if ($producto){
                $editar_registro->id_productos=$producto->id;
                $producto->cantidad-=$editar_registro->cantidad;
                $editar_registro->cantidad = $request->input('cantidad');
                $producto->cantidad +=$request->input('cantidad');
                $editar_registro->fecha_registro=$request->input('fecha registro');

                $editar_registro->save();
                $producto->save();
                return response()->json(['mensaje'=> 'Registro editado con exito']);
            }
            else{
                return response()->json(['error'=>'Producto no encontrado'],404);
            }
        }
        else{
            return response()->json(['eror'=>'Registro no encontrado']);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro_movimientos $registro_movimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro_movimientos $registro_movimientos)
    {
        //
    }
}
