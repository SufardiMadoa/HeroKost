<?= $this->extend('layout/auth-layout') ?>

<?= $this->section('content') ?>

<div class="close-btn">&times;</div>
<div class="login-form">
    <div class="text-center mb-4">
        <img src="<?= base_url('images/logo.png') ?>" alt="Logo" class="logo">
    </div>
    
    <h3 class="text-center mb-2">Sign Up</h3>
    <p class="text-center text-muted mb-4">Create your account</p>

    <!-- Menampilkan error atau success -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php elseif (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="/signup" method="post">
        <?= csrf_field() ?> <!-- Menambahkan token CSRF -->

        <div class="mb-3">
            <label for="nama_user" class="form-label">Name</label>
            <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= old('nama_user') ?>" placeholder="Your Name">
        </div>

        <div class="mb-3">
            <label for="email_user" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email_user" name="email_user" value="<?= old('email_user') ?>" placeholder="useremail@gmail.com">
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="kata_sandi_user" placeholder=">8 characters" value="<?= old('kata_sandi_user') ?>">
        </div>

        <div class="mb-4">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" value="<?= old('confirm_password') ?>">
        </div>


        <button type="submit" class="btn btn-primary mb-4">Sign Up</button>

        <div class="signup-text">
            <span class="text-muted">Already have an account? </span>
            <a href="/login">Login Now</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
