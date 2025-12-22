@extends('layouts.master_admin')
@section('title', 'Produk')
@section('content')
<br>
<div class="container">
    <h2>Tabel Barang</h2>
    <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">+Tambah Data</button>
    {{-- <a href="{{route('produk.pdf')}}" class="btn btn-secondary pull-right mb-2" target="_blank">PDF</a> --}}
    <table class="table table-bordered table stripper" id="tabel-barang">
        <thead>
            <tr>
                <th style="width:1%">No.</th>
                <th style="width:5%">Nama Barang</th>
                <th style="width:5%">Harga</th>
                <th style="width:5%">Bahan</th>
                <th style="width:5%">Ukuran</th>
                <th style="width:5%">Stok</th>
                <th style="width:5%">Gambar</th>
                <th style="width:5%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataBarang as $data)
            <tr>
                <td> {{ $loop->iteration }}</td>
                <td> {{ $data->nama_barang}}</td>
                <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                <td> {{ $data->bahan }} </td>
                <td> {{ $data->ukuran }}</td>
                <td> {{ $data->stok}}</td>
                <td>
                    @if($data->gambar)
                        <img src="{{ asset('storage/'.$data->gambar) }}" width="80">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning"
                    data-bs-toggle="modal"
                    data-bs-target="#modalEditBarang{{ $data->id }}">
                    Ubah</button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modalHapusBarang{{ $data->id }}">Hapus</button>
                </td>
            </tr>
            @include('barang.update', ['data' => $data])
            @include('barang.delete',['data'=> $data])
            @endforeach
        </tbody>

    </table>
</div>







@include('barang.create')

@stop

@push('scripts')
<script>
$(function(){
    $('tabel-produk').DataTable();
});
</script>
@endpush