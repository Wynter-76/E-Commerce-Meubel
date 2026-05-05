@extends('layouts.auth')
@section('title', 'Login')

@section('content')
<!-- Ganti bg-primary dengan warna hijau gelap Dwijaya -->
<section class="py-3 py-md-5 py-xl-8" style="background-color: #3d5a4a; min-height: 100vh; display: flex; align-items: center;">
  <div class="container">
    <div class="row gy-4 align-items-center">

      {{-- KIRI: Branding --}}
      <div class="col-12 col-md-6 col-xl-7">
        <div class="d-flex justify-content-center text-white">
          <div class="col-12 col-xl-9">
            <!-- Tambahkan Logo atau Nama Toko -->
            <h1 class="display-4 fw-bold mb-3">Dwijaya Mebel.</h1>
            <hr class="mb-4" style="width: 100px; border: 3px solid #ffc107; opacity: 1;">
            <h2 class="h1 mb-4">Welcome Back</h2>
            <p class="lead mb-5 opacity-75">Silakan login untuk mengelola data produk, kategori, dan laporan pesanan dengan mudah.</p>
            <div class="text-start">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#ffc107" class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
              </svg>
            </div>
          </div>
        </div>
      </div>

      {{-- KANAN: Form Login --}}
      <div class="col-12 col-md-6 col-xl-5">
        <div class="card border-0 rounded-4 shadow-lg">
          <div class="card-body p-4 p-md-5">

            <div class="text-center mb-4">
               <h3 class="fw-bold" style="color: #3d5a4a;">Masuk Ke Akun</h3>
               <p class="text-secondary">Masukkan email dan password Anda</p>
            </div>

            <form action="{{ route('login') }}" method="POST">
              @csrf

              <!-- Alert Error (Penting untuk Auth) -->
              @if ($errors->any())
                <div class="alert alert-danger py-2 small">
                   <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                   </ul>
                </div>
              @endif

              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required value="{{ old('email') }}">
                <label for="email" class="text-secondary">Alamat Email</label>
              </div>

              <div class="form-floating mb-4">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password" class="text-secondary">Password</label>
              </div>

              <div class="d-grid mb-4">
                <!-- Button Hijau Gelap -->
                <button type="submit" class="btn btn-lg text-white fw-bold shadow-sm" style="background-color: #3d5a4a; border-radius: 10px;">
                  Login Sekarang
                </button>
              </div>

            </form>

            <div class="text-center">
              <p class="mb-0 text-secondary">Belum punya akun? 
                <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #3d5a4a;">Daftar Disini</a>
              </p>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection