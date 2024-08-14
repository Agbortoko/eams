<?php $pageTitle = "Forgot Password"; ?>
<?php require_once __DIR__ . '/../includes/functions.php'; ?>

<?php require_once __DIR__ . "/../templates/header.php"; ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">
    
        <?php require_once __DIR__ . "/../templates/navigation.php"; ?>

        <section class="container mx-auto flex flex-col items-center py-10 w-[500px]">

            <h1 class="text-4xl font-bold dark:text-white mb-8">Email Verification Notice!</h1>

            <form action="#" class="bg-white shadow rounded-lg w-full min-h-fit py-10 px-8">
      
              <div class="mb-5">
                    <p>
                        Hello!, <br>
                        <span>
                             for being part of CashSensei! To ensure you receive important updates and access all the features, please verify your email address.
                        </span>
                        Click the button below to verify your email:
                    </p>
              </div>

              <button type="submit" class="py-3 px-2 bg-[#fcb215] hover:bg-[#d18f1c] w-full rounded-lg transition-all delay-75 ease-in-out">Resend Email Verification Link</button>

            </form>
        </section>

    </main>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>