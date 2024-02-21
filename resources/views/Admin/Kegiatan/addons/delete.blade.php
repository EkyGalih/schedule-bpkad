<div class="modal fade" id="DeleteKegiatan{{ $loop->iteration }}" tabindex="-1" aria-labelledby="DeleteKegiatanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteKegiatanLabel">Hapus Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus kegiatan <strong>{{ $kegiatan->kegiatan }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Tidak</button>
                <a href="{{ route('kegiatan.destroy', $kegiatan->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Ya</a>
            </div>
        </div>
    </div>
</div>
