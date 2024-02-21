<div class="modal fade" id="EditBidang{{ $loop->iteration }}" tabindex="-1" aria-labelledby="EditBidangLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditBidangLabel">Edit Bidang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bidang.update', $bidang->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputBidang" name="nama_bidang" type="text"
                            value="{{ $bidang->nama_bidang }}" />
                        <label for="inputBidang">Nama Bidang</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputWarnaBidang" name="warna_bidang" type="color" value="{{ $bidang->warna_bidang }}" />
                        <label for="inputWarnaBidang">Warna Bidang</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputTextWarna" name="warna_text" type="color" value="{{ $bidang->warna_text }}" />
                        <label for="inputTextWarna">Warna Text</label>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                        Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
