<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HERO KOST</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            width: 100%;
            max-width: 900px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login-image {
            height: 100%;
            background-size: cover;
            background-position: center;
        }
        .login-form {
            padding: 40px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 30px;
        }
        .btn-signin {
            background-color: #192555;
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            font-weight: 500;
        }
        .btn-signin:hover {
            background-color: #111a3e;
            color: white;
        }
        .form-control {
            padding: 12px;
            border-radius: 5px;
        }
        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 20px;
            color: #888;
            cursor: pointer;
        }
        .text-muted {
            font-size: 14px;
        }
        .signup-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        a {
            color: #192555;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container d-flex flex-row">
        <!-- Left side - Image -->
        <div class="col-md-6 d-none d-md-block">
            <div class="login-image h-100" style="background-image: url('<?= base_url('images/login.png') ?>'); ">
            </div>
        </div>
        
        <!-- Right side - Login Form -->
        <div class="col-md-6 position-relative">
        <?= $this->renderSection('content') ?>
          
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>