<div class="modal fade" id="DeletePengguna{{ $loop->iteration }}" tabindex="-1" aria-labelledby="DeletePenggunaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeletePenggunaLabel">Hapus Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus bidang <strong>{{ $user->nama }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Tidak</button>
                <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Ya</a>
            </div>
        </div>
    </div>
</div>
