<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Wardrobe & Outfit Planner')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --blush-pink: #FFE6EC;
            --dusty-pink: #F7C6D0;
            --rose-pink: #F48FB1;
            --rose-hover: #E7789F;
            --cream: #FFF7F2;
            --warm-beige: #F5E9E1;
            --soft-gray: #F1F1F4;
            --deep-mauve: #5E3B4E;
            --muted-mauve: #8A6A78;
            --white: #FFFFFF;
            --shadow: 0 18px 45px rgba(94, 59, 78, .10);
            --soft-shadow: 0 10px 25px rgba(244, 143, 177, .12);
            --radius: 22px;
        }

        * { font-family: 'Poppins', sans-serif; }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(255, 230, 236, .95), transparent 34%),
                radial-gradient(circle at bottom right, rgba(247, 198, 208, .55), transparent 38%),
                linear-gradient(135deg, #fffafb 0%, var(--cream) 52%, #fff 100%);
            color: var(--deep-mauve);
        }

        a { color: var(--rose-pink); text-decoration: none; }
        a:hover { color: var(--rose-hover); }

        .font-display { font-family: 'Playfair Display', serif; letter-spacing: -.03em; }
        .text-brand { color: var(--deep-mauve) !important; }
        .text-rose { color: var(--rose-pink) !important; }
        .text-muted { color: var(--muted-mauve) !important; }

        .guest-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 32px 16px;
        }

        .app-shell {
            display: flex;
            min-height: 100vh;
            padding: 22px;
            gap: 22px;
        }

        .sidebar {
            width: 280px;
            flex: 0 0 280px;
            background: rgba(255, 255, 255, .82);
            border: 1px solid rgba(247, 198, 208, .65);
            border-radius: 28px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(16px);
            padding: 22px;
            position: sticky;
            top: 22px;
            height: calc(100vh - 44px);
            display: flex;
            flex-direction: column;
        }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--blush-pink), var(--rose-pink));
            color: var(--deep-mauve);
            display: grid;
            place-items: center;
            box-shadow: 0 10px 22px rgba(244, 143, 177, .25);
            font-size: 22px;
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            line-height: 1;
            color: var(--deep-mauve);
            font-size: 1.25rem;
        }

        .brand-subtitle {
            color: var(--muted-mauve);
            font-size: .78rem;
            margin-top: 2px;
        }

        .side-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 16px;
            color: var(--muted-mauve);
            margin-bottom: 7px;
            font-weight: 600;
            transition: .2s ease;
        }

        .side-link:hover,
        .side-link.active {
            color: var(--rose-pink);
            background: linear-gradient(90deg, rgba(255, 230, 236, .95), rgba(255, 247, 242, .88));
            transform: translateX(2px);
        }

        .side-link i { font-size: 1.05rem; }

        .premium-card {
            margin-top: auto;
            background: linear-gradient(145deg, var(--blush-pink), #fff8fa);
            border: 1px solid rgba(247, 198, 208, .8);
            border-radius: 22px;
            padding: 18px;
            overflow: hidden;
            position: relative;
        }

        .premium-card:after {
            content: "♡";
            position: absolute;
            right: 18px;
            top: 8px;
            font-size: 64px;
            color: rgba(244, 143, 177, .18);
        }

        .main-panel {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: rgba(255, 255, 255, .78);
            border: 1px solid rgba(247, 198, 208, .58);
            border-radius: 24px;
            box-shadow: var(--soft-shadow);
            backdrop-filter: blur(14px);
            padding: 16px 20px;
            margin-bottom: 22px;
        }

        .mobile-topbar {
            display: none;
        }

        .search-soft {
            max-width: 360px;
            background: rgba(255,255,255,.9);
            border: 1px solid rgba(247, 198, 208, .75);
            border-radius: 999px;
            padding: 9px 16px;
            color: var(--muted-mauve);
        }

        .page-header {
            background:
                linear-gradient(135deg, rgba(255, 230, 236, .95), rgba(255, 247, 242, .9)),
                radial-gradient(circle at right, rgba(244, 143, 177, .30), transparent 36%);
            border: 1px solid rgba(247, 198, 208, .75);
            border-radius: 28px;
            box-shadow: var(--soft-shadow);
            padding: 28px;
            margin-bottom: 22px;
            position: relative;
            overflow: hidden;
        }

        .page-header:after {
            content: "✦";
            position: absolute;
            right: 28px;
            top: 18px;
            color: rgba(244, 143, 177, .65);
            font-size: 30px;
        }

        .card,
        .soft-card {
            background: rgba(255, 255, 255, .86);
            border: 1px solid rgba(247, 198, 208, .55) !important;
            border-radius: var(--radius) !important;
            box-shadow: var(--soft-shadow);
            overflow: hidden;
        }

        .card-header-soft {
            background: linear-gradient(90deg, var(--blush-pink), rgba(255, 247, 242, .9));
            border-bottom: 1px solid rgba(247, 198, 208, .55);
            padding: 18px 22px;
        }

        .stat-card {
            background: rgba(255,255,255,.88);
            border: 1px solid rgba(247, 198, 208, .56);
            border-radius: 22px;
            padding: 22px;
            box-shadow: var(--soft-shadow);
            height: 100%;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: var(--blush-pink);
            color: var(--rose-pink);
            font-size: 25px;
        }

        .btn {
            border-radius: 14px;
            font-weight: 600;
            padding: .62rem 1rem;
        }

        .btn-sm { border-radius: 12px; padding: .38rem .72rem; }

        .btn-primary {
            background: linear-gradient(135deg, var(--rose-pink), #ef7fa8) !important;
            border-color: transparent !important;
            box-shadow: 0 12px 24px rgba(244, 143, 177, .24);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--rose-hover), #dc6f96) !important;
            transform: translateY(-1px);
        }

        .btn-outline-primary {
            color: var(--rose-pink) !important;
            border-color: var(--dusty-pink) !important;
            background: rgba(255,255,255,.45);
        }

        .btn-outline-primary:hover {
            color: #fff !important;
            background: var(--rose-pink) !important;
        }

        .btn-warning {
            background: var(--dusty-pink) !important;
            border-color: var(--dusty-pink) !important;
            color: var(--deep-mauve) !important;
        }

        .btn-secondary {
            background: var(--soft-gray) !important;
            border-color: var(--soft-gray) !important;
            color: var(--deep-mauve) !important;
        }

        .btn-danger {
            background: #dc6f8c !important;
            border-color: #dc6f8c !important;
        }

        .form-label { color: var(--deep-mauve); font-weight: 600; }
        .form-control, .form-select {
            border-radius: 14px;
            border: 1px solid rgba(247, 198, 208, .88);
            padding: .7rem .9rem;
            color: var(--deep-mauve);
            background-color: rgba(255,255,255,.92);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--rose-pink);
            box-shadow: 0 0 0 .2rem rgba(244, 143, 177, .18);
        }

        .form-check-input:checked {
            background-color: var(--rose-pink);
            border-color: var(--rose-pink);
        }

        .table { color: var(--deep-mauve); }
        .table thead th {
            background: var(--blush-pink);
            color: var(--deep-mauve);
            border: 0;
            font-weight: 700;
            padding: 15px;
        }
        .table tbody td { padding: 15px; border-color: rgba(247, 198, 208, .45); }

        .soft-badge,
        .badge.text-bg-success {
            background: var(--blush-pink) !important;
            color: var(--rose-pink) !important;
            border: 1px solid rgba(244, 143, 177, .22);
            border-radius: 999px;
            padding: .45rem .75rem;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .86);
            border: 1px solid rgba(247, 198, 208, .75);
            color: var(--muted-mauve);
            font-weight: 600;
        }

        .chip.active {
            background: var(--rose-pink);
            color: white;
            border-color: var(--rose-pink);
        }

        .wardrobe-img,
        .empty-img {
            background: linear-gradient(135deg, var(--cream), var(--blush-pink));
        }

        .wardrobe-card img { transition: .22s ease; }
        .wardrobe-card:hover img { transform: scale(1.03); }
        .wardrobe-card:hover { transform: translateY(-2px); transition: .22s ease; }

        .select-card {
            cursor: pointer;
            transition: .2s ease;
        }
        .select-card:hover { transform: translateY(-2px); }
        .select-card.is-selected {
            border-color: var(--rose-pink) !important;
            box-shadow: 0 0 0 .2rem rgba(244, 143, 177, .16), var(--soft-shadow);
        }

        .palette-swatch {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px;
            border-radius: 16px;
            background: rgba(255,255,255,.75);
            border: 1px solid rgba(247, 198, 208, .56);
        }
        .swatch-color { width: 58px; height: 34px; border-radius: 11px; border: 1px solid rgba(94,59,78,.05); }
        .palette-dot { width: 14px; height: 14px; border-radius: 50%; display: inline-block; margin-right: 6px; border: 1px solid rgba(94,59,78,.1); }



        .login-card-clean {
            position: relative;
            overflow: hidden;
        }
        .login-card-clean:before {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            right: -72px;
            top: -72px;
            background: radial-gradient(circle, rgba(244, 143, 177, .22), transparent 68%);
            pointer-events: none;
        }

        .dashboard-hero {
            min-height: 170px;
            display: flex;
            align-items: center;
        }

        .wardrobe-mini-card {
            background: rgba(255,255,255,.86);
            border: 1px solid rgba(247, 198, 208, .55);
            border-radius: 20px;
            padding: 14px;
            box-shadow: 0 8px 18px rgba(244, 143, 177, .10);
            transition: .22s ease;
        }
        .wardrobe-mini-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 13px 24px rgba(244, 143, 177, .16);
        }
        .mini-img-wrap {
            height: 132px;
            border-radius: 16px;
            overflow: hidden;
            background: linear-gradient(135deg, var(--cream), var(--blush-pink));
        }
        .mini-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .outfit-list-card,
        .empty-state {
            background: linear-gradient(135deg, rgba(255, 247, 242, .88), rgba(255, 230, 236, .45));
            border: 1px solid rgba(247, 198, 208, .55);
            border-radius: 18px;
            padding: 16px;
        }

        .quick-action-card {
            display: flex;
            gap: 14px;
            height: 100%;
            padding: 18px;
            background: rgba(255,255,255,.86);
            border: 1px solid rgba(247, 198, 208, .55);
            border-radius: 20px;
            box-shadow: var(--soft-shadow);
            color: var(--deep-mauve);
            transition: .22s ease;
        }
        .quick-action-card:hover {
            color: var(--deep-mauve);
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(244, 143, 177, .16);
        }
        .quick-action-card > i {
            width: 48px;
            height: 48px;
            flex: 0 0 48px;
            border-radius: 15px;
            display: grid;
            place-items: center;
            background: var(--blush-pink);
            color: var(--rose-pink);
            font-size: 23px;
        }
        .quick-action-card h6 {
            margin: 0 0 4px;
            font-weight: 700;
            color: var(--deep-mauve);
        }
        .quick-action-card p {
            margin: 0;
            color: var(--muted-mauve);
            font-size: .88rem;
        }

                .pagination .page-link {
            border-radius: 12px;
            margin: 0 3px;
            color: var(--rose-pink);
            border-color: rgba(247, 198, 208, .75);
        }
        .pagination .active .page-link {
            background: var(--rose-pink);
            border-color: var(--rose-pink);
        }

        .alert {
            border-radius: 18px;
            border: 1px solid rgba(247, 198, 208, .7);
            box-shadow: var(--soft-shadow);
        }

        .footer-strip {
            margin-top: 26px;
            padding: 18px;
            border-radius: 22px;
            background: rgba(255,230,236,.68);
            border: 1px solid rgba(247, 198, 208, .65);
        }



        /* Fix agar tombol Detail, Edit, dan Hapus di card pakaian bisa diklik normal */
        .page-header:after,
        .premium-card:after {
            pointer-events: none;
        }

        .wardrobe-card {
            position: relative;
        }

        .wardrobe-card .card-body {
            position: relative;
            z-index: 5;
        }

        .clothes-actions {
            position: relative;
            z-index: 20;
            pointer-events: auto;
        }

        .clothes-actions a,
        .clothes-actions button,
        .clothes-actions form {
            pointer-events: auto;
        }

        @media (max-width: 991.98px) {
            .app-shell { display: block; padding: 14px; }
            .sidebar { display: none; }
            .mobile-topbar { display: block; margin-bottom: 14px; }
            .main-panel { width: 100%; }
            .topbar { display: none !important; }
            .page-header { padding: 22px; }
        }
    </style>

    @stack('styles')
