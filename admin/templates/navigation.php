<nav class="w-full border dark:border-gray-800 bg-white dark:bg-gray-900 shadow fixed top-0 z-20">
        <div class="mx-auto w-full py-4 px-8 flex items-center justify-between">
                <a href="<?= baseUrl() ?>">
                    <img src="<?= resourceUrl("images/logo.png") ?>" class="w-[150px] block dark:hidden" alt="Normal Logo">
                    <img src="<?= resourceUrl("images/logo-dark.png") ?>" class="w-[150px] hidden dark:block" alt="Dark Logo">
                </a> 

                <p class="dark:text-white ms-auto mx-5 text-lg">Hello Welcome! <span class="italic text-primary"><?= $_SESSION['fullName'] ?? "" ?></span></p>
                <form action="<?= baseUrl('auth/action/logout.php') ?>" method="POST">
                    <button class="dark:text-white text-lg md:text-xl bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 text-white rounded-lg py-2 px-3 block">Logout</button>
                </form>
        </div>
    </nav>