<?php

session_start();

include_once __DIR__ . '/../layouts/admin/config.php';

$admin = $_SESSION['main_admin'];
if (!isset($_SESSION['main_admin'])) {
    header("location:" . BASE_URL . "/admin/login.php"); // Redirect to login page if not logged in
    exit;
}
// print_r($admin);

?>

<!-- doctype html -->
<?php include_once __DIR__ . '/../layouts/admin/html.php'; ?>

<main class="relative">
    <header>
        <!-- sidebar -->
        <?php
        include_once __DIR__ . '/../layouts/admin/sidebar.php';
        ?>
    </header>

    <section class="dark:bg-gray-900 dark:text-white main-part lg:w-5/6 md:w-5/6 sm:w-full ms-auto transition-all ease-linear duration-300">
        <!-- navbar -->
        <?php include_once __DIR__ . '/../layouts/admin/navbar.php'; ?>

        <!-- profile -->
        <div class="w-full max-w-screen-sm mx-auto z-10 my-[100px] pb-[27px]">
            <div class="p-5">
                <div class="flex justify-center items-center mb-[20px]">
                    <img class="w-28 h-28 border-2 border-gray-600 dark:border-gray-300 rounded-lg" src="../../public/images/<?= $admin[0]['image'] ?>" alt="admin_image">
                </div>
                <div class="p-5 text-center">
                    <h2 class="text-[20px] pb-[20px]"><?= $admin[0]['name'] ?></h2>
                    <h3 class="pb-[10px]"><?= $admin[0]['email'] ?></h3>
                    <h3 class="pb-[10px]"><?= $admin[0]['address'] ?></h3>
                </div>
                <div class="text-center mt-[30px]">
                    <a href="<?= BASE_URL; ?>/admin/index.php" class="rounded-lg px-8 py-4 border-2 border-gray-400 dark:border-gray-300">Back to
                        Dashboard</a>
                </div>
            </div>
        </div>

        <!-- footer -->
        <footer class="text-center text-gray-400 dark:text-gray-50 py-3">
            <h5 class="text-[14px]">&copy; copyright reserved 2024 FUTU ™</h5>
        </footer>
    </section>
</main>



<script src="../../public/main.js"></script>
</body>

</html>