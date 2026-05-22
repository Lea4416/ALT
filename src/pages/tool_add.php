<?php

// The page adapts to each ID

$url = "../hooks/data/tools.json";

$response = file_get_contents($url);
$data = json_decode($response, true) ?? [];

// The latest ID and to be able to create a new ID
function getNextId($data)
{
    $max = 0;

    foreach ($data as $item) {
        $id = (int)($item['id'] ?? 0);

        if ($id > $max) {
            $max = $id;
        }
    }

    return $max + 1;
}

// When Add  is press
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {

    // minimum required
    if (
        empty(trim($_POST['name'] ?? '')) ||
        empty(trim($_POST['department'] ?? '')) ||
        empty(trim($_POST['status'] ?? ''))
    ) {
        die("Erreur : données essentielles manquantes");
    }

    $now = date("c");

    // New tools write in json
    $newItem = [
        "id" => getNextId($data),

        "name" => trim($_POST['name'] ?? ''),
        "owner_department" => $_POST['department'] ?? '',
        "monthly_cost" => (int)($_POST['monthly_cost'] ?? 0),
        "active_users_count" => (int)($_POST['active_user'] ?? 0),
        "status" => $_POST['status'] ?? 'unused',

        "description" => trim($_POST['description'] ?? ''),
        "category" => $_POST['category'] ?? '',
        "vendor" => trim($_POST['vendor'] ?? ''),
        "website_url" => $_POST['web'] ?? '',
        "icon_url" => $_POST['icon'] ?? '',

        "created_at" => $now,
        "updated_at" => $now,

        "previous_month_cost" => (int)($_POST['cost_month'] ?? 0)
    ];

    $data[] = $newItem;

    // Save in json
    file_put_contents(
        $url,
        json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    );

    header("Location: Tools.php?success=1");
exit();
}

$title = "Add Tool";

require_once('../components/header.php');
require_once('../components/navbar.php');

?>

<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3"> Add Tool</h1>

    <!-- From information -->
    <form method="POST">
        <h2 class="font-bold text-l pt-3 underline">General Information</h2>

        <div class="bg-white border gap-1 rounded-lg m-2 flex flex-col items-center">
            <div class="flex flex-col items-center lg:flex-row">
                <label for="name">Names : *</label>
                <input class="border m-2 rounded-lg p-2" type="text" name="name" id="name">
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="department">Department : *</label>
                <select class="border m-2 rounded-lg p-2" name="department" id="department">
                    <option value="engineering">Engineering</option>
                    <option value="design">Design</option>
                    <option value="marketing">Marketing</option>
                    <option value="operations">Operations</option>
                    <option value="communication">Communication</option>
                </select>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="monthly_cost">Monthly Cost : </label>
                <input class="border m-2 rounded-lg p-2" type="number" name="monthly_cost" id="monthly_cost">
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="active_user">Number active user active : </label>
                <input class="border m-2 rounded-lg p-2" type="number" name="active_user" id="active_user">
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="status">Status : *</label>
                <select class="border m-2 rounded-lg p-2" name="status" id="status">
                    <option value="active">Active</option>
                    <option value="expiring">Expiring</option>
                    <option value="unused">Unused</option>
                </select>
            </div>
        </div>

        <h2 class="font-bold text-l pt-3 underline">More Information</h2>

        <div class="bg-white border gap-1 rounded-lg justify-items-center m-2">
            <div class="flex flex-col items-center lg:flex-row">
                <label for="description">Description</label>
                <input class="border m-2 rounded-lg p-2" type="text" name="description" id="description">
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
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="vendor">Vendor</label>
                <input class="border m-2 rounded-lg p-2" type="text" id="vendor" name="vendor">
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="web">Website</label>
                <input class="border m-2 rounded-lg p-2" type="url" id="web" name="web">
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="icon">Icon</label>
                <input class="border m-2 rounded-lg p-2" type="url" id="icon" name="icon">
            </div>
        </div>

        <h2 class="font-bold text-l pt-3 underline">Accountancy Data</h2>

        <div class="bg-white border gap-1 rounded-lg justify-items-center m-2 ">
            <div class="flex flex-col items-center lg:flex-row">
                <label for="cost_month">Month cost :</label>
                <input class="border m-2 rounded-lg p-2" type="number" id="cost_month" name="cost_month">
            </div>
            <p>* required to be validate</p>
        </div>
        <div class="flex justify-center">
            <button type="submit" name="add" class="bg-violet-600 rounded-md text-white p-2 m-2">
                Add
            </button>
        </div>
    </form>
    <div class="flex justify-center">
        <a href="./Tools.php" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">Back to tools</a>
    </div>

</main>
<?php
require_once('../components/footer.php');
?>