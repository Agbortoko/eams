<?php session_start() ?>
<?php require_once __DIR__ . '/../../vendor/autoload.php'; ?>
<?php require_once basePath('includes/db_connect.php'); ?>
<?php require_once basePath('middleware/check_auth_user.php'); ?>
<?php require_once basePath('middleware/check_auth_user_email_not_verified.php'); ?>
<?php require_once basePath('middleware/check_admin_no_details.php'); ?>
<?php require_once basePath('middleware/check_is_admin.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= siteName() ?> | <?= $pageTitle ?? "Dashboard" ?></title>
    <link rel="shortcut icon" href="<?= resourceUrl("/images/favicon.png") ?>" type="image/x-icon">

    <?php require_once basePath('includes/vite.php'); ?>
</head>
<body class="bg-neutral-100 overscroll-none">