@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="card border-0 shadow-lg"
     style="width: 420px; border-radius: 22px;">

    <div class="card-body p-4">

        <div class="text-center mb-4">
            <img src="{{ asset('assets/logo.png') }}"
                 alt="Universitas Galuh"
                 style="width:80px; margin-bottom:12px;">

            <h4 class="fw-bold mb-1">Universitas Galuh</h4>
            <p class="text-muted mb-0">Sistem Informasi Master  Data PPG</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email"
                       name="email"
                       class="form-control form-control-lg"
                       placeholder="Masukkan email"
                       required
                       autofocus>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <input type="password"
                       name="password"
                       class="form-control form-control-lg"
                       placeholder="Masukkan password"
                       required>
            </div>

            <button class="btn btn-primary btn-lg w-100 shadow-sm">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
        </form>

    </div>
</div>
@endsection
