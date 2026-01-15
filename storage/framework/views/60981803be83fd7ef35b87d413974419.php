

<?php $__env->startSection('title', 'Data Gumong'); ?>

<?php
    use Carbon\Carbon;
?>

<?php $__env->startSection('content'); ?>
<style>
    /* Style tabel dengan nuansa ungu elegan */
    .table-gumong { 
        font-size: 14px; 
        width: 100%; 
        border-collapse: separate; 
        border-spacing: 0 8px; 
    }
    .table-gumong thead th { 
        background-color: #5a2a83; 
        color: #fff; 
        font-weight: 600; 
        padding: 12px 15px; 
        text-align: center; 
        border-radius: 8px 8px 0 0; 
    }
    .table-gumong tbody tr { 
        background-color: #fff; 
        border-radius: 10px; 
        box-shadow: 0 2px 6px rgba(90, 42, 131, 0.08); 
    }
    .table-gumong tbody tr:nth-child(even) { background-color: #f5f0fa; }
    .table-gumong tbody tr:hover { background-color: #e3d7f7; cursor: pointer; }
    .table-gumong th, .table-gumong td { 
        padding: 14px 12px; 
        vertical-align: middle; 
        color: #3a176b; 
        white-space: nowrap; 
    }
    .table-gumong th.text-center, .table-gumong td.text-center { text-align: center; }
</style>

<div class="container-fluid px-4">
    <div class="card shadow-sm">
        <div class="card-body">

            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 fw-bold">DATA GUMONG</h4>
                
                <div class="d-flex align-items-center gap-2">
                    
                    <div class="input-group input-group-sm" style="width:220px">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="searchAll" class="form-control" placeholder="Search...">
                    </div>

                    <?php if(auth()->user()->role === 'admin'): ?>
                        <a href="<?php echo e(route('admin.data-gumong.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            
            <div class="table-responsive">
                <table class="table table-hover align-middle text-nowrap table-gumong" id="gumongTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>No Sertifikat NRP</th>
                            <th>Tanggal Sertifikat NRP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Instansi Asal</th>
                            <th>ID Rekrutmen</th>
                            <?php if(auth()->user()->role === 'admin'): ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $dataGumongs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($item->nrp); ?></td>
                                <td><?php echo e($item->no_sertifikat_nrp); ?></td>
                                <td class="text-center"><?php echo e($item->tanggal_sertifikat_nrp ? Carbon::parse($item->tanggal_sertifikat_nrp)->format('d-m-Y') : '-'); ?></td>
                                <td><?php echo e($item->nama); ?></td>
                                <td><?php echo e($item->email); ?></td>
                                <td><?php echo e($item->no_hp); ?></td>
                                <td><?php echo e($item->jenis_kelamin); ?></td>
                                <td><?php echo e($item->nama_instansi_asal); ?></td>
                                <td><?php echo e($item->id_rekrutmen); ?></td>

                                <?php if(auth()->user()->role === 'admin'): ?>
                                <td class="text-center">
                                    <a href="<?php echo e(route('admin.data-gumong.edit', $item->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="<?php echo e(route('admin.data-gumong.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="<?php echo e(auth()->user()->role === 'admin' ? 11 : 10); ?>" class="text-center">Data Kosong</td>
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
    const rows = document.querySelectorAll('#gumongTable tbody tr');
    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(keyword) ? '' : 'none';
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\master-data-ppg\resources\views/user/data_gumong/index.blade.php ENDPATH**/ ?>