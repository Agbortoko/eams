<?php $pageTitle = "Email Verification"; ?>
<?php require_once __DIR__ . "/../templates/header.php"; ?>
<?php require_once basePath('middleware/check_auth_user.php'); ?>
<?php require_once basePath('middleware/check_auth_user_email_verified.php'); ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">
    
        <?php require_once __DIR__ . "/../templates/navigation.php"; ?>

        <section class="container mx-auto flex flex-col items-center py-10 w-[500px]">

            <h1 class="text-4xl font-bold dark:text-white mb-8">Email Verification Notice!</h1>

            <form action="<?= baseUrl("auth/action/send_verify_email.php") ?>" method="POST" class="bg-white shadow rounded-lg w-full min-h-fit py-10 px-8">
      
              <div class="mb-5">
                    <p>
                        Hello!, <br>
                        <span>
                             Thanks for being part of EAMS! To ensure you receive important updates and access all the features, please verify your email address.
                        </span>
                        Click the button below to verify your email:
                    </p>
              </div>

              <button type="submit" class="py-3 px-2 bg-[#fcb215] hover:bg-[#d18f1c] w-full rounded-lg transition-all delay-75 ease-in-out">Click to Verify your Email</button>

            </form>
        </section>

    </main>

    <?= toast('success', 'verifyemail', "Check your email and verify your email address"); ?>
    <?= toast('success', 'emailverificationsent', "Email Verification Sent Sucessfully"); ?>
    <?= toast('error', 'emailverificationnotsent', "Email Verification Not Sent Sucessfully"); ?>
    <?= toast('error', 'emailverificationfailed', "Email Verification Failed"); ?>
    <?= toast('error', 'resendverification', "Click the Verification Link to Resend Verification"); ?>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>