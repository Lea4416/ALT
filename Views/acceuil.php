<?php

require_once("./Core/db.php");
require_once("./Controller/accueilController.php");

$controller = new AccueilController($pdo);

$echantillons = $controller->afficherTrierEchantillon();

require_once("./Views/composant/header.php")
?>

<h1>Accueil</h1>

<h2>Etape 1</h2>

<table>
    <thead>
        <th>Type</th>
        <th>Priorité</th>
        <th>Temps d'analyse</th>
        <th>Date Arriver</th>
        <th>Patient id</th>
    </thead>
    <tbody>
        <?php foreach ($echantillons as $row): ?>
            <tr>
                <td><?= $row['type'] ?></td>
                <td><?= $row['priority'] ?></td>
                <td><?= $row['analysisTimes'] ?></td>
                <td><?= $row['arrivalTime'] ?></td>
                <td><?= $row['patientId'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Etape 2</h2>

<h3>Planning</h3>


<?php 
$techniciens = $controller->urineTechnicien();
$equipements = $controller->urineEquipement();
$echantillons = $controller->urineEchantillon();


?>

<table>
    <thead>
        <th>id echantillon</th>
        <th>id technicien</th>
        <th>id equipement</th>
        <th>Heure de départ</th>
        <th>Heure de fin de traitement</th>
        <th>Priorité</th>
    </thead>
    <tbody>
        <tr>
            <td><?= $echantillons[0]['id'] ?></td>
            <td><?= $techniciens[0]['id'] ?></td>
            <td><?= $equipements[0]['id'] ?></td>
            <td><?php
                $heure = $techniciens[0]['startTime'];
                // var_dump($heure);
                $h = floor($heure);
                // var_dump($h);
                $m = ($h - $heure) * 60;
                // var_dump($m);.
                if ($m < 10) {
                    echo "<p>{$h}h{$m}</p>";
                } else {
                    echo "<p>{$h}h0{$m}</p>";
                }
                ?></td>
            <td>
                <?php
                $heure = $heure * 60;
                // var_dump($heure);
                $heure += ($echantillons[0]['analysisTimes']);
                // var_dump($heure);
                $heure = $heure / 60;
                // var_dump($heure);
                $h = floor($heure);
                // var_dump($h);
                $m = ($heure - $h) * 60;
                // var_dump($m);
                if ($m > 10) {
                    echo "<p>{$h}h{$m}</p>";
                } else {
                    echo "<p>{$h}h0{$m}</p>";
                }
                ?>
            </td>
            <td><?= $echantillons[0]['priority'] ?></td>
        </tr>
        <?php foreach ($echantillons as $echantillon): ?>
        <tr>
            <td><?= $echantillon['id'] ?></td>
            <td><?= $techniciens[0]['id'] ?></td>
            <td><?= $equipements[0]['id'] ?></td>
            <td><?php
                if ($m != 0) {
                    echo "<p>{$h}h{$m}</p>";
                } else {
                    echo "<p>{$h}h0{$m}</p>";
                }
                ?></td>

            <td>
                <?php
                $heure = $heure * 60;
                // var_dump($heure);
                $heure += ($echantillon['analysisTimes']);
                // var_dump($heure);
                $heure = $heure / 60;
                // var_dump($heure);
                $h = floor($heure);
                // var_dump($h);
                $m = ($heure - $h) * 60;
                // var_dump($m);
                if ($m < 10) {
                    echo "<p>{$h}h{$m}</p>";
                } else {
                    echo "<p>{$h}h</p>";
                }
                ?>
            </td>
            <td><?= $echantillon['priority'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php 
$techniciens = $controller->bloodTechnicien();
$equipements = $controller->bloodEquipement();
$echantillons = $controller->bloodEchantillon();

?>

<table>
    <thead>
        <th>id echantillon</th>
        <th>id technicien</th>
        <th>id equipement</th>
        <th>Heure de départ</th>
        <th>Heure de fin de traitement</th>
        <th>Priorité</th>
    </thead>
    <tbody>
        <tr>
            <td><?= $echantillons[0]['id'] ?></td>
            <td><?= $techniciens[0]['id'] ?></td>
            <td><?= $equipements[0]['id'] ?></td>
            <td><?php
                $heure = $techniciens[0]['startTime'];
                // var_dump($heure);
                $h = floor($heure);
                // var_dump($h);
                $m = ($h - $heure) * 60;
                // var_dump($m);.
                if ($m < 10) {
                    echo "<p>{$h}h{$m}</p>";
                } else {
                    echo "<p>{$h}h</p>";
                }
                ?></td>
            <td>
                <?php
                $heure = $heure * 60;
                // var_dump($heure);
                $heure += ($echantillons[0]['analysisTimes']);
                // var_dump($heure);
                $heure = $heure / 60;
                // var_dump($heure);
                $h = floor($heure);
                // var_dump($h);
                $m = ($heure - $h) * 60;
                // var_dump($m);
                if ($m != 0) {
                    echo "<p>{$h}h{$m}</p>";
                } else {
                    echo "<p>{$h}h</p>";
                }
                ?>
            </td>
            <td><?= $echantillons[0]['priority'] ?></td>
        </tr>
        <?php foreach ($echantillons as $echantillon_urine): ?>
        <tr>
            <td><?= $echantillon_urine['id'] ?></td>
            <td><?= $techniciens[0]['id'] ?></td>
            <td><?= $equipements[0]['id'] ?></td>
            <td><?php
                if ($m != 0) {
                    echo "<p>{$h}h{$m}</p>";
                } else {
                    echo "<p>{$h}h</p>";
                }
                ?></td>

            <td>
                <?php
                $heure = $heure * 60;
                // var_dump($heure);
                $heure += ($echantillon_urine['analysisTimes']);
                // var_dump($heure);
                $heure = $heure / 60;
                // var_dump($heure);
                $h = floor($heure);
                // var_dump($h);
                $m = ($heure - $h) * 60;
                // var_dump($m);
                if ($m != 0) {
                    echo "<p>{$h}h{$m}</p>";
                } else {
                    echo "<p>{$h}h</p>";
                }
                ?>
            </td>
            <td><?= $echantillon_urine['priority'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php require_once("./Views/composant/footer.php") ?>