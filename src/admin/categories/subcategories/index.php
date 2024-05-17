<?php

use Admin\Controlller\SubcategoryController;

session_start();

include_once __DIR__ . '/../../../layouts/admin/config.php';
include_once __DIR__ . "/../../controller/SubcategoryConroller.php";

if (!isset($_SESSION['main_admin'])) {
    header("location:" . BASE_URL . "/admin/login.php"); // Redirect to login page if not logged in
    exit;
}

$subcategory_controller = new SubcategoryController();
$subcategories = $subcategory_controller->getAllSubcategoryWithCategory();

// create alert
$create_alert = isset($_GET['sub_create_success']) ? $_GET['sub_create_success'] : null;
if ($create_alert !== null) { // Check if the parameter exists before unsetting it
    unset($_GET['sub_create_success']); // Unset the parameter after reading it

    if ($create_alert == 'true') {
        echo "<script> alert('Subcategory Successfully Created!'); </script>";
    } else {
        echo "<script> alert('Subcategory Already Exists!'); </script>";
    }
}

// edit alert
$edit_alert = isset($_GET['sub_edit_success']) ? $_GET['sub_edit_success'] : null;
if ($edit_alert !== null) { // Check if the parameter exists before unsetting it
    unset($_GET['sub_edit_success']); // Unset the parameter after reading it

    if ($edit_alert == 'true') {
        echo "<script> alert('Subcategory Successfully Edited!'); </script>";
    } else {
        echo "<script> alert('Subcategory Already Exists!'); </script>";
    }
}

$delete_alert = isset($_GET['sub_delete_success']) ? $_GET['sub_delete_success'] : null;
if ($delete_alert !== null) {
    unset($_GET['sub_delete_success']);

    if ($delete_alert == 'true') {
        echo "<script> alert('Subcategory Deleted Successfully!'); </script>";
    } else {
        echo "<script> alert('Subcategory Cannot be Deleted!'); </script>";
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

    <section class="bg-gray-100 dark:bg-gray-900 dark:text-white main-part lg:w-5/6 md:w-5/6 sm:w-full ms-auto transition-all ease-linear duration-300">
        <!-- navbar -->
        <?php include_once __DIR__ . '/../../../layouts/admin/navbar.php'; ?>

        <!-- main category -->
        <div class="w-full my-[50px]">
            <div class="lg:max-w-screen-lg sm:max-w-screen-sm mx-auto">
                <h2 class="text-[32px] font-[500] pb-[10px] text-gray-600">Subcategories Information</h2>
                <div class="mt-10">
                    <a href="<?= BASE_URL ?>/admin/categories/subcategories/create.php" class="transition-all duration-300 ease-linear px-5 py-3 border-2 bg-sky-500 text-white hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white border-sky-500 dark:border-sky-500 dark:text-white hover:text-sky-500 rounded-lg">
                        Add New Subcategory
                    </a>
                </div>
                <div class="mt-10">
                    <table class="w-full border-2 dark:text-white border-gray-300 dark:border-gray-500">
                        <thead class="border-b-2 border-b-gray-300 dark:border-b-gray-500">
                            <tr class="text-center divide-x-2 divide-gray-300 dark:divide-gray-500">
                                <th class="py-5 w-1/6">Id</th>
                                <th class="py-5">Name</th>
                                <th class="py-5">Category Id</th>
                                <th class="py-5">Category Name</th>
                                <th class="py-5">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subcategories as  $subcategory) : ?>
                                <?php if (!$subcategory['archive'] == 1) : ?>
                                    <tr class=" divide-x-2 divide-gray-300 dark:divide-gray-500 border-b-2 border-b-gray-300 dark:border-b-gray-500
                                <?php
                                    if ($subcategory['id'] % 2 == 0) {
                                        echo 'bg-gray-200 hover:bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800';
                                    } else {
                                        echo 'bg-gray-50 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-950';
                                    }  ?> 
                                ">
                                        <td class="py-3 text-center"><?= $subcategory['id'] ?></td>
                                        <td class="py-3 text-center capitalize"><?= $subcategory['name'] ?></td>
                                        <td class="py-3 text-center capitalize">
                                            <?= $subcategory['category_id'] ?>
                                        </td>
                                        <td class="py-3 text-center capitalize">
                                            <?php
                                            if ($subcategory['parent_category_id'] === $subcategory['category_id']) {
                                                echo $subcategory['category_name'];
                                            }
                                            ?>
                                        </td>
                                        <td class="py-3 text-center">
                                            <a href="<?= BASE_URL ?>/admin/categories/subcategories/edit.php?id=<?= $subcategory['id'] ?>&cate_id=<?= $subcategory['category_id'] ?>" class="me-5 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg inline-flex items-center">
                                                <span class="me-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </span>
                                                <span class="align-middle">Edit</span>
                                            </a>
                                            <a href="<?= BASE_URL ?>/admin/categories/subcategories/delete.php?id=<?= $subcategory['id'] ?>" class="px-4 py-2 bg-red-700 hover:bg-red-800 text-white rounded-lg inline-flex items-center">
                                                <span class="me-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>

                                                </span>
                                                <span class="align-middle">Delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
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