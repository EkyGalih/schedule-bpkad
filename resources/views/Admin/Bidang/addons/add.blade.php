<div class="modal fade" id="AddBidang" tabindex="-1" aria-labelledby="AddBidangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddBidangLabel">Tambah Bidang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bidang.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputBidang" name="nama_bidang" type="text" />
                        <label for="inputBidang">Nama Bidang</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputWarnaBidang" name="warna_bidang" type="color" />
                        <label for="inputWarnaBidang">Warna Bidang</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputTextWarna" name="warna_text" type="color" />
                        <label for="inputTextWarna">Warna Text</label>
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
