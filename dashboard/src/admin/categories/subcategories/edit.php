<?php

session_start();

use Admin\Controlller\SubcategoryController;
use Admin\Controlller\CategoryController;

include_once __DIR__ . '/../../../layouts/admin/config.php';
include_once __DIR__ . '/../../controller/SubcategoryConroller.php';
include_once __DIR__ . '/../../controller/CategoryController.php';

$admin = $_SESSION['main_admin'];
if (!isset($_SESSION['main_admin'])) {
    header("location:" . BASE_URL . "/admin/login.php"); // Redirect to login page if not logged in
    exit;
}

$category_controller = new CategoryController();
$categories = $category_controller->getAllCategories();

$subcategory_controller = new SubcategoryController();
$id = intval($_GET['id']);
$cate_id = intval($_GET['cate_id']);
$current_subcategory = $subcategory_controller->getCurrentSubcategory($id, $cate_id);

// form validation and sending to database
if (isset($_POST['add_subcategory_btn'])) {
    $error = false;
    // checking if there's category name
    if (!empty($_POST['category_name'])) {
        $category_name = intval($_POST['category_name']);
    } else {
        $error = true;
        $category_name_error = 'Please Select Category Name';
    }

    // checking if there's subcategory name
    if (!empty($_POST['subcategory_name'])) {
        $subcategory_name = trim(strtolower(($_POST['subcategory_name'])));
    } else {
        $error = true;
        $subcategory_name_error = 'Please Select Category Name';
    }

    // sending to db
    if (!$error) {
        // checking if there is already existed
        $alreadyExisted = $subcategory_controller->getExistingSubcategory($subcategory_name, $category_name); // it was id, wrong declaring variablename

        if ($alreadyExisted['total'] == 0 && $category_name == $current_subcategory['category_id']) {
            $status = $subcategory_controller->updateSubcategory($id, $subcategory_name, $category_name);
            $subcategory_name = "";
            header('location:./index.php?sub_edit_success=true');
            exit;
        } else {
            header('location:./index.php?sub_edit_success=false');
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
                <h2 class="text-[32px] font[500] mb-[30px]">Edit Subcategory</h2>
                <div class="border-2 p-5 border-gray-300 dark:border-gray-600 rounded-lg">
                    <form method="post">
                        <div class="mt-3">
                            <label for="category-name">Category Name *</label>
                            <select class=" text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300
                                focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none
                                dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear
                                duration-300" name="category_name" id="category-name">
                                <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"
                                    <?php if ($current_subcategory['category_id'] == $category['id']) echo 'selected'; ?>>
                                    <?= $category['name'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-rose-600">
                                <?php
                                if (isset($category_name_error)) {
                                    echo $category_name_error;
                                }
                                ?>
                            </span>

                        </div>
                        <div class="mt-3">
                            <label for="subcategory-name">Subcategory Name *</label>
                            <input
                                class="text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300 focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear duration-300"
                                type="text" name="subcategory_name" id="subcategory-name"
                                value="<?php if (isset($current_subcategory)) echo $current_subcategory['name'] ?>">
                            <span class="text-rose-600">
                                <?php
                                if (isset($subcategory_name_error)) {
                                    echo $subcategory_name_error;
                                }
                                ?>
                            </span>

                        </div>
                        <div class="mt-3 flex justify-between items-center">
                            <button name="add_subcategory_btn"
                                class="mt-5 transition-all duration-300 ease-linear px-5 py-3 border-2 bg-sky-500 text-white hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white border-sky-500 dark:border-sky-500 dark:text-white hover:text-sky-500 rounded-lg">Update
                                Subategory</button>
                            <a href="<?= BASE_URL; ?>/admin/categories/subcategories/index.php"
                                class="rounded-lg mt-5 px-5 py-3 border-2 border-gray-400 dark:border-gray-300">Back to
                                Subcategory</a>
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