<?php $pageTitle = "Modify Student"; ?>
<?php require_once __DIR__ . '/../templates/header.php' ?>

<?php if(!isset($_GET['student_id'])): ?>
    
    <?php 
        http_response_code(404); 
        redirect(baseUrl("admin/students.php", ["error" => "invalidrequest"]));
    ?>
<?php else: ?>

<?php 
    $student = [];
    $user = [];
    $batches = [];


    $id = $_GET['student_id'];
    $query = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1) {
        $student = mysqli_fetch_assoc($result);
    }
    $userID = $student['user_id'];
    $userQuery = "SELECT * FROM users WHERE id = $userID";
    $userResult = mysqli_query($connection, $userQuery);

    if(mysqli_num_rows($userResult) == 1) {
        $user = mysqli_fetch_assoc($userResult);
    }


    $batchQuery = "SELECT * FROM batches";
    $batchResult = mysqli_query($connection, $batchQuery);
    
    if(mysqli_num_rows($batchResult) > 0) {
        $batches = mysqli_fetch_all($batchResult, MYSQLI_ASSOC);
    }
?>


<?php 
    // check if student batch exist before editing
    if(!isset($student['batch_id']) || $student['batch_id'] == 0): 
        redirect(baseUrl("admin/students.php", ["error" => "invalidrequest"]));
?>

<?php else: ?>
<?php require_once __DIR__ . '/../templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/../templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between mb-8">
                 <div class="flex items-center gap-4">
                        <h1 class="text-4xl font-semibold">Modify Student</h1>
                        <a href="<?= baseUrl('admin/students.php') ?>" class="bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 py-2 px-3 w-fit rounded-lg text-xl text-white">Back to All Students</a>
                   </div>

                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-primary text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Modify Student</span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8">

                    <h2 class="text-2xl font-semibold">User Account Details</h2>

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                    <form action="<?= baseUrl('admin/action/update_student_user_account.php') ?>" method="POST" autocomplete="off">

                            <input type="hidden" name="userID" value="<?= $user['id'] ?>">
                            <input type="hidden" name="studentID" value="<?= $student['id'] ?>">

                            <div class="mb-3">
                                <label for="email" class="block mb-3">Email Address <span class="bg-red-500 px-3 py-1 rounded text-white text-sm inline-block ms-4">Student will need to carry out email verification</span></label>
                                <input type="email" name="email" id="email" class="border border-slate-300 rounded-lg px-3 py-2 w-full placeholder:italic " placeholder="Type email" value="<?= $user['email'] ?>" />
                            </div>


                            <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Update</button>

                    </form>

                    </div>
                    
                    <h2 class="text-2xl font-semibold">Student Information</h2>

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">
                        <form action="<?= baseUrl('admin/action/update_student_info.php') ?>" method="POST" autocomplete="off">
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

                                <div class="mb-3">
                                    <label for="studentBatch" class="block mb-3">Student Batch</label>
                          
                                    <select name="batch" id="studentBatch" class="bg-white border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic">
                                        <option disabled selected>Select a Batch</option>
                                        <?php if(count($batches) > 0 && isset($batches)): ?>
                                              
                                              <?php foreach($batches as $batch): ?>

                                                <?php if($student['batch_id'] == $batch['id']): ?>
                                                    <option value="<?= $batch['id'] ?>" selected><?= strtoupper($batch['title']) ?></option>
                                                <?php else: ?>
                                                    <option value="<?= $batch['id'] ?>"><?= strtoupper($batch['title']) ?></option>
                                                <?php endif ?>  

                                              <?php endforeach ?>
                                      
                                        
                                        <?php endif ?>
                                       
                                    </select>
                               
                                </div>


                                <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Update</button>

                        </form>
                    </div>


                    <h2 class="text-2xl font-semibold">Change Password</h2>

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">
                        <form action="<?= baseUrl('admin/action/update_student_password.php') ?>" method="POST" autocomplete="off">

                            <input type="hidden" name="userID" value="<?= $user['id'] ?>">
                            <input type="hidden" name="studentID" value="<?= $student['id'] ?>">

                            <div class="mb-3">
                                <label for="newPassword">New Password</label>
                                <input type="password" name="newPassword" id="newPassword" class="w-full border border-slate-300 rounded-lg py-3 px-2  placeholder:italic" placeholder="Type new password" />
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
    <?= toast('error', 'student_attendance_exists', "You already marked an attendance! Cannot modify student BATCH"); ?>
    <?= toast('success', 'password_reset_success', "Password updated successfully"); ?>
    <?= toast('error', 'password_reset_failed', "Password not updated successfully"); ?>
    <?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>
    <?= toast('error', 'confirmpassworderror', "Password does not match the Password Confirm field"); ?>

<?php require_once __DIR__ . '/../templates/footer.php' ?>

<?php endif ?>
<?php endif ?>