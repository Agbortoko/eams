<?php 
    $hayStack = $_SERVER['PHP_SELF'];
?>
<aside class="hidden md:block md:w-[250px] min-h-screen border dark:border-gray-800 bg-white dark:bg-gray-900 shadow fixed top-16 py-5 px-4">

<ul class="mt-10">
    <li class="group rounded-lg group-[.active] mb-5 hover:bg-neutral-300 dark:hover:bg-gray-600 <?= strpos($hayStack, "admin/index.php") ? "sidebar_item-active" : "" ?>">
        <a href="<?= baseUrl('admin/') ?>" class="flex items-center gap-3 text-white text-2xl py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 group-[.active] fill-black dark:fill-white" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3"/>
            </svg>
            <span class="group-[.active] text-black dark:text-white">Analytics</span>
        </a>
    </li>

    <li class="group rounded-lg group-[.active] mb-5 hover:bg-neutral-300 dark:hover:bg-gray-600 <?= strpos($hayStack, "batch/index.php") || strpos($hayStack, "batch/add.php") || strpos($hayStack, "batch/edit.php") ? "sidebar_item-active" : "" ?>">
        <a href="<?= baseUrl('admin/batch/index.php') ?>" class="flex items-center gap-3 text-white text-2xl py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 group-[.active] fill-black dark:fill-white" viewBox="0 0 16 16">
            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
            </svg>
            <span class="group-[.active] text-black dark:text-white">Batches</span>
        </a>
    </li>

    <li class="group rounded-lg group-[.active] mb-5 hover:bg-neutral-300 dark:hover:bg-gray-600 <?= strpos($hayStack, "admin/students.php") ? "sidebar_item-active" : "" ?>">
        <a href="<?= baseUrl('admin/students.php') ?>" class="flex items-center gap-3 text-white text-2xl py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 group-[.active] fill-black dark:fill-white" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
            </svg>
            <span class="group-[.active] text-black dark:text-white">Students</span>
        </a>
    </li>

    <li class="group rounded-lg group-[.active] mb-5 hover:bg-neutral-300 dark:hover:bg-gray-600 <?= strpos($hayStack, "admin/approve.php") ? "sidebar_item-active" : "" ?>">
        <a href="<?= baseUrl('admin/approve.php') ?>" class="flex items-center gap-3 text-white text-2xl py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 group-[.active] fill-black dark:fill-white" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
            </svg>
            <span class="group-[.active] text-black dark:text-white">Approve</span>
        </a>
    </li>

    <li class="group rounded-lg group-[.active] mb-5 hover:bg-neutral-300 dark:hover:bg-gray-600 <?= strpos($hayStack, "admin/mark.php") ? "sidebar_item-active" : "" ?>">
        <a href="<?= baseUrl('admin/mark.php') ?>" class="flex items-center gap-3 text-white text-2xl py-2 px-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 group-[.active] fill-black dark:fill-white" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8"/>
                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>

            </svg>
            <span class="group-[.active] text-black dark:text-white">Mark</span>
        </a>
    </li>

    <li class="group rounded-lg mb-5 hover:bg-neutral-300 dark:hover:bg-gray-600 <?= strpos($hayStack, "admin/settings.php") ? "sidebar_item-active" : "" ?>">
        <a href="<?= baseUrl('admin/settings.php') ?>" class="flex items-center gap-3 text-white text-2xl py-2 px-4 ">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 group-[.active] fill-black dark:fill-white" viewBox="0 0 16 16">
        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
        </svg>
            <span class="group-[.active] text-black dark:text-white">Settings</span>
        </a>
    </li>
</ul>


</aside>