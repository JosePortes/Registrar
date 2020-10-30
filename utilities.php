<?php 


$carreras = [1 => "Software", 2 => "Redes", 3 => "Sonido", 4 => "Multimedia", 5 => "Seguridad",  6 => "Mecatronica"];

function ObtenerUltimo($Listado){ 

$Lista = count($Listado);
$UltimoE = $Listado[$Lista - 1];
return $UltimoE;
}

function Nombre($CarreraItlaId){
    return $GLOBALS['carreras'][$CarreraItlaId];
}

function BuscarCarrera($ListCareer, $property, $valor){

    $filtracion = [];

    foreach($ListCareer as $carrera){
        if($carrera[$property]== $valor){
            array_push($filtracion, $carrera);
        }
    }
    return $filtracion;

}

function EliminarEstudiante($ListCareer, $property, $valor){

    $eliminar = 0;

    foreach($ListCareer as $key => $carrera){
        if($carrera[$property] == $valor){
          $eliminar = $key;
        }
    }
    return $eliminar;

}

?>