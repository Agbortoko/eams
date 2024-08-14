<?php $pageTitle = "Login"; ?>
<?php require_once __DIR__ . '/../includes/functions.php'; ?>

<?php require_once __DIR__ . "/../templates/header.php"; ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">
    
        <?php require_once __DIR__ . "/../templates/navigation.php"; ?>

        <section class="container mx-auto flex flex-col items-center py-10 w-[500px]">

            <h1 class="text-6xl font-bold dark:text-white mb-8">Login</h1>

            <form action="#" class="bg-white shadow rounded-lg w-full min-h-fit py-10 px-8">
      
              <div class="mb-3">
                <label for="email">Email Address</label>
                 <input type="email" name="email" id="email" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic mb-5" placeholder="username@example.com" />
              </div>

              <div class="mb-2">
                <label for="password">Password</label>
                 <input type="password" name="password" id="password" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic mb-5" placeholder="Type your password" />
              </div>

              <div class="mb-3">
                 <a href="<?= baseUrl('auth/forgot_password.php') ?>" class="text-center text-[#fcb215] block hover:underline">Forgot Password?</a>
              </div>

              <button type="submit" class="py-3 px-2 bg-[#fcb215] hover:bg-[#d18f1c] w-full rounded-lg transition-all delay-75 ease-in-out">Login</button>

            </form>
        </section>

    </main>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>