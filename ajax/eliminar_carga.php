<?php
session_start();
require_once '../clases/consultas.php';

$result = datos::eliminar_entrada($_GET['id']);
$result = datos::eliminar_salida($_GET['id']);

if ($result) {
    $_SESSION['MSJ_ELIMINAR'] = "Eliminado correctamente.";
    header('Location: ../index.php');
}else {
    $_SESSION['ERROR_ELIMINAR'] = "Ocurrio un error, no se pudo eliminar.";
    header('Location: ../index.php');
}