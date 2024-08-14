<header class="container mx-auto">
            <nav class="flex flex-col md:flex-row gap-y-4 md:gap-y-0 items-center justify-between py-5">
                <div>
                    <a href="<?= baseUrl() ?>">
                        <img src="<?= resourceUrl("images/logo.png") ?>" class="w-[200px] block dark:hidden" alt="Normal Logo">
                        <img src="<?= resourceUrl("images/logo-dark.png") ?>" class="w-[200px] hidden dark:block" alt="Dark Logo">
                    </a>
                </div>
                <div class="flex item-center gap-3 md:gap-8">
                    <a href="<?= baseUrl() ?>" class="dark:text-white text-lg md:text-xl block py-2 px-3 hover:text-[#fcb215] transition-all ease-in-out delay-75">Home</a>
                    <a href="<?= baseUrl('auth/register.php') ?>" class="dark:text-white text-lg md:text-xl block py-2 px-3 hover:text-[#fcb215] transition-all ease-in-out delay-75">Register</a>
                    <a href="<?= baseUrl('auth/login.php') ?>" class="dark:text-white text-lg md:text-xl bg-[#fcb215] hover:bg-[#d18f1c] transition-all ease-in-out delay-75 text-white rounded-lg py-2 px-3 block">Login</a>
                </div>
            </nav>
        </header>