<?php 
    $hayStack = $_SERVER['PHP_SELF'];
?>

<aside class="hidden md:block md:w-[250px] min-h-screen border dark:border-gray-800 bg-white dark:bg-gray-900 shadow fixed top-16 py-5 px-4">

<ul class="mt-10">


    <li class="group rounded-lg group-[.active] mb-5 hover:bg-neutral-300 dark:hover:bg-gray-600 <?= strpos($hayStack, "student/index.php") ? "sidebar_item-active" : "" ?>">
        <a href="<?= baseUrl('student/') ?>" class="flex items-center gap-3 text-white text-lg py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 group-[.active] fill-black dark:fill-white" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3"/>
            </svg>
            <span class="group-[.active] text-black dark:text-white">Analytics</span>
        </a>
    </li>

    <li class="group rounded-lg mb-5 hover:bg-neutral-300 dark:hover:bg-gray-600 <?= strpos($hayStack, "student/profile.php") ? "sidebar_item-active" : "" ?>">
        <a href="<?= baseUrl('student/profile.php') ?>" class="flex items-center gap-3 text-white text-lg py-2 px-4 ">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-[.active] fill-black dark:fill-white" viewBox="0 0 16 16">
        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
        </svg>
            <span class="group-[.active] text-black dark:text-white">Profile</span>
        </a>
    </li>


</ul>


</aside>