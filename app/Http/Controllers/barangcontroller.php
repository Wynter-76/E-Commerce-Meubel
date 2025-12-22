<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;


class barangcontroller extends Controller
{
    public function index()
    {
        $data = barang::all();
        return view('barang.index',['dataBarang' => $data]);
    }

    public function detail($id)
    {
        $data = barang::findOrFail($id); 
        
        // PENTING: Nama view ini harus sama dengan nama file blade yang Anda buat 
        // di resources/views/customer/detail_produk.blade.php
        return view('customer.detail_produk', compact('data')); 
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = new barang();
        $data->nama_barang = $request->nama_barang;
        $data->harga = $request->harga;
        $data->bahan = $request->bahan;
        $data->ukuran = $request->ukuran;
        $data->stok = $request->stok;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('barang', $namaFile, 'public');
            $data->gambar = 'barang/'.$namaFile;
        }

        $data->save();

        return redirect('/admin')->with('Berhasil', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id){
        $barang = barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->bahan = $request->bahan;
        $barang->ukuran = $request->ukuran;
        $barang->stok = $request->stok;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('barang', $namaFile, 'public');
            $barang->gambar = 'barang/'.$namaFile;
        }
        $barang->update();

        return redirect('/admin')->with('Berhasil', 'Data berhasil diupdate');
    }

        public function destroy($id)
    {
        $barang = barang::findOrFail($id);

        // hapus gambar kalau ada
        if ($barang->gambar && file_exists(storage_path('app/public/' . $barang->gambar))) {
            unlink(storage_path('app/public/' . $barang->gambar));
        }

        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }

    public function pdfbarang() {
        $data = barang::all();
        return view ('barang.pdfbarang', ['dataBarang' => $data]);
    }

    public function shop()
    {
        $data = barang::all();
        return view('customer.shop',['data' => $data]);
    }

    public function home()
    {
        return view('customer.index');
    }
    public function about()
    {
        return view('customer.about');
    }

    public function contact()
    {
        return view('customer.contact');
    }


}