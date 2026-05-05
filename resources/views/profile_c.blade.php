@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row">
        {{-- Sidebar Profil --}}
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

        {{-- Konten Tab --}}
        <div class="col-lg-8">
            <div class="tab-content card shadow-sm border-0 p-4" id="v-pills-tabContent" style="border-radius: 15px; min-height: 400px;">
                
                {{-- Alert Sukses --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="border-radius: 10px;">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Tab Profil --}}
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel">
                    <h4 class="fw-bold mb-4">Informasi Profil</h4>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control custom-input" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Alamat Email</label>
                        <input type="email" class="form-control custom-input" value="{{ Auth::user()->email }}" readonly>
                    </div>
                </div>

                {{-- Tab Riwayat --}}
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
                                    <td><span class="badge bg-info text-dark">Dikirim</span></td>
                                    <td><button class="btn btn-sm btn-outline-dark">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Tab Password (FIXED) --}}
                <div class="tab-pane fade" id="pills-password" role="tabpanel">
                    <h4 class="fw-bold mb-4">Ubah Keamanan Password</h4>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        {{-- Password Saat Ini --}}
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Password Saat Ini</label>
                            <input type="password" name="current_password" 
                                   class="form-control custom-input @error('current_password') is-invalid @enderror" 
                                   placeholder="Masukkan password lama" required>
                            @error('current_password')
                                <div class="text-danger small mt-1 ms-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password Baru --}}
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Password Baru</label>
                            <input type="password" name="new_password" 
                                   class="form-control custom-input @error('new_password') is-invalid @enderror" 
                                   placeholder="Minimal 8 karakter" required>
                            @error('new_password')
                                <div class="text-danger small mt-1 ms-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" 
                                   class="form-control custom-input" 
                                   placeholder="Ulangi password baru" required>
                        </div>

                        <button type="submit" class="btn btn-update w-100 w-md-auto">
                            Simpan Perubahan Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling Input Umum */
    .custom-input {
        border-radius: 30px !important;
        padding: 12px 20px !important;
        border: 1px solid #dee2e6 !important;
        background-color: #fff !important;
    }

    .custom-input[readonly] {
        background-color: #f8f9fa !important;
    }

    /* Error Style */
    .is-invalid {
        border-color: #dc3545 !important;
    }

    /* Container untuk Input Password */
    .pass-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
    }

    /* Styling Ikon Mata */
    .toggle-password-icon {
        position: absolute;
        right: 20px;
        cursor: pointer;
        color: #6c757d;
        font-size: 1.2rem;
        z-index: 10;
        transition: color 0.2s;
    }

    .toggle-password-icon:hover {
        color: #3b5d50;
    }

    .pass-input {
        padding-right: 50px !important;
    }

    /* Tombol Update */
    .btn-update {
        background-color: #3b5d50 !important;
        color: white !important;
        border-radius: 30px !important;
        padding: 10px 30px !important;
        border: none !important;
        font-weight: bold;
    }

    .btn-update:hover {
        background-color: #2d463d !important;
        color: white !important;
    }
</style>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.toggle-password-icon').forEach(icon => {
        icon.addEventListener('click', function () {
            const input = this.parentElement.querySelector('.pass-input');
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.remove('bi-eye');
                this.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                this.classList.remove('bi-eye-slash');
                this.classList.add('bi-eye');
            }
        });
    });
</script>
@endpush