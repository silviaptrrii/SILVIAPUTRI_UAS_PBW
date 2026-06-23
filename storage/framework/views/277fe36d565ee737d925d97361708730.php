<?php $__env->startSection('title', 'Dashboard Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header dashboard-hero">
    <span class="chip mb-3"><i class="bi bi-speedometer2"></i> Admin Area</span>
    <h1 class="font-display text-brand mb-2">Dashboard Admin</h1>
    <p class="text-muted mb-0">Pantau data utama pada sistem Wardrobe & Outfit Planner.</p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-3"><i class="bi bi-people"></i></div>
            <h1 class="fw-bold text-brand mb-0"><?php echo e($totalUsers); ?></h1>
            <p class="text-muted mb-0">Total User</p>
            <small class="text-muted">Pengguna yang terdaftar</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-3"><i class="bi bi-bag-heart"></i></div>
            <h1 class="fw-bold text-brand mb-0"><?php echo e($totalClothes); ?></h1>
            <p class="text-muted mb-0">Total Pakaian</p>
            <small class="text-muted">Seluruh item wardrobe</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card text-center">
            <div class="stat-icon mx-auto mb-3"><i class="bi bi-calendar-heart"></i></div>
            <h1 class="fw-bold text-brand mb-0"><?php echo e($totalOutfits); ?></h1>
            <p class="text-muted mb-0">Total Outfit</p>
            <small class="text-muted">Seluruh outfit tersimpan</small>
        </div>
    </div>
</div>

<div class="soft-card p-4 mt-4">
    <div class="d-flex align-items-start gap-3">
        <div class="stat-icon"><i class="bi bi-check2-circle"></i></div>
        <div>
            <h5 class="fw-bold text-brand mb-2">Sistem Siap Dipresentasikan</h5>
            <p class="text-muted mb-0">Admin dapat melihat ringkasan jumlah user, pakaian, dan outfit. Bagian ini memenuhi fitur dashboard admin dengan query count.</p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Dressory\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>