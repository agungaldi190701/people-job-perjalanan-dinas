<?php

namespace App\Http\Controllers;

use App\Models\kegiatanModel;
use Illuminate\Http\Request;

class kegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = kegiatanModel::orderBy('id', 'DESC')->get();
        return view('content.kegiatan.kegiatan', ['kegiatan' => $kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.kegiatan.tambahKegiatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan = [
            'required' => 'attribute wajib diisi',

        ];

        $this->validate($request, [

            'ketua' => 'required',
            'nohp_ketua' => 'required',
            'total_orang' => 'required',
            // 'jenis_kegiatan' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'status' => 'required',

        ], $pesan);




        if ($request->jenis_kegiatan == '') {


            kegiatanModel::create([
                'nama_ketua' => $request->ketua,
                'nohp_ketua' => $request->nohp_ketua,
                'total_orang' => $request->total_orang,
                'jenis_kegiatan' => $request->jenis_kegiatan2,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'status' => $request->status,
            ]);
        } else {
            kegiatanModel::create([
                'nama_ketua' => $request->ketua,
                'nohp_ketua' => $request->nohp_ketua,
                'total_orang' => $request->total_orang,
                'jenis_kegiatan' => $request->jenis_kegiatan,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'status' => $request->status,
            ]);
        }



        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = kegiatanModel::select('*')->where('id', $id)->get();
        return view('content.kegiatan.editKegiatan', ['kegiatan' => $kegiatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // print_r($request->all());
        // dd();
        $pesan = [
            'required' => 'attribute wajib diisi',

        ];

        $this->validate($request, [

            'ketua' => 'required',
            'nohp_ketua' => 'required',
            'total_orang' => 'required',
            // 'jenis_kegiatan' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'status' => 'required',

        ], $pesan);




        if ($request->jenis_kegiatan == '') {


            kegiatanModel::where('id', $request->id)->update([
                'nama_ketua' => $request->ketua,
                'nohp_ketua' => $request->nohp_ketua,
                'total_orang' => $request->total_orang,
                'jenis_kegiatan' => $request->jenis_kegiatan2,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'status' => $request->status,
            ]);
        } else {
            kegiatanModel::where('id', $request->id)->update([
                'nama_ketua' => $request->ketua,
                'nohp_ketua' => $request->nohp_ketua,
                'total_orang' => $request->total_orang,
                'jenis_kegiatan' => $request->jenis_kegiatan,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'status' => $request->status,
            ]);
        }



        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kegiatanModel::where('id', $id)->delete();
        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
