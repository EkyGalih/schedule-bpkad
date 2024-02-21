<div class="modal fade" id="AddKegiatan" tabindex="-1" aria-labelledby="AddKegiatanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddKegiatanLabel">Tambah Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kegiatan.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputKegiatan" name="kegiatan" type="text" />
                        <label for="inputKegiatan">Nama Kegiatan</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
