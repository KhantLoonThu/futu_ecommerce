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

        <!-- main dashboard -->
        <div class="w-full h-screen z-0"></div>

        <!-- footer -->
        <footer class="text-center text-gray-400 dark:text-gray-50 py-3">
            <h5 class="text-[14px]">&copy; copyright reserved 2024 FUTU ™</h5>
        </footer>
    </section>
</main>



<script src="../../public/main.js"></script>
</body>

</html>