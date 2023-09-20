<?php
session_start();
require_once __DIR__.'/settings/SmartyConfig.php';

$smarty->assign('FOOTER', $smarty->fetch('partials/footer.html'));
$smarty->assign('HEADER', $smarty->fetch('partials/header.html'));

$smarty->display('cargas.html');