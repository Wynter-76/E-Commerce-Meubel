@extends('layouts.master')
@section('title','Check Out')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Check Out
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>

                    @if(!empty($pesanan))
                        <p class="text-end">
                            Tanggal Pesan : {{ $pesanan->tanggal }}
                        </p>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no = 1; @endphp

                                @foreach($pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>

                                    {{-- GAMBAR (FIX STORAGE) --}}
                                    <td>
                                        <img 
                                            src="{{ asset('storage/'.$pesanan_detail->barang->gambar) }}" 
                                            width="100"
                                            alt="{{ $pesanan_detail->barang->nama_barang }}">
                                    </td>

                                    <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                    <td>{{ $pesanan_detail->jumlah }} kain</td>

                                    <td class="text-end">
                                        Rp {{ number_format($pesanan_detail->barang->harga, 0, ',', '.') }}
                                    </td>

                                    <td class="text-end">
                                        Rp {{ number_format($pesanan_detail->jumlah_harga, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        <form action="{{ url('check-out/'.$pesanan_detail->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin akan menghapus data ?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td colspan="5" class="text-end">
                                        <strong>Total Harga :</strong>
                                    </td>
                                    <td class="text-end">
                                        <strong>
                                            Rp {{ number_format($pesanan->jumlah_harga, 0, ',', '.') }}
                                        </strong>
                                    </td>
                                    <td>
                                        <a 
                                            href="{{ url('konfirmasi-check-out') }}" 
                                            class="btn btn-success"
                                            onclick="return confirm('Anda yakin akan Check Out ?')">
                                            <i class="fa fa-shopping-cart"></i> Check Out
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

