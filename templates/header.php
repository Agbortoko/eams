<?php require_once __DIR__ . '/../includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= resourceUrl("/images/favicon.png") ?>" type="image/x-icon">
    <title><?= siteName() ?> | <?= $pageTitle ?></title>

    <?php if (isDevelopment()): ?>
      <script type="module" src="http://localhost:5173/@vite/client"></script>
      <script type="module" src="http://localhost:5173/resources/js/app.js"></script>
    <?php else: ?>
      <link rel="stylesheet" href="<?= resourceUrl(vite('css')); ?>">
      <script type="module" src="<?= resourceUrl(vite('js')); ?>"></script>
    <?php endif; ?>

</head>
<body>