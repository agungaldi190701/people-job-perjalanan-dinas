@extends('layout.main')
@php
    $previous = 'javascript:history.go(-1)';
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }
    $title = 'Edit Profile';
@endphp
@section('content')
    <h1 class="mt-4">
        Edit Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Lengkapi semua data anda dibawah ini</li>
    </ol>
    <div class="container rounded bg-white mt-5 mb-5">
        {{-- @php
            $id = Auth::user()->id;
            $anggota = DB::table('anggota')
                ->where('id', $id)
                ->get();
        @endphp --}}
        <form action="/update-profile" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            @foreach ($anggota as $item)
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                class="rounded-circle mt-5" width="100%" src="{{ asset('img/' . $item->foto) }}"><span
                                class="font-weight-bold">{{ $item->nama }}</span><span
                                class="text-black-50">{{ $item->username }}</span><span>
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Perbarui Foto</label>
                            <input type="file" class="form-control" placeholder="foto" name="foto"
                                value="{{ $item->foto }}">
                            <input type="hidden" name="foto_lama" value="{{ $item->foto }}">
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label class="labels">Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Your Name" name="nama"
                                        value="{{ $item->nama }}">
                                    <input type="hidden" class="form-control" name="id" value="{{ $item->id }}">
                                </div>

                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">NIP</label>
                                    <input type="text" class="form-control" placeholder="NIP" name="nip"
                                        value="{{ $item->nip }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Jabatan</label>
                                    <input type="text" class="form-control" value="{{ $item->jabatan }}   "
                                        placeholder="jabatan" name="jabatan" readonly>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">Nomor Hp</label>
                                    <input type="text" class="form-control" placeholder="nohp" name="nohp"
                                        value="{{ $item->nohp }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="" class="form-select">
                                        <option value="Laki-laki" @if ($item->jenis_kelamin == 'Laki-laki') selected @endif>
                                            Laki-laki</option>
                                        <option value="Perempuan" @if ($item->jenis_kelamin == 'Perempuan') selected @endif>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label class="labels">Username</label>
                                    <input type="text" class="form-control" value="{{ $item->username }}"
                                        placeholder="Username" name="username">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Ubah Password</label>
                                    <input type="text" class="form-control" placeholder="password" name="password">

                                </div>
                                <div class="col-md-2 mt-4">
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mt-5 text-center">

                                <a href="{{ $previous }}" class="btn btn-secondary"> Kembali</a>
                                <button class="btn
                                    btn-primary " type="submit">Simpan
                                    Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Password Anda</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" value="{{ $item->password }}"
                                        placeholder="password_lama" name="password_lama" readonly>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </form>

    </div>
    </div>
    </div>
    </div>
@endsection

@section('scripts')
@endsection
