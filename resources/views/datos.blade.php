<?php
$datos=array();
$dat = array();
$jsons = array();
$aux =0;
$id = $curs;
    if(empty($id))
	{echo "<li>Curso no Registrado</li>";
        exit;}
	else{foreach($cursos_al as $cursos){
                    if($id == $cursos->ID_CURSO)
                    {$aux=1;
                     foreach($alumnos as $alumno)
                     {
                      if($cursos->ID_ALUMNO == $alumno->ID)
                      {array_push($datos,'Nombre del almuno: '. $alumno->NOMBRE,
                                         'Apellidos del alumno: '.$alumno->APELLIDOS);}    
                     }
                    }
                }
                 if($aux == 0)
                    {echo "<li>Identificador del Curso No Existe</li>";
                    exit;}
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
?>