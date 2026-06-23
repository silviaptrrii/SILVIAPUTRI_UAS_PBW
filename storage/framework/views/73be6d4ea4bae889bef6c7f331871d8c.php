<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center align-items-center min-vh-100 py-4">
    <div class="col-md-8 col-lg-5 col-xl-4">
        <div class="soft-card p-4 p-md-5 login-card-clean">
            <div class="text-center mb-4">
                <div class="brand-icon mx-auto mb-3"><i class="bi bi-stars"></i></div>
                <h1 class="font-display text-brand mb-1">Wardrobe &<br>Outfit Planner</h1>
                <p class="text-muted mb-0">Login untuk mengatur pakaian dan rencana outfit kamu.</p>
            </div>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Masukkan email" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-muted" for="remember">Ingat saya</label>
                </div>

                <button class="btn btn-primary w-100" type="submit">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </form>

            <p class="text-center mt-4 mb-0 text-muted">
                Belum punya akun? <a class="fw-semibold" href="<?php echo e(route('register')); ?>">Register</a>
            </p>

            <div class="small text-muted mt-3 text-center">
                Admin default: <strong>admin@wardrobe.test</strong> / <strong>password</strong>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Dressory\resources\views/auth/login.blade.php ENDPATH**/ ?>