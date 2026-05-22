<?php
require_once('./composent/header.php');
$title = "Dashboard";

// $url = "http://localhost:3000/";

// $data = file_get_contents($url);

// var_dump($data);
?>
<nav class="flex justify-between items-center p-4 bg-white shadow">

    <div class="flex items-center gap-6">

        <img class="h-10 w-10 bg-gradient-to-r from-blue-400 to-violet-600 rounded-lg p-2.5"
            src="./Asset/eclair.png"
            alt="Eclair">

        <a href="./Dashboard.php">Dashboard</a>
        <a href="#">Tools</a>
        <a href="#">Analytics</a>
        <a href="#">Settings</a>

    </div>

    <div class="flex items-center gap-4">

        <input class="border border-black rounded-lg px-2 py-1"
            type="search"
            placeholder="Search">

        <button><img class="h-8 w-8" src="./Asset/lune.png" alt="Lune"></button>
        <button><img class="h-8 w-8" src="./Asset/notification.png" alt="Notification"></button>
        <button><img class="h-8 w-8" src="./Asset/parametre.png" alt="Paramètres"></button>

        <button>
            <div class="h-8 w-8 bg-gray-100 rounded-full"></div>
        </button>

        <button>▼</button>

    </div>

</nav>
<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3">Internal Tools Dahboard</h1>
    <p>Monitor and manage your organization's software tools and expenses</p>
    <div class="grid grid-cols-4 m-4">
        <div class="bg-white p2 items-start p-6 rounded-md mx-1 shadow-sm">
            <div class="flex justify-between">
                <p class="pb-3">Monthly Budget</p>
                <div class="bg-green-600 rounded-md w-10 h-10"><img class="p-1" src="./Asset/bourse.png" alt="Increase Budget"></div>
            </div>
            <!-- Fléche vert plus haut avec deux angles un bas et un haut -->
            <p class="text-lg"><span class="font-bold">€28,750</span>/€30k</p>
            <p class="bg-green-600 text-white py-1 px-2 rounded-md w-fit text-xs">+12%</p>
        </div>
        <div class="bg-white p2 items-start p-6 rounded-md mx-1 shadow-sm">
            <div class="flex justify-between">
                <p class="pb-3">Active Tools</p>
                <div class="bg-violet-600 rounded-md w-10 h-10"><img class="p-1" src="./Asset/cle_plate.png" alt="Tools"></div>
            </div>
            <!-- Cléfs blanche fond violet -->
            <p class="text-lg font-bold">147</p>
            <p class="bg-violet-600 text-white py-1 px-2 rounded-md w-fit text-xs">+8</p>
        </div>
        <div class="bg-white p2">
            <div class="bg-white p2 items-start p-6 rounded-md mx-1 shadow-sm">
                <div class="flex justify-between">
                    <p class="pb-3">Departements</p>
                    <div class="bg-red-600 rounded-md w-10 h-10"><img class="p-1" src="./Asset/department.png" alt="Departement"></div>
                </div>
                <!-- Immeuble blanc fond rouge -->
                <p class="text-lg font-bold">8</p>
                <p class="bg-red-600 text-white py-1 px-2 rounded-md w-fit text-xs">+2</p>
            </div>
        </div>
        <div class="bg-white p2">
            <div class="bg-white p2 items-start p-6 rounded-md mx-1 shadow-sm">
                <div class="flex justify-between">
                    <p class="pb-3">Cost/User</p>
                    <div class="bg-pink-600 rounded-md w-10 h-10"><img class="p-1" src="./Asset/users.png" alt="User"></div>
                </div>
                <!-- Immeuble blanc fond rouge -->
                <p class="text-lg font-bold">€156</p>
                <p class="bg-pink-600 text-white py-1 px-2 rounded-md w-fit text-xs">-€12</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg p-4">
        <div class="flex justify-between">
            <h2 class="font-bold">Recent Tools</h2>
            <div class="flex items-center">
            <img class="h-8 w-8" src="./Asset/calendrier.png" alt="Calendar">
            <p>last 30 days</p>
            </div>
        </div>
        <table class="w-full text-start">
            <thead>
                <tr>
                    <th class="text-start font-normal">Tool</th>
                    <th class="text-start font-normal">Departement</th>
                    <th class="text-start font-normal">Users</th>
                    <th class="text-start font-normal">Monthly Cost</th>
                    <th class="text-start font-normal">Status</th>
                </tr>
            </thead>
            <tbody class="m-10">
                <tr class="border-t border-b border-gray-300">
                    <td>Slack</td>
                    <td>Communication</td>
                    <td>245</td>
                    <td>€2,450</td>
                    <td>Active</td>
                </tr>
                <tr class="border-t border-b border-gray-300">
                    <td>Figma</td>
                    <td>Design</td>
                    <td>32</td>
                    <td>€480</td>
                    <td>Active</td>
                </tr>
                <tr class="border-t border-b border-gray-300">
                    <td>Github</td>
                    <td>Engineering</td>
                    <td>89</td>
                    <td>€890</td>
                    <td>Active</td>
                </tr>
                <tr class="border-t border-b border-gray-300">
                    <td>Notion</td>
                    <td>Operations</td>
                    <td>156</td>
                    <td>€780</td>
                    <td>Expiring</td>
                </tr>
                <tr class="border-t border-b border-gray-300">
                    <td>Adobe CC</td>
                    <td>Marketing</td>
                    <td>12</td>
                    <td>€720</td>
                    <td>Unused</td>
                </tr>
                <tr class="border-t border-b border-gray-300">
                    <td>Zoom</td>
                    <td>Communications</td>
                    <td>198</td>
                    <td>€1,980</td>
                    <td>Active</td>
                </tr>
                <tr class="border-t border-b border-gray-300">
                    <td>Jira</td>
                    <td>Engineering</td>
                    <td>67</td>
                    <td>€670</td>
                    <td>Expiring</td>
                </tr>
                <tr class="border-t border-gray-300">
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