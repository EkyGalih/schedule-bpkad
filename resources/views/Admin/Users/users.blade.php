@extends('Admin.index')
@section('title', 'Admin | Pengguna')
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
                    @include('Admin.Users.addons.add')
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
                                        data-bs-target="#EditPengguna{{ $loop->iteration }}"><i class="fa fa-pencil"></i> Edit</button>
                                        @include('Admin.Users.addons.edit')
                                    <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#DeletePengguna{{ $loop->iteration }}"><i class="fa fa-trash"></i> Hapus</button>
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
    </script>
@endsection
