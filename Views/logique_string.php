<?php
    require_once("./Composent/header.php");
    require_once("../Controller/Logiquestring.php");

    $controller = new Logiquestring();
?>
<h1>Logique String</h1>
<a href="./acceuil.php">Retour a l'acceuil</a>
<h2>Créez une fonction qui prend une chaîne de caractères en paramètre et retourne sa longueur après avoir supprimé tous les espaces.</h2>
<form method="POST">
    <label for="chaineDeCaractere">Chaîne de caractére : </label>
    <input type="text" id="chaineDeCaractere" name="chaineDeCaractere">
    <button name="btn_sansEspace" type="submit">Envoie</button>
</form>

<h2>Développez une fonction qui accepte un prénom en paramètre et renvoie une salutation personnalisée en mettant la première lettre en majuscule.</h2>
<?php 

 if (isset($_POST["btn_sansEspace"])) {

    $chaine = $_POST["chaineDeCaractere"];

    $controller->compteSansEspace($chaine);
}

?>

<form method="POST">
    <label for="prenom">Prénom (sans majuscule) : </label>
    <input type="text" id="prenom" name="prenom">
    <button name="btn_prenom" type="submit">Envoie</button>
</form>

<?php 

 if (isset($_POST["btn_prenom"])) {

    $prenom = $_POST["prenom"];

    $controller->salutationPrenom($prenom);
}

?>

<h2>
    Écrivez une fonction qui détermine si une chaîne de caractères se termine par un point d'exclamation.
</h2>

<form method="POST">
    <label for="cdcexcla">Chaîne de caractére (vérification point d'exlamation ou pas) : </label>
    <input type="text" id="cdcexcla" name="cdcexcla">
    <button name="btn_cdcexcla" type="submit">Envoie</button>
</form>

<?php 

 if (isset($_POST["btn_cdcexcla"])) {

    $cdcexcla = $_POST["cdcexcla"];

    $controller->exclafin($cdcexcla);
}

?>

<h2>Écrivez une fonction qui compte le nombre d'occurrences d'une lettre dans une chaîne</h2>

<form method="POST">
    <label for="chaine">Chaîne de caractére (compte combien de fois il y a une lettre) : </label>
    <input type="text" id="chaine" name="chaine"><br>
    <label for="lettre">Lettre a compter : </label>
    <input type="text" id="lettre" name="lettre">
    <button name="btn_ccomptel" type="submit">Envoie</button>
</form>

<?php 

if (isset($_POST["btn_ccomptel"])) {

    if (!empty($_POST["chaine"]) && !empty($_POST["lettre"])) {

        $chaine = $_POST["chaine"];
        $lettre = $_POST["lettre"];

        $controller->calcullettrechaine($chaine, $lettre);
    }
}
?>
<h2>Écrivez une fonction qui convertit une chaîne en "camelCase"</h2>

<form method="POST">
    <label for="chaine">Chaine de caractére (sans espace a la place _ ni majuscule) : </label>
    <input type="text" id="chaine" name="chaine"><br>
    <button name="btn_camelcase" type="submit">Envoie</button>
</form>

<?php 

 if (isset($_POST["btn_camelcase"])) {

    $chaine = $_POST["chaine"];

    $controller->camelcase($chaine);
}

?>

<h2>Écrivez une fonction qui compte le nombre de voyelles dans une chaîne</h2>

<form method="POST">
    <label for="chaine">Chaine de caractére (pas d'accent merci): </label>
    <input type="text" id="chaine" name="chaine"><br>
    <button name="btn_cvoyelle" type="submit">Envoie</button>
</form>

<?php 

 if (isset($_POST["btn_cvoyelle"])) {

    $chaine = $_POST["chaine"];

    $controller->cvoyelle($chaine);
}

?>

<h2>Écrivez une fonction qui alterne majuscules et minuscules dans une chaîne</h2>

<form method="POST">
    <label for="chaine">Chaine de caractére: </label>
    <input type="text" id="chaine" name="chaine"><br>
    <button name="btn_majmin" type="submit">Envoie</button>
</form>

<?php 

 if (isset($_POST["btn_majmin"])) {

    $chaine = $_POST["chaine"];

    $controller->majmin($chaine);
}

?>

<h2>Écrivez une fonction qui supprime les caractères en double consécutifs</h2>

<p>Je n'y suis pas arriver et aprés 30 minutes dessus j'ai décidé de passer a une autre fonction. En situation profesionnelle, j'y serais revenu le lendemain et si toujours bloqué j'aurais demandé conseille a des collégues.</p>

<!-- <form method="POST">
    <label for="messageUtilisateur">Chaine de caractére: </label>
    <input type="text" id="messageUtilisateur" name="messageUtilisateur"><br>
    <button name="btn_doublon" type="submit">Envoie</button>
</form>

<?php 

//  if (isset($_POST["btn_doublon"])) {

//     $messageUtilisateur = $_POST["messageUtilisateur"];

//     $controller->btn_doublon($messageUtilisateur);
// }

?> -->

<h2>Écrivez une fonction qui extrait les initiales d'un nom complet</h2>

<form method="POST">
    <label for="prenom">Prénom: </label>
    <input type="text" id="prenom" name="prenom"><br>
    <label for="nom">Nom: </label>
    <input type="text" id="nom" name="nom"><br>
    <button name="btn_initiales" type="submit">Envoie</button>
</form>

<?php 

 if (isset($_POST["btn_initiales"])) {

    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];

    $controller->initiales($prenom,$nom);
}

?>

<h2>Écrivez une fonction qui masque les caractères d'une chaîne sauf les N derniers</h2>

<form method="POST">
    <label for="carte">Numéro de carte: </label>
    <input type="number" id="carte" name="carte"><br>
    <label for="remplacement">Nombre de chiffres a remplacer: </label>
    <input type="number" id="remplacement" name="remplacement"><br>
    <button name="btn_cartes" type="submit">Envoie</button>
</form>

<?php 

 if (isset($_POST["btn_cartes"])) {

    $carte = $_POST["carte"];
    $remplacement = $_POST["remplacement"];

    $controller->cachenum($carte,$remplacement);
}

?>

<h2>Écrivez une fonction qui trouve la plus longue séquence de caractères identiques</h2>

<form method="POST">
    <label for="enchainements">Vos enchainements: </label>
    <input type="text" id="enchainements" name="enchainements"><br>
    <button name="btn_enchainements" type="submit">Envoie</button>
</form>


<?php
    require_once("./Composent/footer.php")
?>