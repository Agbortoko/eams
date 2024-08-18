<?php require_once __DIR__ . '/templates/header.php' ?>

<?php
    $query = "SELECT * FROM students WHERE is_approved = 1 ORDER BY batch_id ASC";
    $result = mysqli_query($connection, $query);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);;
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

                <div class="min-h-fit p-10 bg-white shadow rounded-lg border-b-4 border-b-primary">

                    <table id="dTable" class="display dTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Full Names</th>
                                <th>Department</th>
                                <th>School</th>
                                <th>Batch</th>
                                <th>Date Of Birth</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                           <?php if(isset($students) && count($students) > 0): ?>

                            <?php foreach($students as $student): ?>
                                
                                <tr>
                                    <td><?= $student["first_name"] . " " . $student['last_name'] ?></td>
                                    <td><?= $student['department'] ?></td>
                                    <td><?= $student['school'] ?></td>
                                    <td>
                                        <?php if($student['batch_id'] !== 0): ?>

                                            <?php 
                                                $batch = [];
                                                $studentBatch = $student['batch_id'];
                                                $batchQuery = "SELECT * FROM batches WHERE id = $studentBatch";
                                                $batchResult = mysqli_query($connection, $batchQuery);

                                                if(mysqli_num_rows($batchResult) == 1) {
                                                    $batch = mysqli_fetch_assoc($batchResult);
                                                }
                                            ?>

                                            <?= strtoupper($batch['title']) ?>
                                       
                                        <?php endif?>
                                    </td>
                                    <td><?= $student['date_of_birth'] ?></td>
                                    <td class="flex justify-center items-center gap-x-2">
                                            <a href='<?= baseUrl("admin/student/edit.php?student_id=" . $student['id']) ?>' class="btn btn-blue rounded-lg w-fit text-white my-3 block">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>

                                            </a>

                                            <button @click="deleteModalOpen=!deleteModalOpen; studentID = <?= $student['id'] ?>; userID = <?= $student['user_id'] ?>" class="bg-red-600 py-2 px-3 rounded-lg hover:bg-red-700 w-fit text-white flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                </svg>
                                            </button>
                                    </td>
                                </tr>

                            <?php endforeach ?>

                          <?php endif ?>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Full Names</th>
                                <th>Department</th>
                                <th>School</th>
                                <th>Batch</th>
                                <th>Date Of Birth</th>
                                <th>Action</th>
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