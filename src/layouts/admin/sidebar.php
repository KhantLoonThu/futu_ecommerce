<?php
include_once __DIR__ . '/config.php';
?>

<aside class="aside-sidebar z-10 border-e border-e-gray-600 hidden lg:block md:block sm:block sm:fixed sm:-left-[50%] sm:top-0 lg:w-1/6 md:w-1/6 sm:w-1/2 h-screen bg-gray-900 text-white lg:fixed lg:top-0 lg:left-0 md:fixed md:top-0 md:left-0">
    <!-- brand logo -->
    <div class="flex justify-between items-center border-b border-b-gray-700">
        <a href="<?= BASE_URL; ?>/admin/index.php" class="logo-brand flex justify-start items-center pl-8 pt-3 pb-3">
            <!-- duck logo -->
            <svg class="w-12 h-12 hidden lg:block md:hidden sm:block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                <defs>
                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#008cff;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#ff00bf;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <g>
                    <g>
                        <path fill="url(#grad1)" d="M56.846,32.677c0.297-1.558,0.447-3.11,0.447-4.632C57.293,14.097,45.946,2.75,32,2.75S6.707,14.097,6.707,28.044    c0,1.521,0.15,3.074,0.446,4.632c-4.362,3.076-6.746,6.932-6.746,10.97C0.407,53.518,14.284,61.25,32,61.25    s31.593-7.732,31.593-17.604C63.593,39.608,61.209,35.752,56.846,32.677z M32,57.25c-14.957,0-27.593-6.229-27.593-13.604    c0-2.959,2.148-5.929,6.05-8.363c0.733-0.458,1.09-1.335,0.884-2.174c-0.421-1.71-0.634-3.414-0.634-5.065    C10.707,16.303,20.259,6.75,32,6.75s21.293,9.553,21.293,21.294c0,1.652-0.214,3.356-0.635,5.064    c-0.206,0.84,0.15,1.718,0.884,2.175c3.902,2.434,6.051,5.404,6.051,8.363C59.593,51.021,46.957,57.25,32,57.25z">
                        </path>
                        <path fill="url(#grad1)" d="M47.358,42.849c0-2.175-1.189-5.191-3.097-7.965c0.437-0.841,0.663-1.73,0.663-2.63c0-4.8-6.16-9.172-12.925-9.172    s-12.925,4.372-12.925,9.172c0,0.899,0.227,1.79,0.664,2.63c-1.908,2.773-3.098,5.79-3.098,7.965c0,0.469-0.041,0.956-0.08,1.449    c-0.153,1.92-0.363,4.549,1.595,6.669c2.203,2.386,6.473,3.449,13.844,3.449c7.37,0,11.64-1.063,13.843-3.449    c1.958-2.121,1.749-4.75,1.596-6.67C47.399,43.804,47.358,43.317,47.358,42.849z M42.904,48.253    C41.993,49.24,39.361,50.416,32,50.416c-7.362,0-9.994-1.176-10.905-2.163c-0.732-0.793-0.685-1.899-0.546-3.638    c0.046-0.574,0.093-1.167,0.093-1.767c0-1.349,1.069-4.076,3.113-6.677c0.592-0.753,0.567-1.819-0.059-2.543    c-0.412-0.477-0.621-0.939-0.621-1.375c0-2.035,3.832-5.172,8.925-5.172s8.925,3.138,8.925,5.172c0,0.436-0.209,0.898-0.62,1.375    c-0.625,0.724-0.65,1.791-0.06,2.543c2.044,2.602,3.113,5.329,3.113,6.678c0,0.6,0.047,1.192,0.093,1.766    C43.59,46.354,43.638,47.459,42.904,48.253z">
                        </path>
                        <path fill="url(#grad1)" d="M16.111,23.435c-3.225,0-3.225,5,0,5S19.336,23.435,16.111,23.435z">
                        </path>
                        <path fill="url(#grad1)" d="M47.889,23.435c-3.225,0-3.225,5,0,5S51.113,23.435,47.889,23.435z">
                        </path>
                    </g>
                </g>
            </svg>

            <span class="text-4xl font-semibold leading-9 pl-2">FUTU</span>
        </a>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white text-end ms-auto me-5 hidden sm:block x-toggle-sidebar lg:hidden md:hidden cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </div>

    <!-- side bar tabs -->
    <ul class="sidebar-tabs mt-2 flex flex-col w-full">
        <!-- Menu -->
        <div class="px-5 mt-3">
            <div class="flex justify-start items-center h-8">
                <div class="font-light tracking-wide text-gray-400">Menu</div>
            </div>
        </div>
        <li class="tabs dashboard-tab hover:bg-gray-700 w-full active py-4 border-l-4 border-transparent hover:border-indigo-500 hover:text-indigo-500">
            <a href="<?= BASE_URL; ?>/admin/index.php" class="flex justify-start items-center pl-8">
                <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg>
                <p class="pl-3 sidebar-texts lg:block md:hidden sm:block">Dashboard</p>
            </a>
        </li>
        <!-- Admin Console -->
        <div class="px-5 mt-3">
            <div class="flex justify-start items-center h-8">
                <div class="font-light tracking-wide text-gray-400">Admin Console</div>
            </div>
        </div>
        <li class="category-toggle tabs admin-console-tabs flex justify-between items-center px-8 hover:bg-gray-700 cursor-pointer w-full py-4 border-l-4 border-transparent hover:border-indigo-500 hover:text-indigo-500">
            <div class="flex items-center">
                <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                </svg>
                <p class="pl-3 sidebar-texts lg:block md:hidden sm:block">Category</p>
            </div>
            <div>
                <svg class="toggle-btn  w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </li>
        <!-- inner category -->
        <ul class="hidden inner-category flex-col items-center transition-all ease-linear duration-300">
            <li class="inner-tabs flex items-center ps-14 pe-8 hover:bg-gray-700 cursor-pointer w-full py-4 border-l-4 border-transparent hover:border-indigo-500 hover:text-indigo-500">
                <a href="<?= BASE_URL; ?>/admin/categories/categories/index.php" class="flex items-center">
                    <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                    </svg>
                    <p class="pl-3 sidebar-texts lg:block md:hidden sm:block">Category</p>
                </a>
            </li>
            <li class="inner-tabs flex items-center ps-14 pe-8 hover:bg-gray-700 cursor-pointer w-full py-4 border-l-4 border-transparent hover:border-indigo-500 hover:text-indigo-500">
                <a href="<?= BASE_URL; ?>/admin/categories/subcategories/index.php" class="flex items-center">
                    <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                    </svg>
                    <p class="pl-3 sidebar-texts lg:block md:hidden sm:block">Subcategory</p>
                </a>
            </li>
        </ul>
        <li class="product-toggle tabs admin-console-tabs flex justify-between items-center px-8 hover:bg-gray-700 cursor-pointer w-full py-4 border-l-4 border-transparent hover:border-indigo-500 hover:text-indigo-500">
            <div class="flex items-center">
                <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                </svg>
                <p class="pl-3 sidebar-texts lg:block md:hidden sm:block">Product</p>
            </div>
        </li>
        <li class="user-toggle tabs admin-console-tabs flex justify-between items-center px-8 hover:bg-gray-700 cursor-pointer w-full py-4 border-l-4 border-transparent hover:border-indigo-500 hover:text-indigo-500">
            <div class="flex items-center">
                <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <p class="pl-3 sidebar-texts lg:block md:hidden sm:block">User</p>
            </div>
            <div>
                <svg class="toggle-btn  w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </li>
        <!-- inner user -->
        <ul class="hidden inner-user flex-col items-center transition-all ease-linear duration-300">
            <li class="inner-tabs flex items-center ps-14 pe-8 hover:bg-gray-700 cursor-pointer w-full py-4 border-l-4 border-transparent hover:border-indigo-500 hover:text-indigo-500">
                <div class="flex items-center">
                    <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                    </svg>
                    <p class="pl-3 sidebar-texts lg:block md:hidden sm:block">Employees</p>
                </div>
            </li>
            <li class="inner-tabs flex items-center ps-14 pe-8 hover:bg-gray-700 cursor-pointer w-full py-4 border-l-4 border-transparent hover:border-indigo-500 hover:text-indigo-500">
                <div class="flex items-center">
                    <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                    </svg>
                    <p class="pl-3 sidebar-texts lg:block md:hidden sm:block">Customers</p>
                </div>
            </li>
        </ul>
    </ul>
</aside>