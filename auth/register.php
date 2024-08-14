<?php $pageTitle = "Register"; ?>
<?php require_once __DIR__ . '/../includes/functions.php'; ?>

<?php require_once __DIR__ . "/../templates/header.php"; ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">
    
        <?php require_once __DIR__ . "/../templates/navigation.php"; ?>

        <section class="container mx-auto flex flex-col items-center py-10 w-[1000px]">

            <h1 class="text-4xl font-bold dark:text-white mb-8">Student Registration</h1>

            <form action="#" class="bg-white shadow rounded-lg w-full min-h-[800px] py-10 px-8">

                <h3 class="text-center italic text-slate-500 mb-5">Personal Details</h3>
               <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                    <div>
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" id="firstName" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic" placeholder="Type your First Name" />
                    </div>

                    <div>
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic" placeholder="Type your Last Name" />
                    </div>
               </div>

              <div class="mb-3">
                <label for="school">School of Study</label>
                <input type="text" name="school" id="school" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic" placeholder="Type the name of your school" />
              </div>

              <div class="mb-3">
                <label for="department">Department of Study</label>
                <input type="text" name="department" id="department" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic" placeholder="Type your department of study" />
              </div>

              <div class="mb-3">
                <label for="dateOfBirth">Date Of Birth</label>
                 <input type="date" name="dateOfBirth" id="dateOfBirth" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic mb-5" />
              </div>

              <h3 class="text-center italic text-slate-500">Authentication Details</h3>

              <div class="mb-3">
                <label for="email">Email Address</label>
                 <input type="email" name="email" id="email" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic mb-5" placeholder="username@example.com" />
              </div>

              <div class="mb-3">
                <label for="password">Password</label>
                 <input type="password" name="password" id="password" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic mb-5" placeholder="Type your password" />
              </div>

              <div class="mb-3">
                <label for="passwordConfirmation">Password Confirmation</label>
                 <input type="password" name="passwordConfirmation" id="passwordConfirmation" class="w-full border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic mb-5" placeholder="Confirm your password" />
              </div>

              <button type="submit" class="py-3 px-2 bg-[#fcb215] hover:bg-[#d18f1c] w-full rounded-lg transition-all delay-75 ease-in-out">Register</button>

            </form>


        </section>

    </main>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>