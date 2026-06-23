<?php $__env->startSection('title', 'Dashboard User'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header dashboard-hero">
    <div class="row align-items-center g-3">
        <div class="col-lg-8">
            <span class="chip mb-3"><i class="bi bi-house-heart"></i> My Style Dashboard</span>
            <h1 class="font-display text-brand mb-2">Hello, <?php echo e(auth()->user()->name); ?> 👋</h1>
            <p class="text-muted mb-0">
                Kelola koleksi pakaianmu, susun kombinasi outfit, dan simpan look favorit untuk aktivitas sehari-hari.
            </p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <a href="<?php echo e(route('outfits.create')); ?>" class="btn btn-primary me-2 mb-2">
                <i class="bi bi-plus-lg me-1"></i> Buat Outfit
            </a>
            <a href="<?php echo e(route('clothes.create')); ?>" class="btn btn-outline-primary mb-2">
                <i class="bi bi-bag-plus me-1"></i> Tambah Pakaian
            </a>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card d-flex align-items-center gap-3">
            <div class="stat-icon"><i class="bi bi-tags"></i></div>
            <div>
                <h2 class="fw-bold mb-0"><?php echo e($totalCategories); ?></h2>
                <p class="text-muted mb-0">Kategori Pakaian</p>
                <small class="text-muted">Jenis pakaian yang tersedia</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card d-flex align-items-center gap-3">
            <div class="stat-icon"><i class="bi bi-bag-heart"></i></div>
            <div>
                <h2 class="fw-bold mb-0"><?php echo e($totalClothes); ?></h2>
                <p class="text-muted mb-0">Total Pakaian</p>
                <small class="text-muted">Item di wardrobe kamu</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card d-flex align-items-center gap-3">
            <div class="stat-icon"><i class="bi bi-calendar-heart"></i></div>
            <div>
                <h2 class="fw-bold mb-0"><?php echo e($totalOutfits); ?></h2>
                <p class="text-muted mb-0">Total Outfit</p>
                <small class="text-muted">Look yang sudah disimpan</small>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="soft-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold text-brand mb-1">Wardrobe Terbaru</h4>
                    <p class="text-muted mb-0">Beberapa pakaian terakhir yang kamu tambahkan.</p>
                </div>
                <a href="<?php echo e(route('clothes.index')); ?>" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
            </div>

            <?php if($recentClothes->count()): ?>
                <div class="row g-3">
                    <?php $__currentLoopData = $recentClothes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cloth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-xl-3">
                            <div class="wardrobe-mini-card h-100">
                                <div class="mini-img-wrap mb-3">
                                    <?php if($cloth->foto): ?>
                                        <img src="<?php echo e(asset($cloth->foto)); ?>" alt="<?php echo e($cloth->nama_pakaian); ?>">
                                    <?php else: ?>
                                        <div class="empty-img d-flex align-items-center justify-content-center h-100">
                                            <i class="bi bi-image text-rose fs-2"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <span class="soft-badge small"><?php echo e($cloth->category->nama_kategori ?? '-'); ?></span>
                                <h6 class="fw-bold text-brand mt-2 mb-1"><?php echo e($cloth->nama_pakaian); ?></h6>
                                <small class="text-muted"><span class="palette-dot" style="background: #F7C6D0"></span><?php echo e($cloth->warna); ?></small>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="empty-state text-center p-5">
                    <div class="stat-icon mx-auto mb-3"><i class="bi bi-bag-plus"></i></div>
                    <h5 class="fw-bold text-brand">Belum ada pakaian</h5>
                    <p class="text-muted">Mulai tambahkan item wardrobe pertama kamu.</p>
                    <a href="<?php echo e(route('clothes.create')); ?>" class="btn btn-primary">Tambah Pakaian</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="soft-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4 class="fw-bold text-brand mb-1">Riwayat Outfit</h4>
                    <p class="text-muted mb-0">Look yang baru disimpan.</p>
                </div>
                <a href="<?php echo e(route('outfits.index')); ?>" class="btn btn-outline-primary btn-sm">Detail</a>
            </div>

            <?php if($recentOutfits->count()): ?>
                <div class="d-grid gap-3">
                    <?php $__currentLoopData = $recentOutfits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outfit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="outfit-list-card">
                            <div class="d-flex justify-content-between align-items-start gap-2">
                                <div>
                                    <h6 class="fw-bold text-brand mb-1"><?php echo e($outfit->nama_outfit); ?></h6>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i><?php echo e($outfit->tanggal->format('d M Y')); ?>

                                    </small>
                                </div>
                                <span class="soft-badge small"><?php echo e($outfit->clothes->count()); ?> item</span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="empty-state text-center p-4">
                    <div class="stat-icon mx-auto mb-3"><i class="bi bi-calendar-plus"></i></div>
                    <h6 class="fw-bold text-brand">Belum ada outfit</h6>
                    <p class="text-muted small">Buat kombinasi outfit dari pakaian yang sudah kamu simpan.</p>
                    <a href="<?php echo e(route('outfits.create')); ?>" class="btn btn-primary btn-sm">Buat Outfit</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-md-4">
        <a href="<?php echo e(route('categories.index')); ?>" class="quick-action-card">
            <i class="bi bi-tags"></i>
            <div>
                <h6>Kelola Kategori</h6>
                <p>Atur kategori seperti casual, formal, kampus, dan party.</p>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="<?php echo e(route('clothes.index')); ?>" class="quick-action-card">
            <i class="bi bi-bag-heart"></i>
            <div>
                <h6>Kelola Wardrobe</h6>
                <p>Lihat, edit, hapus, dan tambah koleksi pakaian.</p>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="<?php echo e(route('outfits.create')); ?>" class="quick-action-card">
            <i class="bi bi-stars"></i>
            <div>
                <h6>Planner Outfit</h6>
                <p>Pilih beberapa pakaian dan simpan menjadi satu look.</p>
            </div>
        </a>
    </div>
</div>

<div class="footer-strip d-flex justify-content-around text-center flex-wrap gap-3 text-muted">
    <span><i class="bi bi-bag-heart text-rose me-1"></i> Organize your wardrobe</span>
    <span><i class="bi bi-heart text-rose me-1"></i> Plan your looks</span>
    <span><i class="bi bi-stars text-rose me-1"></i> Shine everyday</span>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Dressory\resources\views/dashboard.blade.php ENDPATH**/ ?>