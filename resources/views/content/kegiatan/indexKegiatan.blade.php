@extends('layout.main')

@php
    
    $total_kegiatan = App\Models\kegiatanModel::count();
    $kegiatan = DB::table('kegiatan')->get();
@endphp
@php
    $title = 'list-kegiatan';
@endphp

@section('content')
    <h1 class="mt-4">Daftar Kegiatan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List data seluruh kegiatan</li>
    </ol>

    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-header text-center">
                    Total Kegiatan
                </div>
                <div class="card-body text-center">
                    <h3>{{ $total_kegiatan }}</h3>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col">

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
