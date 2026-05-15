<?php
    require_once("./Composent/header.php");
    require_once("../Controller/Logiquearray.php");

    $controller = new Logiquearray();
?>
<h1>Logique Array</h1>
<a href="./acceuil.php">Retour a l'acceuil</a>
<h2>Écrivez une fonction qui filtre un tableau d'objets selon une propriété et sa valeur</h2>
<?php $controller->filtre() ?>
<h2>Écrivez une fonction qui groupe les éléments d'un tableau selon une propriété</h2>
<?php $controller->doublefiltre() ?>
<h2>Écrivez une fonction qui trouve l'intersection entre deux tableaux d'objets selon une propriété donnée</h2>
<?php $controller->fusiontableau() ?>
<h2>Écrivez une fonction qui transforme un tableau d'objets en utilisant une fonction de mapping personnalisée</h2>
<?php $controller->transform() ?>
<h2>Écrivez une fonction qui agrège les données d'un tableau d'objets</h2>
<?php $controller->agrege()  ?>
<?php
    require_once("./Composent/footer.php")
?>