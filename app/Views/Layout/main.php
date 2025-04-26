<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">

</head>
<body>
    <?= view('partials/navbar') ?>
<main class="container mt-5">
    <?= $this->renderSection('content') ?>
</main>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>