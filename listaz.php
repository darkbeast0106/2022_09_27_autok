<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Rendszám</th>
            <th>Márka</th>
            <th>Modell</th>
            <th>Gyártás éve</th>
            <th>Üzemanyag típus</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "adatbazis.php";
        $db = new Adatbazis();
        $autok = $db->list_autok();
        ?>
        <?php foreach ($autok as $auto): ?>
            <tr>
                <td><?php echo $auto['id'] ?></td>
                <td><?php echo $auto['rendszam'] ?></td>
                <td><?php echo $auto['marka'] ?></td>
                <td><?php echo $auto['modell'] ?></td>
                <td><?php echo $auto['gyartas_eve'] ?></td>
                <td><?php echo $uzemanyag_tipusok[$auto['uzemanyag_tipus']]; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Rendszám</th>
            <th>Márka</th>
            <th>Modell</th>
            <th>Gyártás éve</th>
            <th>Üzemanyag típus</th>
        </tr>
    </tfoot>
</table>