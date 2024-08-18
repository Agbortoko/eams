<?php $pageTitle = "Mark Student Attendance"; ?>
<?php require_once __DIR__ . '/templates/header.php' ?>

<?php if(!isset($_GET['batch_id'])): ?>
    <?php 
        http_response_code(404);
        redirect(baseUrl('admin', ['error' => "invalidrequest"]));
    ?>
<?php else: ?>

<?php

    $students = [];
    $batch = [];
    $attendances = [];

    $batchID = $_GET['batch_id'];

    $query = "SELECT * FROM students WHERE batch_id = $batchID";
    $result = mysqli_query($connection, $query);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $batchQuery = "SELECT * FROM batches WHERE id = $batchID";
    $batchResult = mysqli_query($connection, $batchQuery);
    $batch = mysqli_fetch_assoc($batchResult);

    $today = date('Y-m-d');

    $attendanceQuery = "SELECT * FROM attendance WHERE batch_id = $batchID AND marked_date = '$today'";
    $attendanceResult = mysqli_query($connection, $attendanceQuery);
    $attendances = mysqli_fetch_all($attendanceResult, MYSQLI_ASSOC);
?>


<?php require_once __DIR__ . '/templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <h1 class="text-4xl font-semibold"><?= strtoupper($batch['title']) ?></h1>
                        <a href="<?= baseUrl('admin/mark.php') ?>" class="bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 py-2 px-3 w-fit rounded-lg text-xl text-white">Mark Attendance</a>
                    </div>
                
                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Mark Attendance for <?= $batch['title'] ?></span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8 border-b-4 border-b-primary">

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                    <h3 class="text-xl mb-10">Date: <span class="py-2 px-3 bg-primary rounded-lg text-white"><?= date('l dS F Y'); ?></span></h3>

                    <p class="mb-8 text-xl text-red-500"><strong>NOTE: </strong> Attendance can only be submitted once everyday! Be sure of student's status before submitting!</p>

                    <form action="<?= baseUrl('admin/action/mark_attendance.php') ?>" method="POST">
                        <input type="hidden" name="batchID" value="<?=$batchID?>" />

                        <table id="dTable" class="dTable display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Full Names</th>
                                    <th>Note (Reason for absence)</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php if(isset($students) && count($students) > 0): ?>
                                        <?php if(isset($attendances) && count($attendances) > 0): ?>

                                            <?php foreach($students as $student): ?>
                                                    <?php foreach($attendances as $attendance): ?>

                                                            <?php if($attendance['student_id'] == $student['id']): ?>

                                                                <?php if($attendance['is_present'] == 1): ?>
                                                            
                                                                    <tr>
                                                                    <td><?= $student["first_name"] . " " . $student['last_name'] ?></td>
                                                                        <td>
                                                                            <input type="text" name="note[<?= $student['id'] ?>][]" class="w-full py-3 px-3 border border-gray-500 rounded-lg placeholder:italic" id="note" placeholder="Reason for being absent" value="<?= $attendance['note'] ?>" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="block w-8 h-8 mx-auto cursor-pointer" type="radio" name="attendance[<?= $student['id'] ?>]" id="present" value="1" checked required>
                                                                        </td>
                                                                        <td>
                                                                            <input class="block w-8 h-8 mx-auto cursor-pointer" type="radio" name="attendance[<?= $student['id'] ?>]" id="absent" value="0" required>
                                                                        </td>
                                        
                                                                    </tr>

                                                                <?php elseif($attendance['is_present'] == 0): ?>

                                                                    <tr>
                                                                    <td><?= $student["first_name"] . " " . $student['last_name'] ?></td>
                                                                        <td>
                                                                            <input type="text" name="note[<?= $student['id'] ?>][]" class="w-full py-3 px-3 border border-gray-500 rounded-lg placeholder:italic" id="note" placeholder="Reason for being absent" value="<?= $attendance['note'] ?>" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="block w-8 h-8 mx-auto cursor-pointer" type="radio" name="attendance[<?= $student['id'] ?>]" id="present" value="1" required>
                                                                        </td>
                                                                        <td>
                                                                            <input class="block w-8 h-8 mx-auto cursor-pointer" type="radio" name="attendance[<?= $student['id'] ?>]" id="absent" value="0" checked required>
                                                                        </td>
                                        
                                                                    </tr>

                                                                <?php endif ?>

                                                            <?php endif ?>
                            
                                                    <?php endforeach ?>
                                            <?php endforeach ?>


                                        <?php else: ?>
                                                <?php foreach($students as $student): ?>
                                                    <tr>
                                                        <td><?= $student["first_name"] . " " . $student['last_name'] ?></td>
                                                        <td>
                                                            <input type="text" name="note[<?= $student['id'] ?>]" class="w-full py-3 px-3 border border-gray-500 rounded-lg placeholder:italic" id="note" placeholder="Reason for being absent" />
                                                        </td>
                                                        <td>
                                                            <input class="block w-8 h-8 mx-auto cursor-pointer" type="radio" name="attendance[<?= $student['id'] ?>]" id="present" value="1" required>
                                                        </td>
                                                        <td>
                                                            <input class="block w-8 h-8 mx-auto cursor-pointer" type="radio" name="attendance[<?= $student['id'] ?>]" id="absent" value="0" required>
                                                        </td>
                                
                                                    </tr>
                                                <?php endforeach ?>
    
                                        <?php endif ?>

                              <?php endif ?>
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Full Names</th>
                                    <th>Note (Reason for absence)</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                   
                                </tr>
                            </tfoot>
                        </table>

                        <button type="submit" class="py-2 px-3 bg-primary text-white hover:bg-primary-dark transition-all ease-in-out delay-75 block ms-auto rounded-lg mt-10">Submit Attendance</button>

                    </form>


                    </div>

                </div>

               

            </div>
        </section>

    </main>

    <?= toast('success', 'settings_saved', "Settings Saved Successfully"); ?>
    <?= toast('success', 'student_approved', "Student Approved Successfully"); ?>
    <?= toast('error', 'settings_not_saved', "Settings Not Saved Successfully"); ?>
    <?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
    <?= toast('error', 'today_attendance_exist', "You already marked the attendance for this batch"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>

<?php endif ?>
