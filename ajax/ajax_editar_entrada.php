<?php
require_once __DIR__.'/../clases/consultas.php';

$json = new StdClass();
$json->resp = '';
$json->error = '';

$id = $_POST['id'];
$taller = $_POST['nombre_taller'];
$fecha = $_POST['fecha_entrada'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$valor = $_POST['valor'];

$json->resp = datos::editar_entrada($id,$taller,$fecha,$producto,$cantidad,$valor);

if($json->resp){
    $json->resp = 'Guardado correctamente';
}else{
    $json->error = 'Ocurrio un error de conexion, no se puedieron guardar los datos.';
}

print json_encode($json);
?>