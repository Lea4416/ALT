<?php
    require_once("./Composent/header.php");
    require_once("../Controller/Logiqueobjet.php");

    $controller = new Logiqueobjet();
?>
<h1>Logique Objet</h1>
<a href="./acceuil.php">Retour a l'acceuil</a>
<h2>Écrivez une fonction qui récupère toutes les valeurs d'un objet</h2>
<?php $controller->reucpererlesvaleurs() ?>

<h2>Écrivez une fonction qui transforme les valeurs d'un objet</h2>
<?php $controller->transform() ?>

<h2>Écrivez une fonction qui fusionne deux objets en sommant les valeurs numériques communes</h2>

<?php $controller->fusion()  ?>

<h2>Écrivez une fonction qui filtre un objet selon une condition sur les valeurs</h2>

<?php $controller->filtreCondition() ?>

<?php
    require_once("./Composent/footer.php")
?>