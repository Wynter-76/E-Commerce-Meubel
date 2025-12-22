@extends('layouts.auth')
@section('title', 'Login')

@section('content')
<section class="bg-primary py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row gy-4 align-items-center">

      {{-- KIRI --}}
      <div class="col-12 col-md-6 col-xl-7">
        <div class="d-flex justify-content-center text-bg-primary">
          <div class="col-12 col-xl-9">
            <h2 class="h1 mb-4">Welcome Back</h2>
            <p class="lead mb-5">Silakan login untuk mengakses sistem</p>
          </div>
        </div>
      </div>

      {{-- KANAN --}}
      <div class="col-12 col-md-6 col-xl-5">
        <div class="card border-0 rounded-4">
          <div class="card-body p-4 p-md-5">

            <h3 class="mb-3">Login</h3>
            <p class="text-secondary mb-4">Masukkan email dan password</p>

            <form action="{{ route('login') }}" method="POST">
              @csrf

              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <label>Email</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <label>Password</label>
              </div>

              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
              </div>

            </form>

            <p class="text-center">
              Belum punya akun?
              <a href="{{ route('register') }}">Register</a>
            </p>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
