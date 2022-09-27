<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autók</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>

<body>
    
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Autók</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Autók listázása</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="felvetel.php">Autó felvétele</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
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
            ?>
            <?php if ($hiba == ""): ?>
                <?php
                $file = fopen("autok.csv", "a");
                $sor = implode(";", $_POST) . PHP_EOL;
                fwrite($file, $sor);
                ?>
                <p>Sikeres felvétel</p>
            <?php else: ?>
                <p><?php echo $hiba ?></p>
            <?php endif; ?>
        <?php
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
    </main>
</body>

</html>