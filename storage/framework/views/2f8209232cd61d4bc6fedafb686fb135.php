<?php $__env->startSection('title', 'Buat Outfit'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <span class="chip active mb-3"><i class="bi bi-plus-circle"></i> Add New Outfit</span>
    <h1 class="font-display text-brand mb-2">Buat Outfit Baru</h1>
    <p class="text-muted mb-0">Pilih beberapa pakaian untuk digabungkan menjadi satu outfit yang cantik.</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="soft-card p-4">
            <?php if($clothes->isEmpty()): ?>
                <div class="alert alert-warning">
                    Kamu belum punya data pakaian. Tambahkan pakaian dulu sebelum membuat outfit.
                </div>
                <a href="<?php echo e(route('clothes.create')); ?>" class="btn btn-primary">Tambah Pakaian</a>
            <?php else: ?>
                <form method="POST" action="<?php echo e(route('outfits.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo $__env->make('outfits.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-heart-fill me-1"></i> Simpan Outfit</button>
                        <a href="<?php echo e(route('outfits.index')); ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Dressory\resources\views/outfits/create.blade.php ENDPATH**/ ?>