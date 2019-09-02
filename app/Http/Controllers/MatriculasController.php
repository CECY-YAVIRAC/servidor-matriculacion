<?php

namespace App\Http\Controllers;

use App\Matricula;
use App\Asignacion;
use App\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculasController extends Controller
{
    public function get(){
      $response=Matricula::with('asignacion')->get();   
      return response()->json(['matricula'=>$response],200);  
    } 

    public function getMatricula(Request $request){
      $participante = Participante::where('user_id',$request->user_id)->first();
      $response=Matricula::select('matriculas.*','cursos.*','asignaciones.*')
      ->join('asignaciones','asignaciones.id','matriculas.asignacion_id')
      ->join('cursos','cursos.id','asignaciones.curso_id')      
      ->where('participante_id',$participante->id)->first();          
      return response()->json(['matricula'=>$response],200);     
    }

    /*get del formulario*/    
    public function getMatriculasParticipantes(Request $request){
      $participante = Participante::where('user_id',$request->user_id)->first();
      $response=Matricula::select('matriculas.*','cursos.*')
      ->join('asignaciones','asignaciones.id','matriculas.asignacion_id')
      ->join('cursos','cursos.id','asignaciones.curso_id')
      ->where('participante_id',$participante->id)
      ->get();      
      return response()->json(['matriculas'=>$response],200);     
    }
    

     public function put(Request $request ){
          $datosClienteBody = $request->json()->all();        
          $datosAsignacion=$datosClienteBody['asignacion'];  
          $participante = Participante::where('user_id',$request->user_id)->first();
          $datosMatricula=$datosClienteBody['matricula']; 
          $asignacion=Asignacion::findOrFail($datosAsignacion['id']);          
          $response=$matricula=new Matricula([ 

          /* $datosClienteBody = $request->json()->all();          
          $datosMatricula=$datosClienteBody['matricula'];   
          $matricula=Matricula::findOrFail($datosMatricula['id']);  
          $response=$matricula->update(
          [ */
            'codigo'=>$datosMatricula['codigo'],
            'fecha'=>$datosMatricula['fecha'],
            'paralelo'=>$datosMatricula['paralelo'],              
            'numero_matricula'=>$datosMatricula['numero_matricula'],
            'estado_academico'=>$datosMatricula['estado_academico'],
            'valor_total'=>$datosMatricula['valor_total'], 
            'nota'=>$datosMatricula['nota'],          
            'carrera'=>$datosMatricula['carrera'],
            'nivel'=>$datosMatricula['nivel'], 
            'condicion_academica'=>$datosMatricula['condicion_academica'],                    
            'direccion'=>$datosMatricula['direccion'],
            'telefono_celular'=>$datosMatricula['telefono_celular'],
            'telefono_fijo'=>$datosMatricula['telefono_fijo'],
            'correo_electronico'=>$datosMatricula['correo_electronico'],
            'instruccion_academica'=>$datosMatricula['instruccion_academica'],
            'economicamente_activo'=>$datosMatricula['economicamente_activo'],
            'empresa_trabajo'=>$datosMatricula['empresa_trabajo'],            
            'empresa_direccion'=>$datosMatricula['empresa_direccion'],
            'correo_empresa'=>$datosMatricula['correo_empresa'],
            'telefono_empresa'=>$datosMatricula['telefono_empresa'],
            'actividad_empresa'=>$datosMatricula['actividad_empresa'],             
            'curso_auspicio'=>$datosMatricula['curso_auspicio'],
            'nombre_contacto'=>$datosMatricula['nombre_contacto'],
            'averiguo_curso'=>$datosMatricula['averiguo_curso'],
            'cursos_seguir'=>$datosMatricula['cursos_seguir'],      
           ]);
           $matricula->asignacion()->associate($asignacion);
           $matricula->participante()->associate($participante);
           $matricula->save(); 
           return response()->json(['matricula'=>$response],201);               
    }



    public function delete(Request $request){
      $matricula=Matricula::findOrFail($request->matricula_id);
      $response=$matricula->delete();
      return response()->json($response,201);      
      }
       
    public function post(Request $request){
        $datosClienteBody = $request->json()->all();
        $datosAsignacion=$datosClienteBody['asignacion'];  
        $participante = Participante::where('user_id',$request->user_id)->first();
        $datosMatricula=$datosClienteBody['matricula']; 
        $asignacion=Asignacion::findOrFail($datosAsignacion['id']);      
        $response=$matricula=new Matricula([              
            'codigo'=>$datosMatricula['codigo'],
            'fecha'=>$datosMatricula['fecha'],
            'paralelo'=>$datosMatricula['paralelo'],              
            'numero_matricula'=>$datosMatricula['numero_matricula'],
            'estado_academico'=>$datosMatricula['estado_academico'],
            'valor_total'=>$datosMatricula['valor_total'], 
            'nota'=>$datosMatricula['nota'],          
            'carrera'=>$datosMatricula['carrera'],
            'nivel'=>$datosMatricula['nivel'], 
            'condicion_academica'=>$datosMatricula['condicion_academica'],  
            'direccion'=>$datosMatricula['direccion'],
            'telefono_celular'=>$datosMatricula['telefono_celular'],
            'telefono_fijo'=>$datosMatricula['telefono_fijo'],
            'correo_electronico'=>$datosMatricula['correo_electronico'],
            'instruccion_academica'=>$datosMatricula['instruccion_academica'],
            'economicamente_activo'=>$datosMatricula['economicamente_activo'],
            'empresa_trabajo'=>$datosMatricula['empresa_trabajo'],            
            'empresa_direccion'=>$datosMatricula['empresa_direccion'],
            'correo_empresa'=>$datosMatricula['correo_empresa'],
            'telefono_empresa'=>$datosMatricula['telefono_empresa'],
            'actividad_empresa'=>$datosMatricula['actividad_empresa'],             
            'curso_auspicio'=>$datosMatricula['curso_auspicio'],
            'nombre_contacto'=>$datosMatricula['nombre_contacto'],
            'averiguo_curso'=>$datosMatricula['averiguo_curso'],
            'cursos_seguir'=>$datosMatricula['cursos_seguir'],
          ]);
          $matricula->asignacion()->associate($asignacion);
          $matricula->participante()->associate($participante);
          $matricula->save();
          return response()->json(['matricula'=>$response],201);
        }
}
