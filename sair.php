<?php
require_once ('config.php');
unset($_SESSION[PREFIX . 'loginId']);
unset($_SESSION[PREFIX . 'loginNome']);
unset($_SESSION[PREFIX . 'loginPermissao']);
unset($_SESSION[PREFIX . 'mensagemSe']);
header("Location: index.php");
?>