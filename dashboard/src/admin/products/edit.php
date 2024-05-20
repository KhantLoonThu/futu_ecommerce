<?php

session_start();

use Admin\Controlller\SubcategoryController;
use Admin\Controlller\CategoryController;
use Admin\Controlller\ProductController;

include_once __DIR__ . '/../../layouts/admin/config.php';
include_once __DIR__ . '/../controller/SubcategoryConroller.php';
include_once __DIR__ . '/../controller/CategoryController.php';
include_once __DIR__ . '/../controller/ProductController.php';

$admin = $_SESSION['main_admin'];
if (!isset($_SESSION['main_admin'])) {
    header("location:" . BASE_URL . "/admin/login.php"); // Redirect to login page if not logged in
    exit;
}

$category_controller = new CategoryController();
$categories = $category_controller->getAllCategories();

$subcategory_controller = new SubcategoryController();
$subcategories = $subcategory_controller->getAllSubcategory();

$product_controller = new ProductController();

$id = $_GET['id'];
$cate_id = $_GET['cate_id'];
$subcate_id = $_GET['subcate_id'];
$current_product = $product_controller->getCurrentProduct($id, $cate_id, $subcate_id);

// form validation and sending to database
# first page
if (isset($_POST['add_product_btn'])) {
    $error = false;
    #first form 
    if (!empty($_POST['category_id']) && $_POST['category_id'] != 0) {
        $category_id = intval($_POST['category_id']);
    } else {
        $error = true;
        $category_id_error = 'Please Select One Category';
    }

    if (!empty($_POST['subcategory_id']) && $_POST['subcategory_id'] != 0) {
        $subcategory_id = intval($_POST['subcategory_id']);
    } else {
        $error = true;
        $subcategory_id_error = 'Please Select One Subcategory';
    }

    #second form
    if (!empty($_POST['product_name'])) {
        $product_name = trim(strtolower($_POST['product_name']));
    } else {
        $error = true;
        $product_name_error = 'Please Fill Product Name';
    }

    if (!empty($_POST['product_price'])) {
        $product_price = intval($_POST['product_price']);
    } else {
        $error = true;
        $product_price_error = 'Please Fill Product Price';
    }

    if (!empty($_POST['product_quantity'])) {
        $product_quantity = intval($_POST['product_quantity']);
    } else {
        $error = true;
        $product_quantity_error = 'Please Fill Product Quantity';
    }


    $product_description = trim(strtolower($_POST['product_description']));



    if (!$error) {
        $alreadyExist = $product_controller->getExistingProduct($product_name, $subcategory_id);
        if (isset($_FILES['product_image'])) {
            $filename = $_FILES['product_image']['name'];
            $filetype = $_FILES['product_image']['type'];
            $filetmp = $_FILES['product_image']['tmp_name'];
            $fileerror = $_FILES['product_image']['error'];
            $filesize = $_FILES['product_image']['size'];
            $allowedTypes = ['jpeg', 'jpg', 'png', 'webp', 'svg', 'docs'];
            $fileExtArray = explode(".", $filename);
            $fileExt = strtolower(end($fileExtArray));
            $fname = time() . "." . $fileExt;

            if ($fileerror == 0) {
                if (in_array($fileExt, $allowedTypes)) {
                    if ($filesize < 2000000) {
                        $destination = __DIR__ . "/../../../public/images/$fname";
                        if (move_uploaded_file($filetmp, $destination)) {
                            if ($alreadyExist['total'] == 0) {
                                $product_controller->updateProduct($id, $product_name, $product_price, $fname, $product_description, $product_quantity, $category_id, $subcategory_id);
                                $product_name = '';
                                $product_price = '';
                                $product_quantity = '';
                                header('location: ./index.php?edit_product_success=true');
                                exit;
                            } else {
                                header('location: ./index.php?edit_product_success=false');
                                exit;
                            }
                            echo "<script> alert('Image Uploaded') </script>";
                        } else {
                            $error = true;
                            echo "<script> alert('Failed to move uploaded file') </script>";
                        }
                    } else {
                        $error = true;
                        echo "<script> alert('Your File Size is Too Large') </script>";
                    }
                } else {
                    $error = true;
                    echo "<script> alert('Your file extension is not allowed') </script>";
                }
            } else {
                $error = true;
                echo "<script> alert('There was an error uploading your file') </script>";
            }
        } else {
            $error = true;
            echo "<script> alert('No file was uploaded') </script>";
        }

        // Process form data



        if ($alreadyExist['total'] == 0) {
            $product_controller->updateProductWithoutImage($id, $product_name, $product_price, $product_description, $product_quantity, $category_id, $subcategory_id);
            $product_name = '';
            $product_price = '';
            $product_quantity = '';
            header('location: ./index.php?edit_product_success=true');
            exit;
        } else {
            header('location: ./index.php?edit_product_success=false');
            exit;
        }
    } else {
        echo "There is an error";
    }
}


