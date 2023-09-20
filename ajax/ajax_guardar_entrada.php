<?php
require_once '../clases/consultas.php';

$json = new StdClass();
$json->resp = '';
$json->error = '';

$taller = $_POST['nombre_taller'];
$fecha = $_POST['fecha_entrega'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$valor = $_POST['valor'];

$json->resp = datos::guardar_entrada($taller,$fecha,$producto,$cantidad,$valor);

if($json->resp){
    $json->resp = 'Guardado correctamente';
}else{
    $json->error = 'Ocurrio un error de conexion, no se puedieron guardar los datos.';
}

print json_encode($json);
?>