<?php require_once __DIR__ . '/../templates/header.php' ?>

<?php
$query = "SELECT * FROM batches";
$result = mysqli_query($connection, $query);
$batches = mysqli_fetch_all($result, MYSQLI_ASSOC);;
?>

<?php require_once __DIR__ . '/../templates/navigation.php' ?>

<main x-data="{ deleteModalOpen : false, batchID : 0}" class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

    <?php require_once __DIR__ . '/../templates/sidebar.php' ?>

    <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
        <div class="container mx-auto">

            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-4">
                    <h1 class="text-4xl font-semibold">Batches</h1>
                    <a href="<?= baseUrl('admin/batch/add.php') ?>" class="bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 py-3 px-2 w-fit rounded-lg text-xl text-white">Add New Batch</a>
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

                            <?php if (isset($batches) && count($batches) > 0): ?>

                                <?php foreach ($batches as $batch): ?>

                                    <tr>
                                        <td><?= strtoupper($batch['title']) ?></td>
                                        <td><?= empty($batch['description']) ? "No description" : substr($batch['description'], 0, 50) . "..." ?></td>
                                        <td class="flex justify-center items-center gap-x-2">

                                            <a href="<?= baseUrl('admin/batch/batch_students.php?batch_id='.$batch['id']) ?>" class="btn btn-green w-fit text-white my-3 flex gap-2 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />

                                                </svg>

                                                <span class="text-lg">Students</span>
                                            </a>

                                            <a href='<?= baseUrl("admin/batch/edit.php?batch_id=" . $batch['id']) ?>' class="btn btn-blue rounded-lg w-fit text-white my-3 block">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>

                                            </a>

                                            <button @click="deleteModalOpen=!deleteModalOpen; batchID = <?= $batch['id'] ?>" class="bg-red-600 py-2 px-3 rounded-lg hover:bg-red-700 w-fit text-white flex items-center gap-2">
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


    <div x-show="deleteModalOpen" x-transition class="overlay fixed top-0 bottom-0 left-0 w-full h-full bg-black bg-opacity-20 z-[80] flex items-center justify-center">

        <div class="w-[500px] mx-auto rounded-lg min-h-[200px] bg-white relative py-5 px-8">
            <button @click="deleteModalOpen = false" class="absolute right-3 top-3"> <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg> </button>


            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 block mx-auto fill-red-500 animate-bounce" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
            </svg>

            <div class="mb-5 text-center">
                <h3 class="text-center text-2xl font-semibold mb-3">Delete Notice!</h3>

                <p>
                    Are you sure you want to delete this item?
                </p>

            </div>

            <div class="w-full flex items-center justify-between gap-2">
                <button @click="deleteModalOpen=false" class="rounded-lg py-2 px-3 w-fit bg-gray-600 text-white hover:bg-gray-700 block">Cancel</button>

                <form action="<?= baseUrl('admin/action/delete_batch.php') ?>" class="block" method="POST">
                    <input type="hidden" name="id" :value="batchID" />
                    <button class="rounded-lg py-2 px-3 w-fit bg-red-600 text-white hover:bg-red-700" type="submit">Delete</button>
                </form>
            </div>

        </div>

    </div>


</main>




<?= toast('success', 'batch_created', "Batch Created Sucessfully"); ?>
<?= toast('success', 'batch_deleted', "Batch Deleted Sucessfully"); ?>
<?= toast('error', 'batch_not_deleted', "Batch not deleted successfully"); ?>
<?= toast('error', 'cannot_delete_batch', "Batch cannot be deleted at the moment"); ?>
<?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
<?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>

<?php require_once __DIR__ . '/../templates/footer.php' ?>