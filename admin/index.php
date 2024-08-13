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

    <nav class="w-full border dark:border-gray-800 bg-white dark:bg-gray-800 bg-pattern shadow fixed top-0 z-20">
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
            <p>Test</p>
        </aside>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="text-center md:text-start">
                    <h1 class="text-4xl font-semibold mb-8"><span>Analysis</span> - <span>Dashboard</span></h1>
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
