<?php require_once __DIR__ . '/config/settings.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= baseUrl("/resources/images/favicon.png") ?>" type="image/x-icon">
    <title><?= siteName() ?> | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900">
            <header class="container mx-auto">
                    <nav class="flex flex-col md:flex-row gap-y-4 md:gap-y-0 items-center justify-between py-5">
                        <div>
                           <a href="<?= baseUrl() ?>">
                                <img src="<?= baseUrl("/resources/images/logo.png") ?>" class="w-[200px] block dark:hidden" alt="">
                                <img src="<?= baseUrl("/resources/images/logo-dark.png") ?>" class="w-[200px] hidden dark:block" alt="">
                           </a>
                        </div>
                        <div class="flex item-center gap-3 md:gap-8">
                            <a href="<?= baseUrl() ?>" class="dark:text-white text-lg md:text-xl block py-2 px-3 hover:text-[#fcb215] transition-all ease-in-out delay-75">Home</a>
                            <a href="<?= baseUrl('auth/register.php') ?>" class="dark:text-white text-lg md:text-xl block py-2 px-3 hover:text-[#fcb215] transition-all ease-in-out delay-75">Register</a>
                            <a href="<?= baseUrl('auth/login.php') ?>" class="dark:text-white text-lg md:text-xl bg-[#fcb215] hover:bg-[#d18f1c] transition-all ease-in-out delay-75 text-white rounded-lg py-2 px-3 block">Login</a>
                        </div>
                    </nav>
            </header>

            <section class="container mx-auto px-5 min-h-[300px] md:min-h-[500px] flex items-center justify-center ">
                <h1 class="text-4xl md:text-6xl dark:text-white text-center font-semibold"><span class="text-[#fcb215] uppercase font-bold block mb-5">Eschosys Internship</span class="block">Attendance Management System<span></h1>
            </section>

            <div class="container mx-auto mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 items-center gap-14">
                <div class="w-[150px] h-[150px] rounded-full mx-auto overflow-hidden">
                    <img class="w-full" src="<?= baseUrl("/resources/images/eschosys.webp") ?>" alt="Eschosys Logo" />
                </div>   

                <img class="w-[300px] mx-auto hidden dark:block" src="<?= baseUrl("/resources/images/tailwindcss-logotype-white.svg") ?>" alt="Tailwindcss Logo" />

                <img class="w-[300px] mx-auto dark:hidden" src="<?= baseUrl("/resources/images/tailwindcss-logotype.svg") ?>" alt="Tailwindcss Logo" />

                <img class="w-[100px] mx-auto hidden dark:block" src="<?= baseUrl("/resources/images/php-logo-white.svg") ?>" alt="PHP Logo" />

                <img class="w-[100px] mx-auto dark:hidden" src="<?= baseUrl("/resources/images/php-logo.svg") ?>" alt="PHP Logo" />

                <img class="w-[150px] mx-auto" src="<?= baseUrl("/resources/images/Mysql_logo.png") ?>" alt="MySQL Logo" />
            </div>

    </main>

    
</body>
</html>