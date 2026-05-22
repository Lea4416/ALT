<?php

// The page adapts to each ID

$url = "../hooks/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

// Verify the ID

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Aucun outil sélectionné");
}

$tool = null;

foreach ($data as $item) {

    if ($item['id'] == $id) {

        $tool = $item;
        break;
    }
}

if (!$tool) {
    die("Outil introuvable");
}

if (isset($_POST['update'])) {

    foreach ($data as &$item) {

        if ($item['id'] == $id) {

        // If new push if not get the value in database
            $item['name'] = !empty($_POST['name']) ? $_POST['name'] : $item['name'];
            $item['owner_department'] = !empty($_POST['department']) ? $_POST['department'] : $item['owner_department'];
            $item['monthly_cost'] = !empty($_POST['monthly_cost']) ? $_POST['monthly_cost'] : $item['monthly_cost'];
            $item['active_users_count'] = !empty($_POST['active_user']) ? $_POST['active_user'] : $item['active_users_count'];
            $item['status'] = !empty($_POST['status']) ? $_POST['status'] : $item['status'];
            $item['description'] = !empty($_POST['description']) ? $_POST['description'] : $item['description'];
            $item['category'] = !empty($_POST['category']) ? $_POST['category'] : $item['category'];
            $item['vendor'] = !empty($_POST['vendor']) ? $_POST['vendor'] : $item['vendor'];
            $item['website_url'] = !empty($_POST['web']) ? $_POST['web'] : $item['website_url'];
            $item['icon_url'] = !empty($_POST['icon']) ? $_POST['icon'] : $item['icon_url'];
            $item['updated_at'] = !empty($_POST['updated']) ? $_POST['updated'] : $item['updated_at'];
            $item['previous_month_cost'] = !empty($_POST['cost_month']) ? $_POST['cost_month'] : $item['previous_month_cost'];

            break;
        }
    }

    // Save in json
    file_put_contents(
        $url,
        json_encode($data, JSON_PRETTY_PRINT)
    );

    header("Location: tool_update.php?id=".$id);
    exit();
}


$title = $tool['name'];

require_once('../components/header.php');
require_once('../components/navbar.php');

?>

<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3 text-black"><?= $tool['name'] ?> Form Update</h1>
    
    <!-- Form Updated -->
    <form method="POST">
        <h2 class="font-bold text-l pt-3 underline">General Information</h2>

        <div class="bg-white border gap-1 rounded-lg m-2 flex flex-col items-center">
            <div class="flex flex-col items-center lg:flex-row">
                <label for="name">Names : </label>
                <input class="border m-2 rounded-lg p-2" type="text" name="name" id="name">
                <p>Data present in the database: <?= $tool['name']  ?? 'Not to communicate' ?></p>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="department">Department : </label>
                <select class="border m-2 rounded-lg p-2" name="department" id="department">
                    <option value="engineering">Engineering</option>
                    <option value="design">Design</option>
                    <option value="marketing">Marketing</option>
                    <option value="operations">Operations</option>
                    <option value="communication">Communication</option>
                </select>
                <p>Data present in the database: <?= $tool['owner_department'] ?? 'Not to communicate' ?></p>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="monthly_cost">Monthly Cost : </label>
                <input class="border m-2 rounded-lg p-2" type="number" name="monthly_cost" id="monthly_cost">
                <p>Data present in the database: <?= $tool['monthly_cost'] ?? 'Not to communicate' ?></p>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="active_user">Number active user active : </label>
                <input class="border m-2 rounded-lg p-2" type="number" name="active_user" id="active_user">
                <p>Data present in the database: <?= $tool['active_users_count'] ?? 'Not to communicate' ?></p>
                <hr class="sm:block w-full lg:hidden">
            </div>
            <div class="flex flex-col items-center lg:flex-row">
                <label for="status">Status : </label>
                <select class="border m-2 rounded-lg p-2" name="status" id="status">
                    <option value="active">Active</option>
                    <option value="expiring">Expiring</option>
                    <option value="unused">Unused</option>
                </select>
                <p>Data present in the database: <?= $tool['status'] ?? 'Not to communicate' ?></p>
            </div>
        </div>

        <h2 class="font-bold text-l pt-3 underline">More Information</h2>

        <div class="bg-white border gap-1 rounded-lg justify-items-center m-2">
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="description">Description</label>
                    <input class="border m-2 rounded-lg p-2" type="text" name="description" id="description">
                    <p>Data present in the database: <?= $tool['description'] ?? 'Not to communicate' ?></p>
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
                    <p>Data present in the database: <?= $tool['category'] ?? 'Not to communicate' ?></p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="vendor">Vendor</label>
                    <input class="border m-2 rounded-lg p-2" type="text" id="vendor" name="vendor">
                    <p>Data present in the database: <?= $tool['vendor'] ?? 'Not to communicate' ?></p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="web">Website</label>
                    <input class="border m-2 rounded-lg p-2" type="url" id="web" name="web">
                    <p>Data present in the database: <?= $tool['website_url'] ?? 'Not to communicate' ?></p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="icon">Icon</label>
                    <input class="border m-2 rounded-lg p-2" type="url" id="icon" name="icon">
                    <p>
                        Data present in the database:
                        <?php
                        echo !empty($tool['icon_url'])
                            ? '<a target="_blank" class="underline" href="' . $tool['icon_url'] . '">Lien vers page</a>'
                            : 'Not to communicate';
                        ?>
                    </p>
                    <hr class="sm:block w-full lg:hidden">
                </div>
                <div class="flex flex-col items-center lg:flex-row">
                    <label for="updated">Updated</label>
                    <input class="border m-2 rounded-lg p-2" type="date" id="updated" name="updated">
                    <p>Data present in the database: <?= $tool['updated_at'] ?? 'Not to communicate' ?></p>
                </div>
        </div>

        <h2 class="font-bold text-l pt-3 underline">Accountancy Data</h2>

        <div class="bg-white border gap-1 rounded-lg justify-items-center m-2 ">
            <div class="flex flex-col items-center lg:flex-row">
                <label for="cost_month">Month cost :</label>
                <input class="border m-2 rounded-lg p-2" type="number" id="cost_month" name="cost_month">
                <p>Data present in the database: <?= $tool['previous_month_cost'] ?? 'Not to communicate' ?></p>
            </div>
        </div>
            <div class="flex justify-center">
        <button type="submit" name="update" class="bg-violet-600 rounded-md text-white p-2 m-2">
            Update
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