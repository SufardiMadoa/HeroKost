<?= $this->extend('layout/auth-layout') ?>

<?= $this->section('content') ?>

<div class="close-btn">&times;</div>
<div class="login-form">
    <div class="text-center mb-4">
        <img src="<?= base_url('images/logo.png') ?>" alt="HERO KOST Logo" class="logo">
    </div>
    
    <h3 class="text-center mb-2">Sign In</h3>
    <p class="text-center text-muted mb-4">to continue to Hero Kost</p>

    <!-- Flash Message Error / Success -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/login') ?>" method="post">
        <div class="mb-3">
            <label for="email_user" class="form-label">Email Address</label>
            <input type="email" 
                   name="email_user" 
                   class="form-control" 
                   id="email_user" 
                   placeholder="useremail@gmail.com"
                   value="<?= old('email_user') ?>">
        </div>
        
        <div class="mb-4">
            <label for="kata_sandi_user" class="form-label">Password</label>
            <input type="password" 
                   name="kata_sandi_user" 
                   class="form-control" 
                   id="kata_sandi_user" 
                   placeholder=">8 characters">
        </div>
        
        <button type="submit" class="btn btn-signin mb-4">Sign In</button>
        
        <div class="signup-text">
            <span class="text-muted">tidak mempunyai akun? </span>
            <a href="<?= base_url('/register') ?>">daftar sekarang</a>
            <br>
            <span class="text-muted">promosi kost? </span>
            <a href="<?= base_url('/login-pemilik') ?>">masuk sebagai pemilik kost</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
