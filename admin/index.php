<?php require_once __DIR__ . '/../includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= siteName() ?> | Dashboard</title>
    <link rel="shortcut icon" href="<?= resourceUrl("/images/favicon.png") ?>" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= resourceUrl('css/app.css') ?>">
</head>
<body class="bg-neutral-100 overscroll-none">

    <nav class="w-full border dark:border-gray-800 bg-white dark:bg-gray-900 shadow fixed top-0 z-20">
        <div class="mx-auto w-full py-4 px-8 flex items-center justify-between">
                <a href="<?= baseUrl() ?>">
                    <img src="<?= resourceUrl("images/logo.png") ?>" class="w-[150px] block dark:hidden" alt="Normal Logo">
                    <img src="<?= resourceUrl("images/logo-dark.png") ?>" class="w-[150px] hidden dark:block" alt="Dark Logo">
                </a> 

                <a href="<?= baseUrl('auth/login.php') ?>" class="dark:text-white text-lg md:text-xl bg-[#fcb215] hover:bg-[#d18f1c] transition-all ease-in-out delay-75 text-white rounded-lg py-2 px-3 block">Logout</a>
        </div>
    </nav>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

        <aside class="hidden md:block md:w-[250px] min-h-screen border dark:border-gray-800 bg-white dark:bg-gray-900 shadow fixed top-16 py-5 px-4">

                <ul class="mt-10">
                    <li class="py-2 px-4 group active rounded-lg group-[.active] bg-[#fcb215]">
                        <a href="#" class="flex items-center gap-3 text-white text-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 group-[.active] fill-black" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
                            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3"/>
                            </svg>
                            <span class="group-[.active] text-black">Analytics</span>
                        </a>
                    </li>
                </ul>


        </aside>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="text-center md:text-start">
                    <h1 class="text-4xl font-semibold mb-8"><span>Analytics</span> - <span>Dashboard</span></h1>
                </div>


                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                    <div class="bg-white shadow rounded-lg min-h-[180px] w-full hover:scale-105 transition-all ease-in-out delay-75"></div>
                    <div class="bg-white shadow rounded-lg min-h-[180px] w-full hover:scale-105 transition-all ease-in-out delay-75"></div>
                    <div class="bg-white shadow rounded-lg min-h-[180px] w-full hover:scale-105 transition-all ease-in-out delay-75"></div>

                </div>
               

            </div>
        </section>

    </main>
    
</body>
</html>
