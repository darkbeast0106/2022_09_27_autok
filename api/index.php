<?php 
require_once "../models/auto_model.php";
$db = new Auto_model();
$autok = $db->list_autok();
header("Content-Type: application/json");
echo json_encode($autok, JSON_UNESCAPED_UNICODE);