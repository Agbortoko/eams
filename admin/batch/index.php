
<?php require_once __DIR__ . '/../templates/header.php' ?>
<?php require_once __DIR__ . '/../templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/../templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between mb-8">
                   <div class="flex items-center gap-4">
                        <h1 class="text-4xl font-semibold">Batches</h1>
                        <a href="#" class="bg-primary hover:bg-primary-dark transition-all ease-in-out delay-75 py-3 px-2 w-fit rounded-lg text-xl">Add New Batch</a>
                   </div>

                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Batches</span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8">

                    <div class="min-h-[500px] p-10 bg-white shadow rounded-lg">

                           

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
