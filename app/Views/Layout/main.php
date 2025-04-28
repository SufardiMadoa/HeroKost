<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
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
    <?= view('partials/footer') ?>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>