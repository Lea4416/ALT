<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Léa Martinaud</title>
</head>
<body>   
<?php

require_once "./Core/sql.php";
require_once "./Models/Tools.php";
require_once "./Models/Categorie.php";
require_once "./Controller/AcceuilController.php";

use App\Controller\AcceuilController;

$controler = new AcceuilController();

?>
<h1>Phase 3 API</h1>

<h2>Partie 1</h2>

<h3>Cas Sandra - Listes avec filtres</h3>

<?php  
$order = "monthly_cost";

$controler->liste_avec_filtre($order,["owner_department = 'Engineering'","status = 'active'"]);
$controler->liste_avec_filtre($order,["id = 1"]);
?>

<h2>Cas Marcus - Details complet</h2>

<!-- Phase 2 incomplete pas trouver comment crée "total_sessions" et "avg_session_minutes" -->
<?php 
$id = 5;

$controler->researchById($id);

?>
<h3>Cas Lisa - Création nouvel outil</h3>

<form method="POST">
    <label for="name">Nom</label>
    <input type="text" id="name" placeholder="Nom de l'application" name="name" minlength="2" maxlength="100" required><br>
    <label for="description">Description</label>
    <input type="text" id="description" placeholder="Description de l'application" name="description"><br>
    <label for="vendor">Fournisseur</label>
    <input type="text" id="vendor" placeholder="Fournisseur de l'application" name="vendor" maxlength="100"><br>
    <label for="website_url">Lien URL</label>
    <input type="url" id="website_url" placeholder="Lien URL vers l'application" name="website_url"><br>
    <label for="monthly_cost">Coût-mensuelle</label>
    <input type="number" id="monthly_cost" placeholder="Coût-mensuelle de l'application" name="monthly_cost"><br>
    <label for="categorie">categrie</label>
    <select name="categorie" id="categorie">
        <option value="communication">Communication</option>
        <option value="development">Developpement</option>
        <option value="design">Designer</option>
        <option value="productivity">Productivité</option>
        <option value="analytics">Analitique</option>
        <option value="security">Sécurité</option>
        <option value="marketing">Marketing</option>
        <option value="hr">Ressources humaines</option>
        <option value="finance">Finance</option>
    </select><br>
    <label for="owner_department">Service</label>
    <select name="owner_department" id="owner_department">
      <option value="Engineering">Ingénieur</option>
        <option value="Sales">Sales</option>
        <option value="HR">Ressources humaines</option>
        <option value="Operations">Buisnes</option>
        <option value="Marketing">Marketing</option>
        <option value="Finance">Finance</option>
     </select><br>
    <button type="submit" name="inscription">Envoyer</button>
    <?php 

 if (isset($_POST["inscription"])) {

    $name=trim($_POST["name"]);
    $description= trim($_POST["description"]);
    $vendor= trim($_POST["vendor"]);
    $website_url=trim($_POST["website_url"]);
    $monthly_cost= (float)$_POST["monthly_cost"];
    $owner_department= trim($_POST["owner_department"]);
    $categorie= trim($_POST["categorie"]);

    $controler->creationOutil($name,$description,$vendor,$website_url,$monthly_cost,$owner_department,$categorie);
}

?>
</form>

<h3>Cas David : Mise a jour</h3>

<form method="POST">
    <label for="name">Nom</label>
    <input type="text" id="name" placeholder="Nom de l'application" name="name" minlength="2" maxlength="100" required><br>
    <label for="monthly_cost">Coût-mensuelle</label>
    <input type="number" id="monthly_cost" placeholder="Coût-mensuelle de l'application" name="monthly_cost"><br>
    <label for="status">Status</label>
    <select name="status" id="status">
        <option value="active">Active</option>
        <option value="deprecated">Déprécié</option>
        <option value="trial">Expérimental</option>
    </select><br>
    <label for="description">Description</label>
    <input type="text" id="description" placeholder="Description de l'application" name="description"><br>

    <button type="submit" name="modification">Envoyer</button>
<?php 

 if (isset($_POST["modification"])) {

    $name=trim($_POST["name"]);
    $description= trim($_POST["description"]);
    $monthly_cost= (float)$_POST["monthly_cost"];
    $status= trim($_POST["status"]);

    $controler->modification($name,$description,$status,$monthly_cost);
}

?>

<h2>Partie 2</h2>

<h3>Cas Jennifer : Où va le budget du département </h3>


<?php 
    // $controler->mostCostDepartement();
?>


</form>
</body>
</html>