<div class="modal fade" id="modalEditBarang{{ $data->id }}" tabindex="-1"
    aria-labelledby="modalEditBarangLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalEditBarangLabel{{ $data->id }}">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('barang.update', $data->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="{{ $data->nama_barang }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga" value="{{ $data->harga }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Bahan</label>
                        <input type="text" class="form-control" name="bahan" value="{{ $data->bahan }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" value="{{ $data->ukuran }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="text" class="form-control" name="stok" value="{{ $data->stok }}" required>
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