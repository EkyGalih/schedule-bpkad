@extends('Admin.index')
@section('title', 'Admin | Bidang')
@section('content')
    <h1 class="mt-4">Bidang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Bidang</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <i class="fas fa-table me-1"></i>
                    Bidang
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-sm btn-primary pull-right" data-bs-toggle="modal"
                        data-bs-target="#AddBidang"><i class="fa fa-plus"></i> Add
                        Bidang</button>
                    @include('Admin.Bidang.addons.add')
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <td></td>
                        <th>#</th>
                        <th>Nama Bidang</th>
                        <th>Warna Bidang</th>
                        <th>Warna Text</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bidangs as $bidang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bidang->nama_bidang }}</td>
                            <td>
                                <a style="background-color: {{ $bidang->warna_bidang }}; color: {{ $bidang->warna_text }}; padding: 5px;">{{ $bidang->warna_bidang }}</a>
                            </td>
                            <td>
                                <a style="background-color: {{ $bidang->warna_text }}; color: {{ $bidang->warna_bidang }}; padding: 5px;">{{ $bidang->warna_text }}</a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#EditBidang{{ $loop->iteration }}">
                                        <i class="fa fa-pencil"></i> Edit
                                    </button>
                                    @include('Admin.Bidang.addons.edit')
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#DeleteBidang{{ $loop->iteration }}"><i class="fa fa-trash"></i>
                                        Hapus</button>
                                        @include('Admin.Bidang.addons.delete')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
