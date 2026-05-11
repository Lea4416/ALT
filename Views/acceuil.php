<?php

require_once("./Core/db.php");
require_once("./Controller/accueilController.php");

$controller = new AccueilController($pdo);

$result = $controller->AfficherTrierParUrgence();

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
            <?php foreach ($result as $row): ?>
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

    <?php 
    $result = $controller->afficherAassignationDesRessources();
    ?>

     <table>
        <thead>
            <th>Type</th>
            <th>Priorité</th>
            <th>Temps d'analyse</th>
            <th>Date Arriver</th>
            <th>Patient id</th>
            <th>Technicien</th>
            <th>Machine</th>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
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
    <?= var_dump($reponse) ?>



        
