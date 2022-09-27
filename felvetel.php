<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autók</title>
</head>

<body>
    <?php 
    $uzemanyag_tipusok = [
        'benzin' => "Benzin", 
        'gazolaj' => "Gázolaj", 
        'elektromos' => "Elektromos", 
        'hibrid' => "Hibrid"
    ];
    ?>
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
        } else if (!is_numeric($_POST['gyartas_eve']) || round($_POST['gyartas_eve']) != $_POST['gyartas_eve']){
            $hiba .= "Gyártás éve csak egész szám lehet. ";
        } else if ($_POST['gyartas_eve'] < 1900 || $_POST['gyartas_eve'] > date("Y")) {
            $hiba .= "A gyártás éve 1900 és ". date("Y"). " közé kell hogy essen. ";
        }
        if (!isset($_POST['uzemanyag']) || empty($_POST['uzemanyag'])) {
            $hiba .= "Üzemanyag típus mező kitöltése kötelező. ";
        } else if (!in_array($_POST['uzemanyag'], array_keys($uzemanyag_tipusok))) {
            $hiba .= "Üzemanyag típust a legördülő menüből válassza ki. ";
        }
        echo $hiba;
    }
    ?>
    <h1>Autók felvétele</h1>
    <form action="felvetel.php" method="post" name="auto_felvetel">
        <div>
            <label for="rendszam_input">Rendszám</label>
            <input type="text" id="rendszam_input" name="rendszam" placeholder="Rendszám">
        </div>
        <div>
            <label for="marka_input">Márka</label>
            <input type="text" id="marka_input" name="marka" placeholder="Márka">
        </div>
        <div>
            <label for="modell_input">Modell</label>
            <input type="text" id="modell_input" name="modell" placeholder="Modell">
        </div>
        <div>
            <label for="gyartas_eve_input">Gyártás éve</label>
            <input type="number" id="gyartas_eve_input" name="gyartas_eve" placeholder="Gyártás éve">
        </div>
        <div>
            <label for="uzemanyag_input">Üzemanyag típus</label>
            <select id="uzemanyag_input" name="uzemanyag">
                <option value=""></option>
                <?php foreach ($uzemanyag_tipusok as $key => $value): ?>
                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Felvétel</button>
    </form>
</body>

</html>