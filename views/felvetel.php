<script src="validalas.js"></script>
    <?php if ($siker == true) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Sikeres felvétel.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if ($hiba != "") : ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $hiba ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
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