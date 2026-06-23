<?php $__env->startSection('title', 'Edit Kategori'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="soft-card">
            <div class="card-header-soft">
                <h3 class="fw-bold text-brand mb-1"><i class="bi bi-pencil-heart text-rose me-1"></i> Edit Kategori</h3>
                <p class="text-muted mb-0">Perbarui nama kategori agar koleksi tetap tertata.</p>
            </div>
            <div class="p-4">
                <form method="POST" action="<?php echo e(route('categories.update', $category)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <?php echo $__env->make('categories.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-check-lg me-1"></i> Update</button>
                        <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Dressory\resources\views/categories/edit.blade.php ENDPATH**/ ?>