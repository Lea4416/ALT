<?php
    require_once('./composent/header.php');
    $title = "Dashboard";

    // $url = "http://localhost:3000/";

    // $data = file_get_contents($url);

    // var_dump($data);
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
            <tr>
                <th>Tool</th>
                <th>Departement</th>
                <th>Users</th>
                <th>Monthly Cost</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Slack</td>
                <td>Communication</td>
                <td>245</td>
                <td>€2,450</td>
                <td>Active</td>
            </tr>
            <tr>
                <td>Figma</td>
                <td>Design</td>
                <td>32</td>
                <td>€480</td>
                <td>Active</td>
            </tr>
            <tr>
                <td>Github</td>
                <td>Engineering</td>
                <td>89</td>
                <td>€890</td>
                <td>Active</td>
            </tr>
            <tr>
                <td>Notion</td>
                <td>Operations</td>
                <td>156</td>
                <td>€780</td>
                <td>Expiring</td>
            </tr>
            <tr>
                <td>Adobe CC</td>
                <td>Marketing</td>
                <td>12</td>
                <td>€720</td>
                <td>Unused</td>
            </td>
            <tr>
                <td>Zoom</td>
                <td>Communications</td>
                <td>198</td>
                <td>€1,980</td>
                <td>Active</td>
            </tr>
            <tr>
                <td>Jira</td>
                <td>Engineering</td>
                <td>67</td>
                <td>€670</td>
                <td>Expiring</td>
            </tr>
            <tr>
                <td>Salesforce</td>
                <td>Sales</td>
                <td>45</td>
                <td>€4,500</td>
                <td>Active</td>
            </tr>
        </tbody>
    </table>
    </div>
</main>
<?php 
    require_once('./composent/footer.php')
?>