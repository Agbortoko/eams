<?php require_once __DIR__ . '/templates/header.php' ?>

<?php 

        $admin = [];
        $user = [];

        $userID = $_SESSION['loginID'];

        $query = "SELECT * FROM users WHERE id = $userID";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
        }

        $adminQuery = "SELECT * FROM admins WHERE user_id = $userID";
        $adminResult = mysqli_query($connection, $adminQuery);

        if(mysqli_num_rows($adminResult) == 1) {
            $admin = mysqli_fetch_assoc($adminResult);
        }
?>


<?php require_once __DIR__ . '/templates/navigation.php' ?>

<main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

    <?php require_once __DIR__ . '/templates/sidebar.php' ?>

    <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
        <div class="container mx-auto">

            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-semibold mb-8">Profile Settings</h1>
                </div>

                <div>
                    <a href="<?= baseUrl('admin') ?>" class="font-semibold text-primary text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Profile Settings</span>
                </div>
            </div>


            <div class="grid grid-cols-1 gap-8 mb-8">

                <h2 class="text-2xl font-semibold">User Account Details</h2>

                <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                    <form action="<?= baseUrl('admin/action/update_profile_user_account.php') ?>" method="POST" autocomplete="off">

                        <input type="hidden" name="userID" value="<?= $user['id'] ?>">

                        <div class="mb-3">
                            <label for="email" class="block mb-3">Email Address <span class="bg-red-500 px-3 py-1 rounded text-white text-sm inline-block ms-4">You will need to carry out email verification</span></label>
                            <input type="email" name="email" id="email" class="border border-slate-300 rounded-lg px-3 py-2 w-full placeholder:italic " placeholder="Type email" value="<?= $user['email'] ?>" />
                        </div>


                        <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Update</button>

                    </form>

                </div>

                <h2 class="text-2xl font-semibold">Admin Information</h2>

                <div class="min-h-fit p-10 bg-white shadow rounded-lg">
                    <form action="<?= baseUrl('admin/action/update_profile_admin_info.php') ?>" method="POST" autocomplete="off">
                        <input type="hidden" name="adminID" value="<?= $admin['id'] ?>">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                            <div>
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" id="firstName" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" placeholder="Type your First Name" value="<?= $admin['first_name'] ?>" />
                            </div>

                            <div>
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" id="lastName" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" placeholder="Type your Last Name" value="<?= $admin['last_name'] ?>" />
                            </div>
                        </div>

                        <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Update</button>

                    </form>
                </div>


                <h2 class="text-2xl font-semibold">Change Password</h2>

                <div class="min-h-fit p-10 bg-white shadow rounded-lg">
                    <form action="<?= baseUrl('admin/action/update_profile_password.php') ?>" method="POST" autocomplete="off">

                        <input type="hidden" name="userID" value="<?= $user['id'] ?>">
                        <div class="mb-3">
                            <label for="oldPassword">Old Password</label>
                            <input type="password" name="oldPassword" id="oldPassword" class="w-full border border-slate-300 rounded-lg py-3 px-2  placeholder:italic" placeholder="Type your old password" />
                        </div>

                        <div class="mb-3">
                            <label for="newPassword">New Password</label>
                            <input type="password" name="newPassword" id="newPassword" class="w-full border border-slate-300 rounded-lg py-3 px-2  placeholder:italic" placeholder="Type your new password" />
                        </div>

                        <div class="mb-3">
                            <label for="passwordConfirmation">Password Confirmation</label>
                            <input type="password" name="passwordConfirmation" id="passwordConfirmation" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" placeholder="Confirm new password" />
                        </div>

                        <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Update</button>

                    </form>
                </div>

            </div>





        </div>
    </section>

</main>

<?= toast('success', 'settings_saved', "Settings Saved Successfully"); ?>
<?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
<?= toast('success', 'loginsuccess', "Login Successfully"); ?>
<?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
<?= toast('error', 'invalidoldpassword', "Incorrect Old Password"); ?>
<?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>
<?= toast('success', 'admin_info_updated', "Admin Information updated successfully"); ?>
<?= toast('error', 'admin_info_not_updated', "Admin Information not updated successfully"); ?>
<?= toast('success', 'password_reset_success', "Password updated successfully"); ?>
<?= toast('error', 'password_reset_failed', "Password not updated successfully"); ?>
<?= toast('error', 'confirmpassworderror', "Password does not match the Password Confirm field"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>