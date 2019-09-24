<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Instituto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{
    public function get(){
      $response=Curso::with('instituto')->get();
      return response()->json(['cursos'=>$response],200);
    }
    public function filter(Request $request){
      $response=Curso::with('instituto')->
        Where('codigo','like','%'.$request->codigo.'%')
      ->get();
      return response()->json(['cursos'=>$response],200);
    }
     public function put(Request $request ){
        $datosClienteBody = $request->json()->all();
        $datosCurso=$datosClienteBody['curso'];
        $instituto=Instituto::findOrFail($datosCurso['instituto_id']); 
        $curso=Curso::findOrFail($datosCurso['id']);
        if($curso->instituto_id != $datosCurso['instituto_id']){
          $curso->instituto()->associate($instituto);
        }       
        $response=$curso->update([          
        'codigo'=>$datosCurso['codigo'],
        'nombre'=>$datosCurso['nombre'],
        'tipo'=>$datosCurso['tipo'],
        'modalidad'=>$datosCurso['modalidad'], 
        'lugar'=>$datosCurso['lugar'],
        'lugar_otros'=>$datosCurso['lugar_otros'],                     
          ]);        
        return response()->json(['curso'=>$response],201);        
    }
    public function delete(Request $request){
        $curso=Curso::findOrFail($request->curso_id);
        $response=$curso->delete();
        return response()->json($response,201);
      }
      
    public function post(Request $request){
        $datosClienteBody = $request->json()->all();
        $datosCurso=$datosClienteBody['curso'];
        $datosInstituto=$datosClienteBody['instituto'];
        $instituto=Instituto::findOrFail($datosCurso['instituto_id']);  
        $response=$instituto->cursos()->create([       
        'codigo'=>$datosCurso['codigo'],
        'nombre'=>$datosCurso['nombre'],
        'tipo'=>$datosCurso['tipo'],
        'modalidad'=>$datosCurso['modalidad'],
        'lugar'=>$datosCurso['lugar'],
        'lugar_otros'=>$datosCurso['lugar_otros'],        
          ]);
          return response()->json(['curso'=>$response],201);
        }
}
