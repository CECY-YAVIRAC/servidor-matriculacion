<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function get(){
      $response=Role::get();
      return response()->json(['roles'=>$response],200);
    }  

    /* public function post(Request $request){
      $datosClienteBody = $request->json()->all();
      $datosRole=$datosClienteBody['role'];
      $response=Role::create([
      'descripcion'=>$datosRole['descripcion'],
      'rol'=>$datosRole['rol'],      
        ]);
        return response()->json(['role'=>$response],201);
      } */
      
}
