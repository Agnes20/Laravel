<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//cargar la vista de los datos de los alumnos pasandole un número
Route::get('/alumno/{curso?}', function ($curso='0') {
    return view('alumnos', array (
    'curso'=>$curso
    ));
})->where(array(
        'curso'=>'[0 -9]+'   
));

Route::get('/datos', function ($curs='0') {
    return view('datos', array (
    'curs'=>$curs
    ));
});

Route::get('/datos/{curs}','WebserviceControler@index');