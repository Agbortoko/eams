<?php $pageTitle = "Home"; ?>
<?php require_once __DIR__ . "/templates/header.php"; ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">
            
            <?php require_once __DIR__ . "/templates/navigation.php"; ?>

            <section class="container mx-auto px-5 min-h-[300px] md:min-h-[500px] flex items-center justify-center ">
                <h1 class="dark:text-white text-center font-semibold"><span class="text-[#fcb215] uppercase font-bold block mb-5 text-6xl md:text-8xl">Eschosys Internship</span><span class="block text-4xl md:text-6xl">Attendance Management System<span></h1>
            </section>

            <div class="container mx-auto mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 items-center gap-14">
                <div class="w-[150px] h-[150px] rounded-full mx-auto overflow-hidden">
                    <img class="w-full" src="<?= resourceUrl("images/eschosys.webp") ?>" alt="Eschosys Logo" />
                </div>   

                <img class="w-[300px] mx-auto hidden dark:block" src="<?= resourceUrl("images/tailwindcss-logotype-white.svg") ?>" alt="Tailwindcss Logo" />

                <img class="w-[300px] mx-auto dark:hidden" src="<?= resourceUrl("images/tailwindcss-logotype.svg") ?>" alt="Tailwindcss Logo" />

                <img class="w-[100px] mx-auto hidden dark:block" src="<?= resourceUrl("images/php-logo-white.svg") ?>" alt="PHP Logo" />

                <img class="w-[100px] mx-auto dark:hidden" src="<?= resourceUrl("/images/php-logo.svg") ?>" alt="PHP Logo" />

                <img class="w-[150px] mx-auto" src="<?= resourceUrl("images/Mysql_logo.png") ?>" alt="MySQL Logo" />
            </div>
    </main>

<?php require_once __DIR__ . "/templates/footer.php"; ?>
