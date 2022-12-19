@extends('layout.main')
@php
    $title = 'Edit-Kegiatan';
@endphp
@section('content')
    <h1 class="mt-4">Edit Kegiatan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Lengkapi semua data Kegiatan dibawah ini</li>
    </ol>

    <div class="card">
        <div class="card-body">
            <form action="/update-kegiatan" method="POST">

                {{-- {{ csrf_field() }} --}}
                @csrf
                @method('POST')
                {{--  --}}

                @foreach ($kegiatan as $r)
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="ketua" name="ketua"
                                    value="{{ $r->nama_ketua }}" autofocus>
                                <label for="ketua">Nama Ketua Rombongan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="nohp_ketua" name="nohp_ketua"
                                    value="{{ $r->nohp_ketua }}">
                                <label for="nohp_ketua">Nomor Hp Ketua Rombongan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="total_orang" name="total_orang"
                                        value="{{ $r->total_orang }}">
                                    <label for="total_orang">Total Orang</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="option_kegiatan">
                            <div class="form-floating">
                                <select name="jenis_kegiatan2" id="jenis_kegiatan" class="form-select">

                                    <option value="{{ $r->jenis_kegiatan }}">{{ $r->jenis_kegiatan }}</option>
                                    <option value="Perpustakaan Jalan">Perpustakaan Jalan</option>
                                    <option value="Undangan">Undangan</option>
                                    <option value="Upacara">Upacara</option>
                                    <option>Lainya</option>

                                </select>
                                <label for="jenis_kegiatan">Piih jenisKegiatan ----</label>

                            </div>
                        </div>
                        <div class="col-md-6" id="lainya">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                                <label for="jenis_kegiatan">jenis_kegitan</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $r->tanggal }}">
                                <label for="tanggal">Tanggal Kegiatan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="jam" name="jam"
                                    value="{{ $r->jam }}">
                                <label for="jam">Jam Kegiatan</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="status" id="status" class="form-select">

                                    <option value="{{ $r->status }}">{{ $r->status }}</option>
                                    <option value="Akan Datang">Akan Datang</option>
                                    <option value="Sudah Selesai">Sudah Selesai</option>

                                </select>
                                <label for="status">Piih status ----</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                    value="{{ $r->lokasi }}">
                                <label for="lokasi">Lokasi Kegiatan</label>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="{{ $r->id }}">

                        <div class="col-6">
                            <a href="/kegiatan"class="btn btn-secondary w-100 py-3">Kembali</a>
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
    @if (count($errors) > 0)
        <script>
            toastr.error(`{{ $errors->first() }}`);
        </script>
    @endif
    <script>
        $('#lainya').hide();
        $('#jenis_kegiatan').change(function() {
            if ($('select option:selected').text() == "Lainya") {
                $('#option_kegiatan').hide();
                $('#lainya').show();
            } else {}
        });
    </script>
@endsection
