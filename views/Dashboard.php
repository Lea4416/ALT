<?php
    require_once('./composent/header.php');
    $title = "Dashboard";

    $data = file_get_contents("../Documentation/json-server/fixtures/db.json");
    $json = json_decode($data, true);
?>
<nav>
    <!-- Petit éclaire violet et blanc -->
     <a href="">Dashboard</a>
     <a href="">Tools</a>
     <a href="">Analytics</a>
     <a href="">Setting</a>
     <!-- Barre de recherche -->
      <!-- Demi lune -->
       <!-- Cloche de notification -->
        <!-- Roue paramétre -->
         <!-- Image -->
          <!-- Fléche vers le bas -->
</nav>
<?php
/* $posts = $json["posts"];
$comments = $json["comments"];
$profile = $json["profile"];

foreach ($posts as $post) {
    echo "<h2>" . $post["title"] . "</h2>";
    echo "<p>id : " . $post["id"] . "</p>";
} */
?>
<main>
    <h1>Internal Tools Dahboard</h1>
    <p>Monitor and manage your organization's software tools and expenses</p>
    <div>
        Monthly Budget
        <!-- Fléche vert plus haut avec deux angles un bas et un haut -->
        <p>€28,750/€30k</p>
        <p>+12%</p>    
    </div>
    <div>
        <p>Active Tools</p>
        <!-- Cléfs blanche fond violet -->
         <p>147</p>
         <p>+8</p>
    </div>
    <div>
        <p>Departements</p>
        <!-- Immeuble blan fond rouge -->
         <p>8</p>
         <p>+2</p>
    </div>
    <div>
        <p>Cost/User</p>
        <!-- 2 personnes en blanc font rose -->
         <p>€156</p>
         <p>-€12</p>
    </div>
    <div>
        <h2>Recent Tools</h2>
        <!-- Petit calendrier -->
         <p>last 30 days</p>
    <table>
        <thead>
            <th>
                <tr>Tool</tr>
                <tr>Departement</tr>
                <tr>Users</tr>
                <tr>Monthly Cost</tr>
                <tr>Status</tr>
            </th>
        </thead>
        
    </table>
    </div>
</main>
<?php 
    require_once('./composent/footer.php')
?>