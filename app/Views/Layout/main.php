<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body{
            padding-top: 80px;
            
        }
        .main-content {
    padding-top: 80px; /* Sesuaikan dengan tinggi navbar */
  }
        .navbar-brand img {
            height: 40px;
        }
        .btn-sign-up {
            background-color: #0b2447;
            color: white;
            border-radius: 5px;
        }
        .btn-sign-up:hover {
            background-color: #0e2d5e;
            color: white;
        }
    </style>


</head>
<body>


    <?= view('partials/navbar') ?>
    <main class="container mt-5">
    <?= $this->renderSection('content') ?>
    </main>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    
    <?= view('partials/footer') ?>

</body>
</html>