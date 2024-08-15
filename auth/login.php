<?php $pageTitle = "Login"; ?>
<?php require_once __DIR__ . "/../templates/header.php"; ?>
<?php require_once basePath('middleware/check_guest_user.php'); ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">
    
        <?php require_once __DIR__ . "/../templates/navigation.php"; ?>

        <section class="container mx-auto flex flex-col items-center py-10 w-[500px]">

            <h1 class="text-4xl font-bold dark:text-white mb-8">Login</h1>

            <form action="<?= baseUrl('auth/action/authenticate.php') ?>" class="bg-white shadow rounded-lg w-full min-h-fit py-10 px-8" method="POST">
      
              <div class="mb-3">
                <label for="email">Email Address</label>
                 <input type="email" name="email" id="email" class="border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic peer" placeholder="username@example.com" />
                 <p class="hidden peer-invalid:block text-red-600 text-sm">
                    Please provide a valid email address.
                  </p>
              </div>

              <div class="mb-2">
                <label for="password">Password</label>
                 <input type="password" name="password" id="password" class="border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic" placeholder="Type your password" />
              </div>

              <div class="mb-3">
                 <a href="<?= baseUrl('auth/forgot_password.php') ?>" class="text-center text-primary block hover:underline">Forgot Password?</a>
              </div>

              <button type="submit" class="py-3 px-2 bg-primary hover:bg-primary-dark w-full rounded-lg transition-all delay-75 ease-in-out">Login</button>

            </form>
        </section>

    </main>

    <?= toast('success', 'user_registered', "User Registered Successfully"); ?>
    <?= toast('success', 'logoutsuccess', "Logout Sucessful"); ?>
    <?= toast('success', 'passwordresetsuccess', "Password Reset Successful"); ?>
    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('error', 'emailalreadyexist', "Email Address Already Exist!"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error!"); ?>
    <?= toast('error', 'unexpectederror', "Unexpected Error!"); ?>
    <?= toast('error', 'emptyfield', "All fields are required!"); ?>
    <?= toast('error', 'invalidemail', "Invalid Email Address!"); ?>
    <?= toast('error', 'invalidcredentials', "Invalid Credentials"); ?>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>