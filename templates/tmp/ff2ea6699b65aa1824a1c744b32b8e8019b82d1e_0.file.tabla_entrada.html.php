<?php
/* Smarty version 3.1.34-dev-7, created on 2023-09-20 21:07:31
  from 'C:\xampp\htdocs\taller\templates\partials\tabla_entrada.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_650b42f3211796_79380480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff2ea6699b65aa1824a1c744b32b8e8019b82d1e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\taller\\templates\\partials\\tabla_entrada.html',
      1 => 1695236836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_650b42f3211796_79380480 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="scroll mb-3">
    <table class="table table-bordered text-body">
        <thead align="center">
            <tr>
                <th>Codigo</th>
                <th>Nombre taller</th>
                <th>Fecha de entrega</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Restante</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ENTRADAS']->value, 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr onclick="editar_entrada(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)">
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre_taller'];?>
</td>
                <td><?php echo date("d/m/Y",strtotime($_smarty_tpl->tpl_vars['item']->value['fecha_entrega']));?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['producto'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['cantidad'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['restante'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['valor'];?>
</td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div><?php }
}
