<?php require_once __DIR__ . '/../includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= siteName() ?> | Dashboard</title>
    <link rel="shortcut icon" href="<?= resourceUrl("/images/favicon.png") ?>" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= resourceUrl('css/app.css') ?>">
</head>
<body class="bg-neutral-100 overscroll-none">

    <main>

        <section class="container mx-auto flex flex-col items-center min-h-screen py-10">

                <h1 class="text-3xl font-bold">Student Registration</h1>

                <form action="#" >

                        <div>
                            <label for="firstName">FirstName</label>
                            <input type="text" name="firstName" id="firstName" class="w-full border rounded-lg" />
                        </div>

                </form>


        </section>

    </main>


    
</body>
</html>
