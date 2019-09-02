<?php

namespace App\Http\Controllers;

use App\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantesController extends Controller
{
    public function get(){
      $response=Participante::get();   
      return response()->json(['participante'=>$response],200);  
    }
    public function getParticipante(Request $request){
      $response=Participante::where('user_id',$request->user_id)->first();
      return response()->json(['participante'=>$response],200);     
    }
    public function put(Request $request ){
      $datosClienteBody = $request->json()->all();          
      $datosParticipante=$datosClienteBody['participante'];
      $participante=Participante::findOrFail($datosParticipante['id']);  
      $response=$participante->update(
      [
            'identificacion'=>$datosParticipante['identificacion'],
            'apellido1'=>$datosParticipante['apellido1'],
            'apellido2'=>$datosParticipante['apellido2'],
            'nombre1'=>$datosParticipante['nombre1'],
            'nombre2'=>$datosParticipante['nombre2'],         
            'genero'=>$datosParticipante['genero'],
            'etnia'=>$datosParticipante['etnia'],                       
            'fecha_nacimiento'=>$datosParticipante['fecha_nacimiento'],                 
           ]);
           return response()->json(['participante'=>$response],201);               
    }
    public function delete(Request $request){
      $participante=Participante::findOrFail($request->participante_id);
      $response=$participante->delete();
      return response()->json($response,201);      
      }
       
    public function post(Request $request){
        $datosClienteBody = $request->json()->all();
        $datosParticipante=$datosClienteBody['participante'];        
        $response=Participante::create([              
            'identificacion'=>$datosParticipante['identificacion'],
            'apellido1'=>$datosParticipante['apellido1'],
            'apellido2'=>$datosParticipante['apellido2'],
            'nombre1'=>$datosParticipante['nombre1'],
            'nombre2'=>$datosParticipante['nombre2'],         
            'genero'=>$datosParticipante['genero'],
            'etnia'=>$datosParticipante['etnia'],                       
            'fecha_nacimiento'=>$datosParticipante['fecha_nacimiento'],             
          ]);
          return response()->json(['participante'=>$response],201);
        }
}