</head>
<body>
@guest
    <div class="guest-shell">
        <main class="container">
            @include('partials.alerts')
            @yield('content')
        </main>
    </div>
@endguest

@auth
    <div class="app-shell">
        <aside class="sidebar">
            <a class="brand-wrap" href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                <div class="brand-icon"><i class="bi bi-stars"></i></div>
                <div>
                    <div class="brand-title">Wardrobe &<br>Outfit Planner</div>
                    <div class="brand-subtitle">Plan. Style. Shine.</div>
                </div>
            </a>

            <nav>
                @if(auth()->user()->role === 'user')
                    <a class="side-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-house-heart"></i> Dashboard
                    </a>
                    <a class="side-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                        <i class="bi bi-tags"></i> Kategori
                    </a>
                    <a class="side-link {{ request()->routeIs('clothes.*') ? 'active' : '' }}" href="{{ route('clothes.index') }}">
                        <i class="bi bi-bag-heart"></i> Wardrobe
                    </a>
                    <a class="side-link {{ request()->routeIs('outfits.*') ? 'active' : '' }}" href="{{ route('outfits.index') }}">
                        <i class="bi bi-calendar-heart"></i> Outfit Planner
                    </a>
                @else
                    <a class="side-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard Admin
                    </a>
                @endif
            </nav>

            <div class="premium-card">
                <div class="fw-bold mb-1"><i class="bi bi-gem me-1 text-rose"></i> Wardrobe Planner</div>
                <p class="small text-muted mb-3">Kelola pakaian dan rencana outfit dalam satu tempat.</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-primary btn-sm w-100" type="submit"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                </form>
            </div>
        </aside>

        <main class="main-panel">
            <div class="mobile-topbar">
                <nav class="navbar navbar-expand-lg soft-card px-3 py-2">
                    <a class="navbar-brand fw-bold text-brand" href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                        <i class="bi bi-stars text-rose me-1"></i> Wardrobe Planner
                    </a>
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mobileNav">
                        <ul class="navbar-nav ms-auto">
                            @if(auth()->user()->role === 'user')
                                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Kategori</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('clothes.index') }}">Pakaian</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('outfits.index') }}">Outfit</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a></li>
                            @endif
                        </ul>
                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button class="btn btn-primary btn-sm" type="submit">Logout</button>
                        </form>
                    </div>
                </nav>
            </div>

            <div class="topbar d-flex align-items-center justify-content-between gap-3">
                <div>
                    <div class="small text-muted">Welcome back,</div>
                    <div class="fw-bold text-brand"><i class="bi bi-person-heart text-rose me-1"></i>{{ auth()->user()->name }}</div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="search-soft d-none d-md-flex align-items-center gap-2">
                        <i class="bi bi-search text-rose"></i>
                        <span class="small">Search your style...</span>
                    </div>
                    <span class="chip"><i class="bi bi-calendar-heart text-rose"></i> Style Space</span>
                </div>
            </div>

            @include('partials.alerts')
            @yield('content')
        </main>
    </div>
@endauth

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('change', function (event) {
        if (event.target.matches('.select-card input[type="checkbox"]')) {
            event.target.closest('.select-card').classList.toggle('is-selected', event.target.checked);
        }
    });
</script>
@stack('scripts')
</body>
</html>
