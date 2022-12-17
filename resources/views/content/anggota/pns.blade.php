@extends('layout.main')

@php
    $total_anggota = DB::table('users')
        ->where('jenis_anggota', 'pns')
        ->count();
    $anggota = DB::table('users')
        ->where('jenis_anggota', 'pns')
        ->get();
    $title = 'list-pns';
@endphp

@section('content')
    <h1 class="mt-4">Data Anggota PNS</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List Semua Data Anggota</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header text-center">
                    Total Anggota
                </div>
                <div class="card-body text-center">
                    <h3>{{ $total_anggota }}</h3>
                </div>

            </div>
        </div>


    </div>
    <div class="row">
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
                            <th>Foto</th>
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
                                <td>
                                    <img src="{{ asset('img/' . $r->foto) }}" class="img-rounded" alt="Gambar malas ngoding"
                                        width="50" height="50">


                                </td>
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
