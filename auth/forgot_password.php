<?php $pageTitle = "Forgot Password"; ?>
<?php require_once __DIR__ . "/../templates/header.php"; ?>
<?php require_once basePath('middleware/check_guest_user.php'); ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">
    
        <?php require_once __DIR__ . "/../templates/navigation.php"; ?>

        <section class="container mx-auto flex flex-col items-center py-10 w-[500px]">

            <h1 class="text-4xl font-bold dark:text-white mb-8">Forgot Password</h1>

            <form action="<?= baseUrl('auth/action/send_recovery_email.php') ?>" method="POST" class="bg-white shadow rounded-lg w-full min-h-fit py-10 px-8">
      
              <div class="mb-3">
                <label for="email">Email Address</label>
                 <input type="email" name="email" id="email" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic peer" placeholder="username@example.com" />
                 <p class="hidden peer-invalid:block text-red-600 text-sm">
                    Please provide a valid email address.
                  </p>
              </div>

              <button type="submit" class="py-3 px-2 bg-[#fcb215] hover:bg-[#d18f1c] w-full rounded-lg transition-all delay-75 ease-in-out">Send Password Reset Link</button>

            </form>
        </section>

    </main>

    <?= toast('success', 'recoveryemailsent', "Password Reset Link Sent Successfully"); ?>
    <?= toast('error', 'recoveryemailnotsent', "Password Reset Link Not Sent!"); ?>
    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('error', 'emailaccountnotfound', "User Account with Email Not Found"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error!"); ?>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>