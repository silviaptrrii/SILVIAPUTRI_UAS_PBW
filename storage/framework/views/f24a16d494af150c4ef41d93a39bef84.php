<?php $__env->startSection('title', 'Edit Outfit'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <span class="chip active mb-3"><i class="bi bi-pencil-heart"></i> Edit Outfit</span>
    <h1 class="font-display text-brand mb-2">Edit Outfit</h1>
    <p class="text-muted mb-0">Perbarui nama, tanggal, dan daftar pakaian untuk outfit ini.</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-11">
        <div class="soft-card p-4">
            <form method="POST" action="<?php echo e(route('outfits.update', $outfit)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <?php echo $__env->make('outfits.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div class="d-flex gap-2 mt-4">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-check-lg me-1"></i> Update Outfit</button>
                    <a href="<?php echo e(route('outfits.index')); ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Dressory\resources\views/outfits/edit.blade.php ENDPATH**/ ?>