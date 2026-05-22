<?php

// Title
$title = "Tools";

// Link local data
$url = "../hooks/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

// Message when success adds
if (isset($_GET['success'])) {
    echo "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'C’est fait !',
            text: 'L’outil a été ajouté avec succès'
        });
    </script>
    ";
}

$keyword = trim($_GET['search'] ?? '');

// function search
function searchTools($data, $keyword)
{
    $results = [];

    foreach ($data as $item) {

        if (
            // Setting based on settings
            stripos($item['owner_department'] ?? '', $keyword) !== false ||
            stripos($item['status'] ?? '', $keyword) !== false ||
            stripos($item['monthly_cost'] ?? '', $keyword) !== false ||
            stripos($item['category'] ?? '', $keyword) !== false ||
            stripos($item['name'] ?? '', $keyword) !== false
        ) {
            $results[] = $item;
        }
    }

    return $results;
}

// Search keywords
if ($keyword === '') {
    $results = $data;
} else {
    $results = searchTools($data, $keyword);
}

require_once('../components/header.php');
require_once('../components/navbar.php');

?>

<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3 text-black">Tools</h1>
    <!-- Search form -->
<form method="GET" class="flex justify-center m-4">
    <input
        type="text"
        name="search"
        value="<?= htmlspecialchars($keyword) ?>"
        placeholder="Search tool..."
        class="border p-2 rounded w-1/3">

    <button type="submit" class="bg-violet-600 text-white p-2 rounded ml-2">
        Search
    </button>
</form>

<p class="text-center mb-4">This is the list of tools:</p>

<div class="grid grid-cols-1 lg:grid-cols-4 m-4 p-4 gap-4 rounded-lg">

    <?php if (!empty($results)): ?>

        <!-- For each tools -->
        <?php foreach ($results as $item) : ?>

            <?php
            $status = $item['status'] ?? 'unknown';

            if ($status === "active") {
                $class = "bg-green-500";
            } elseif ($status === "expiring") {
                $class = "bg-red-500";
            } elseif ($status === "unused") {
                $class = "bg-orange-500";
            } else {
                $class = "bg-gray-400";
            }
            ?>

            <div class="bg-white border gap-1 rounded-lg text-center justify-items-center">

                <p class="px-4 py-2">
                    Names : <?= $item['name'] ?? 'Not to communicate' ?>
                </p>

                <p class="px-4 py-2">
                    Department : <?= $item['owner_department'] ?? 'Not to communicate' ?>
                </p>

                <p class="px-4 py-2">
                    Number user active : <?= $item['active_users_count'] ?? 'Not to communicate' ?>
                </p>

                <p class="px-4 py-2">
                    Monthly Cost : <?= $item['monthly_cost'] ?? 'Not to communicate' ?>
                </p>

                <p class="<?= $class ?> rounded-md p-1 w-fit mx-auto text-white">
                    <?= $status ?>
                </p>

                <!-- Setting Buttons -->
                <div>
                    <a href="./tool_detail.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">
                        View details
                    </a>

                    <a href="./tool_update.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">
                        Update the tool
                    </a>

                    <a href="./tool_delete.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">
                        Delete the tool
                    </a>
                </div>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <p class="text-center text-gray-500 col-span-4">
            No tools found
        </p>

    <?php endif; ?>

</div>

<div class="flex justify-center">
    <a href="./tool_add.php" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">Ajout</a>
</div>
</main>

<?php require_once('../components/footer.php'); ?>