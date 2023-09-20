<?php
session_start();
require_once __DIR__.'/settings/SmartyConfig.php';
require_once __DIR__.'/clases/consultas.php';

if (isset($_POST['id_entrada'])) {
    
    $entradas = datos::entradas_id($_POST['id_entrada']);
    
    // DATOS DE ENTRADA SEGUN ID
    $smarty->assign('ID', $entradas['id']);
    $smarty->assign('NOMBRE_TALLER', $entradas['nombre_taller']);
    $smarty->assign('FECHA_ENTREGA', $entradas['fecha_entrega']);
    $smarty->assign('PRODUCTO', $entradas['producto']);
    $smarty->assign('CANTIDAD', $entradas['cantidad']);
    $smarty->assign('VALOR', $entradas['valor']);
    
    $preparar_salida = false;
    // Si me trae algo saco el boton preparar salida
    if (empty(datos::salidas_codigo($_POST['id_entrada']))) $preparar_salida = true;
    $smarty->assign('PREPARAR_SALIDA', $preparar_salida);
    
    $smarty->assign('FOOTER', $smarty->fetch('partials/footer.html'));
    $smarty->assign('HEADER', $smarty->fetch('partials/header.html'));
    
    $smarty->display('editar_entrada.html');

}elseif (isset($_POST['id_salida'])) {

    $salidas = datos::salidas_id($_POST['id_salida']);
    
    // DATOS DE ENTRADA SEGUN ID
    $smarty->assign('ID', $salidas['id']);
    $smarty->assign('CODIGO', $salidas['codigo']);
    $smarty->assign('NOMBRE_TALLER', $salidas['nombre_taller']);
    $smarty->assign('FECHA_RETIRO', $salidas['fecha_retiro']);
    $smarty->assign('PRODUCTO', $salidas['producto']);
    $smarty->assign('CANTIDAD', $salidas['cantidad']);
    $smarty->assign('ENVIADO', $salidas['enviado']);
    $smarty->assign('VALOR', $salidas['valor']);
    $smarty->assign('OBSERVACION', $salidas['observacion']);
    
    $smarty->assign('FOOTER', $smarty->fetch('partials/footer.html'));
    $smarty->assign('HEADER', $smarty->fetch('partials/header.html'));
    
    $smarty->display('editar_salida.html');

}else{
    header('Location: index.php');
    exit;   
}
