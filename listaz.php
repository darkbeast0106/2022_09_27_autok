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
        $file = fopen("autok.csv", "r");
        $i = 0;
        ?>
        <?php while ($sor = fgets($file)) : ?>
            <?php
            $i++;
            $adatok = explode(';', trim($sor));
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $adatok[0] ?></td>
                <td><?php echo $adatok[1] ?></td>
                <td><?php echo $adatok[2] ?></td>
                <td><?php echo $adatok[3] ?></td>
                <td><?php echo $uzemanyag_tipusok[$adatok[4]]; ?></td>
            </tr>
        <?php endwhile; ?>
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