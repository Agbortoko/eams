
<?php require_once __DIR__ . '/../templates/header.php' ?>

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


<?php require_once __DIR__ . '/../templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/../templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <h1 class="text-4xl font-semibold">Students in <?= strtoupper($batch['title']) ?></h1>
                        <a href="<?= baseUrl('admin/batch/') ?>" class="bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 py-3 px-2 w-fit rounded-lg text-xl text-white">Back to All Batches</a>
                    </div>
                
                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Students in <?= $batch['title'] ?></span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8">

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                    <table id="dTable" class="dTable display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Full Names</th>
                                <th>Department</th>
                                <th>School</th>
                                <th>Batch</th>
                                <th>Date Of Birth</th>
                            </tr>
                        </thead>
                        <tbody>

                           <?php if(isset($students) && count($students) > 0): ?>

                            <?php foreach($students as $student): ?>
                                
                                <tr>
                                    <td><?= $student["first_name"] . " " . $student['last_name'] ?></td>
                                    <td><?= $student['department'] ?></td>
                                    <td><?= $student['school'] ?></td>
                                    <td><?= $batch['title'] ?></td>
                                    <td><?= $student['date_of_birth'] ?></td>
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

<?php require_once __DIR__ . '/../templates/footer.php' ?>

<?php endif ?>
