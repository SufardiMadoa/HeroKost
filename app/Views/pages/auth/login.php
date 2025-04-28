<?= $this->extend('layout/auth-layout') ?>

<?= $this->section('content') ?>

        <div class="close-btn">&times;</div>
            <div class="login-form">
                <div class="text-center mb-4">
                    <img src="<?= base_url('images/logo.png') ?>" alt="HERO KOST Logo" class="logo">
                </div>
                
                <h3 class="text-center mb-2">Sign In</h3>
                <p class="text-center text-muted mb-4">to continue to Hero Kost</p>
                
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="useremail@gmail.com">
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder=">8 characters">
                    </div>
                    
                    <button type="submit" class="btn btn-signin mb-4">Sign In</button>
                    
                    <div class="signup-text">
                        <span class="text-muted">tidak mempunyai akun? </span>
                        <a href="#">daftar sekarang</a>
                        <br>
                        <span class="text-muted">promosi kost? </span>
                        <a href="#">masuk sebagai pemilik kost</a>
                    </div>
                </form>
            </div>

<?= $this->endSection() ?>