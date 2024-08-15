@extends('layout.app')

@section('content')
<div class="card-body">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <form action="" method="GET" class="form-inline">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Cari Data Pegawai..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <a href="{{ route('pegawai.tambah') }}" class="btn btn-primary ml-auto">Tambah</a>
        </div>
    <div class="table-responsive mt-3">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Tanggal Lahir</th>
                    <th>Gajih</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($user as $row)
                 <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ $row->nip }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->jabatan }}</td>
                    <td>{{ $row->tgl_lahir }}</td>
                    <td>{{ $row->gajih }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $row->id) }}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="{{ route('pegawai.hapus', $row->id) }}" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>                        
                    </td>
                 </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection