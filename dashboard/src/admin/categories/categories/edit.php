<?php

session_start();

use Admin\Controlller\CategoryController;

include_once __DIR__ . '/../../controller/CategoryController.php';
include_once __DIR__ . '/../../../layouts/admin/config.php';

$admin = $_SESSION['main_admin'];
if (!isset($_SESSION['main_admin'])) {
    header("location:" . BASE_URL . "/admin/login.php"); // Redirect to login page if not logged in
    exit;
}

// print_r($admin);
$currentCategory = intval($_GET['id']);
$category_controller = new CategoryController();
$category_edit = $category_controller->getCurrentCategory(($currentCategory));

// sending category to database
if (isset($_POST['add_category_btn'])) {
    $error = false; //init error 

    // name validate
    if (!empty($_POST['category_name'])) {
        $category_name = trim(strtolower(($_POST['category_name'])));
    } else {
        $error = true;
        $category_name_error = 'Please Fill Category Name';
    }

    // sending to database
    if (!$error) {
        $alreadyExist = $category_controller->getExistingCategory($category_name);

        if ($alreadyExist['total'] == 0) {
            $category_controller->updateCategory($currentCategory, $category_name);
            $category_name = "";
            $_SESSION['edit_success'] = 'true';
            header("location:./index.php");
            exit;
        } else {
            $_SESSION['edit_success'] = 'false';
            header("location:./index.php");
            exit;
        }
    }
}
?>

<!-- doctype html -->
<?php include_once __DIR__ . '/../../../layouts/admin/html.php';
?>

<main class="relative">
    <header>
        <!-- sidebar -->
        <?php
        include_once __DIR__ . '/../../../layouts/admin/sidebar.php';
        ?>
    </header>

    <section
        class="bg-gray-100 h-screen dark:bg-gray-900 dark:text-white main-part lg:w-5/6 md:w-5/6 sm:w-full ms-auto transition-all ease-linear duration-300">
        <!-- navbar -->
        <?php include_once __DIR__ . '/../../../layouts/admin/navbar.php'; ?>

        <!-- main category -->
        <div class="my-[50px] overflow-y-auto max-w-screen-lg mx-auto flex justify-center items-center h-[70vh]">
            <div>
                <h2 class="text-[32px] font[500] mb-[30px]">Edit Category</h2>
                <div class="border-2 p-5 border-gray-300 dark:border-gray-600 rounded-lg">
                    <form method="post">
                        <div class="mt-3">
                            <label for="category-name">Current Category Name *</label>
                            <input
                                class="text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300 focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear duration-300"
                                type="text" name="category_name" id="category-name"
                                value="<?php if (isset($category_edit)) echo $category_edit['name'] ?>">
                            <span class="text-rose-600">
                                <?php
                                if (isset($category_name_error)) {
                                    echo $category_name_error;
                                }
                                ?>
                            </span>

                        </div>
                        <div class="mt-3 flex justify-between items-center">
                            <button name="add_category_btn"
                                class="mt-5 transition-all duration-300 ease-linear px-5 py-3 border-2 bg-sky-500 text-white hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white border-sky-500 dark:border-sky-500 dark:text-white hover:text-sky-500 rounded-lg">Upload
                                Category</button>
                            <a href="<?= BASE_URL; ?>/admin/categories/categories/index.php"
                                class="rounded-lg mt-5 px-5 py-3 border-2 border-gray-400 dark:border-gray-300">Back to
                                Category</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- footer -->
        <footer class="text-center text-gray-400 dark:text-gray-50 py-3">
            <h5 class="text-[14px]">&copy; copyright reserved 2024 FUTU ™</h5>
        </footer>
    </section>
</main>



<script src="../../../../public/main.js"></script>
</body>

</html>