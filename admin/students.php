<?php require_once __DIR__ . '/templates/header.php' ?>

<?php
    $query = "SELECT * FROM students";
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
                    <h1 class="text-4xl font-semibold mb-8">All Students</h1>
                </div>

                <div>
                    <a href="<?= baseUrl('admin') ?>" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Students</span>
                </div>
            </div>


            <div class="grid grid-cols-1 gap-8 mb-8">

                <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                    <table id="dTable" class="display dTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Full Names</th>
                                <th>Department</th>
                                <th>School</th>
                                <th>Approved</th>
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
                                    <td>
                                        <?php if($student['is_approved'] == 1): ?>
                                             <span class="rounded-lg text-sm py-2 px-3 text-green-600 bg-green-100">Yes</span>
                                        <?php elseif($student['is_approved'] == 0): ?>
                                            <span class="rounded-lg text-sm py-2 px-3 text-red-600 bg-red-100">No</span>
                                        <?php endif?>
                                    </td>
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
                                <th>Approved</th>
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
<?= toast('success', 'loginsuccess', "Login Successfully"); ?>
<?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
<?= toast('error', 'settings_not_saved', "Settings Not Saved Successfully"); ?>
<?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>