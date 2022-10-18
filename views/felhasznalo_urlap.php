<?php if ($siker == true) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Sikeres <?php echo $urlap_cim ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if ($hiba != "") : ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $hiba ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<h1><?php echo $urlap_cim ?></h1>
<form method="post">
    <div class="mb-3">
        <label for="felhasznalonev_input">Felhasználónév</label>
        <input class="form-control" type="text" id="felhasznalonev_input" name="felhasznalonev" placeholder="Felhasználónév">
    </div>
    <div class="mb-3">
        <label for="jelszo_input">Jelszó</label>
        <input class="form-control" type="password" id="jelszo_input" name="jelszo" placeholder="Jelszó">
    </div>

    <button class="btn btn-outline-secondary" type="submit"><?php echo $urlap_cim ?></button>
</form>