<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::post('/detalle_matriculas', 'DetalleMatriculasController@create');
Route::put('/detalle_matriculas', 'DetalleMatriculasController@update');
Route::get('/detalle_matriculas', 'DetalleMatriculasController@get');
Route::get('/detalle_matriculas/count', 'DetalleMatriculasController@getCountDetalleCuposCarrera');
Route::get('/asignaturas', 'AsignaturasController@get');
Route::get('/asignaturas/{id}', 'AsignaturasController@getOne');
Route::get('/periodo_lectivos', 'PeriodoLectivosController@get');
Route::get('/periodo_lectivos/actual', 'PeriodoLectivosController@getActual');
Route::get('/periodo_lectivos/{id}', 'PeriodoLectivosController@getOne');
Route::get('/tipo_matriculas', 'TipoMatriculasController@get');
Route::get('/tipo_matriculas/{id}', 'TipoMatriculasController@getOne');
Route::get('/matriculas/cupo', 'MatriculasController@getCupo');
Route::get('/matriculas/aprobado', 'MatriculasController@getAprobado');
Route::delete('/matriculas/cupo', 'MatriculasController@deleteCupo');
Route::delete('/matriculas/matricula', 'MatriculasController@deleteMatricula');
Route::get('/matriculas/validate_cupo', 'MatriculasController@validateCupo'); */
/* Route::get('/matriculas/validate_cupos_carrera', 'MatriculasController@validateCuposCarrera');
Route::get('/matriculas/validate_cupos_periodo_academico', 'MatriculasController@validateCuposPeriodoAcademico');
Route::delete('/matriculas/delete_cupos_carrera', 'MatriculasController@deleteCuposCarrera');
Route::delete('/matriculas/delete_cupos_periodo_academico', 'MatriculasController@deleteCuposPeriodo');
Route::get('/matriculas/certificado_matricula', 'MatriculasController@getCertificadoMatricula');
Route::get('/matriculas/solicitud_matricula', 'MatriculasController@getSolicitudMatricula');
Route::get('/matriculas/carreras', 'MatriculasController@getMatriculasCarreras');
Route::get('/matriculas/periodo_academicos', 'MatriculasController@getMatriculasPeriodoAcademicos');
Route::get('/matriculas/cupos', 'MatriculasController@getCupos');
Route::get('/matriculas/aprobados', 'MatriculasController@getAprobados');
Route::get('/matriculas/en_proceso', 'MatriculasController@getCuposEnProceso');
Route::get('/matriculas/asignaturas', 'MatriculasController@getAsignaturasMalla');
Route::put('/matriculas', 'MatriculasController@updateMatricula'); *//* 
Route::get('/matriculas/count', 'MatriculasController@getCountMatriculas');
Route::delete('/matriculas/delete_detalle_cupo', 'MatriculasController@deleteDetalleCupo');
Route::delete('/matriculas/delete_detalle_matricula', 'MatriculasController@deleteDetalleMatricula');
Route::put('/matriculas/fecha_formulario', 'MatriculasController@updateFechaFormulario');
Route::put('/matriculas/fecha_solicitud', 'MatriculasController@updateFechaSolicitud');
Route::get('/catalogos/paises', 'CatalogosController@getPaises');
Route::get('/catalogos/provincias', 'CatalogosController@getProvincias');
Route::get('/catalogos/cantones', 'CatalogosController@getCantones');
Route::get('/catalogos/carreras', 'CatalogosController@getCarreras');
Route::get('/catalogos/periodo_academicos', 'CatalogosController@getPeriodoAcademicos');
Route::get('/exports/cupos_carrera', 'ExcelController@exportCuposCarrera');
Route::get('/exports/cupos_periodo_academico', 'ExcelController@exportCuposPeriodoAcademico');
Route::get('/exports/matriz_sniese', 'ExcelController@exportMatrizSnieseCarrera');
Route::post('/imports/cupos', 'ExcelController@importCupos');
Route::post('/imports/estudiantes', 'ExcelController@importEstudiantes');
Route::post('/imports/matriculas', 'ExcelController@importMatriculas');
Route::get('/certificado-matricula/{matricula_id}', 'MatriculasController@getCertificadoMatriculaPublic');
Route::get('/exports/errores_cupos', 'ExcelController@exportErroresCupos'); */
/* Route::get('/email', 'PruebasController@email');
Route::post('/emails', 'EmailsController@send'); */
/* Route::get('/paralelos', 'ExcelController@changeParalelo');
Route::get('/estudiantes/en_proceso', 'EstudiantesController@getEnProceso');
Route::get('/estudiantes/{id}', 'EstudiantesController@getOne');
Route::get('/estudiantes/formulario/{id}', 'EstudiantesController@getFormulario');
Route::put('/estudiantes/update_perfil', 'EstudiantesController@updatePerfil');X
Route::get('/prueba', 'PruebasController@get')->middleware('auth:api');
Route::post('/matriculas/open_periodo_lectivo', 'MatriculasController@openPeriodoLectivo');
Route::get('/pruebas','PruebasController@holaMundo'); */


