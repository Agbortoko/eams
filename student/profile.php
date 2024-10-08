<?php $pageTitle = "Profile Settings"; ?>
<?php require_once __DIR__ . '/templates/header.php' ?>

<?php 

    $student = [];
    $user = [];
    $batches = [];

    $userID = $_SESSION['loginID'];

    $query = "SELECT * FROM students WHERE user_id = $userID";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1) {
        $student = mysqli_fetch_assoc($result);
    }

    $userQuery = "SELECT * FROM users WHERE id = $userID";
    $userResult = mysqli_query($connection, $userQuery);

    if(mysqli_num_rows($userResult) == 1) {
        $user = mysqli_fetch_assoc($userResult);
    }

?>


<?php require_once __DIR__ . '/templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between mb-8">
          
                    <h1 class="text-4xl font-semibold">Profile Settings</h1>
                
                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-primary text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Profile Settings</span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8">

                    <h2 class="text-2xl font-semibold">User Account Details</h2>

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                    <form action="<?= baseUrl('student/action/update_profile_user_account.php') ?>" method="POST" autocomplete="off">

                            <input type="hidden" name="userID" value="<?= $user['id'] ?>">
                            <input type="hidden" name="studentID" value="<?= $student['id'] ?>">

                            <div class="mb-3">
                                <label for="email" class="block mb-3">Email Address <span class="bg-red-500 px-3 py-1 rounded text-white text-sm inline-block ms-4">On change you need to carryout email verification</span></label>
                                <input type="email" name="email" id="email" class="border border-slate-300 rounded-lg px-3 py-2 w-full placeholder:italic " placeholder="Type email" value="<?= $user['email'] ?>" />
                            </div>


                            <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Update</button>

                    </form>

                    </div>
                    
                    <h2 class="text-2xl font-semibold">Student Information</h2>

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">
                        <form action="<?= baseUrl('student/action/update_profile_student_info.php') ?>" method="POST" autocomplete="off">
                                <input type="hidden" name="studentID" value="<?= $student['id'] ?>">

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                                    <div>
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="firstName" id="firstName" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" placeholder="Type your First Name" value="<?= $student['first_name'] ?>" />
                                    </div>

                                    <div>
                                        <label for="lastName">Last Name</label>
                                        <input type="text" name="lastName" id="lastName" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" placeholder="Type your Last Name" value="<?= $student['last_name'] ?>" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="school">School of Study</label>
                                    <input type="text" name="school" id="school" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" placeholder="Type the name of your school" value="<?= $student['school'] ?>" />
                                </div>

                                <div class="mb-3">
                                    <label for="department">Department of Study</label>
                                    <input type="text" name="department" id="department" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" placeholder="Type your department of study" value="<?= $student['department'] ?>" />
                                </div>

                                <div class="mb-3">
                                    <label for="dateOfBirth">Date Of Birth</label>
                                    <input type="date" name="dateOfBirth" id="dateOfBirth" class="w-full border border-slate-300 rounded-lg py-3 px-2 placeholder:italic" value="<?= $student['date_of_birth'] ?>" />
                                </div>


                                <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Update</button>

                        </form>
                    </div>


                    <h2 class="text-2xl font-semibold">Change Password</h2>

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">
                        <form action="<?= baseUrl('student/action/update_profile_password.php') ?>" method="POST" autocomplete="off">

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

    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('success', 'user_account_updated', "Student User account updated successfully"); ?>
    <?= toast('success', 'student_info_updated', "Student Information updated successfully"); ?>
    <?= toast('error', 'student_info_not_updated', "Student Information not updated successfully"); ?>
    <?= toast('error', 'user_account_not_updated', "Student User account not updated successfully"); ?>
    <?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>
    <?= toast('error', 'invalidoldpassword', "Incorrect Old Password"); ?>
    <?= toast('success', 'password_reset_success', "Password updated successfully"); ?>
    <?= toast('error', 'password_reset_failed', "Password not updated successfully"); ?>
    <?= toast('error', 'confirmpassworderror', "Password does not match the Password Confirm field"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>
