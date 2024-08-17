
<?php require_once __DIR__ . '/../templates/header.php' ?>

<?php
    $query = "SELECT * FROM batches";
    $result = mysqli_query($connection, $query);
    $batches = mysqli_fetch_all($result, MYSQLI_ASSOC);;
?>

<?php require_once __DIR__ . '/../templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/../templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between mb-8">
                   <div class="flex items-center gap-4">
                        <h1 class="text-4xl font-semibold">Batches</h1>
                        <a href="#" class="bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 py-3 px-2 w-fit rounded-lg text-xl text-white">Add New Batch</a>
                   </div>

                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-primary text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Batches</span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8">

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg">

                            <table id="dTable" class="display dTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php if(isset($batches) && count($batches) > 0): ?>

                                    <?php foreach($batches as $batch): ?>
                                        
                                        <tr>
                                            <td><?= strtoupper($batch['title']) ?></td>
                                            <td><?= empty($batch['description']) ? "No description" : substr($batch['description'], 0, 50)."..." ?></td>
                                            <td class="flex justify-center items-center gap-x-2">

                                                    <a href="#" class="bg-green-600 hover:bg-green-700 transition-all ease-in-out delay-75 py-3 px-5 rounded-lg w-fit text-white my-3 flex gap-2 items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>

                                                            </svg>
                                                            
                                                            <span class="text-lg">Students</span>
                                                        </a>
                     
                                                        <a href="#" class="bg-blue-600 hover:bg-blue-700 transition-all ease-in-out delay-75 py-3 px-5 rounded-lg w-fit text-white my-3 block">
                                                            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                            </svg>

                                                        </a>

                                                        <form action="">
                                                            <button class="bg-red-600 hover:bg-red-700 rounded-lg py-3 px-5 w-fit text-white flex items-center gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                         
                                            </td>
                                        </tr>

                                    <?php endforeach ?>

                                <?php endif ?>
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Actions</th>
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

<?php require_once __DIR__ . '/../templates/footer.php' ?>
