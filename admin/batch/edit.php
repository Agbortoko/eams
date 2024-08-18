
<?php require_once __DIR__ . '/../templates/header.php' ?>

<?php if(!isset($_GET['batch_id'])): ?>
    <?php 
        http_response_code(404); 
        redirect(baseUrl("admin/batch/index.php", ["error" => "invalidrequest"]));
    ?>
<?php else: ?>

<?php 
    $batch = [];
    $id = $_GET['batch_id'];
    $query = "SELECT * FROM batches WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1) {
        $batch = mysqli_fetch_assoc($result);
    }
?>

<?php require_once __DIR__ . '/../templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/../templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between mb-8">
                 <div class="flex items-center gap-4">
                        <h1 class="text-4xl font-semibold">Modify Batch</h1>
                        <a href="<?= baseUrl('admin/batch') ?>" class="bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 py-2 px-3 w-fit rounded-lg text-xl text-white">Back to All Batches</a>
                   </div>

                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-primary text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Modify Batch</span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8">

                    <div class="min-h-[500px] p-10 bg-white shadow rounded-lg">

                    <form action="<?= baseUrl('admin/action/update_batch.php') ?>" method="POST" autocomplete="off">

                            <input type="hidden" name="id" value="<?= $batch['id'] ?>">
                            <div class="mb-3">
                                <label for="title" class="block mb-3">Batch Title</label>
                                <input type="text" name="title" id="title" class="border border-slate-300 rounded-lg px-3 py-2 w-full placeholder:italic " placeholder="Type the batch title" value="<?= $batch['title'] ?>" />
                            </div>

                            <div class="mb-3">
                                <label for="description" class="block mb-2">Description</label>
                               <textarea name="description" class="w-full border border-slate-300 resize-none min-h-[300px] px-3 py-2 placeholder:italic" id="description" placeholder="Type the batch description"><?= $batch['description'] ?></textarea>
                            </div>

                            <button class="py-2 px-3 bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 rounded-lg text-white">Update Batch</button>

                    </form>

                    </div>

                </div>

               

            </div>
        </section>

    </main>

    <?= toast('success', 'batch_updated', "Batch updated successfully"); ?>
    <?= toast('error', 'batch_not_updated', "Batch not updated successfully"); ?>
    <?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>

<?php require_once __DIR__ . '/../templates/footer.php' ?>


<?php endif ?>