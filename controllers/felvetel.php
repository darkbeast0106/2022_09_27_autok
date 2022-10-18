<?php
require_once "./models/uzemanyag_tipusok.php";
$hiba = "";
$siker = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!isset($_POST['rendszam']) || empty($_POST['rendszam'])) {
        $hiba .= "Rendszám mező kitöltése kötelező. ";
    }
    if (!isset($_POST['marka']) || empty($_POST['marka'])) {
        $hiba .= "Márka mező kitöltése kötelező. ";
    }
    if (!isset($_POST['modell']) || empty($_POST['modell'])) {
        $hiba .= "Modell mező kitöltése kötelező. ";
    }
    if (!isset($_POST['gyartas_eve']) || empty($_POST['gyartas_eve'])) {
        $hiba .= "Gyártás éve mező kitöltése kötelező. ";
    } else if (!is_numeric($_POST['gyartas_eve']) || round($_POST['gyartas_eve']) != $_POST['gyartas_eve']) {
        $hiba .= "Gyártás éve csak egész szám lehet. ";
    } else if ($_POST['gyartas_eve'] < 1900 || $_POST['gyartas_eve'] > date("Y")) {
        $hiba .= "A gyártás éve 1900 és " . date("Y") . " közé kell hogy essen. ";
    }
    if (!isset($_POST['uzemanyag']) || empty($_POST['uzemanyag'])) {
        $hiba .= "Üzemanyag típus mező kitöltése kötelező. ";
    } else if (!in_array($_POST['uzemanyag'], array_keys($uzemanyag_tipusok))) {
        $hiba .= "Üzemanyag típust a legördülő menüből válassza ki. ";
    }

    if ($hiba == "") {
        require_once "./models/auto_model.php";
        $db = new Auto_model();
        try {
            $db->auto_felvetel($_POST['rendszam'], $_POST['marka'], $_POST['modell'], $_POST['gyartas_eve'], $_POST['uzemanyag']);
            $siker = true;
        } catch (\mysqli_sql_exception $th) {
            $hiba = $th->getMessage();
        }
    }
}

include_once "./views/felvetel.php";
include_once "./views/hiba_modal.php";