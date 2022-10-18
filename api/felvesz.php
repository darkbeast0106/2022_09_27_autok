<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    http_response_code(405);
    echo json_encode(['message' => "Only 'POST' method is allowed on this page"]);
    die();
}
$message = "";
require_once "../uzemanyag_tipusok.php";
require_once "../adatbazis.php";
$db = new Adatbazis();
$json = file_get_contents("php://input");
$post = json_decode($json, true);

if (isset($post) && !empty($post)) {
    $hiba = "";
    if (!isset($post['rendszam']) || empty($post['rendszam'])) {
        $hiba .= "Rendszám mező kitöltése kötelező. ";
    }
    if (!isset($post['marka']) || empty($post['marka'])) {
        $hiba .= "Márka mező kitöltése kötelező. ";
    }
    if (!isset($post['modell']) || empty($post['modell'])) {
        $hiba .= "Modell mező kitöltése kötelező. ";
    }
    if (!isset($post['gyartas_eve']) || empty($post['gyartas_eve'])) {
        $hiba .= "Gyártás éve mező kitöltése kötelező. ";
    } else if (!is_numeric($post['gyartas_eve']) || round($post['gyartas_eve']) != $post['gyartas_eve']) {
        $hiba .= "Gyártás éve csak egész szám lehet. ";
    } else if ($post['gyartas_eve'] < 1900 || $post['gyartas_eve'] > date("Y")) {
        $hiba .= "A gyártás éve 1900 és " . date("Y") . " közé kell hogy essen. ";
    }
    if (!isset($post['uzemanyag']) || empty($post['uzemanyag'])) {
        $hiba .= "Üzemanyag típus mező kitöltése kötelező. ";
    } else if (!in_array($post['uzemanyag'], array_keys($uzemanyag_tipusok))) {
        $hiba .= "Üzemanyag típust a legördülő menüből válassza ki. ";
    }

    if ($hiba == "") {
        try {
            $db->auto_felvetel($post['rendszam'], $post['marka'], $post['modell'], $post['gyartas_eve'], $post['uzemanyag']);
            $message = "Sikeres felvétel";
            http_response_code(201);
        } catch (\mysqli_sql_exception $th) {
            http_response_code(409);
            $message = $th->getMessage();
        }
    } else {
        $message = trim($hiba);
        http_response_code(422);
    }
} else {
    $message = "Nem lett elküldve adat";
    http_response_code(422);
}



echo json_encode(['message' => $message], JSON_UNESCAPED_UNICODE);
