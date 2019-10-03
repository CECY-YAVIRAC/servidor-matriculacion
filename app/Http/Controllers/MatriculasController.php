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

    public function filter(Request $request){
      $response=Matricula::select('matriculas.*',
      'cursos.id as curso_id',
      'cursos.nombre as curso_nombre',
      'asignaciones.id as asignacion_id',
      'asignaciones.valor_curso as asignacion_valor_curso',
      'participantes.identificacion as participante_identificacion',
      'participantes.nombre1 as participante_nombre1',
      'participantes.nombre2 as participante_nombre2',
      'participantes.apellido1 as participante_apellido1',
      'participantes.apellido2 as participante_apellido2', )       
      ->join('participantes','participantes.id','matriculas.participante_id')
      ->join('asignaciones','asignaciones.id','matriculas.asignacion_id')
      ->join('cursos','cursos.id','asignaciones.curso_id')     
      ->where('participantes.identificacion','like','%'.$request->participante_identificacion.'%');
      $total_a_pagar = $response->sum('valor_total');
      $response = $response->get();
       return response()->json([
        'matriculas'=>$response,
        'total_a_pagar' => $total_a_pagar
      ],200);
    } 


    /*get del formulario de la matricula*/  
     public function getMatricula(Request $request){      
      $response=Matricula::select('matriculas.*',
      'cursos.codigo',
      'cursos.nombre',
      'cursos.modalidad',      
      'asignaciones.hora_inicio',
      'asignaciones.hora_fin',
      'participantes.identificacion as participante_identificacion',
      'participantes.nombre1 as participante_nombre1',
      'participantes.nombre2 as participante_nombre2',
      'participantes.apellido1 as participante_apellido1',
      'participantes.apellido2 as participante_apellido2',)
      ->join('asignaciones','asignaciones.id','matriculas.asignacion_id')
      ->join('cursos','cursos.id','asignaciones.curso_id') 
      ->join('participantes','participantes.id','matriculas.participante_id');
      if($request->user_id){
        $participante = Participante::where('user_id',$request->user_id)->first();
        if($participante){
          $response = $response->where('participante_id',$participante->id);
        }
      }
          
      if($request->id_matricula){
        $response = $response->where('matriculas.id', $request->id_matricula);
      }
      if($request->asignacion_id){
        $response = $response->where('asignacion_id',$request->asignacion_id);
      }     
      $response = $response->first();               
      return response()->json(['matricula'=>$response],200);  
    } 
    
    /*get del select de los cursos del formulario*/    
    public function getMatriculasParticipantes(Request $request){
      $participante = Participante::where('user_id',$request->user_id)->first();
      $response=Matricula::select('matriculas.*','cursos.*')
      ->join('asignaciones','asignaciones.id','matriculas.asignacion_id')
      ->join('cursos','cursos.id','asignaciones.curso_id')
      ->where('participante_id',$participante->id)
      ->get();      
      return response()->json(['matriculas'=>$response],200);     
    }

      
    /*get del select de los cursos del financiero*/   
    public function getMatriculasParticipantesMatriculados(Request $request){
      $response=Matricula::select('matriculas.*',
      'cursos.id as curso_id',
      'cursos.nombre as curso_nombre',
      'asignaciones.id as asignacion_id',
      'asignaciones.valor_curso as asignacion_valor_curso',
      'participantes.identificacion as participante_identificacion',
      'participantes.nombre1 as participante_nombre1',
      'participantes.nombre2 as participante_nombre2',
      'participantes.apellido1 as participante_apellido1',
      'participantes.apellido2 as participante_apellido2', )       
      ->join('participantes','participantes.id','matriculas.participante_id')
      ->join('asignaciones','asignaciones.id','matriculas.asignacion_id')
      ->join('cursos','cursos.id','asignaciones.curso_id')
      ->where('asignacion_id',$request->asignacion_id)
      ->get();        
      return response()->json(['matriculas'=>$response],200);     
    }

      
     public function put(Request $request ){  
          $datosClienteBody = $request->all();
          $datosAsignacion=$datosClienteBody['asignacion']; 
          $participante = Participante::where('user_id',$request->user_id)->first();          
          $datosMatricula=$datosClienteBody['matricula']; 
          $asignacion=Asignacion::findOrFail($datosAsignacion['id']);            
          $matricula=Matricula::findOrFail($datosMatricula['id']);          
          $response = $matricula->update([            
            'codigo'=>$datosMatricula['codigo'],
            'fecha'=>$datosMatricula['fecha'],
            'paralelo'=>$datosMatricula['paralelo'],              
            'numero_matricula'=>$datosMatricula['numero_matricula'],
            'estado_academico'=>$datosMatricula['estado_academico'],
            'valor_total'=>$datosMatricula['valor_total'], 
            'valor_descuento'=>$datosMatricula['valor_descuento'], 
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
            'valor_descuento'=>$datosMatricula['valor_descuento'], 
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
            'estado'=>'INSCRITO',
          ]);
          $matricula->asignacion()->associate($asignacion);
          $matricula->participante()->associate($participante);
          $matricula->save();
          return response()->json(['matricula'=>$response],201);
        }
      
        
        public function pagoMatricula(Request $request ){       
          $datosClienteBody = $request->all();            
          $matricula=Matricula::findOrFail($request->id);          
          $response = $matricula->update([ 
            'valor_total'=>$request->valor_total,
            'valor_descuento'=>$request->valor_descuento,           
            'estado'=>'PAGADO'
           ]);
           return response()->json(['matricula'=>$response],201);          
          }

        public function devolverMatricula(Request $request ){       
            $datosClienteBody = $request->all();            
            $matricula=Matricula::findOrFail($request->id);          
            $response = $matricula->update([ 
              'valor_descuento'=> 0,       
              'valor_total'=> 0,   
              'estado'=>'INSCRITO',             
             ]);
             return response()->json(['matricula'=>$response],201);          
            }

        public function Matriculacion(Request $request ){       
              $datosClienteBody = $request->all();            
              $matricula=Matricula::findOrFail($request->id);          
              $response = $matricula->update([            
                'estado'=>'MATRICULADO',
               ]);
               return response()->json(['matricula'=>$response],201);          
              }
          
}
