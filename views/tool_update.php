<?php

$url = "../Documentation/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

$id = $_GET['id'] ?? null;

// var_dump($id);

if (!$id) {
    die("Aucun outil sélectionné");
}

$tool = null;



foreach ($data as $item) {
    if ($item['id'] == $id) {
        // var_dump($item);
        $tool = $item;
        // var_dump($tool);
        break;
    }
}

if (!$tool) {
    die("Outil introuvable");
}

// var_dump($item);

$title = $item['name'];

require_once('./composent/header.php');
require_once('./composent/navbar.php');

?>
<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3"><?= $item['name'] ?> Form Update</h1>

    <form action="GET">
        <h2 class="font-bold text-l pt-3 underline">General Information</h2>

        <div class="bg-white border gap-1 rounded-lg m-2 flex flex-col items-center">
            <div class="flex flex-col items-center lg:flex-row">
                <label for="name">Names : </label>
                <input class="border m-2 rounded-lg p-2" type="text" name="name" id="name">
                <p>Data present in the database: <?= $item['name']  ?? 'Not to communicate' ?></p>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="department">Department : </label>
                <select class="border m-2 rounded-lg p-2" name="departement" id="departement">
                    <option value="engineering">Engineering</option>
                    <option value="design">Design</option>
                    <option value="marketing">Marketing</option>
                    <option value="operations">Operations</option>
                    <option value="communication">Communication</option>
                </select>
                <p>Data present in the database: <?= $item['owner_department'] ?? 'Not to communicate' ?></p>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="monthly_cost">Monthly Cost : </label>
                <input class="border m-2 rounded-lg p-2" type="int" name="monthly_cost" id="monthly_cost">
                <p>Data present in the database: <?= $item['monthly_cost'] ?? 'Not to communicate' ?></p>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="active_user">Number active user active : </label>
                <input class="border m-2 rounded-lg p-2" type="int" name="active_user" id="active_user">
                <p>Data present in the database: <?= $item['active_users_count'] ?? 'Not to communicate' ?></p>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="status">Status : </label>
                <select class="border m-2 rounded-lg p-2" name="status" id="status">
                    <option value="active">Active</option>
                    <option value="expiring">Expiring</option>
                    <option value="unused">Unused</option>
                </select>
                <p>Data present in the database: <?= $item['status'] ?? 'Not to communicate' ?></p>
            </div>
        </div>

        <h2 class="font-bold text-l pt-3 underline">More Information</h2>

        <div class="bg-white border gap-1 rounded-lg justify-items-center m-2">

            <ul class="list-disc ml-5">
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="id">Id</label>
                    <input class="border m-2 rounded-lg p-2" type="int" name="id" id="name">
                    <p>Data present in the database: <?= $item['id'] ?? 'Not to communicate' ?></p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="description">Description</label>
                    <input class="border m-2 rounded-lg p-2" type="text" name="description" id="description">
                    <p>Data present in the database: <?= $item['description'] ?? 'Not to communicate' ?></p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="category">Category : </label>
                    <select class="border m-2 rounded-lg p-2" name="category" id="category">
                        <option value="engineering">Analytics</option>
                        <option value="design">Design</option>
                        <option value="marketing">Marketing</option>
                        <option value="development">Development</option>
                        <option value="finance">Finance</option>
                        <option value="communication">Communication</option>
                        <option value="hr">HR</option>
                        <option value="infrastructure">Infrastructure</option>
                        <option value="productivity">Productivity</option>
                        <option value="security">Security</option>
                    </select>
                    <p>Data present in the database: <?= $item['category'] ?? 'Not to communicate' ?></p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="vendor">Vendor</label>
                    <input class="border m-2 rounded-lg p-2" type="text" id="vendor" name="vendor">
                    <p>Data present in the database: <?= $item['vendor'] ?? 'Not to communicate' ?></p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="web">Website</label>
                    <input class="border m-2 rounded-lg p-2" type="url" id="web" name="web">
                    <p>Data present in the database: <?= $item['website_url'] ?? 'Not to communicate' ?></p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="icon">Icon</label>
                    <input class="border m-2 rounded-lg p-2" type="url" id="icon" name="icon">
                    <p>
                        Data present in the database:
                        <?php
                        echo !empty($item['icon_url'])
                            ? '<a target="_blank" class="underline" href="' . $item['icon_url'] . '">Lien vers page</a>'
                            : 'Not to communicate';
                        ?>
                    </p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="updated">Updated</label>
                    <input class="border m-2 rounded-lg p-2" type="date" id="updated" name="updated">
                    <p>Data present in the database: <?= $item['updated_at'] ?? 'Not to communicate' ?></p>
                    <!-- <hr class="sm:block w-full lg:hidden"> -->
                </div>
        </div>

        <h2 class="font-bold text-l pt-3 underline">Accountancy Data</h2>

        <div class="bg-white border gap-1 rounded-lg justify-items-center m-2 ">

            <div class="flex flex-col items-center lg:flex-row">
                <label for="active_user">Active User Count</label>
                <input class="border m-2 rounded-lg p-2" type="int" id="active_user" name="active_user">
                <p>Data present in the database: <?= $item['active_users_count'] ?? 'Not to communicate' ?></p>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="cost_month">Month cost :</label>
                <input class="border m-2 rounded-lg p-2" type="text" id="cost_month" name="cost_month">
                <p>Data present in the database: <?= $item['previous_month_cost'] ?? 'Not to communicate' ?></p>
            </div>
        </div>
    </form>

    <div class="flex justify-center">
        <button class="bg-violet-600 rounded-md text-white p-2 m-2">
            Update
        </button>
    </div>
    <div class="flex justify-center">
        <a href="./Tools.php" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">Retour à la liste d'objet</a>
    </div>

</main>
<?php
require_once('./composent/footer.php');
?>