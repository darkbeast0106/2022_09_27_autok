<?php 
require_once "adatbazis.php";
 ?>

<script src="validalas.js"></script>
<?php
if (isset($_POST) && !empty($_POST)) {
    $hiba = "";
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
?>
    <?php if ($hiba == "") : ?>
        <?php
        $db = new Adatbazis();
        $db->auto_felvetel($_POST['rendszam'], $_POST['marka'], $_POST['modell'], $_POST['gyartas_eve'], $_POST['uzemanyag']);
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Sikeres felvétel.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php else : ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $hiba ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
<?php
}
?>
<h1>Autók felvétele</h1>
<form action="index.php?oldal=felvetel" method="post" name="auto_felvetel" onsubmit="return validalas();">
    <div class="mb-3">
        <label for="rendszam_input">Rendszám</label>
        <input class="form-control" type="text" id="rendszam_input" name="rendszam" placeholder="Rendszám" >
    </div>
    <div class="mb-3">
        <label for="marka_input">Márka</label>
        <input class="form-control" type="text" id="marka_input" name="marka" placeholder="Márka" >
    </div>
    <div class="mb-3">
        <label for="modell_input">Modell</label>
        <input class="form-control" type="text" id="modell_input" name="modell" placeholder="Modell" >
    </div>
    <div class="mb-3">
        <label for="gyartas_eve_input">Gyártás éve</label>
        <input class="form-control" type="number" id="gyartas_eve_input" name="gyartas_eve" placeholder="Gyártás éve" >
    </div>
    <div class="mb-3">
        <label for="uzemanyag_input">Üzemanyag típus</label>
        <select class="form-select" id="uzemanyag_input" name="uzemanyag" >
        <option value=""></option>
            <?php foreach ($uzemanyag_tipusok as $key => $value) : ?>
                <option value="<?php echo $key ?>"><?php echo $value ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button class="btn btn-outline-secondary" type="submit">Felvétel</button>
</form>

<?php 
require_once "hiba_modal.php";

?>