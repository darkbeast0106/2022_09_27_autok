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
        $bejelentkezes_eredmenye = $db->bejelentkezes($_POST['felhasznalonev'], $_POST['jelszo']);
        if ($bejelentkezes_eredmenye) {
            $siker = true;
            $_SESSION['felhasznalo'] = $bejelentkezes_eredmenye;
            header("Location: index.php");
        } else {
            $hiba = "Hibás felhasználónév vagy jelszó.";
        }
    }
}
$urlap_cim = "Bejelentkezés";
include "./views/felhasznalo_urlap.php";