<?php $pageTitle = "Register"; ?>
<?php require_once __DIR__ . '/../middleware/check_admin_register_disabled.php'; ?>
<?php require_once __DIR__ . "/../templates/header.php"; ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">
    
        <section class="container mx-auto flex flex-col items-center py-10 w-[500px]">

            <h1 class="text-4xl font-bold dark:text-white mb-8">Admin Registration</h1>

            <form action="<?= baseUrl('admin/action/create_admin.php') ?>" method="POST" class="bg-white shadow rounded-lg w-full min-h-fit py-10 px-8" autocomplete="off">


              <h3 class="text-center italic text-slate-500">Authentication Details</h3>

              <div class="mb-3">
                <label for="email">Email Address</label>
                 <input type="email" name="email" id="email" class="border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic peer" placeholder="username@example.com" />
                  <p class="hidden peer-invalid:block text-red-600 text-sm">
                    Please provide a valid email address.
                  </p>
              </div>

              <div class="mb-3">
                <label for="password">Password</label>
                 <input type="password" name="password" id="password" class="border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic" placeholder="Type your password" />
              </div>

              <div class="mb-3">
                <label for="passwordConfirmation">Password Confirmation</label>
                 <input type="password" name="passwordConfirmation" id="passwordConfirmation" class="border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic" placeholder="Confirm your password" />
              </div>

              <button type="submit" class="py-3 px-2 bg-primary hover:bg-primary-dark w-full rounded-lg transition-all delay-75 ease-in-out">Register</button>

            </form>


        </section>

    </main>

    <?= toast('error', 'user_not_registered', "User Not Registered Successfully"); ?>
    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('error', 'emailalreadyexist', "Email Address Already Exist!"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error!"); ?>
    <?= toast('error', 'emptyfield', "All fields are required!"); ?>
    <?= toast('error', 'invalidemail', "Invalid Email Address!"); ?>
    <?= toast('error', 'confirmpassworderror', "Password does not match the Password Confirm field"); ?>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>