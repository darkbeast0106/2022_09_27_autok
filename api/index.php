<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-METHODS: GET, OPTIONS");

require_once "../models/auto_model.php";
$db = new Auto_model();
$autok = $db->list_autok();
echo json_encode($autok, JSON_UNESCAPED_UNICODE);