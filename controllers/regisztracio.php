<?php
$hiba = "";
$siker = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!isset($_POST['felhasznalonev']) && empty($_POST['felhasznalonev'])) {
        $hiba .= "Felhasználónév megadása kötelező. ";
    }
    if (!isset($_POST['jelszo']) && empty($_POST['jelszo'])) {
        $hiba .= "Jelszó megadása kötelező. ";
    }
    require_once "./models/felhasznalo_model.php";
    $db = new Felhasznalo_model();


    if ($hiba == "") {
        try {
            $db->regisztracio($_POST['felhasznalonev'], $_POST['jelszo']);
            $siker = true;
        } catch (\mysqli_sql_exception $th) {
            $hiba = $th->getMessage();
        }
    }
}
$urlap_cim = "Regisztráció";
include "./views/felhasznalo_urlap.php";