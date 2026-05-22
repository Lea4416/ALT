<?php

// Title
$title = "Dashboard";

// Link url with the condition date updates and limited 8
$url = "https://tt-jsonserver-01.alt-tools.tech/tools?_sort=updated_date&_order=desc&_limit=8";

// $url = "../Documentation/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

require_once('../components/header.php');
require_once('../components/navbar.php');

?>

<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3 text-black">Internal Dahboard</h1>
    <p>Monitor and manage your organization's software tools and expenses</p>
    
    <!-- No reactivity given, hard to enter -->

    <div class="grid grid-cols-1 lg:grid-cols-4 m-4">
        
    <!-- Monthly Budget -->

        <div class="bg-white p2 items-start p-6 rounded-md mx-1 shadow-sm">
            <div class="flex justify-between">
                <p class="pb-3">Monthly Budget</p>
                <div class="bg-green-600 rounded-md w-10 h-10"><img class="p-1" src="../styles/Asset/bourse.png" alt="Increase Budget"></div>
            </div>
            <p class="text-lg"><span class="font-bold">€28,750</span>/€30k</p>
            <p class="bg-green-600 text-white py-1 px-2 rounded-md w-fit text-xs">+12%</p>
        </div>
        
    <!-- Active Tools -->
        <div class="bg-white p2 items-start p-6 rounded-md mx-1 shadow-sm">
            <div class="flex justify-between">
                <p class="pb-3">Active Tools</p>
                <div class="bg-violet-600 rounded-md w-10 h-10"><img class="p-1" src="../styles/Asset/cle_plate.png" alt="Tools"></div>
            </div>
            <p class="text-lg font-bold">147</p>
            <p class="bg-violet-600 text-white py-1 px-2 rounded-md w-fit text-xs">+8</p>
        </div>

        <!-- Departments -->
        <div class="bg-white p2 items-start p-6 rounded-md mx-1 shadow-sm">
                <div class="flex justify-between">
                    <p class="pb-3">Departments</p>
                    <div class="bg-red-600 rounded-md w-10 h-10"><img class="p-1" src="../styles/Asset/department.png" alt="Departement"></div>
                </div>
                <p class="text-lg font-bold">8</p>
                <p class="bg-red-600 text-white py-1 px-2 rounded-md w-fit text-xs">+2</p>
        </div>

        <!-- Cost/User -->
            <div class="bg-white p2 items-start p-6 rounded-md mx-1 shadow-sm">
                <div class="flex justify-between">
                    <p class="pb-3">Cost/User</p>
                    <div class="bg-pink-600 rounded-md w-10 h-10"><img class="p-1" src="../styles/Asset/users.png" alt="User"></div>
                </div>
                <p class="text-lg font-bold">€156</p>
                <p class="bg-pink-600 text-white py-1 px-2 rounded-md w-fit text-xs">-€12</p>
            </div>
        </div>

    <!-- Table Tools limited by 8 -->
    <div class="bg-white rounded-lg p-4">
        <div class="flex justify-between">
            <h2 class="font-bold">Recent Tools</h2>
            <div class="flex items-center">
                <img class="h-8 w-8" src="../styles/Asset/calendrier.png" alt="Calendar">
                <p>last 30 days</p>
            </div>
        </div>

        <table class="w-full text-start m-3 p-4 sm:text-sm">
            <thead>
                <tr>
                    <!-- Head -->
                    <th class="text-start font-normal px-4 py-2">Tool</th>
                    <th class="text-start font-normal px-4 py-2 hidden sm:table-cell">Departements</th>
                    <th class=" text-start font-normal px-4 py-2 hidden sm:table-cell">Users</th>
                    <th class="text-start font-normal px-4 py-2 hidden sm:table-cell">Monthly Cost</th>
                    <th class="text-start font-normal px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody class="m-10">
                <?php foreach ($data as $item): ?>
                    <tr class="border-t border-b border-gray-300">
                        <td class="px-4 py-2">
                            <!-- Calcul pour l'image -->
                            <?php if (!empty($item['icon_url'])): ?>
                                <img
                                    class="w-10 h-10 rounded"
                                    src="<?= $item['icon_url'] ?>"
                                    alt=""
                                    onerror="this.style.display='none'">
                            <?php endif; ?>
                            <?= $item['name'] ?>
                        </td>
                        <!-- Departments -->
                        <td class="px-4 py-2 hidden sm:table-cell"><?= $item['owner_department'] ?? 'Not to communicate' ?></td>
                        <!-- Number active users -->
                        <td class=" px-4 py-2 hidden sm:table-cell"><?= $item['active_users_count'] ?? 'Not to communicate' ?></td>
                        <!-- Monthly cost -->
                        <td class="px-4 py-2 hidden sm:table-cell"><?= $item['monthly_cost'] ?? 'Not to communicate' ?></td>
                        <!-- Status -->
                        <?php
                        $status = $item['status'];
                        if ($status === "active") {
                            $class = "bg-green-500";
                        } elseif ($status === "expiring") {
                            $class = "bg-red-500";
                        } elseif ($status === "unused") {
                            $class = "bg-orange-500";
                        } else {
                            echo "Il y a un probléme de status";
                            die();
                        }
                        ?>
                        <td class="px-4 py-2">
                            <span class="<?= $class ?> rounded-md p-1 my-1">
                                <?= $item['status'] ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php
require_once('../components/footer.php');
?>