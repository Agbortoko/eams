<?php $pageTitle = "Approve Students"; ?>
<?php require_once __DIR__ . '/templates/header.php' ?>

<?php
    $query = "SELECT * FROM students WHERE is_approved = 0";
    $result = mysqli_query($connection, $query);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);;
?>


<?php require_once __DIR__ . '/templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between">
                   <div>
                        <h1 class="text-4xl font-semibold mb-8">Approve Students</h1>
                   </div>

                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Approve Students</span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8">

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg border-b-4 border-b-primary">

                    <table id="dTable" class="dTable display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Full Names</th>
                                <th>Department</th>
                                <th>School</th>
                                <th>Status</th>
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
                                        <?php if($student['is_approved'] == 0): ?>
                                            <span class="rounded-lg text-sm py-2 px-3 text-orange-600 bg-orange-100 border border-orange-600">Pending</span>
                                        <?php endif?>
                                    </td>
                                    <td>
                                        <?php if($student['is_approved'] == 0): ?>
                                            <a href="<?= baseUrl('admin/approve_student.php?student_id='. $student['id']) ?>" class="btn btn-green py-2 px-3 rounded-lg text-white my-3 block w-fit mx-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                                </svg>
                                            </a>
                                        <?php endif ?>
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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                    </div>

                </div>

               

            </div>
        </section>

    </main>
    
    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('success', 'settings_saved', "Settings Saved Successfully"); ?>
    <?= toast('success', 'student_approved', "Student Approved Successfully"); ?>
    <?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
    <?= toast('error', 'settings_not_saved', "Settings Not Saved Successfully"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>
