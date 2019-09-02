<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Curso;
use App\Facilitador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionesController extends Controller
{
   
public function get(){
  $response=Asignacion::with('curso')->get();   
  return response()->json(['asignaciones'=>$response],200);  
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
    $asignacion=Asignacion::findOrFail($datosAsignacion['id']);           
    $response=$asignacion->update(
      [
        
        'hora_inicio'=>$datosAsignacion['hora_inicio'],
        'hora_fin'=>$datosAsignacion['hora_fin'],
        'fecha_inicio'=>$datosAsignacion['fecha_inicio'],              
        'fecha_fin'=>$datosAsignacion['fecha_fin'],
        'horas_duracion'=>$datosAsignacion['horas_duracion'],
        'valor_curso'=>$datosAsignacion['valor_curso'],
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
    $curso=Curso::findOrFail($datosCurso['id']);         
    $response=$curso->asignaciones()->create([
      'hora_inicio'=>$datosAsignacion['hora_inicio'],
      'hora_fin'=>$datosAsignacion['hora_fin'],
      'fecha_inicio'=>$datosAsignacion['fecha_inicio'],              
      'fecha_fin'=>$datosAsignacion['fecha_fin'],
      'horas_duracion'=>$datosAsignacion['horas_duracion'],
      'valor_curso'=>$datosAsignacion['valor_curso'],
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
        $response=$asignacion->facilitadores()->attach($facilitador->id)->delete();                    
        return response()->json($response,201);      
        }

        

        
}