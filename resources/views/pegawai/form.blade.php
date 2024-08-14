@extends('layout.app')

@section('content')
<div class="container-fluid"> <!-- Adjust container to be fluid and take full width -->
    <form action="{{ isset($user) ? route('pegawai.tambah.update', $user->id) : route('pegawai.tambah.simpan') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ isset($user) ? 'Form Edit Pegawai' : 'Form Tambah Pegawai' }}</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="number" class="form-control" id="nip" name="nip" value="{{ isset($user) ? $user->nip : '' }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($user) ? $user->nama : '' }}">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" id="jabatan" name="jabatan">
                        <option value="admin" {{ isset($user) && $user->jabatan == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="lurah" {{ isset($user) && $user->jabatan == 'lurah' ? 'selected' : '' }}>Lurah</option>
                        <option value="sekretaris lurah" {{ isset($user) && $user->jabatan == 'sekretaris lurah' ? 'selected' : '' }}>Sekretaris Lurah</option>
                    </select>
                </div>                    
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ isset($user) ? $user->tgl_lahir : '' }}">
                </div>
                <div class="form-group">
                    <label for="gajih">Gaji</label>
                    <input type="number" class="form-control" id="gajih" name="gajih" value="{{ isset($user) ? $user->gajih : '' }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
