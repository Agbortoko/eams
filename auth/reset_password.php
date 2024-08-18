<?php $pageTitle = "Forgot Password"; ?>
<?php require_once __DIR__ . "/../templates/header.php"; ?>
<?php require_once basePath('middleware/check_guest_user.php'); ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">
    
        <?php require_once __DIR__ . "/../templates/navigation.php"; ?>

        <section class="container mx-auto flex flex-col items-center py-10 w-[500px]">

            <h1 class="text-4xl font-bold dark:text-white mb-8">Reset Password</h1>

            <form action="<?= baseUrl('auth/action/reset_password.php') ?>" method="POST" class="bg-white shadow rounded-lg w-full min-h-fit py-10 px-8">

              <?php if(isset($_GET['token'])): ?>
                  <input type="hidden" name="token" value="<?= $_GET['token'] ?>" />
              <?php endif ?>
      
              <div class="mb-3">
                <label for="email">Email Address</label>
                 <input type="email" name="email" id="email" class="w-full border border-slate-300 rounded-lg py-3 px-2  placeholder:italic mb-5" placeholder="username@example.com" />
              </div>

              <div class="mb-2">
                <label for="newPassword">New Password</label>
                 <input type="password" name="newPassword" id="newPassword" class="w-full border border-slate-300 rounded-lg py-3 px-2  placeholder:italic mb-5" placeholder="Type your new password" />
              </div>

              <div class="mb-3">
                <label for="passwordConfirmation">Password Confirmation</label>
                 <input type="password" name="passwordConfirmation" id="passwordConfirmation" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic mb-5" placeholder="Confirm your new password" />
              </div>

              <button type="submit" class="py-3 px-2 bg-[#fcb215] hover:bg-[#d18f1c] w-full rounded-lg transition-all delay-75 ease-in-out">Reset Password</button>

            </form>
        </section>

    </main>

    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('error', 'unexpectederror', "Unexpected Error!"); ?>
    <?= toast('error', 'emptyfield', "All fields are required!"); ?>
    <?= toast('error', 'confirmpassworderror', "Password does not match the Password Confirm field"); ?>

<?php require_once __DIR__ . "/../templates/footer.php"; ?> 