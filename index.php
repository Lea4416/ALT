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

use App\Models\Tools;
$tools = new Tools();

?>

<p></p> Cas Sandra - Listes avec filtres

<?php  
$order = "monthly_cost";

$tools->liste_avec_filtre($order,["owner_department = 'Engineering'","status = 'active'"]);
?>


</body>
</html>
