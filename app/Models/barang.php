<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_barang','harga','bahan','ukuran','stok','gambar'];
    public function detail_pesanan() 
	{
	    return $this->hasMany(detail_pesanan::class);
	}
}
