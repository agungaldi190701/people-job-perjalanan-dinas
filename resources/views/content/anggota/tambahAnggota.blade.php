@extends('layout.main')
@php
    $title = 'tambah-anggota';
@endphp
@section('content')
    <h1 class="mt-4">Tambah Anggota</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Lengkapi semua data anggota dibawah ini</li>
    </ol>

    <div class="card">
        <div class="card-body">
            <form action="upload-anggota" method="POST" enctype="multipart/form-data">

                {{-- {{ csrf_field() }} --}}
                @csrf
                @method('POST')
                {{--  --}}

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nip" placeholder="Your nip" name="nip"
                                autofocus>
                            <label for="nip">Masukan NIP</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nama" placeholder="Your nama"
                                name="nama">
                            <label for="nama">Masukan Nama</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="jeniskelamin" id="jeniskelamin" class="form-select">

                                <option value=""></option>
                                <option value="Laki-Laki"> Laki-Laki</option>
                                <option value="Perempuan"> Perempuan </option>
                            </select>
                            <label for="jeniskelamin">Piih jenis Kelamin ----</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="jabatan" id="jabatan" class="form-select">

                                <option value=""></option>
                                <option value="ketua"> Ketua</option>
                                <option value="anggota"> Anggota </option>
                            </select>
                            <label for="jabatan">Piih Jabatan ----</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="jenis_anggota" id="jenis_anggota" class="form-select">

                                <option value=""></option>
                                <option value="pns"> PNS</option>
                                <option value="honorer"> Honorer </option>
                            </select>
                            <label for="jenis_anggota">Piih jenis_anggota ----</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="username" placeholder="Your username"
                                name="username">
                            <label for="username">Masukan Username</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Your password"
                                name="password">
                            <label for="password">Masukan password</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nohp" placeholder="Your nohp"
                                name="nohp">
                            <label for="nohp">Masukan Nomor Hp</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form">
                            <label for="foto">Pilih Foto</label>
                            <input type="file" class="form-control" id="foto" placeholder="Your foto"
                                name="foto">
                        </div>
                    </div>

                    <div class="col-6">
                        <a href="/anggota"class="btn btn-secondary w-100 py-3">Kembali</a>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary w-100 py-3" type="submit">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @if (count($errors) > 0)
        <script>
            toastr.error(`{{ $errors->first() }}`);
        </script>
    @endif
@endsection
