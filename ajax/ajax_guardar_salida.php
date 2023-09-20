<?php
require_once '../clases/consultas.php';

$json = new StdClass();
$json->resp = '';
$json->error = '';

$taller = $_POST['nombre_taller'];
$codigo = $_POST['codigo'];
$fecha = $_POST['fecha_retiro'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$enviado = $_POST['enviado'];
$valor = $_POST['valor'];
$observacion = $_POST['observacion'];
$restante = $cantidad - $enviado;

if(!empty(datos::salidas_codigo($codigo))){
    $json->resp = false;
    $json->error = 'Esta salida ya esta cargada, no puede volver a cargarla.';
}else{
    $json->resp = datos::guardar_salida($codigo,$taller,$fecha,$producto,$cantidad,$enviado,$valor,$observacion);
    
    if($json->resp){
        $json->resp = datos::editar_restante_entrada($codigo,$restante);
        $json->resp = 'Guardado correctamente';
    }else{
        $json->error = 'Ocurrio un error de conexion, no se puedieron guardar los datos.';
    }
}

print json_encode($json);
?>