<?php $pageTitle = "Admin Details"; ?>
<?php require_once __DIR__ . "/../templates/header.php"; ?>
<?php require_once basePath('middleware/check_admin_register_disabled.php'); ?>
<?php require_once basePath('middleware/check_is_admin.php'); ?>
<?php require_once basePath('middleware/check_admin_with_details.php'); ?>

    <main class="py-10 px-2 min-h-screen bg-slate-100 dark:bg-gray-900 bg-pattern">

        <section class="container mx-auto flex flex-col items-center py-10 w-[500px]">

            <h1 class="text-4xl font-bold dark:text-white mb-8">Admin Account Details</h1>

            <form action="<?= baseUrl('auth/action/save_admin_details.php') ?>" method="POST" class="bg-white shadow rounded-lg w-full min-h-fit py-10 px-8">

              
            <h3 class="text-center italic text-slate-500 mb-5">Personal Details</h3>
               <div class="grid grid-cols-1 gap-4 mb-5">
                    <div>
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" id="firstName" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" placeholder="Type your First Name" />
                    </div>

                    <div>
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" placeholder="Type your Last Name" />
                    </div>
               </div>

              <button type="submit" class="py-3 px-2 bg-[#fcb215] hover:bg-[#d18f1c] w-full rounded-lg transition-all delay-75 ease-in-out">Save</button>

            </form>


        </section>

    </main>

    <?= toast('success', 'user_registered', "User Registered Successfully"); ?>

    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('error', 'student_details_save_failed', "Student Details not Save Failed!"); ?>
    <?= toast('error', 'emptyfield', "All fields are required!"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error!"); ?>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>