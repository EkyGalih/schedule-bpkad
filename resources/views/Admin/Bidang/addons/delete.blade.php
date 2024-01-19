<div class="modal fade" id="DeleteBidang{{ $loop->iteration }}" tabindex="-1" aria-labelledby="DeleteBidangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteBidangLabel">Hapus Bidang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus bidang <strong>{{ $bidang->nama_bidang }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Tidak</button>
                <a href="{{ route('bidang.destroy', $bidang->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Ya</a>
            </div>
        </div>
    </div>
</div>
