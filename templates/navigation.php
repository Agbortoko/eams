<header class="container mx-auto">
    <nav class="flex flex-col md:flex-row gap-y-4 md:gap-y-0 items-center justify-between py-5">
        <div>
            <a href="<?= baseUrl() ?>">
                <img src="<?= resourceUrl("images/logo.png") ?>" class="w-[200px] block dark:hidden" alt="Normal Logo">
                <img src="<?= resourceUrl("images/logo-dark.png") ?>" class="w-[200px] hidden dark:block" alt="Dark Logo">
            </a>
        </div>
        <div class="flex item-center gap-3 md:gap-8">
            
            <?php if(!isset($_SESSION['loginID'])): ?>
                <a href="<?= baseUrl() ?>" class="dark:text-white text-lg md:text-xl block py-2 px-3 hover:text-primary transition-all ease-in-out delay-75">Home</a>
                <a href="<?= baseUrl('auth/register.php') ?>" class="dark:text-white text-lg md:text-xl block py-2 px-3 hover:text-primary transition-all ease-in-out delay-75">Register</a>
                <a href="<?= baseUrl('auth/login.php') ?>" class="dark:text-white text-lg md:text-xl bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 text-white rounded-lg py-2 px-3 block">Login</a>
            <?php endif ?>

            <?php if(isset($_SESSION['loginID'])): ?>

                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"): ?>
                      <a href="<?= baseUrl('admin') ?>" class="dark:text-white text-lg md:text-xl block py-2 px-3 hover:text-primary transition-all ease-in-out delay-75">Dashboard</a>
                <?php endif ?>

                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "student"): ?>
                      <a href="<?= baseUrl('student') ?>" class="dark:text-white text-lg md:text-xl block py-2 px-3 hover:text-primary transition-all ease-in-out delay-75">Dashboard</a>
                <?php endif ?>

                <form action="<?= baseUrl('auth/action/logout.php') ?>" method="POST">
                    <button class="dark:text-white text-lg md:text-xl bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 text-white rounded-lg py-2 px-3 block">Logout</button>
                </form>
            <?php endif?>

        </div>
    </nav>
</header>