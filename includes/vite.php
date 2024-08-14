<?php require_once __DIR__ . '/functions.php'; ?>

<?php if (isDevelopment()): ?>
    <script type="module" src="http://localhost:8044/@vite/client"></script>
    <script type="module" src="http://localhost:8044/resources/js/app.js"></script>
<?php else: ?>
    <link rel="stylesheet" href="<?= resourceUrl(vite('css')); ?>">
    <script type="module" src="<?= resourceUrl(vite('js')); ?>"></script>
<?php endif; ?>