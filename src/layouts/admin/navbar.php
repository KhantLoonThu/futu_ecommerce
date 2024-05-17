<?php

include_once __DIR__ . '/config.php';

$admin = $_SESSION['main_admin'];

?>

<nav class="sticky top-0 w-full bg-white dark:bg-gray-900 transition-all ease-linear duration-300 z-50 flex justify-between items-center py-2 px-8  border-b border-b-gray-300 dark:border-b-gray-600 shadow-lg">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden lg:block md:block sm:hidden close-sidebar-toggle cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 open-sidebar-toggle hidden lg:hidden md:hidden sm:hidden cursor-pointer ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 toggle-sidebar hidden lg:hidden md:hidden sm:block cursor-pointer ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </div>
    <div class="flex justify-between items-center">
        <div class="me-4 pe-4 border-e-2 border-e-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer hidden sun-btn">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer moon-btn">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
            </svg>
        </div>
        <div class="border-e-2 border-e-gray-600 pe-4 me-4">
            <h2 class="text-[18px] font-[500] admin-name"><?= $admin[0]['name'] ?></h2>
        </div>
        <div class="cursor-pointer admin-image-holder relative w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center">
            <img class="w-12 h-12 rounded-full admin-image" src="<?= BASE_URL; ?>/../public/images/<?= $admin[0]['image'] ?>" alt="admin">
            <div class="profile-dropdown hidden bg-gray-300 w-[200px] absolute bottom-[-180px] right-[10px] border-2 border-gray-500 rounded-lg">
                <div class="py-3 text-center">
                    <h2 class="text-gray-600">Account Setting</h2>
                </div>
                <ul class="bg-gray-500 rounded-b-lg dark:bg-gray-700 pb-3">
                    <li class="py-3 hover:bg-gray-400 dark:hover:bg-gray-600 px-5">
                        <a href="<?= BASE_URL; ?>/admin/profile.php" class="flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                            <div class="ms-8">
                                <h2>Profile Details</h2>
                            </div>
                        </a>
                    </li>
                    <li class="py-3 hover:bg-gray-400 dark:hover:bg-gray-600 px-5">
                        <form action="">
                            <button name="logout" class="flex">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                    </svg>
                                </div>
                                <div class="ms-8">
                                    <h2>Log Out</h2>
                                </div>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>