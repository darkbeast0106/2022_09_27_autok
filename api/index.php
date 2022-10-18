<?php 
require_once "../adatbazis.php";
$db = new Adatbazis();
$autok = $db->list_autok();
header("Content-Type: application/json");
echo json_encode($autok, JSON_UNESCAPED_UNICODE);