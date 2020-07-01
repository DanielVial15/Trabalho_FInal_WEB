<?php
include __DIR__.'/../control/cargaControl.php';
 
$data = file_get_contents('php://input');
$obj =  json_decode($data);
//echo $obj->titulo;

$id = $obj->id;

if(!empty($data)){	
 $cargaControl = new cargaControl();
 $cargaControl->delete($obj,$id);
 header('Location:listar.php');
}



?>