<?php
session_start();
require_once __DIR__.'/settings/SmartyConfig.php';
require_once __DIR__.'/clases/consultas.php';

// print date("d/m/Y", strtotime($value['fecha_entrega'])); 
$smarty->assign('MSJ_ELIMINAR', false);
$smarty->assign('ERROR_ELIMINAR', false);
if (isset($_SESSION['MSJ_ELIMINAR'])) {
    $smarty->assign('MSJ_ELIMINAR', $_SESSION['MSJ_ELIMINAR']);
    unset($_SESSION['MSJ_ELIMINAR']);
}else if(isset($_SESSION['ERROR_ELIMINAR'])){
    $smarty->assign('ERROR_ELIMINAR', $_SESSION['ERROR_ELIMINAR']);
    unset($_SESSION['ERROR_ELIMINAR']);
}
$smarty->assign('ENTRADAS', datos::entradas());
$smarty->assign('TABLA_ENTRADA', $smarty->fetch('partials/tabla_entrada.html'));
$smarty->assign('SALIDAS', datos::salidas());
$smarty->assign('TABLA_SALIDA', $smarty->fetch('partials/tabla_salida.html'));
$smarty->assign('FOOTER', $smarty->fetch('partials/footer.html'));
$smarty->assign('HEADER', $smarty->fetch('partials/header.html'));

$smarty->display('index.html');
