<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title','Master PPG'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f4f6f8;
            font-family: "Segoe UI", sans-serif;
        }

        /* ================= HEADER ================= */
        .app-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 56px;
            background: #eef1f5; /* sama seperti gambar */
            display: flex;
            align-items: center;
            justify-content: flex-end; /* 👉 ke KANAN */
            padding: 0 24px;
            z-index: 1000;
        }

        .app-header a {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            color: #4b2e83;
        }

        .app-header a:hover {
            opacity: 0.85;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 56px;
            left: 0;
            background: #3f2a6f;
            padding: 20px;
        }

        .sidebar h5 {
            color: #fff;
            text-align: center;
            margin-bottom: 24px;
            font-weight: 700;
        }

        .sidebar a {
            color: #fff;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 6px;
            font-size: 15px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #5b3fa3;
        }

        /* ================= MAIN ================= */
        main.with-sidebar {
            margin-left: 260px;
            padding: 80px 25px 25px;
            min-height: 100vh;
        }

        main.fullscreen {
            margin-left: 0;
            padding: 80px 25px 25px;
            min-height: 100vh;
        }
    </style>
</head>
<body>

<?php
    $isDashboard = request()->routeIs([
        'admin.dashboard',
        'user.dashboard'
    ]);
?>

<!-- HEADER -->
<header class="app-header">
    <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard')); ?>">
            Dashboard
            <i class="bi bi-house-door-fill"></i>
        </a>
    <?php endif; ?>
</header>

<!-- SIDEBAR -->
<?php if(!$isDashboard): ?>
<div class="sidebar">
    <h5>Master PPG</h5>

    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->role === 'admin'): ?>
            <a href="<?php echo e(route('admin.laporan-gtk.index')); ?>">
                <i class="bi bi-file-earmark-text"></i> Laporan GTK
            </a>
            <a href="<?php echo e(route('admin.data-dosen.index')); ?>">
                <i class="bi bi-person-badge"></i> Data Dosen
            </a>
            <a href="<?php echo e(route('admin.data-gumong.index')); ?>">
                <i class="bi bi-building"></i> Data Gumong
            </a>
            <a href="<?php echo e(route('admin.tautan.index')); ?>">
                <i class="bi bi-link-45deg"></i> Tautan
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('user.laporan-gtk.index')); ?>">
                <i class="bi bi-file-earmark-text"></i> Laporan GTK
            </a>
            <a href="<?php echo e(route('user.data-dosen.index')); ?>">
                <i class="bi bi-person-badge"></i> Data Dosen
            </a>
            <a href="<?php echo e(route('user.data-gumong.index')); ?>">
                <i class="bi bi-building"></i> Data Gumong
            </a>
            <a href="<?php echo e(route('user.tautan.index')); ?>">
                <i class="bi bi-link-45deg"></i> Tautan
            </a>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- MAIN -->
<main class="<?php echo e($isDashboard ? 'fullscreen' : 'with-sidebar'); ?>">
    <?php echo $__env->yieldContent('content'); ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\master-data-ppg\resources\views/layouts/app.blade.php ENDPATH**/ ?>