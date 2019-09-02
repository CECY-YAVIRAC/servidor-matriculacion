<?php

namespace App\Http\Controllers;

use App\TipoDescuento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDescuentosController extends Controller
{
    public function get(){
      $response=TipoDescuento::get();
      return response()->json(['tipo_descuentos'=>$response],200);
    }
    public function put(Request $request ){
        $datosClienteBody = $request->json()->all();
        $datosTipoDescuento=$datosClienteBody['tipodescuento'];
        $tipodescuento=TipoDescuento::findOrFail($datosTipoDescuento['id']);
        $response=$tipodescuento->update(
        [        
        'descripcion'=>$datosTipoDescuento['descripcion'],
        'valor_descuento'=>$datosTipoDescuento['valor_descuento'],                            
          ]);
        return response()->json(['tipo_descuentoS'=>$response],201);        
    }
    public function delete(Request $request){
        $tipodescuento=TipoDescuento::findOrFail($request->tipodescuento_id);
        $response=$tipodescuento->delete();
        return response()->json($response,201);
      }
      
    public function post(Request $request){
        $datosClienteBody = $request->json()->all();
        $datosTipoDescuento=$datosClienteBody['tipodescuento'];      
        $response=TipoDescuento::create([       
        'descripcion'=>$datosTipoDescuento['descripcion'],
        'valor_descuento'=>$datosTipoDescuento['valor_descuento'],       
          ]);
          return response()->json(['tipo_descuentoS'=>$response],201);
        }
}
