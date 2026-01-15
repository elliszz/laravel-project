

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="card border-0 shadow-lg"
     style="width: 420px; border-radius: 22px;">

    <div class="card-body p-4">

        <div class="text-center mb-4">
            <img src="<?php echo e(asset('assets/logo.png')); ?>"
                 alt="Universitas Galuh"
                 style="width:80px; margin-bottom:12px;">

            <h4 class="fw-bold mb-1">Universitas Galuh</h4>
            <p class="text-muted mb-0">Sistem Informasi Master  Data PPG</p>
        </div>

        <?php if(session('error')): ?>
            <div class="alert alert-danger text-center">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('login.process')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email"
                       name="email"
                       class="form-control form-control-lg"
                       placeholder="Masukkan email"
                       required
                       autofocus>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <input type="password"
                       name="password"
                       class="form-control form-control-lg"
                       placeholder="Masukkan password"
                       required>
            </div>

            <button class="btn btn-primary btn-lg w-100 shadow-sm">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\master-data-ppg\resources\views/auth/login.blade.php ENDPATH**/ ?>