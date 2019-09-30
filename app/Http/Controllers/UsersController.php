<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;


class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getOne(Request $request)
    {
        $user = User::where('email', $request->email)
            ->with('role')
            ->first();
        return response()->json(['user' => $user], 200);
    }

    public function get(){
      $response=User::with('role')
      ->where('role_id','!=','2')
      ->get();
      return response()->json(['users'=>$response],200);
    }

    public function getUser(){
      $response=User::with('role')
      ->where('role_id','!=','1')
      ->where('role_id','!=','3')
      ->where('role_id','!=','4')
      ->where('role_id','!=','5')     
      ->get();
      return response()->json(['users'=>$response],200);
    }


  
    public function resetPassword(Request $request)
    {
        $data = $request->json()->all();
        $dataUser = $data['user'];
        $user = User::findOrFail($dataUser['id']);
        $user->update([
            'password' => Hash::make($dataUser['password']),
        ]);
        return $user;
    }

    public function login(Request $request){      
      $user = User::where('email',$request->email)->first();        
       if($user){
          if(Hash::check($request->password,$user['password']))
          return response()->json(['user'=>$user],200);          
          else
          return response()->json([],401);
        }
        return response()->json(['user'=>$user],200);
    }  
  
       
     public function post(Request $request){      
        $datosClienteBody = $request->json()->all();     
        $datosUser=$datosClienteBody['user'];      
        $user=new User([
        'name'=>$datosUser['name'],
        'user_name'=>$datosUser['user_name'],     
        'email'=>$datosUser['email'],
        'password'=> Hash::make($datosUser['password']),
        ]);
        $rol = Role::findOrFail($datosUser['role_id']);
        $user->role()->associate($rol);
        $user->save();
        if($request->role_id==2){
            $user->participante()->create([
              'identificacion'=> $datosUser['user_name'],
              'nombre1'=> $datosUser['name'],              
          ]);
        }
        if($datosUser['role_id']==4){
          $user->facilitador()->create([
            'cedula'=> $datosUser['user_name'],
            'correo_electronico'=> $datosUser['email'],
            
          ]);
        }
          return response()->json(true,201);
        }
      

     public function put(Request $request){
          $datosClienteBody = $request->json()->all();
          $datosUser=$datosClienteBody['user'];
          $rol=Role::findOrFail($datosUser['role_id']);        
          $user=User::findOrFail($datosUser['id']);  
          $response=$user->update(
          [     
          'name'=>$datosUser['name'],
          'user_name'=>$datosUser['user_name'],     
          'email'=>$datosUser['email'],
          'role_id'=>$datosUser['role_id'],          
          ]);
          if($response){
            return response()->json(true,201);
          }else{
            return response()->json(true,505);
          }
          
          }
          
     public function filter(Request $request){
        $response=User::
          Where('user_name','like','%'.$request->user_name.'%') 
        ->where('role_id','!=','2')       
        ->get();
        return response()->json(['users'=>$response],200);
      }   

      public function filterParticipante(Request $request){
        $response=User::
          Where('user_name','like','%'.$request->user_name.'%') 
         ->where('role_id','!=','1')
         ->where('role_id','!=','3')
         ->where('role_id','!=','4')
         ->where('role_id','!=','5')              
        ->get();
        return response()->json(['users'=>$response],200);
      }  
      
      public function delete(Request $request){       
        $user=User::findOrFail($request->user_id);
        $response=$user->delete();
        return response()->json($response,201);
      }
    
}
