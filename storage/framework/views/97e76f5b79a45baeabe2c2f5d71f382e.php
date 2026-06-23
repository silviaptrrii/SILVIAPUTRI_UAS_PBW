<?php $__env->startSection('title', 'Detail Pakaian'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="soft-card overflow-hidden">
            <?php if($clothes->foto): ?>
                <img src="<?php echo e(asset($clothes->foto)); ?>" class="w-100 object-fit-cover wardrobe-img" style="height: 380px" alt="<?php echo e($clothes->nama_pakaian); ?>">
            <?php else: ?>
                <div class="empty-img d-flex align-items-center justify-content-center" style="height: 320px">
                    <div class="text-center text-muted">
                        <i class="bi bi-image fs-1 text-rose"></i>
                        <div>Tidak ada foto</div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="p-4 p-md-5">
                <span class="soft-badge mb-3 d-inline-block"><?php echo e($clothes->category->nama_kategori ?? '-'); ?></span>
                <h1 class="font-display text-brand mb-2"><?php echo e($clothes->nama_pakaian); ?></h1>
                <p class="mb-2"><strong>Warna:</strong> <?php echo e($clothes->warna); ?></p>
                <p class="text-muted"><strong>Keterangan:</strong> <?php echo e($clothes->keterangan ?: '-'); ?></p>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="<?php echo e(route('clothes.index')); ?>" class="btn btn-secondary">Kembali</a>
                    <a href="<?php echo e(route('clothes.edit', $clothes)); ?>" class="btn btn-warning"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Dressory\resources\views/clothes/show.blade.php ENDPATH**/ ?>