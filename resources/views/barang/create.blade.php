<div class="modal fade" id="modalTambahBarang" tabindex="-1" aria-labelledby="modalTambahBarangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahBarangLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_barang" class="form-label">Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
                    </div>

                    <div class="form-group">
                        <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="harga" id="harga" required>
                    </div>

                    <div class="form-group">
                        <label for="bahan" class="form-label">Bahan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="bahan" id="bahan" required>
                    </div>

                    <div class="form-group">
                        <label for="ukuran" class="form-label">Ukuran <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="ukuran" id="ukuran" required>
                    </div>

                    <div class="form-group">
                        <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="stok" id="stok" required>
                    </div>

                    <div class="form-group">
                        <label for="gambar" class="form-label">Gambar <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="gambar" id="gambar" required>
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>