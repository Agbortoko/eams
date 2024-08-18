
<?php require_once __DIR__ . '/templates/header.php' ?>
<?php require_once __DIR__ . '/templates/navigation.php' ?>

    <main class="flex min-h-screen w-full overflow-hidden mt-10 relative z-10">

      <?php require_once __DIR__ . '/templates/sidebar.php' ?>

        <section class="w-full md:w-[calc(100% - 250px)] min-h-screen overflow-y-auto py-20 px-4 md:ml-[250px]">
            <div class="container mx-auto">
               
                <div class="flex items-center justify-between">
                   <div>
                        <h1 class="text-4xl font-semibold mb-8">Settings</h1>
                   </div>

                   <div>
                        <a href="<?= baseUrl('admin') ?>" class="font-semibold text-[#fcb215] text-xl cursor-pointer hover:underline"> Home </a> / <span class="text-xl"> Settings</span>
                   </div>
                </div>


                <div class="grid grid-cols-1 gap-8 mb-8">

                    <div class="min-h-fit p-10 bg-white shadow rounded-lg border-b-4 border-b-primary">

                            <form action="<?= baseUrl('admin/action/save_settings.php') ?>" method="POST" class="" autocomplete="off">

                                <div class="mb-3">
                                    <label for="siteName">Site Name</label>
                                    <input type="text" name="siteName" id="siteName" class="border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic " placeholder="Type the Site Nmae" value="<?= getConfig('site_name'); ?>" />
                                </div>

                                <div class="mb-3">
                                    <label for="adminEmail">Admin Email</label>
                                    <input type="email" name="adminEmail" id="adminEmail" class="border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic peer" placeholder="username@example.com" value="<?= getConfig('admin_email'); ?>" />
                                        <p class="hidden peer-invalid:block text-red-600 text-sm">
                                        Please provide a valid email address.
                                        </p>
                                </div>

                                <div class="mb-3">
                                    <label for="baseUrl">Base Url</label>
                                    <input type="url" name="baseUrl" id="baseUrl" class="border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic " placeholder="Type the Base Url" value="<?= getConfig('base_url'); ?>" />
                                </div>

                                <div class="mb-3">
                                    <label for="adminRegistration">Admin Registration</label>
                                    <select name="adminRegistration" id="adminRegistration" class="bg-white border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic">
                                        <?php if(getConfig('admin_registration') == 1): ?>
                                                <option value="activated" selected>Activated</option>
                                                <option value="deactivated">Deactivated</option>  
                                        <?php else: ?>
                                                <option value="activated">Activated</option>
                                                <option value="deactivated" selected>Deactivated</option>    
                                        <?php endif ?>
                                       
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="appMode">App Mode</label>
                                    <select name="appMode" id="appMode" class="bg-white border border-slate-300 rounded-lg py-3 px-2 w-full placeholder:italic">
                                        <?php if(getConfig('app_mode') == "production"): ?>
                                                <option value="production" selected>Production</option>
                                                <option value="development">Development</option>  
                                        <?php elseif(getConfig('app_mode') == "development"): ?>
                                                <option value="production">Production</option>
                                                <option value="development" selected>Development</option>    
                                        <?php endif ?>
                                       
                                    </select>
                                </div>

                                
                                <button type="submit" class="py-3 px-2 bg-primary hover:bg-primary-dark w-full rounded-lg transition-all delay-75 ease-in-out">Save</button>

                            </form>

                    </div>

                </div>

               

            </div>
        </section>

    </main>
    
    <?= toast('success', 'settings_saved', "Settings Saved Successfully"); ?>
    <?= toast('success', 'loginsuccess', "Login Successfully"); ?>
    <?= toast('error', 'invalidrequest', "Invalid Request!"); ?>
    <?= toast('error', 'emptyfield', "One or More fields are empty!"); ?>
    <?= toast('error', 'settings_not_saved', "Settings Not Saved Successfully"); ?>
    <?= toast('error', 'exceptionerror', "Unexpected Error! Please try again"); ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>
