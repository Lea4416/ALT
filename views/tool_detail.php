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
<h1 class="font-bold text-xl pt-3"><?=  $item['name'] ?></h1>

<h2 class="font-bold text-l pt-3 underline">Géneral Information</h2>

<div class="bg-white border gap-1 rounded-lg justify-items-center m-2">

<ul class="list-disc ml-5">
    <li>Name : <?= $item['name'] ?></li>
    <li>Departement : <?= $item['owner_department'] ?></li>
    <li>Monthly Cost : <?= $item['monthly_cost'] ?></li>
    <li>Number active user active : <?= $item['active_users_count'] ?></li>
    <li>Status : <?= $item['status'] ?></li>
</ul>

</div>

<h2 class="font-bold text-l pt-3 underline">More Information</h2>

<div class="bg-white border gap-1 rounded-lg justify-items-center m-2">

<ul class="list-disc ml-5">
    <li>Id : <?= $item['id'] ?></li>
    <li>Description : <?= $item['description'] ?></li>
    <li>Category : <?= $item['category'] ?></li>
    <li>Vendor : <?= $item['vendor'] ?></li>
    <li>Website (url) : <?= $item['website_url'] ?></li>
        <li class="flex items-center gap-2">
        <span>Icon :</span>

        <?php if (!empty($item['icon_url'])): ?>
            <img
                class="w-10 h-10 rounded"
                src="<?= $item['icon_url'] ?>"
                alt=""
                onerror="this.style.display='none'"
            >
        <?php endif; ?>
    </li>
    <li>Created at : <?= $item['created_at'] ?></li>
    <li>Updated at : <?= $item['updated_at'] ?></li>
</ul>
</div>

<h2 class="font-bold text-l pt-3 underline">Accountancy Data</h2>

<div class="bg-white border gap-1 rounded-lg justify-items-center m-2 ">

<ul class="list-disc ml-5">
    <li>Active Users Count : <?= $item['active_users_count'] ?></li>
    <li>Previous month : <?= $item['previous_month_cost'] ?></li>
</ul>
</div>
<div class="flex justify-center">
<a href="./tool_update.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">Update the tool</a>
<a href="./tool_delete.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">Delete tool</a>
</div>


</main>
<?php
require_once('./composent/footer.php');
?>