Route::get('/facilitadores','FacilitadoresController@get');
Route::get('/facilitadores/filter','FacilitadoresController@filter');
Route::post('/facilitadores','FacilitadoresController@post');
Route::delete('/facilitadores','FacilitadoresController@delete');
Route::put('/facilitadores','FacilitadoresController@put');

Route::get('/carreras','CarrerasController@get');
Route::post('/carreras','CarrerasController@post');
Route::delete('/carreras','CarrerasController@delete');
Route::put('/carreras','CarrerasController@put');

Route::get('/cursos','CursosController@get');
Route::get('/cursos/filter','CursosController@filter');
Route::post('/cursos','CursosController@post');
Route::delete('/cursos','CursosController@delete');
Route::put('/cursos','CursosController@put');

Route::get('/participantes','ParticipantesController@get');
Route::post('/participantes','ParticipantesController@post');
Route::delete('/participantes','ParticipantesController@delete');
Route::put('/participantes','ParticipantesController@put');

Route::get('/institutos','InstitutosController@get');
Route::get('/institutos/filter','InstitutosController@filter');
Route::post('/institutos','InstitutosController@post');
Route::delete('/institutos','InstitutosController@delete');
Route::put('/institutos','InstitutosController@put');

Route::get('/matriculas','MatriculasController@get');
Route::post('/matriculas','MatriculasController@post');
Route::delete('/matriculas','MatriculasController@delete');
Route::put('/matriculas','MatriculasController@put');

Route::get('/tipo_descuentos','TipoDescuentosController@get');
Route::post('/tipo_descuentos','TipoDescuentosController@post');
Route::delete('/tipo_descuentos','TipoDescuentosController@delete');
Route::put('/tipo_descuentos','TipoDescuentosController@put');

Route::get('/asignaciones','AsignacionesController@get');
Route::get('/asignaciones/filter','AsignacionesController@filter');
Route::get('/asignaciones/facilitadores','AsignacionesController@getFacilitadores');
Route::post('/asignaciones/facilitadores','AsignacionesController@asignarFacilitador');
Route::delete('/asignaciones/facilitadores','AsignacionesController@deleteFacilitador');
Route::post('/asignaciones','AsignacionesController@post');
Route::delete('/asignaciones','AsignacionesController@delete');
Route::put('/asignaciones','AsignacionesController@put');

Route::get('/participantes/get_one','ParticipantesController@getParticipante');
Route::get('/matriculas/get_one','MatriculasController@getMatricula');
Route::get('/matriculas/participantes','MatriculasController@getMatriculasParticipantes');

Route::post('/users', 'UsersController@post');
Route::get('/users','UsersController@get');
Route::put('/users','UsersController@put');
Route::get('/users/filter','UsersController@filter');

Route::get('/asignaciones/{id}','AsignacionesController@getOne');
Route::post('/login','UsersController@login');
Route::get('/roles','RolesController@get');
