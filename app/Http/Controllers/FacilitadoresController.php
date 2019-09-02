<?php

namespace App\Http\Controllers;

use App\Facilitador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacilitadoresController extends Controller
{
    public function get(){
      $response=Facilitador::get();
      return response()->json(['facilitadores'=>$response],200);
    }
    public function filter(Request $request){
      $response=Facilitador::
        orWhere('cedula','like','%'.$request->cedula.'%')    
      ->orWhere('apellido1','like','%'.$request->apellido1.'%')
      ->orWhere('apellido2','like','%'.$request->apellido2.'%')
      ->get();
      return response()->json(['facilitadores'=>$response],200);
    }
    public function put(Request $request ){
      $datosClienteBody = $request->json()->all();
      $datosFacilitador=$datosClienteBody['facilitador']; 
      $facilitador=Facilitador::findOrFail($datosFacilitador{'id'}); 
      $response=$facilitador->update(
          [
        'cedula'=>$datosFacilitador['cedula'],
        'apellido1'=>$datosFacilitador['apellido1'],
        'apellido2'=>$datosFacilitador['apellido2'],
        'nombre1'=>$datosFacilitador['nombre1'],
        'nombre2'=>$datosFacilitador['nombre2'],
        'fecha_nacimiento'=>$datosFacilitador['fecha_nacimiento'],
        'correo_electronico'=>$datosFacilitador['correo_electronico'],
        'capacitaciones'=>$datosFacilitador['capacitaciones'],
        'titulo'=>$datosFacilitador['titulo'],
        ]);
        return response()->json(['facilitador'=>$response],201);         
    }
    public function delete(Request $request){
      $facilitador=Facilitador::findOrFail($request->facilitador_id);
      $response=$facilitador->delete();
      return response()->json($response,201);
      }
      
    public function post(Request $request){
        $datosClienteBody = $request->json()->all();
        $datosFacilitador=$datosClienteBody['facilitador'];
        $response=Facilitador::create([
        'cedula'=>$datosFacilitador['cedula'],
        'apellido1'=>$datosFacilitador['apellido1'],
        'apellido2'=>$datosFacilitador['apellido2'],
        'nombre1'=>$datosFacilitador['nombre1'],
        'nombre2'=>$datosFacilitador['nombre2'],
        'fecha_nacimiento'=>$datosFacilitador['fecha_nacimiento'],
        'correo_electronico'=>$datosFacilitador['correo_electronico'],
        'capacitaciones'=>$datosFacilitador['capacitaciones'],
        'titulo'=>$datosFacilitador['titulo'],  
          ]);
          return response()->json(['facilitador'=>$response],201);
        }
}
