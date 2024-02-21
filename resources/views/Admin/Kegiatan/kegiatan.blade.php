@extends('Admin.index')
@section('title', 'Admin | Kegiatan')
@section('content')
    <h1 class="mt-4">Kegiatan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Kegiatan</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <i class="fas fa-table me-1"></i>
                    Kegiatan
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-sm btn-primary pull-right" data-bs-toggle="modal"
                        data-bs-target="#AddKegiatan"><i class="fa fa-plus"></i> Add
                        Kegiatan</button>
                    @include('Admin.Kegiatan.addons.add')
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <td></td>
                        <th>#</th>
                        <th>Nama kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatans as $kegiatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kegiatan->kegiatan }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#EditKegiatan{{ $loop->iteration }}">
                                        <i class="fa fa-pencil"></i> Edit
                                    </button>
                                    @include('Admin.Kegiatan.addons.edit')
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#DeleteKegiatan{{ $loop->iteration }}"><i class="fa fa-trash"></i>
                                        Hapus</button>
                                        @include('Admin.Kegiatan.addons.delete')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
