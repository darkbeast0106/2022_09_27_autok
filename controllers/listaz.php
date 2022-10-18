<?php
require_once "./models/auto_model.php";
require_once "./models/uzemanyag_tipusok.php";
$db = new Auto_model();
$autok = $db->list_autok();
include "./views/listaz.php";
?>