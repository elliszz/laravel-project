@extends('layouts.app')

@section('content')
<style>
/* ===================== MATIIN SEMUA SIDEBAR & PADDING LAYOUT ===================== */
#sidebar,
.sidebar,
.sidebar-wrapper {
    display: none !important;
}

body,
.main-content,
.content-wrapper,
.container-fluid {
    margin: 0 !important;
    padding: 0 !important;
    width: 100% !important;
}

/* ===================== WRAPPER (SAMA PERSIS USER) ===================== */
.dashboard-wrap {
    max-width: 1100px;
    margin: 0 auto;
    padding: 40px 20px;
    position: relative;
}

/* ===================== TITLE ===================== */
.dashboard-title {
    font-size: 34px;
    font-weight: 700;
    margin-bottom: 0;
}

.dashboard-sub {
    color: #666;
    margin-bottom: 40px;
    font-size: 18px;
    font-style: italic;
}

/* ===================== LOGOUT ===================== */
.logout-btn {
    position: absolute;
    top: 40px;
    right: 20px;
    background: #fff;
    border-radius: 10px;
    padding: 8px 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,.15);
    z-index: 10;
}

/* ===================== GRID (SAMA USER, AUTO CENTER) ===================== */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 28px;
}

/* ===================== CARD ===================== */
.dashboard-card {
    border-radius: 22px;
    padding: 45px 30px;
    text-align: center;
    text-decoration: none;
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    transition: .3s;
    display: block;
}

/* OFFSET ESTETIK (SAMA USER) */
.dashboard-card:nth-child(2),
.dashboard-card:nth-child(4) {
    margin-top: 20px;
}

.dashboard-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 18px 35px rgba(0,0,0,0.18);
}

/* ===================== ICON ===================== */
.dashboard-card i {
    font-size: 56px;
    margin-bottom: 18px;
    display: block;
}

/* ===================== TEXT ===================== */
.dashboard-card h4 {
    margin: 0;
    font-size: 21px;
    font-weight: 600;
    letter-spacing: .3px;
}

/* ===================== WARNA ===================== */
.card-gtk { background:#ede7f6; color:#5e35b1; }
.card-dosen { background:#e3f2fd; color:#1e88e5; }
.card-gumong { background:#e8f5e9; color:#43a047; }
.card-tautan { background:#fff3e0; color:#fb8c00; }

/* ===================== MOBILE ===================== */
@media (max-width: 768px) {
    .logout-btn {
        position: static;
        float: right;
        margin-bottom: 20px;
    }
}
</style>

<div class="dashboard-wrap">

    <!-- LOGOUT -->
    <a href="{{ route('logout') }}"
       class="btn btn-outline-danger logout-btn"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

    <!-- TITLE -->
    <h1 class="dashboard-title">Dashboard Admin</h1>
    <p class="dashboard-sub">
        Selamat datang, <strong>{{ auth()->user()->name }}</strong> 👋
        semoga harimu menyenangkan
    </p>

    <!-- GRID -->
    <div class="dashboard-grid">

        <a href="{{ route('admin.laporan-gtk.index') }}" class="dashboard-card card-gtk">
            <i class="bi bi-file-earmark-text"></i>
            <h4>Laporan GTK</h4>
        </a>

        <a href="{{ route('admin.data-dosen.index') }}" class="dashboard-card card-dosen">
            <i class="bi bi-person-badge"></i>
            <h4>Data Dosen</h4>
        </a>

        <a href="{{ route('admin.data-gumong.index') }}" class="dashboard-card card-gumong">
            <i class="bi bi-building"></i>
            <h4>Data Gumong</h4>
        </a>

        <a href="{{ route('admin.tautan.index') }}" class="dashboard-card card-tautan">
            <i class="bi bi-link-45deg"></i>
            <h4>Tautan Bahan</h4>
        </a>

    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endsection
