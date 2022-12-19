@extends('layout.main')
@php
    $title = 'Daftar-kegiatan';
@endphp
@section('content')
    <h1 class="mt-4">Daftar Kegiatan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List data seluruh kegiatan</li>
    </ol>


    @auth
        @if (Auth::user()->jabatan == 'ketua')
            <a href="/tambah-kegiatan" class="btn btn-primary">
                Tambah
                <i class="fas fa-plus"></i></a>
        @endif
    @endauth
    <div class="card mb-4 mt-2">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Seluruh kegiatan
        </div>
        <div class="card-body">

            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>No</th>

                        @auth
                            @if (Auth::user()->jabatan == 'ketua')
                                <th>Opsi</th>
                            @endif
                        @endauth

                        <th>Nama Ketua</th>
                        <th>Nomor Hp Ketua</th>
                        <th>Total Orang</th>
                        <th>Jenis Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Jam Kegiatan</th>
                        <th>Lokasi</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatan as $r)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            @auth
                                @if (Auth::user()->jabatan == 'ketua')
                                    <td>
                                        <a href="/edit-kegiatan/{{ $r->id }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="/hapus-kegiatan/{{ $r->id }}" method="post" class="d-inline"
                                            onsubmit="return confirm('Apakah Anda Yakin Mengahus Data Ini ?')">
                                            @method('delete')
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $r->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm"> <i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                @endif
                            @endauth


                            <td>{{ $r->nama_ketua }}</td>
                            <td>{{ $r->nohp_ketua }}</td>
                            <td>{{ $r->total_orang }}</td>
                            <td>{{ $r->jenis_kegiatan }}</td>
                            <td>{{ Carbon\Carbon::parse($r->tanggal)->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $r->jam }}</td>
                            <td>{{ $r->lokasi }}</td>
                            <td>
                                <span
                                    class="badge rounded-pill {{ $r->status === 'Akan Datang' ? 'bg-success' : 'bg-danger' }} ">{{ $r->status }}
                                </span>
                            </td>
                        </tr>
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
