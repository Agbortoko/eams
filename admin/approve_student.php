
<?php require_once __DIR__ . '/templates/header.php' ?>

<?php if(!isset($_GET['student_id'])): ?>
    <?php http_response_code(404); ?>
<?php else: ?>

<?php   
    $studentID = $_GET['student_id'];
    $batches = [];
    $query = "SELECT * FROM batches";
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $batches = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<?php require_once __DIR__ . '/templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <h1 class="text-4xl font-semibold">Approve Student</h1>
                        <a href="<?= baseUrl('admin/approve.php') ?>" class="bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 py-2 px-3 w-fit rounded-lg text-xl text-white">Students Pending Approval</a>
                   </div>

                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Approve Student </span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8 border-b-4 border-b-primary">

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                    <form action="<?= baseUrl('admin/action/approve_student.php') ?>" method="POST" autocomplete="off">

                        <input type="hidden" name="student" value="<?= $studentID ?>">

                        <div class="mb-3">
                                    <label for="studentBatch" class="block mb-3">Assign Student to A batch</label>
                          
                                    <select name="batch" id="studentBatch" class="bg-white border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic">
                                        <option disabled selected>Select a Batch</option>
                                        <?php if(count($batches) > 0 && isset($batches)): ?>
                                              
                                              <?php foreach($batches as $batch): ?>

                                                <option value="<?= $batch['id'] ?>"><?= strtoupper($batch['title']) ?></option>

                                              <?php endforeach ?>
                                      
                                        
                                        <?php endif ?>
                                       
                                    </select>
                               
                        </div>



                        <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Approve Student</button>

                        </form>

                    </div>

                </div>

               

            </div>
        </section>

    </main>
    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('success', 'settings_saved', "Settings Saved Successfully"); ?>
    <?= toast('success', 'loginsuccess', "Login Successfully"); ?>
    <?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
    <?= toast('error', 'student_not_approved', "Students Not Approved Successfully"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>


<?php endif ?>