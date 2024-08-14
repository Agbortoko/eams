<?php require_once __DIR__ . '/../includes/functions.php'; ?>
<?php require_once __DIR__ . '/templates/header.php' ?>
<?php require_once __DIR__ . '/templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between">
                   <div>
                        <h1 class="text-4xl font-semibold mb-8">Analytics</h1>
                   </div>

                   <div>
                        <a href="#" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Analytics</span>
                   </div>
                </div>


                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

                    <div class="bg-white shadow rounded-lg min-h-[180px] w-full hover:scale-105 transition-all ease-in-out delay-75"></div>
                    <div class="bg-white shadow rounded-lg min-h-[180px] w-full hover:scale-105 transition-all ease-in-out delay-75"></div>
                    <div class="bg-white shadow rounded-lg min-h-[180px] w-full hover:scale-105 transition-all ease-in-out delay-75"></div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <div class="col-span-1 min-h-[500px] bg-white shadow rounded-lg"></div>
                    <div class="col-span-2 min-h-[500px] bg-white shadow rounded-lg"></div>

                </div>
               

            </div>
        </section>

    </main>

<?php require_once __DIR__ . '/templates/footer.php' ?>
