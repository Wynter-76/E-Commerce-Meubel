<div class="modal fade" id="modalHapusBarang{{ $data->id }}" tabindex="-1"
    aria-labelledby="modalHapusBarangLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalHapusBarangLabel{{ $data->id }}">Konfigurasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Yakin Untuk Menghapus inian <strong>{{ $data->nama_barang }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('barang.destroy', $data->id ) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>