

<?php $__env->startSection('title', 'Data Tautan Bahan'); ?>

<?php $__env->startSection('content'); ?>


<style>
    .wrap-text {
        white-space: normal !important;
        word-break: break-word;
        vertical-align: top;
        font-size: 14px;
        line-height: 1.5;
    }

    .icon-folder {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        color: #fff;
        font-size: 20px;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .icon-folder:hover {
        transform: scale(1.15) rotate(3deg);
        box-shadow: 0 0 15px rgba(0,0,0,0.25);
        color: #fff;
    }

    .bg-folder-1 { background: linear-gradient(135deg, #4facfe, #00f2fe); }
    .bg-folder-2 { background: linear-gradient(135deg, #43e97b, #38f9d7); }
    .bg-folder-3 { background: linear-gradient(135deg, #fa709a, #fee140); }
    .bg-folder-4 { background: linear-gradient(135deg, #667eea, #764ba2); }
    .bg-folder-5 { background: linear-gradient(135deg, #f7971e, #ffd200); }

    table th {
        text-align: center;
        vertical-align: middle;
        font-size: 14px;
    }

    table td {
        vertical-align: top;
    }
</style>

<div class="container-fluid px-4">

    <div class="card shadow-sm">
        <div class="card-body">

            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 fw-bold">Data Tautan Bahan</h4>

                <div class="d-flex align-items-center gap-2">
                    
                    <div class="input-group input-group-sm" style="width:220px">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text"
                               id="searchAll"
                               class="form-control"
                               placeholder="Search...">
                    </div>

                    <a href="<?php echo e(route('admin.tautan.create')); ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Tambah
                    </a>
                </div>
            </div>

            
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="tautanTable">

                    <thead class="table-dark">
                        <tr>
                            <th width="60">No</th>
                            <th width="120">Folder Bukti</th>
                            <th style="min-width:300px">Isi Tautan</th>
                            <th style="min-width:300px">Keterangan</th>
                            <th width="140">Tanggal</th>
                            <th style="min-width:180px">Sumber</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>

                            <td class="text-center">
                                <?php if($item->tautan): ?>
                                    <?php
                                        $colors = [
                                            'bg-folder-1',
                                            'bg-folder-2',
                                            'bg-folder-3',
                                            'bg-folder-4',
                                            'bg-folder-5'
                                        ];
                                        $colorClass = $colors[$loop->iteration % count($colors)];
                                    ?>

                                    <a href="<?php echo e($item->tautan); ?>"
                                       target="_blank"
                                       class="icon-folder <?php echo e($colorClass); ?>"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="📂 Folder Bukti">
                                        <i class="bi bi-folder-fill"></i>
                                    </a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>

                            <td class="wrap-text"><?php echo e($item->isi_tautan ?? '-'); ?></td>
                            <td class="wrap-text"><?php echo e($item->keterangan ?? '-'); ?></td>

                            <td class="text-center text-nowrap">
                                <?php echo e($item->tanggal_tautan
                                    ? \Carbon\Carbon::parse($item->tanggal_tautan)->format('d-m-Y')
                                    : '-'); ?>

                            </td>

                            <td class="wrap-text"><?php echo e($item->sumber ?? '-'); ?></td>

                            <td class="text-center text-nowrap">
                                <a href="<?php echo e(route('admin.tautan.edit', $item->id)); ?>"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="<?php echo e(route('admin.tautan.destroy', $item->id)); ?>"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Hapus data ini?')">
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
                            <td colspan="7" class="text-center text-muted">
                                Data belum ada
                            </td>
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
    const rows = document.querySelectorAll('#tautanTable tbody tr');

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(keyword)
            ? ''
            : 'none';
    });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
        new bootstrap.Tooltip(el);
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\master-data-ppg\resources\views/admin/tautan/index.blade.php ENDPATH**/ ?>