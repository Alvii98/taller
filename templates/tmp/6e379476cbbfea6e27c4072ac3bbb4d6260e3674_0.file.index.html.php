<?php
/* Smarty version 3.1.34-dev-7, created on 2023-09-20 21:07:31
  from 'C:\xampp\htdocs\taller\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_650b42f36641a1_04260084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e379476cbbfea6e27c4072ac3bbb4d6260e3674' => 
    array (
      0 => 'C:\\xampp\\htdocs\\taller\\templates\\index.html',
      1 => 1695235307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_650b42f36641a1_04260084 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
    <!-- BOOTSTRAP 4.6 -->
    <link rel="stylesheet" href="libs/bootstrap-4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/bootstrap-icons/font/bootstrap-icons.css">
    <!-- JQUERY -->
    <?php echo '<script'; ?>
 src="libs/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
    <!-- ALERTIFY -->
	<link rel="stylesheet" href="libs/alertifyjs/css/alertify.min.css" />
	<link rel="stylesheet" href="libs/alertifyjs/css/themes/default.min.css" />
	<?php echo '<script'; ?>
 src="libs/alertifyjs/alertify.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="libs/alertifyjs/settings.js"><?php echo '</script'; ?>
>
    <!-- JS -->
   <?php echo '<script'; ?>
 src="js/funciones.js?<?php echo $_smarty_tpl->tpl_vars['NO_CACHE']->value;?>
"><?php echo '</script'; ?>
> 
   <?php echo '<script'; ?>
 src="js/buscador.js?<?php echo $_smarty_tpl->tpl_vars['NO_CACHE']->value;?>
"><?php echo '</script'; ?>
> 
    <!-- ESTILOS -->
    <link rel="stylesheet" href="css/estilo.css?<?php echo $_smarty_tpl->tpl_vars['NO_CACHE']->value;?>
">
</head>
<body>
    <?php if ($_smarty_tpl->tpl_vars['MSJ_ELIMINAR']->value) {?>
    <?php echo '<script'; ?>
>alertify.success("<?php echo $_smarty_tpl->tpl_vars['MSJ_ELIMINAR']->value;?>
");<?php echo '</script'; ?>
>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['ERROR_ELIMINAR']->value) {?>
    <?php echo '<script'; ?>
>alertify.error("<?php echo $_smarty_tpl->tpl_vars['ERROR_ELIMINAR']->value;?>
");<?php echo '</script'; ?>
>
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['HEADER']->value;?>

    <div class="container border border-color rounded mb-5 mt-4 text-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-3 boton-cargar boton-marcado" id="entrada_taller">ENTRADA A FABRICA</div>
                <div class="col-md-3 boton-cargar" id="salida_fabrica">SALIDA DE FABRICA</div>
                <div class="col-md-3 boton-cargar" style="float:right;" onclick="location.href='cargas.php'" id="salida_fabrica">CARGAR ENTRADA</div>
            </div>
            <div class="col-md-10 d-flex justify-content-center mt-4">
                <input type="text" id="codigo" placeholder="Codigo" class="form-control col-md-3">
                <input type="text" id="fecha_entrega" placeholder="Fecha" class="form-control ml-2 col-md-3">
                <input type="text" id="producto" placeholder="Producto" class="form-control ml-2 col-md-3">
            </div>
            <div class="col-md-12 mt-4 d-flex justify-content-center">
                <div class="col-md-3 float-left">
                    <i class="bi bi-exclamation-circle-fill text-warning"></i> Listo para entregar
                </div>
                <div class="col-md-3 float-left">
                    <i class="bi bi-exclamation-circle-fill text-danger"></i> Vienen de entregas anteriores
                </div>
                <div class="col-md-3 float-left">
                    <i class="bi bi-exclamation-circle-fill text-success"></i> Nuevos y se completó entrega
                </div>
            </div>
            <div class="col-md-12 mt-3 text-center">
                <div id="tabla_entrada">
                  <?php echo $_smarty_tpl->tpl_vars['TABLA_ENTRADA']->value;?>

                </div>
                <div id="tabla_salida" style="display:none;">
                  <?php echo $_smarty_tpl->tpl_vars['TABLA_SALIDA']->value;?>

                </div>
            </div>
        </div>
    </div>
    <?php echo $_smarty_tpl->tpl_vars['FOOTER']->value;?>

</body>
</html><?php }
}
