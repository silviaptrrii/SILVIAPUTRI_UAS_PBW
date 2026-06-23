<?php $__env->startSection('title', 'Riwayat Outfit'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <span class="chip active mb-3"><i class="bi bi-calendar-heart"></i> Outfit Planner</span>
        <h1 class="font-display text-brand mb-2">Riwayat Outfit</h1>
        <p class="text-muted mb-0">Outfit yang sudah kamu rencanakan dan simpan.</p>
    </div>
    <a href="<?php echo e(route('outfits.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Buat Outfit</a>
</div>

<div class="soft-card p-3 mb-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Outfit Name</th>
                    <th>Tanggal</th>
                    <th>Jumlah Item</th>
                    <th>Item</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $outfits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outfit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="fw-bold text-brand"><?php echo e($outfit->nama_outfit); ?></td>
                    <td class="text-muted"><?php echo e($outfit->tanggal->format('d M Y')); ?></td>
                    <td><span class="soft-badge"><?php echo e($outfit->clothes->count()); ?> item</span></td>
                    <td>
                        <div class="d-flex flex-wrap gap-1">
                            <?php $__currentLoopData = $outfit->clothes->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge text-bg-light border"><?php echo e($item->nama_pakaian); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($outfit->clothes->count() > 3): ?>
                                <span class="badge text-bg-light border">+<?php echo e($outfit->clothes->count() - 3); ?></span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="text-end">
                        <a href="<?php echo e(route('outfits.show', $outfit)); ?>" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="<?php echo e(route('outfits.edit', $outfit)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="<?php echo e(route('outfits.destroy', $outfit)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus outfit ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada riwayat outfit.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row g-4">
<?php $__currentLoopData = $outfits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outfit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-6">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start gap-3">
                <div>
                    <span class="soft-badge mb-2 d-inline-block"><?php echo e($outfit->tanggal->format('d M Y')); ?></span>
                    <h5 class="fw-bold text-brand mb-1"><?php echo e($outfit->nama_outfit); ?></h5>
                    <p class="text-muted mb-3"><?php echo e($outfit->clothes->count()); ?> item dalam outfit ini</p>
                </div>
                <i class="bi bi-heart text-rose fs-4"></i>
            </div>
            <div class="d-flex flex-wrap gap-2 mb-3">
                <?php $__currentLoopData = $outfit->clothes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="chip"><i class="bi bi-bag-heart"></i><?php echo e($item->nama_pakaian); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="d-flex gap-2 mt-auto flex-wrap">
                <a href="<?php echo e(route('outfits.show', $outfit)); ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                <a href="<?php echo e(route('outfits.edit', $outfit)); ?>" class="btn btn-warning btn-sm">Edit</a>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="mt-4"><?php echo e($outfits->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Dressory\resources\views/outfits/index.blade.php ENDPATH**/ ?>