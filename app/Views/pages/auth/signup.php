<?= $this->extend('layout/auth-layout') ?>

<?= $this->section('content') ?>

        <div class="close-btn">&times;</div>
            <div class="login-form">
                <div class="text-center mb-4">
                    <img src="<?= base_url('images/logo.png') ?>" alt="HERO KOST Logo" class="logo">
                </div>
                
                <h3 class="text-center mb-2">Sign Up</h3>
                <p class="text-center text-muted mb-4">Create your account</p>
                
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Name</label>
                        <input type="email" class="form-control" id="email" placeholder="useremail@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="useremail@gmail.com">
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder=">8 characters">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password" placeholder=">8 characters">
                    </div>
                    
                    <button type="submit" class="btn btn-signin mb-4">Sign In</button>
                    
                    <div class="signup-text">
                        <span class="text-muted">Sudah memiliki akun? </span>
                        <a href="#">login sekarang</a>
                        <br>
                        
                    </div>
                </form>
            </div>

<?= $this->endSection() ?>