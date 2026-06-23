<?php $__env->startSection('title', 'Detail Outfit'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <span class="chip active mb-3"><i class="bi bi-heart"></i> Outfit Detail</span>
        <h1 class="font-display text-brand mb-2"><?php echo e($outfit->nama_outfit); ?></h1>
        <p class="text-muted mb-0">Tanggal: <?php echo e($outfit->tanggal->format('d M Y')); ?></p>
    </div>
    <a href="<?php echo e(route('outfits.index')); ?>" class="btn btn-secondary">Kembali</a>
</div>

<div class="row g-4">
<?php $__currentLoopData = $outfit->clothes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-6 col-xl-4">
        <div class="card wardrobe-card h-100 overflow-hidden">
            <?php if($item->foto): ?>
                <img src="<?php echo e(asset($item->foto)); ?>" class="card-img-top object-fit-cover wardrobe-img" style="height: 230px" alt="<?php echo e($item->nama_pakaian); ?>">
            <?php else: ?>
                <div class="empty-img d-flex align-items-center justify-content-center" style="height: 230px">
                    <span class="text-muted">Tidak ada foto</span>
                </div>
            <?php endif; ?>
            <div class="card-body p-4">
                <span class="soft-badge mb-2 d-inline-block"><?php echo e($item->category->nama_kategori ?? '-'); ?></span>
                <h5 class="fw-bold text-brand"><?php echo e($item->nama_pakaian); ?></h5>
                <p class="text-muted mb-0">Warna: <?php echo e($item->warna); ?></p>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Dressory\resources\views/outfits/show.blade.php ENDPATH**/ ?>