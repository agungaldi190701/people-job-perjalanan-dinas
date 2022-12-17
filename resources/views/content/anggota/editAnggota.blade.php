@extends('layout.main')
@php
    $title = 'Edit Anggota';
@endphp
@section('content')
    <h1 class="mt-4">
        Edit Anggota</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Lengkapi semua data anggota dibawah ini</li>
    </ol>

    <div class="card">
        <div class="card-body">
            <form action="/update-anggota" method="POST" enctype="multipart/form-data">

                @foreach ($anggota as $r)
                    {{-- {{ csrf_field() }} --}}
                    @csrf
                    @method('POST')
                    {{--  --}}

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nip" value="{{ $r->nip }}"
                                    name="nip" autofocus>
                                <label for="nip">Masukan NIP</label>
                                <input type="hidden" class="form-control" id="id" name="id" placeholder="...."
                                    value="{{ $r->id }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nama" value="{{ $r->nama }}"
                                    name="nama">
                                <label for="nama">Masukan Nama</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="jeniskelamin" id="jeniskelamin" class="form-select">

                                    <option value="{{ $r->jenis_kelamin }}">{{ $r->jenis_kelamin }}</option>
                                    <option value="Laki-Laki"> Laki-Laki</option>
                                    <option value="Perempuan"> Perempuan </option>
                                </select>
                                <label for="jeniskelamin">Piih jenis Kelamin ----</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="jabatan" id="jabatan" class="form-select">

                                    <option value="{{ $r->jabatan }}"></option>
                                    <option value="ketua"> Ketua</option>
                                    <option value="anggota"> Anggota </option>
                                </select>
                                <label for="jabatan">Piih Jabatan ----</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="username" value="{{ $r->username }}"
                                    name="username">
                                <label for="username">Masukan Username</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" value="{{ $r->password }}"
                                    name="password">
                                <label for="password">Masukan password</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nohp" value="{{ $r->nohp }}"
                                    name="nohp">
                                <label for="nohp">Masukan Nomor Hp</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form">
                                <label for="foto">Pilih Foto</label>
                                <input type="file" class="form-control" id="foto" placeholder="Your foto"
                                    name="foto">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form">
                                <input type="hidden" name="foto_lama" value="{{ $r->foto }}">
                                <img src="{{ asset('img/' . $r->foto) }}" alt="" width="100px">
                            </div>
                        </div>

                        <div class="col-6">
                            <a href="/anggota"class="btn btn-secondary w-100 py-3">Kembali</a>
                        </div>

                        <div class="col-6">
                            <button class="btn btn-success w-100 py-3" type="submit">Update Data</button>
                        </div>
                    </div>
                @endforeach
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script></script>
@endsection
