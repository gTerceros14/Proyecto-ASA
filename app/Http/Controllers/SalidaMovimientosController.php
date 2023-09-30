<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Productos;
use App\Models\Salida;
use App\Models\Salida_movimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalidaMovimientosController extends Controller
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
        $nueva_salida = new Salida_movimientos();
        $nueva_salida->id_productos = $request->input('id producto');
        $producto = Productos::find($nueva_salida->id_productos);
        if ($producto){
            $nueva_salida->cantidad= $request->input('cantidad');
            if($nueva_salida->cantidad <= $producto->cantidad){
                $id_beneficiario= $request->input('id beneficiario');
                $beneficiario =Beneficiario::find($id_beneficiario);
                if($beneficiario){                
                    $nueva_salida->fecha_salida =$request->input('fecha salida');
                    $producto->cantidad-=$nueva_salida->cantidad;
                    $producto->save();    
                    $nueva_salida->save();
                }
                else{
                    return response()->json(['error' => 'no existe beneficiario'], 400);
                }
            }
            else{
                return response()->json(['error' => 'no se puede registrar cantida mayor'], 400);
            }
            
        }
        else{
            return response()->json(['error' => 'No existe producto'], 400);
        }

        
        $nueva_salida->beneficiario()->attach($beneficiario->id);
        $nueva_salida->save();


        /*$nueva_salida = new Salida_movimientos();
        $nueva_salida->id_producto = $request->input('id producto');
        $nueva_salida->cantidad= $request->input('cantidad');
        $nueva_salida->id_beneficiario= $request->input('id beneficiario');
        $nueva_salida->fecha_salida =$request->input('fecha salida');
        $nueva_salida->save();
        

        $producto = Productos::find($nueva_salida->id_producto);
        $nueva_salida->producto()->attach($producto->id);
        $nueva_salida->save();*/

    }
    public function show()
    {
        $salidas = Productos::with('registro_movimiento','salida_movimientos')->get();
        return response()->json( $salidas);
        /*$salidas = DB::table('salidas')
                    ->join('beneficiarios','salidas.id_beneficiario','=','beneficiarios.id')
                    ->join('salida_movimientos','salidas.id_salida_movimientos','=','salida_movimientos.id')
                    ->join('productos','salida_movimientos.id_productos','=','productos.id')
                    ->join('categorias','productos.id_categoria','=','categorias.id')
                    ->select('salida_movimientos.*','beneficiarios.nombre','productos.*')
                    ->get();
                    
        return response()->json( $salidas);   */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $salida=Salida::where('id_salida_movimientos',$request->input('id movimiento'))->where('id', $request->input('id salida'))->first();
        if($salida){    
            $editar_salida = Salida_movimientos::find($request->input('id movimiento'));
            if ($editar_salida){
                $beneficiario = Beneficiario::find($request->input('id beneficiario'));
                if ($beneficiario){
                    $producto = Productos::find($request->input('id producto'));
                    if ($producto){
                        $producto->cantidad +=$editar_salida->cantidad;
                        $editar_salida->cantidad=$request->input('cantidad');
                        if($editar_salida->cantidad <= $producto->cantidad){
                            $producto->cantidad -=$editar_salida->cantidad;
                            $editar_salida->fecha_salida=$request->input('fecha salida');
                            
                        
                            $salida->id_beneficiario=$beneficiario->id;
                            $salida->save();
                            $editar_salida->save();
                            $producto->save();
                            return response()->json(['mensaje'=>'Salida editado con exito']);
                        }
                        else{
                            return response()->json(['error'=>'La cantidad es mayor a la que existe actualmente en el producto']);
                        }
                    }
                    else{
                        return response()->json(['error'=>'No existe el producto']);
                    }
                }
                else{
                    return response()->json(['error'=>'No existe el beneficiario']);
                }
            }
            else{
                return response()->json(['error'=>'No existe el registro']);
            }
        }
        else{
            return response()->json(['error'=>'No existe el registro']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salida_movimientos $salida_movimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salida_movimientos $salida_movimientos)
    {
        //
    }
}
