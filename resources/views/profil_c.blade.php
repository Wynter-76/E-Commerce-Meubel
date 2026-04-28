@extends('layouts.master') {{-- Sesuaikan layout customer kamu --}}

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body text-center p-4">
                    <div class="d-inline-flex justify-content-center align-items-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px; background-color: #f9bf29; border-radius: 50%; color: white; font-size: 32px; font-weight: bold;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <h5 class="fw-bold mb-0">{{ Auth::user()->name }}</h5>
                    <p class="text-muted small">{{ Auth::user()->email }}</p>
                    
                    <div class="nav flex-column nav-pills mt-4" id="v-pills-tab" role="tablist">
                        <button class="nav-link active mb-2 py-3 text-start px-4" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" style="border-radius: 10px;">
                            <i class="bi bi-person me-2"></i> Profil Saya
                        </button>
                        <button class="nav-link mb-2 py-3 text-start px-4" id="pills-history-tab" data-bs-toggle="pill" data-bs-target="#pills-history" type="button" role="tab" style="border-radius: 10px;">
                            <i class="bi bi-bag-check me-2"></i> Riwayat Pembelian
                        </button>
                        <button class="nav-link mb-2 py-3 text-start px-4" id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password" type="button" role="tab" style="border-radius: 10px;">
                            <i class="bi bi-shield-lock me-2"></i> Ganti Password
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="tab-content card shadow-sm border-0 p-4" id="v-pills-tabContent" style="border-radius: 15px; min-height: 400px;">
                
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel">
                    <h4 class="fw-bold mb-4">Informasi Profil</h4>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly style="background-color: #f8f9fa;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Alamat Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly style="background-color: #f8f9fa;">
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-history" role="tabpanel">
                    <h4 class="fw-bold mb-4">Riwayat Pembelian</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID Pesanan</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#DWJ-001</td>
                                    <td>25 Apr 2026</td>
                                    <td class="fw-bold text-success">Rp 1.500.000</td>
                                    <td><span class="badge bg-info">Dikirim</span></td>
                                    <td><button class="btn btn-sm btn-outline-dark">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-password" role="tabpanel">
                    <h4 class="fw-bold mb-4">Ubah Keamanan</h4>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Password Saat Ini</label>
                            <input type="password" class="form-control" placeholder="Masukkan password lama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Password Baru</label>
                            <input type="password" class="form-control" placeholder="Masukkan password baru">
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" placeholder="Ulangi password baru">
                        </div>
                        <button class="btn btn-primary" style="background-color: #3b5d50; border: none;">Update Password</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection