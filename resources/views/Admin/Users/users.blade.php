@extends('Admin.index')
@section('title', 'Admin | Pengguna')
@section('pengguna', 'active')
@section('content')
    <h1 class="mt-4">Pengguna</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengguna</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <i class="fas fa-users me-1"></i>
                    Pengguna
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-sm btn-primary pull-right" data-bs-toggle="modal"
                        data-bs-target="#AddPengguna"><i class="fa fa-plus"></i> Add Pengguna</button>
                    <div class="modal fade" id="AddPengguna" tabindex="-1" aria-labelledby="AddPenggunaLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="AddPenggunaLabel">Tambah Pengguna</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('users.store') }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            {{-- <input class="form-control" name="nama" type="text"
                                                id="nama" /> --}}
                                               <select name="nama" id="nama" data-search="true" class="form-control">
                                               </select>
                                            <label for="inputUsers">Nama Pengguna</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUsers" name="username" type="text" />
                                            <label for="inputUsers">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="text" />
                                            <label for="inputUsers">Password</label>
                                            <button type="button" class="btn btn-default btn-xs" onclick="randomPass()"><i
                                                    class="fas fa-random"></i> Generate Password</button>
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                            class="fa fa-times"></i>
                                        Batal</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                        Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <td></td>
                        <th>#</th>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Bidang</th>
                        <th>Rule</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->Bidang->nama_bidang }}</td>
                            <td>
                                @if ($user->rule == 'admin')
                                    <div class="badge bg-danger">Admin</div>
                                @else
                                    <div class="badge bg-secondary">User</div>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal"
                                        data-bs-target="#EditPengguna{{ $loop->iteration }}"><i class="fa fa-pencil"></i>
                                        Edit</button>
                                    @include('Admin.Users.addons.edit')
                                    <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal"
                                        data-bs-target="#DeletePengguna{{ $loop->iteration }}"><i class="fa fa-trash"></i>
                                        Hapus</button>
                                    @include('Admin.Users.addons.delete')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('additional-js')
    <script>
        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        $('#password').val(makeid(20));
        $('#password_reset').val(makeid(20));

        function randomPass() {
            console.log(makeid(20));
            $('#password').val(makeid(20));
            $('#password_reset').val(makeid(20));
        }

        $('#nama').on('keyup', function() {
            search();
        });

        function search() {
            var keyword = $('#nama').val();
            var pegawai;

            $.ajax({
                type: 'GET',
                async: false,
                url: '{{ url('searchPegawai') }}/' + keyword,
                success: function(data) {
                    pegawai = data;
                }
            });
            $('#hasil').text(pegawai);
        }
    </script>
@endsection
