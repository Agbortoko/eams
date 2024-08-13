<?php require __DIR__ . '/config/settings.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= getConfig('site_name') ?> | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <header class="py-3 px-2 min-h-screen bg-slate-100 dark:bg-gray-900">
            <div class="container mx-auto">
                    <nav class="flex flex-col md:flex-row gap-y-4 md:gap-y-0 items-center justify-between py-5">
                        <div>
                           <a href="<?= baseUrl() ?>">
                                <img src="<?= baseUrl("/resources/images/logo.png") ?>" class="w-[200px] block dark:hidden" alt="">
                                <img src="<?= baseUrl("/resources/images/logo-dark.png") ?>" class="w-[200px] hidden dark:block" alt="">
                           </a>
                        </div>
                        <div class="flex item-center gap-3 md:gap-8">
                            <a href="<?= baseUrl() ?>" class="dark:text-white md:text-xl block py-2 px-3 hover:text-[#b72e2e] transition-all ease-in-out delay-75">Home</a>
                            <a href="<?= baseUrl('auth/register.php') ?>" class="dark:text-white md:text-xl block py-2 px-3 hover:text-[#b72e2e] transition-all ease-in-out delay-75">Register</a>
                            <a href="<?= baseUrl('auth/login.php') ?>" class="dark:text-white md:text-xl bg-[#b72e2e] hover:bg-[#701a1a] transition-all ease-in-out delay-75 text-white rounded-lg py-2 px-3 block">Login</a>
                        </div>
                    </nav>
            </div>
    </header>

    
</body>
</html>