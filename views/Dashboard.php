<?php
require_once('./composent/header.php');

$title = "Dashboard";

$url = "../Documentation/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

require_once('./composent/navbar.php');

?>

<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3">Internal Tools Dahboard</h1>
    <p>Monitor and manage your organization's software tools and expenses</p>
    <div class="grid grid-cols-1 lg:grid-cols-4 m-4">
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

        <table class="w-full text-start m-3 p-4 sm:text-sm">
            <thead>
                <tr>
                    <th class="text-start font-normal px-4 py-2">Tool</th>
                    <th class="text-start font-normal px-4 py-2 hidden sm:table-cell"">Departement</th>
                    <th class="text-start font-normal px-4 py-2 hidden sm:table-cell">Users</th>
                    <th class="text-start font-normal px-4 py-2 hidden sm:table-cell">Monthly Cost</th>
                    <th class="text-start font-normal px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody class="m-10">
                <?php foreach ($data as $item): ?>
                    <tr class="border-t border-b border-gray-300">
                        <td class="px-4 py-2"><?= $item['name'] ?></td>
                        <td class="px-4 py-2 hidden sm:table-cell""><?= $item['owner_department'] ?></td>
                        <td class="px-4 py-2 hidden sm:table-cell"><?= $item['active_users_count'] ?></td>
                        <td class="px-4 py-2 hidden sm:table-cell"><?= $item['monthly_cost'] ?></td>
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
require_once('./composent/footer.php');
?>