<nav class="bg-white shadow p-4">

    <div class="flex justify-between items-center">
        <div class="flex items-center content-center gap-1">
            <a href="./Dashboard.php"><img class="h-10 w-10 bg-gradient-to-r from-blue-400 to-violet-600 rounded-lg p-2.5"
            src="../styles/Asset/eclair.png"
            alt="Eclair"></a>
        <h1 class="font-bold text-xl pt-3 text-black">Techcorp</h1>
        <button id="burger" class="lg:hidden">
            ☰
        </button>
            <div class="hidden lg:flex gap-6 items-center">
            <a href="./Dashboard.php">Dashboard</a>
            <a href="./Tools.php">Tools</a>
            <a href="#">Analytics</a>
            <a href="#">Settings</a>
        </div>

        </div>
        <div class="hidden lg:flex gap-4 items-center">
            <button><img class="h-8 w-8" src="../styles/Asset/lune.png"></button>
            <button><img class="h-8 w-8" src="../styles/Asset/notification.png"></button>
            <button><img class="h-8 w-8" src="../styles/Asset/parametre.png"></button>
            <div class="h-8 w-8 bg-gray-100 rounded-full"></div>
        </div>

    </div>

    <div id="mobileMenu" class="hidden flex-col gap-4 mt-4 lg:hidden">
        <a href="./Dashboard.php">Dashboard</a>
        <a href="./Tools.php">Tools</a>
        <a href="./Analytics.php">Analytics</a>
        <a href="#">Settings</a>

        <div class="flex flex-col gap-4 pt-4 lg:flex-row lg:items-center">
            <button><img class="h-8 w-8" src="../styles/Asset/lune.png"></button>
            <button><img class="h-8 w-8" src="../styles/Asset/notification.png"></button>
            <button><img class="h-8 w-8" src="../styles/Asset/parametre.png"></button>
        </div>
    </div>

</nav>

<script>
const burger = document.getElementById("burger");
const menu = document.getElementById("mobileMenu");

burger.addEventListener("click", () => {
    menu.classList.toggle("hidden");
    menu.classList.toggle("flex");
});
</script>