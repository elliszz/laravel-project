

<?php $__env->startSection('title', 'Tambah Laporan GTK'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .form-label {
        font-weight: 600;
        font-size: 14px;
    }
</style>

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-body p-4">

            <h4 class="mb-4 fw-bold">Tambah Data Laporan GTK</h4>

            <form action="<?php echo e(route('admin.laporan-gtk.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control" placeholder="Masukkan kategori">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kode</label>
                        <input type="text" name="kode" class="form-control" placeholder="Masukkan kode">
                    </div>
                </div>

                
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Komponen RAB</label>
                        <input type="text" name="komponen_rab" class="form-control" placeholder="Masukkan komponen RAB">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Rasilasi</label>
                        <select name="rasilasi" class="form-select">
                            <option value="">-- Pilih Rasilasi --</option>
                            <option value="true">Ya</option>
                            <option value="false">Tidak</option>
                        </select>
                    </div>
                </div>

                
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">PIC</label>
                        <input type="text" name="pic" class="form-control" placeholder="Penanggung jawab">
                    </div>
                </div>

                
                <div class="mb-3">
                    <label class="form-label">Acara</label>
                    <input type="text" name="acara" class="form-control" placeholder="Nama acara">
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi_kegiatan" class="form-control" rows="4"></textarea>
                </div>

                <hr class="my-4">

                
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label">Folder Bukti</label>
                        <input type="text" name="folder_bukti" class="form-control" placeholder="Link / nama folder">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Bukti Akademik</label>
                        <input type="text" name="bukti_akademik" class="form-control" placeholder="Link bukti akademik">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Bukti Keuangan</label>
                        <input type="text" name="bukti_keuangan" class="form-control" placeholder="Link bukti keuangan">
                    </div>
                </div>

                
                <div class="d-flex justify-content-end gap-2">
                    <a href="<?php echo e(route('admin.laporan-gtk.index')); ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\master-data-ppg\resources\views/admin/laporan-gtk/create.blade.php ENDPATH**/ ?>