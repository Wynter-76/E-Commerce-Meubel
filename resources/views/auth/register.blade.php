@extends('layouts.auth')
<!-- Registration 9 - Bootstrap Brain Component -->
<section class="bg-primary py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row gy-4 align-items-center">
      <div class="col-12 col-md-6 col-xl-7">
        <div class="d-flex justify-content-center text-bg-primary">
          <div class="col-12 col-xl-9">
            <img class="img-fluid rounded mb-4" loading="lazy" src="./assets/img/bsb-logo-light.svg" width="245" height="80" alt="BootstrapBrain Logo">
            <hr class="border-primary-subtle mb-4">
            <h2 class="h1 mb-4">Desain rumah klasik modern terbaik!</h2>
            <div class="text-endx">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-5">
        <div class="card border-0 rounded-4">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-4">
                  <h2 class="h3">Registrasi Akun</h2>
                </div>
              </div>
            </div>
            <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row gy-3 overflow-hidden">
            <div class="col-12">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" placeholder="Nama" required>
                <label>Nama</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                <label>Email</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label>Password</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>
                <label>Confirm Password</label>
                </div>
            </div>
            <div class="col-12">
                <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Sign up</button>
                </div>
            </div>

            </div>
            </form>

            <div class="row">
              <div class="col-12">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                  <p class="m-0 text-secondary text-center">Already have an account? <a href="{{route('login')}}" class="link-primary text-decoration-none">Sign in</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>