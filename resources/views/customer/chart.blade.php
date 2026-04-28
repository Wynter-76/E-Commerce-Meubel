@extends('layouts.master')
@section('title','Keranjang')
@section('content')

<div class="container mt-4">

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif


@if ($data && $data->detail && $data->detail->count() > 0)
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->detail as $item)
            <tr>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>Rp {{ number_format($item->barang->harga, 0, ',', '.') }}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">

                        <!-- Tombol Kurang -->
                        <form action="{{ route('checkout.kurang', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-warning btn-sm">-</button>
                        </form>

                        <!-- Jumlah -->
                        <span>{{ $item->jumlah }}</span>

                        <!-- Tombol Tambah -->
                        <form action="{{ route('checkout.tambah', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary btn-sm">+</button>
                        </form>

                    </div>
                </td>
                <td>Rp {{ number_format($item->jumlah_harga, 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('checkout.hapus', $item->id) }}" method="POST"
                          onsubmit="return confirm('Hapus barang dari keranjang?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="text-end">
        Total: 
        <strong>
            Rp {{ number_format($data->jumlah_harga, 0, ',', '.') }}
        </strong>
    </h5>

    <form action="{{ route('checkout.bayar') }}" method="POST" class="text-end mt-3">
    @csrf
    <button type="submit" class="btn btn-success">
        Bayar Sekarang
    </button>
</form>


@else
    <p class="text-center">Keranjang masih kosong.</p>
@endif

</div>

@endsection
