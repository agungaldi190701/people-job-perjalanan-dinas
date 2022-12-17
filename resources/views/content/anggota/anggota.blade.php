@extends('layout.main')
@php
    $title = 'list-anggota';
@endphp
@section('content')
    <h1 class="mt-4">Daftar Anggota</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List data seluruh anggota</li>
    </ol>

    @auth
        @if (Auth::user()->jabatan == 'admin')
            <a href="/tambah-anggota" class="btn btn-primary">
                Tambah
                <i class="fas fa-plus"></i></a>
        @endif
    @endauth

    <div class="card mb-4 mt-2">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Seluruh Anggota
        </div>
        <div class="card-body">

            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        @auth
                            @if (Auth::user()->jabatan == 'admin')
                                <th>Aksi</th>
                            @endif
                        @endauth
                        <th>NIP</th>
                        <th>Nama Anggota</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>No Hp</th>



                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @auth
                                @if (Auth::user()->jabatan == 'admin')
                                    <td>
                                        <a href="/edit-anggota/{{ $r->id }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="/hapus-anggota/{{ $r->id }}" method="post" class="d-inline"
                                            onsubmit="return confirm('Apakah Anda Yakin Mengahus Data Ini ?')">
                                            @method('delete')
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $r->id }}">
                                            <button type="submit" class="btn btn-danger "> <i
                                                    class="fas fa-trash"></i></button>
                                        </form>

                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#tambah-anggota{{ $r->id }}">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                    </td>
                                @endif
                            @endauth
                            <td>{{ $r->nip }}</td>
                            <td>{{ $r->nama }}</td>
                            <td>{{ $r->jenis_kelamin }}</td>
                            <td>{{ $r->jabatan }}</td>
                            <td>{{ $r->nohp }}</td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="tambah-anggota{{ $r->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Info Anggota</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset('img/' . $r->foto) }}" alt="" width="100%">
                                            </div>
                                            <div class="col-md-4">
                                                <p>NIP</p>
                                                <p>Nama</p>
                                                <p>Jenis Kelamin</p>
                                                <p>Jabatan</p>
                                                <p>No Hp</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>: {{ $r->nip }}</p>
                                                <p>: {{ $r->nama }}</p>
                                                <p>: {{ $r->jenis_kelamin }}</p>
                                                <p>: {{ $r->jabatan }}</p>
                                                <p>: {{ $r->nohp }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    @if (session()->has('success'))
        <script>
            toastr.success(`{{ session('success') }}`);
        </script>
    @endif
@endsection
