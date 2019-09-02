<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarrerasController extends Controller
{
    public function get(){
      $response=Carrera::get();
      return response()->json(['carreras'=>$response],200);
    }
     public function put(Request $request ){
        $datosClienteBody = $request->json()->all();
        $datosCarrera=$datosClienteBody['carrera'];
        $curso=Carrera::findOrFail($datosCarrera{'id'});
        $response=$carrera->update([
        'codigo'=>$datosCarrera['codigo'],
        'codigo_sniese'=>$datosCarrera['codigo_sniese'],
        'nombre'=>$datosCarrera['nombre'],
        'descripcion'=>$datosCarrera['descripcion'],
        'numero_resolucion'=>$datosCarrera['numero_resolucion'],     
        'titulo_otorga'=>$datosCarrera['titulo_otorga'],
        'siglas'=>$datosCarrera['siglas'],
        'tipo_carrera'=>$datosCarrera['tipo_carrera'],              
          ]);
        return response()->json(['carrera'=>$response],201);        
    }
    public function delete(Request $request){
        $carrera=Carrera::findOrFail($request->carrera_id);
        $response=$carrera->delete();
        return response()->json($response,201);
      }
      
        public function post(Request $request){
        $datosClienteBody = $request->json()->all();
        $datosCarrera=$datosClienteBody['carrera'];
        $response=Carrera::create([
          'codigo'=>$datosCarrera['codigo'],
          'codigo_sniese'=>$datosCarrera['codigo_sniese'],
          'nombre'=>$datosCarrera['nombre'],
          'descripcion'=>$datosCarrera['descripcion'],
          'numero_resolucion'=>$datosCarrera['numero_resolucion'],     
          'titulo_otorga'=>$datosCarrera['titulo_otorga'],
          'siglas'=>$datosCarrera['siglas'],
          'tipo_carrera'=>$datosCarrera['tipo_carrera'],  
          ]);
          return response()->json(['carrera'=>$response],201);
        }
}
