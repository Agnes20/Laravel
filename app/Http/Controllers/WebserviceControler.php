<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WebserviceControler extends Controller
{
  public function index($curs){
  $cursos_al = DB::table('cursos_alumnos')->where ('id', '<>', NULL)->get();
  $alumnos = DB::table('alumnos')->where ('id', '<>' ,NULL)->get();
  //$curs ->where(array('curs'=>'[0 -9]+'));
  return view ('datos',[
      'cursos_al' => $cursos_al,
      'alumnos' => $alumnos,
      'curs' => $curs    
  ]);
  }
}