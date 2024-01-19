<div class="modal fade" id="AddPengguna" tabindex="-1" aria-labelledby="AddPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddPenggunaLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputUsers" name="nama" type="text" />
                        <label for="inputUsers">Nama Pengguna</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputUsers" name="username" type="text" />
                        <label for="inputUsers">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="text" />
                        <label for="inputUsers">Password</label>
                        <button type="button" class="btn btn-default btn-xs" onclick="randomPass()"><i class="fas fa-random"></i> Generate Password</button>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="bidang_id" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($bidangs as $bidang)
                                <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                            @endforeach
                        </select>
                        <label for="inputUsers">Bidang</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="rule" class="form-control">
                            <option value="">Pilih</option>
                            <option value="admin">Admin</option>
                            <option value="users">User</option>
                        </select>
                        <label for="inputUsers">Rule</label>
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
