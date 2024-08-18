<?php $pageTitle = "Students"; ?>
<?php require_once __DIR__ . '/templates/header.php' ?>

<?php if((!isset($_GET['date']) || $_GET['date'] == '') || !isset($_GET['batch'])): ?>

    <?php 
         http_response_code(404);
         redirect(baseUrl('admin/reports.php', ['error' => "emptyfield"]));
    ?>

<?php else: ?>

<?php   

    $attendances = [];
    $students = [];
    $batch = [];

    $date = $_GET['date'];
    $batchID = $_GET['batch'];

    // Get Attendances for Batch That match the date
    $query = "SELECT * FROM attendance WHERE batch_id = $batchID AND marked_date = '$date'";
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $attendances = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    // Get students in batch
    $sQuery = "SELECT * FROM students WHERE batch_id = $batchID";
    $sResult = mysqli_query($connection, $sQuery);

    if(mysqli_num_rows($sResult) > 0) {
        $students = mysqli_fetch_all($sResult, MYSQLI_ASSOC);
    }

    // Get batch
    $batchQuery = "SELECT * FROM batches WHERE id = $batchID";
    $batchResult = mysqli_query($connection, $batchQuery);
    
    if(mysqli_num_rows($batchResult)) {
        $batch = mysqli_fetch_assoc($batchResult);
    }

    
?>


<?php require_once __DIR__ . '/templates/navigation.php' ?>

<main x-data="{ deleteModalOpen : false, studentID : 0, userID: 0}" class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

    <?php require_once __DIR__ . '/templates/sidebar.php' ?>

    <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
        <div class="container mx-auto">

            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-semibold mb-8">All Students</h1>
                </div>

                <div>
                    <a href="<?= baseUrl('admin') ?>" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Students</span>
                </div>
            </div>


            <div class="grid grid-cols-1 gap-8 mb-8">

                <div class="min-h-fit p-10 bg-white shadow rounded-lg border-b-4 border-b-primary overflow-x-auto">

                    <table id="dTable" class="display dTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Full Names</th>
                                <th>Batch</th>
                                <th>Status</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php if(isset($attendances) && count($attendances) > 0): ?>
                            
                                <?php if(isset($students) && count($students) > 0): ?>

                                    <?php foreach($attendances as $attendance): ?>

                                        <?php foreach($students as $student): ?>

                                            <?php if($student['id'] == $attendance['student_id'] && $student['batch_id'] == $attendance['batch_id']): ?>

                                                <tr>
                                                    <td><?= $student["first_name"] . " " . $student['last_name'] ?></td>
                                                
                                                    <td><?= strtoupper($batch['title']) ?></td>
                                                    <td>
                                                        <?php if($attendance['is_present'] == 0): ?>
                                                            <span class="rounded-lg text-sm py-2 px-3 text-orange-600 bg-orange-100 border border-orange-600">Absent</span>
                                                        <?php elseif($attendance['is_present'] == 1): ?>
                                                            <span class="rounded-lg text-sm py-2 px-3 text-green-600 bg-green-100 border border-green-600">Present</span>
                                                        <?php endif?>

                                                        <td><?= $attendance['note'] ?></td>
                                                    </td>
                                                </tr>

                                            <?php endif ?>
                                            
                                        <?php endforeach ?>

                                    <?php endforeach ?>

                                <?php endif ?>

                        <?php endif ?>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Full Names</th>
                                <th>Batch</th>
                                <th>Status</th>
                                <th>Note</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>



        </div>
    </section>

    <div x-show="deleteModalOpen" x-transition class="fixed top-0 bottom-0 left-0 w-full h-full bg-black bg-opacity-5 backdrop-blur z-[80] flex items-center justify-center" style="display: none;">

    <div class="w-[500px] mx-auto rounded-lg min-h-[200px] bg-white relative py-5 px-8">
        <button @click="deleteModalOpen = false" class="absolute right-3 top-3"> <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
            </svg> </button>


        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 block mx-auto fill-red-500 animate-bounce" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
        </svg>

        <div class="mb-5">
            <h3 class="text-center text-2xl font-semibold mb-3">Delete Notice!</h3>
            <p>Deleting this student will completely remove them from the system. Are you sure you want to delete?</p>
        </div>

        <div class="w-full flex items-center justify-end gap-2">
            <button @click="deleteModalOpen=false" class="rounded-lg py-2 px-3 w-fit bg-gray-600 text-white hover:bg-gray-700 block">Cancel</button>

            <form action="<?= baseUrl('admin/action/delete_student.php') ?>" class="block w-fit" method="POST">
                <input type="hidden" name="studentID" :value="studentID" />
                <input type="hidden" name="userID" :value="userID" />
                <button class="rounded-lg py-2 px-3 w-fit bg-red-600 text-white hover:bg-red-700" type="submit">Delete</button>
            </form>
        </div>

    </div>

    </div>

</main>

<?= toast('success', 'settings_saved', "Settings Saved Successfully"); ?>
<?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
<?= toast('success', 'loginsuccess', "Login Successfully"); ?>
<?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
<?= toast('error', 'settings_not_saved', "Settings Not Saved Successfully"); ?>
<?= toast('success', 'student_deleted', "Student Deleted Successfully"); ?>
<?= toast('error', 'student_not_deleted', "Student Not Deleted Successfully"); ?>
<?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>

<?php endif ?>