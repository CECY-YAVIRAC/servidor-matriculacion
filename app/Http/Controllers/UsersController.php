<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
      $response=User::with('role')->get();
      return response()->json(['users'=>$response],200);
    }

    public function update(Request $request)
    {
        $data = $request->json()->all();
        $dataEstudiante = $data['estudiante'];
        $dataInformacionEstudiante = $data['estudiante'];
        $parameters = [
            $dataEstudiante['pais_nacionalidad_id'],
            $dataEstudiante['pais_residencia_id'],
            $dataEstudiante['identificacion'],
            $dataEstudiante['nombre1'],
            $dataEstudiante['nombre2'],
            $dataEstudiante['apellido1'],
            $dataEstudiante['apellido2'],
            $dataEstudiante['fecha_nacimiento'],
            $dataEstudiante['correo_personal'],
            $dataEstudiante['correo_institucional'],
            $dataEstudiante['sexo'],
            $dataEstudiante['etnia'],
            $dataEstudiante['tipo_sangre'],
            $dataEstudiante['tipo_documento'],
            $dataEstudiante['tipo_colegio'],
        ];
        $sql = 'SELECT estudiantes.* 
                FROM 
                  matriculas inner join informacion_estudiantes on matriculas.id = informacion_estudiantes.matricula_id 
	              inner join estudiantes on matriculas.estudiante_id = estudiantes.id 
	            WHERE matriculas.periodo_lectivo_id = 1 and matriculas.estudiante_id =1';
        $estudiante = DB::select($sql, null);

        $sql = 'SELECT informacion_estudiantes.* 
                FROM 
                  matriculas inner join informacion_estudiantes on matriculas.id = informacion_estudiantes.matricula_id 
	              inner join estudiantes on matriculas.estudiante_id = estudiantes.id 
	            WHERE matriculas.periodo_lectivo_id = 1 and matriculas.estudiante_id =1';
        $informacionEstudiante = DB::select($sql, null);
        return response()->json([
            'estudiante' => $estudiante,
            'informacion_estudiante' => $informacionEstudiante
        ]);
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

    public function login(Request $request)
    {
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
              'identificacion'=> ''        
          ]);
        }
        if($datosUser['role_id']==4){
          $user->facilitador()->create([
            'cedula'=> ''
          ]);
        }
          return response()->json(true,201);
        }
        

        public function put(Request $request){
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
          $user->update();
          if($request->role_id==2){
              $user->participante()->create([
                'identificacion'=> ''        
            ]);
          }
          if($datosUser['role_id']==4){
            $user->facilitador()->create([
              'cedula'=> ''
            ]);
          }
            return response()->json(true,201);
          }
          
     
      
      public function filter(Request $request){
        $response=User::
          orWhere('user_name','like','%'.$request->user_name.'%')    
        ->orWhere('name','like','%'.$request->name.'%')        
        ->get();
        return response()->json(['users'=>$response],200);
      }       
    
}
