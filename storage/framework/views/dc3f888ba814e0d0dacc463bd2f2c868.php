

<?php $__env->startSection('content'); ?>
<h1>Dashboard Pengguna</h1>
<p>Selamat datang, <?php echo e(auth()->user()->name); ?></p>

<hr>

<ul>
    <li><a href="<?php echo e(route('admin.user.laporan-gtk')); ?>">Laporan GTK</a></li>
    <li><a href="<?php echo e(route('admin.user.data-dosen')); ?>">Data Dosen</a></li>
    <li><a href="<?php echo e(route('admin.user.data-gumong')); ?>">Data Gumong</a></li>
    <li><a href="<?php echo e(route('admin.user.tautan')); ?>">Tautan Bahan</a></li>
</ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\master-data-ppg\resources\views/admin/dashboard/user.blade.php ENDPATH**/ ?>