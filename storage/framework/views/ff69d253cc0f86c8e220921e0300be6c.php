

<?php $__env->startSection('title', 'Data Laporan GTK'); ?>

<?php
    use Illuminate\Support\Str;
?>

<?php $__env->startSection('content'); ?>

<style>
    :root {
        --ungu-dark: #4b2e83;
        --ungu-hover: #40276f;
        --ungu-soft: #c7b9e6;
        --ungu-soft-hover: #b6a5dd;
    }

    .table-gtk { font-size: 13px; }
    .table-gtk th, .table-gtk td { padding: 6px 8px; vertical-align: top; }
    .table-gtk thead th { font-size: 13px; white-space: nowrap; }
    .wrap-text { white-space: normal !important; word-break: break-word; }

    .table-gtk .badge { font-size: 11px; padding: 4px 8px; }
    .table-gtk .btn-sm { padding: 3px 6px; font-size: 12px; }
    .table-gtk i { font-size: 14px; }

    .table-dark { background-color: var(--ungu-dark) !important; color: #fff; }
    .table-dark th { background-color: var(--ungu-dark) !important; }

    .btn-primary { background-color: var(--ungu-dark); border-color: var(--ungu-dark); }
    .btn-primary:hover { background-color: var(--ungu-hover); }

    .btn-warning { background-color: var(--ungu-soft); border-color: var(--ungu-soft); }

    .icon-doc {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 10px;
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .icon-doc:hover {
        transform: scale(1.15);
        box-shadow: 0 0 12px rgba(75,46,131,0.4);
        color: #fff;
    }

    .bg-doc-1 { background: linear-gradient(135deg,#5a3d9a,#4b2e83); }
    .bg-doc-2 { background: linear-gradient(135deg,#6b52a8,#4b2e83); }
    .bg-doc-3 { background: linear-gradient(135deg,#8e7cc3,#5a3d9a); }
</style>

<div class="container-fluid px-4">
    <div class="card shadow-sm">
        <div class="card-body">

            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 fw-bold">DATA LAPORAN GTK</h4>

                <div class="d-flex gap-2 align-items-center">
                    
                    <div class="input-group input-group-sm" style="width:220px">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text"
                               id="searchAll"
                               class="form-control"
                               placeholder="Search...">
                    </div>

                    <a href="<?php echo e(route('admin.laporan-gtk.create')); ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Tambah
                    </a>
                </div>
            </div>

            <?php if(session('success')): ?>
                <div class="alert alert-success py-2">
                    <i class="bi bi-check-circle"></i>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle table-gtk" id="gtkTable">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Kode</th>
                            <th style="min-width:260px">Komponen RAB</th>
                            <th>Rasilasi</th>
                            <th>Tanggal</th>
                            <th style="min-width:120px">PIC</th>
                            <th style="min-width:300px">Acara</th>
                            <th style="min-width:300px">Deskripsi Kegiatan</th>
                            <th style="min-width:180px">Folder Bukti</th>
                            <th style="min-width:240px">Bukti Akademik</th>
                            <th style="min-width:240px">Bukti Keuangan</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $laporanGtks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->kategori); ?></td>
                            <td class="text-center"><?php echo e($item->kode); ?></td>
                            <td class="wrap-text"><?php echo e($item->komponen_rab); ?></td>
                            <td class="text-center">
                                <?php
                                    $color = match($item->rasilasi) {
                                        'true' => 'success',
                                        'false' => 'danger',
                                        'sebagian' => 'warning',
                                        default => 'secondary',
                                    };
                                ?>
                                <span class="badge bg-<?php echo e($color); ?>"><?php echo e(ucfirst($item->rasilasi)); ?></span>
                            </td>
                            <td class="text-center text-nowrap">
                                <?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')); ?>

                            </td>
                            <td class="wrap-text"><?php echo e($item->pic); ?></td>
                            <td class="wrap-text"><?php echo e($item->acara); ?></td>
                            <td class="wrap-text"><?php echo e($item->deskripsi_kegiatan); ?></td>

                            <td class="text-center">
                                <?php if($item->folder_bukti && Str::startsWith($item->folder_bukti, ['http://','https://'])): ?>
                                    <a href="<?php echo e($item->folder_bukti); ?>" target="_blank" class="icon-doc bg-doc-1">
                                        <i class="bi bi-folder-fill"></i>
                                    </a>
                                <?php else: ?>
                                    <?php echo e($item->folder_bukti ?? '-'); ?>

                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if($item->bukti_akademik && Str::startsWith($item->bukti_akademik, ['http://','https://'])): ?>
                                    <a href="<?php echo e($item->bukti_akademik); ?>" target="_blank" class="icon-doc bg-doc-2">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </a>
                                <?php else: ?>
                                    <?php echo e($item->bukti_akademik ?? '-'); ?>

                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <?php if($item->bukti_keuangan && Str::startsWith($item->bukti_keuangan, ['http://','https://'])): ?>
                                    <a href="<?php echo e($item->bukti_keuangan); ?>" target="_blank" class="icon-doc bg-doc-3">
                                        <i class="bi bi-cash-coin"></i>
                                    </a>
                                <?php else: ?>
                                    <?php echo e($item->bukti_keuangan ?? '-'); ?>

                                <?php endif; ?>
                            </td>

                            <td class="text-center text-nowrap">
                                <a href="<?php echo e(route('admin.laporan-gtk.edit', $item->id)); ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="<?php echo e(route('admin.laporan-gtk.destroy', $item->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="13" class="text-center text-muted">Data belum ada</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<script>
document.getElementById('searchAll').addEventListener('keyup', function () {
    const keyword = this.value.toLowerCase();
    const rows = document.querySelectorAll('#gtkTable tbody tr');

    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(keyword) ? '' : 'none';
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\master-data-ppg\resources\views/admin/laporan-gtk/index.blade.php ENDPATH**/ ?>