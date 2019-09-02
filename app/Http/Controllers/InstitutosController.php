<?php

namespace App\Http\Controllers;

use App\Instituto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstitutosController extends Controller
{
    public function get(){
      $response=Instituto::get();
      return response()->json(['institutos'=>$response],200);
    }
    public function filter(Request $request){
      $response=Instituto::
        orWhere('codigo','like','%'.$request->codigo.'%')    
      ->orWhere('nombre','like','%'.$request->nombre.'%')
      ->get();
      return response()->json(['institutos'=>$response],200);
    }
     public function put(Request $request ){
      $datosClienteBody = $request->json()->all();        
      $datosInstituto=$datosClienteBody['instituto'];
      $instituto=Instituto::findOrFail($datosInstituto{'id'});
      $response=$instituto->update(
          [
        'codigo'=>$datosInstituto['codigo'],
        'nombre'=>$datosInstituto['nombre'],                  
          ]);
      return response()->json(['instituto'=>$response],201);         
    }
    public function delete(Request $request){
      $instituto=Instituto::findOrFail($request->instituto_id);
      $response=$instituto->delete();
      return response()->json($response,201);        
      }
      
    public function post(Request $request){
      $datosClienteBody = $request->json()->all();
      $datosInstituto=$datosClienteBody['instituto'];
      $response=Instituto::create([
        'codigo'=>$datosInstituto['codigo'],
        'nombre'=>$datosInstituto['nombre'],   
          ]);
      return response()->json(['instituto'=>$response],201);
        }
}
