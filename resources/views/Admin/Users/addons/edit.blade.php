<div class="modal fade" id="EditPengguna{{ $loop->iteration }}" tabindex="-1" aria-labelledby="EditPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditPenggunaLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputUsers" name="nama" type="text" value="{{ $user->nama }}" />
                        <label for="inputUsers">Nama Pengguna</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputUsers" name="username" type="text" value="{{ $user->username }}" />
                        <label for="inputUsers">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="bidang_id" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($bidangs as $bidang)
                                <option value="{{ $bidang->id }}" {{ $user->bidang_id == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama_bidang }}</option>
                            @endforeach
                        </select>
                        <label for="inputUsers">Bidang</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="rule" class="form-control">
                            <option value="">Pilih</option>
                            <option value="admin" {{ $user->rule == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="users" {{ $user->rule == 'users' ? 'selected' : '' }}>User</option>
                        </select>
                        <label for="inputUsers">Rule</label>
                    </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
