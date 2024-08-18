
<?php require_once __DIR__ . '/templates/header.php' ?>

<?php if(!isset($_GET['batch_id'])): ?>
    <?php http_response_code(404); ?>
<?php else: ?>

<?php

    $batchID = $_GET['batch_id'];

    $query = "SELECT * FROM students WHERE batch_id = $batchID";
    $result = mysqli_query($connection, $query);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $batchQuery = "SELECT * FROM batches WHERE id = $batchID";
    $batchResult = mysqli_query($connection, $batchQuery);
    $batch = mysqli_fetch_assoc($batchResult);
?>


<?php require_once __DIR__ . '/templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <h1 class="text-4xl font-semibold">Mark Attendance for Students in <?= strtoupper($batch['title']) ?></h1>

                    </div>
                
                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Mark Attendance for <?= $batch['title'] ?></span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8 border-b-4 border-b-primary">

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                    <h3 class="text-xl mb-10">Date: <span class="py-2 px-3 bg-primary rounded-lg text-white"><?= date('l dS F Y'); ?></span></h3>

                    <table id="dTable" class="dTable display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Full Names</th>
                                <th>Department</th>
                                <th>School</th>
                                <th>Present</th>
                                <th>Absent</th>
                            
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
                                        <input class="block w-8 h-8 mx-auto cursor-pointer" type="radio" name="attendance[<?= $student['id'] ?>][]" id="present" value="1">
                                    </td>
                                    <td>
                                        <input class="block w-8 h-8 mx-auto cursor-pointer" type="radio" name="attendance[<?= $student['id'] ?>][]" id="absent" value="0">
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
                                <th>Present</th>
                                <th>Absent</th>
                               
                            </tr>
                        </tfoot>
                    </table>

                    </div>

                </div>

               

            </div>
        </section>

    </main>

    <?= toast('success', 'settings_saved', "Settings Saved Successfully"); ?>
    <?= toast('success', 'student_approved', "Student Approved Successfully"); ?>
    <?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
    <?= toast('error', 'settings_not_saved', "Settings Not Saved Successfully"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>

<?php endif ?>
