<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Curso;
use App\Facilitador;
use App\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionesController extends Controller
{
   
public function get(){
  $response=Asignacion::with('curso')->get();
  $matriculas = [];
  $cupo_disponible = [];
  foreach ($response as $key => $value) {
    //aqui saco todas las matriculas que estan relacionadas con la asignacion
    $matriculas[$key] = Matricula::where('asignacion_id', $value->id)->count();
    $cupo_disponible[$value->id] = $value->cupo_maximo - $matriculas[$key];
  }
  return response()->json([
    'asignaciones'=>$response,
    'cupos_disponibles' => $cupo_disponible    
  ],200);  
}



public function getFacilitadores(Request $request){
  $response=Asignacion::with('curso')->with('facilitadores')->where('id', $request -> id)->first();   
  return response()->json(['asignacion_facilitador'=>$response],200);  
}
public function getOne(Request $request){
  $response=Asignacion::findOrFail($request->id);      
  return response()->json(['asignacion'=>$response],200);     
}
public function filter(Request $request){
  $response=Asignacion::with('curso')->
    orWhere('hora_inicio','like','%'.$request->hora_inicio.'%')    
  ->orWhere('hora_fin','like','%'.$request->hora_fin.'%')
  ->get();
  return response()->json(['asignaciones'=>$response],200);
}
 public function put(Request $request ){
    $datosClienteBody = $request->json()->all();        
    $datosAsignacion=$datosClienteBody['asignacion'];
    $curso=Curso::findOrFail($datosAsignacion['curso_id']);        
    $asignacion=Asignacion::findOrFail($datosAsignacion['id']); 
    if($asignacion->curso_id != $datosAsignacion['curso_id']){
      $asignacion->curso()->associate($curso);
    }            
    $response=$asignacion->update(
      [       
        'hora_inicio'=>$datosAsignacion['hora_inicio'],
        'hora_fin'=>$datosAsignacion['hora_fin'],
        'fecha_inicio'=>$datosAsignacion['fecha_inicio'],              
        'fecha_fin'=>$datosAsignacion['fecha_fin'],
        'horas_duracion'=>$datosAsignacion['horas_duracion'],
        'valor_curso'=>$datosAsignacion['valor_curso'],
        'cupo_maximo'=>$datosAsignacion['cupo_maximo'],
        'observacion'=>$datosAsignacion['observacion'],                      
       ]);
       return response()->json(['asignacion'=>$response],201);               
}
public function delete(Request $request){
  $asignacion=Asignacion::findOrFail($request->asignacion_id);
  $response=$asignacion->delete();
  return response()->json($response,201);      
  }
   
public function post(Request $request){
    $datosClienteBody = $request->json()->all();
    $datosAsignacion=$datosClienteBody['asignacion'];
    $datosCurso=$datosClienteBody['curso'];
    $curso=Curso::findOrFail($datosAsignacion['curso_id']);         
    $response=$curso->asignaciones()->create([
      'hora_inicio'=>$datosAsignacion['hora_inicio'],
      'hora_fin'=>$datosAsignacion['hora_fin'],
      'fecha_inicio'=>$datosAsignacion['fecha_inicio'],              
      'fecha_fin'=>$datosAsignacion['fecha_fin'],
      'horas_duracion'=>$datosAsignacion['horas_duracion'],
      'valor_curso'=>$datosAsignacion['valor_curso'],
      'cupo_maximo'=>$datosAsignacion['cupo_maximo'],
      'observacion'=>$datosAsignacion['observacion'],             
      ]);
      return response()->json(['asignacion'=>$response],201);
    }


    public function asignarFacilitador(Request $request){
      $datosClienteBody = $request->json()->all();
      $datosAsignacion=$datosClienteBody['asignacion'];
      $datosFacilitador=$datosClienteBody['facilitador'];
      $facilitador=Facilitador::findOrFail($datosFacilitador['id']);  
      $asignacion=Asignacion::findOrFail($datosAsignacion['id']);          
      $response=$asignacion->facilitadores()->attach($facilitador->id);
      return response()->json(['asignacion'=>$response],201);
      }

      public function deleteFacilitador(Request $request){
        $facilitador=Facilitador::findOrFail($request->pivot['facilitador_id']);  
        $asignacion=Asignacion::findOrFail($request->pivot['asignacion_id']);          
        $response=$asignacion->facilitadores()->detach($facilitador->id);                   
        return response()->json($response,201);      
        }

        

        
}