?>

<!-- doctype html -->
<?php include_once __DIR__ . '/../../layouts/admin/html.php';
?>

<main class="relative">
    <header>
        <!-- sidebar -->
        <?php
        include_once __DIR__ . '/../../layouts/admin/sidebar.php';
        ?>
    </header>

    <section
        class="bg-gray-100 h-[120vh] dark:bg-gray-900 dark:text-white main-part lg:w-5/6 md:w-5/6 sm:w-full ms-auto transition-all ease-linear duration-300">
        <!-- navbar -->
        <?php include_once __DIR__ . '/../../layouts/admin/navbar.php'; ?>

        <!-- main category -->
        <div class="my-[50px] max-w-screen-lg mx-auto">
            <div>
                <form method="post" enctype="multipart/form-data">
                    <div class="edit-product-firstpage border-2 p-5 border-gray-300 dark:border-gray-600 rounded-lg">
                        <h2 class="text-[32px] font[500] mb-[30px]">Add New Product Page 1 </h2>
                        <div class="mt-3">
                            <label for="category-name">Category Name (Can't Edit Category) *</label>
                            <select class=" text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300
                                focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none
                                dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear
                                duration-300 edit-product-category-name" name="category_id" id="category-name">
                                <option value="0">Choose Category</option>
                                <?php foreach ($categories as $category) : ?>
                                <option <?php
                                            if ($current_product['category_id'] == $category['id']) echo 'selected'
                                            ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-rose-600">
                                <?php
                                if (isset($category_id_error)) {
                                    echo $category_id_error;
                                }
                                ?>
                            </span>

                        </div>
                        <div class="mt-3">
                            <label for="subcategory-name">Subcategory Name *</label>
                            <select class=" text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300
                                focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none
                                dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear
                                duration-300 edit-product-subcategory-name" name="subcategory_id" id="category-name">
                                <option value="0">Choose Category</option>
                                <?php foreach ($subcategories as $subcategory) : ?>
                                <option <?php
                                            if ($current_product['subcategory_id'] == $subcategory['id']) echo 'selected'
                                            ?> value="<?= $subcategory['id'] ?>"><?= $subcategory['name'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <span class="text-rose-600">
                                <?php
                                if (isset($subcategory_id_error)) {
                                    echo $subcategory_id_error;
                                }
                                ?>
                            </span>

                        </div>
                        <div class="mt-3 flex justify-end items-center">
                            <!-- <button name="add_subcategory_btn" class="mt-5 transition-all duration-300 ease-linear px-5 py-3 border-2 bg-sky-500 text-white hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white border-sky-500 dark:border-sky-500 dark:text-white hover:text-sky-500 rounded-lg">Add
                                Subategory</button> -->
                            <button name="next_btn"
                                class="mt-5 transition-all duration-300 ease-linear px-5 py-3 border-2 bg-sky-500 text-white hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white border-sky-500 dark:border-sky-500 dark:text-white hover:text-sky-500 rounded-lg next-btn-edit">
                                Next
                            </button>
                            <a href="<?= BASE_URL; ?>/admin/products/index.php"
                                class="ms-5 rounded-lg mt-5 px-5 py-3 border-2 border-gray-400 dark:border-gray-300">Back
                                to
                                Subcategory</a>
                        </div>
                    </div>
                    <div
                        class="edit-product-secondpage hidden border-2 p-5 border-gray-300 dark:border-gray-600 rounded-lg">
                        <h2 class="text-[32px] font[500] mb-[30px]">Add New Product Page 2 </h2>
                        <div class="grid grid-cols-2 gap-[50px]">
                            <div>
                                <div class="mt-3">
                                    <label for="product-name">Product Name (must change product name to update)
                                        *</label>
                                    <input class="text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300
                                focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none
                                dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear
                                duration-300" type="text" name="product_name" id="product-name"
                                        value="<?php if (isset($current_product)) echo $current_product['name'] ?>">
                                    <span class="text-rose-600">
                                        <?php
                                        if (isset($product_name_error)) {
                                            echo $product_name_error;
                                        }
                                        ?>
                                    </span>

                                </div>
                                <div class="mt-3">
                                    <label for="product-price">Product Price *</label>
                                    <input class="text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300
                                focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none
                                dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear
                                duration-300" type="number" name="product_price" id="product-price"
                                        value="<?php if (isset($current_product)) echo $current_product['price'] ?>">
                                    <span class="text-rose-600">
                                        <?php
                                        if (isset($product_price_error)) {
                                            echo $product_price_error;
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="mt-3">
                                    <label for="product-quantity">Product Quantity *</label>
                                    <input class="text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300
                                focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none
                                dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear
                                duration-300" type="number" name="product_quantity" id="product-quantity"
                                        value="<?php if (isset($current_product)) echo $current_product['quantity'] ?>">
                                    <span class="text-rose-600">
                                        <?php
                                        if (isset($product_quantity_error)) {
                                            echo $product_quantity_error;
                                        }
                                        ?>
                                    </span>

                                </div>
                                <div class="mt-3">
                                    <label for="product-description">Product Description *</label>
                                    <textarea class="text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300
                                focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none
                                dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear
                                duration-300" name="product_description" id="product-description"
                                        value="<?php if (isset($current_product)) echo $current_product['description'] ?>"></textarea>
                                </div>
                                <div class="mt-3">
                                    <label for="product-image">Product Image *</label>
                                    <input class="text-sky-600 w-full my-5 px-5 py-3 border-2 border-gray-300
                                focus:ring-4 focus:ring-gray-300 dark:bg-transparent focus:outline-none
                                dark:focus:ring-4 dark:focus:ring-gray-700 rounded-lg transition-all ease-linear
                                duration-300" type="file" name="product_image" id="product-image">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 flex justify-end items-center">
                            <!-- <button name="add_subcategory_btn" class="mt-5 transition-all duration-300 ease-linear px-5 py-3 border-2 bg-sky-500 text-white hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white border-sky-500 dark:border-sky-500 dark:text-white hover:text-sky-500 rounded-lg">Add
                                Subategory</button> -->
                            <button type="submit" name="add_product_btn"
                                class="mt-5 transition-all duration-300 ease-linear px-5 py-3 border-2 bg-sky-500 text-white hover:bg-white dark:hover:bg-gray-600 dark:hover:text-white border-sky-500 dark:border-sky-500 dark:text-white hover:text-sky-500 rounded-lg next-btn">
                                Add Product
                            </button>
                            <button
                                class="ms-5 rounded-lg mt-5 px-5 py-3 border-2 border-gray-400 dark:border-gray-300 back-to-first-page-edit">Back
                                to
                                to first page</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- footer -->
        <footer class="text-center text-gray-400 dark:text-gray-50 py-3">
            <h5 class="text-[14px]">&copy; copyright reserved 2024 FUTU ™</h5>
        </footer>
    </section>
</main>



<script src="../../../public/main.js"></script>
<script src="../product_edit.js"></script>
</body>

</html>