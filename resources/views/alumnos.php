<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//conectar con la base datos
$conectar =mysqli_connect("localhost", "root", '','php_bd');
if(!$conectar)
	{echo "<li>No se puede conectar con el servidor</li>";}
//consulta de la base de datos cursos_alumnos
$consulta= "select * from cursos_alumnos where ID IS NOT NULL";
$resultado =$conectar -> query($consulta);
//sacar los alumnos
$consulta_a= "select * from alumnos where ID IS NOT NULL";
$resultado_a =$conectar -> query($consulta_a);

$datos=array();
$dat = array();
$jsons = array();
$aux =0;
$id = $curso;
    if(empty($id))
	{echo "<li>Curso no Registrado</li>";
        exit;}
	else{if(mysqli_num_rows($resultado) >0)
            {
                foreach($resultado as $cursos){
                        if($id == $cursos["ID_CURSO"])
                        {$aux=1;
                         foreach($resultado_a as $alumno)
                         {
                          if($cursos["ID_ALUMNO"] == $alumno["ID"])
                          {array_push($datos,'Nombre del almuno: '. $alumno["NOMBRE"],
                                             'Apellidos del alumno: '.$alumno["APELLIDOS"]);}    
                         }
                        }
                    }
                     if($aux == 0)
                        {echo "<li>Identificador del Curso No Existe</li>";
                                  exit;}
            }
            else{echo "<li>No tiene datos la tabla</li>";}
            }
//creación del JSON
$json = json_encode($datos);
echo $json;
//creación del archivo JSON
$archivo = fopen('alumnos_c.json', 'w');
fwrite($archivo,$json);
fclose($archivo);
$id =0;
$aux =0;
mysqli_close($conectar);
?>
