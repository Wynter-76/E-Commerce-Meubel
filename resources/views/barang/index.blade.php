@extends('layouts.master_admin')
@section('title', 'Produk')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tabel Barang</h2>
        <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">
            <i class="bi bi-plus-lg"></i> Tambah Data
        </button>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle" id="tabel-barang">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width:5%">No.</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Bahan</th>
                            <th>Ukuran</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center" style="width:15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataBarang as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $data->nama_barang }}</td>
                            <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                            <td>{{ $data->bahan }}</td>
                            <td>{{ $data->ukuran }}</td>
                            <td class="text-center">{{ $data->stok }}</td>
                            <td class="text-center">
                                @if($data->gambar)
                                    <img src="{{ asset('storage/'.$data->gambar) }}" class="rounded border" width="60" height="60" style="object-fit: cover;">
                                @else
                                    <span class="text-muted small">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-warning btn-sm fw-bold text-white" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalEditBarang{{ $data->id }}">
                                        Ubah
                                    </button>
                                    <button class="btn btn-danger btn-sm fw-bold" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalHapusBarang{{ $data->id }}">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Update & Delete dipanggil di dalam loop agar mendapatkan $data->id --}}
                        @include('barang.update', ['data' => $data])
                        @include('barang.delete', ['data' => $data])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Create di luar loop --}}
@include('barang.create')

@stop

@push('scripts')
<script>
    $(document).ready(function() {
        // Pastikan ID selector sesuai dengan ID di tag <table>
        $('#tabel-barang').DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Lanjut",
                    "previous": "Kembali"
                }
            }
        });
    });
</script>
@endpush