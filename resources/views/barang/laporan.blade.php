@extends('layouts.master_admin')

@section('content')
<div class="container mt-4">

    <h3>Laporan Pesanan</h3>
    <p>Daftar pesanan yang sudah dibayar</p>

    @if ($data->count() > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pesanan</th>
                <th>Tanggal</th>
                <th>Pembeli</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>
                    Rp {{ number_format($item->jumlah_harga, 0, ',', '.') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Belum ada pesanan.</p>
    @endif

</div>
@endsection
