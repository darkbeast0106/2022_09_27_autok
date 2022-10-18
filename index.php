<?php
session_start();
$oldal = "";
if (!isset($_GET['oldal'])) {
    $oldal = "controllers/listaz.php";
} else {
    if (file_exists("controllers/" . $_GET['oldal'] . ".php")) {
        $oldal = "controllers/" . $_GET['oldal'] . ".php";
    } else {
        http_response_code(404);
        $oldal = "views/404.html";
    }
}
include "views/oldal_keret.php";