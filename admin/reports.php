<?php $pageTitle = "Reports"; ?>
<?php require_once __DIR__ . '/templates/header.php' ?>
<?php
    $batches = [];
    $batchQuery = "SELECT * FROM batches";
    $batchResult = mysqli_query($connection, $batchQuery);
    
    if(mysqli_num_rows($batchResult) > 0) {
        $batches = mysqli_fetch_all($batchResult, MYSQLI_ASSOC);
    }
?>


<?php require_once __DIR__ . '/templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between">
                   <div>
                        <h1 class="text-4xl font-semibold mb-8">Reports</h1>
                   </div>

                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-primary text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Reports</span>
                   </div>
                </div>


                <div class="grid gap-8 mb-8">


                        <h2 class="text-2xl font-semibold">View Batch Attendance for a specific date</h2>

                        <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                            <form action="<?= baseUrl('admin/attendance_report.php') ?>" method="GET" autocomplete="off">

                                <div class="mb-3">
                                    <label for="date" class="block mb-3">Attendance Date</label>
                                    <input type="date" name="date" id="date" class="border border-slate-300 rounded-lg px-3 py-2 w-full placeholder:italic"  required/>
                                </div>

                                <div class="mb-3">
                                    <label for="studentBatch" class="block mb-3">Batch</label>
                          
                                    <select name="batch" id="studentBatch" class="bg-white border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic" required>
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


                                <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Generate</button>

                            </form>

                        </div>
                  
                </div>


            

             
        
               

            </div>
        </section>


        

    </main>
    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('success', 'admin_details_saved', "Administrators Details Saved Successfully"); ?>
    <?= toast('success', 'loginsuccess', "Login Successfully"); ?>
    <?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>
