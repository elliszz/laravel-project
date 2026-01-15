

<?php $__env->startSection('title', 'Data Dosen'); ?>

<?php
    use Carbon\Carbon;
?>

<?php $__env->startSection('content'); ?>

<style>
    /* ===== STYLE TABLE DOSEN MIRIP LAPORAN GTK ===== */
    .table-dosen {
        font-size: 14px;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table-dosen thead th {
        background-color: #5a2a83;
        color: #fff;
        font-weight: 600;
        vertical-align: middle;
        padding: 12px 15px;
        white-space: nowrap;
        border: none;
        border-radius: 8px 8px 0 0;
        box-shadow: inset 0 -3px 5px rgba(0,0,0,0.15);
        text-align: center;
    }

    .table-dosen tbody tr {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(90, 42, 131, 0.08);
        transition: background-color 0.25s ease;
    }

    .table-dosen tbody tr:nth-child(even) {
        background-color: #f5f0fa;
    }

    .table-dosen tbody tr:hover {
        background-color: #e3d7f7;
        cursor: pointer;
    }

    .table-dosen th,
    .table-dosen td {
        padding: 14px 12px;
        vertical-align: middle;
        border: none;
        color: #3a176b;
        white-space: nowrap;
    }

    .table-dosen th.text-center,
    .table-dosen td.text-center {
        text-align: center;
    }

    .btn-sm {
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        border-radius: 6px;
    }

    .btn-primary {
        background-color: #5a2a83;
        border-color: #5a2a83;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #7b52b3;
        border-color: #7b52b3;
    }

    .btn-warning {
        background-color: #b07fdb;
        border-color: #b07fdb;
        color: #3a176b;
    }

    .btn-warning:hover {
        background-color: #9a70d4;
        border-color: #9a70d4;
        color: #fff;
    }

    .btn-danger {
        background-color: #d9534f;
        border-color: #d9534f;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c9302c;
        border-color: #c9302c;
        color: #fff;
    }
</style>

<div class="container-fluid">

    <div class="card shadow-sm">
        <div class="card-body p-3">

            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 fw-bold">DATA DOSEN</h4>

                <div class="d-flex gap-2 align-items-center">
                    
                    <div class="input-group input-group-sm" style="width:230px">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text"
                               id="searchAll"
                               class="form-control"
                               placeholder="Search...">
                    </div>

                    <a href="<?php echo e(route('admin.data-dosen.create')); ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Tambah
                    </a>
                </div>
            </div>

            
            <?php if(session('success')): ?>
                <div class="alert alert-success py-2">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            
            <div class="table-responsive">
                <table class="table table-hover align-middle table-dosen" id="dosenTable">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>No Sertifikat NRP</th>
                            <th>Tgl Sertifikat</th>
                            <th>NPSN LPTK</th>
                            <th>Nama LPTK</th>
                            <th>Kode Jenis</th>
                            <th>Jenis Peserta</th>
                            <th>Kode Rumpun</th>
                            <th>Nama Rumpun</th>
                            <th>Kode Bidang</th>
                            <th>Bidang Studi PPG</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>NIK</th>
                            <th>NPWP</th>
                            <th>NIDN</th>
                            <th>NUPTK</th>
                            <th>Gol ASN</th>
                            <th>Tempat Lahir</th>
                            <th>Tgl Lahir</th>
                            <th>JK</th>
                            <th>NPSN Instansi</th>
                            <th>Instansi Asal</th>
                            <th>Pendidikan</th>
                            <th>ID Rekrutmen</th>
                            <th width="110">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $dataDosens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->nrp); ?></td>
                            <td><?php echo e($item->no_sertifikat_nrp); ?></td>
                            <td class="text-center">
                                <?php echo e($item->tanggal_sertifikat_nrp
                                    ? Carbon::parse($item->tanggal_sertifikat_nrp)->format('d-m-Y')
                                    : '-'); ?>

                            </td>
                            <td><?php echo e($item->npsn_lptk); ?></td>
                            <td><?php echo e($item->nama_lptk); ?></td>
                            <td><?php echo e($item->kode_jenis_peserta); ?></td>
                            <td><?php echo e($item->jenis_peserta); ?></td>
                            <td><?php echo e($item->kode_rumpun); ?></td>
                            <td><?php echo e($item->nama_rumpun); ?></td>
                            <td><?php echo e($item->kode_bidang_studi_ppg); ?></td>
                            <td><?php echo e($item->nama_bidang_studi_ppg); ?></td>
                            <td><?php echo e($item->kategori_peserta); ?></td>
                            <td><?php echo e($item->nama); ?></td>
                            <td><?php echo e($item->email); ?></td>
                            <td><?php echo e($item->no_hp); ?></td>
                            <td><?php echo e($item->nik); ?></td>
                            <td><?php echo e($item->npwp); ?></td>
                            <td><?php echo e($item->nidn); ?></td>
                            <td><?php echo e($item->nuptk); ?></td>
                            <td><?php echo e($item->golongan_pns_asn); ?></td>
                            <td><?php echo e($item->tempat_lahir); ?></td>
                            <td class="text-center">
                                <?php echo e($item->tanggal_lahir
                                    ? Carbon::parse($item->tanggal_lahir)->format('d-m-Y')
                                    : '-'); ?>

                            </td>
                            <td><?php echo e($item->jenis_kelamin); ?></td>
                            <td><?php echo e($item->npsn_instansi_asal); ?></td>
                            <td><?php echo e($item->nama_instansi_asal); ?></td>
                            <td><?php echo e($item->pendidikan_terakhir); ?></td>
                            <td><?php echo e($item->id_rekrutmen); ?></td>
                            <td class="text-center text-nowrap">
                                <a href="<?php echo e(route('admin.data-dosen.edit', $item->id)); ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('admin.data-dosen.destroy', $item->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="29" class="text-center text-muted">Data Kosong</td>
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
    const rows = document.querySelectorAll('#dosenTable tbody tr');

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(keyword)
            ? ''
            : 'none';
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\master-data-ppg\resources\views/admin/data_dosen/index.blade.php ENDPATH**/ ?>