<?php

namespace App\Http\Controllers;

use App\Models\anggotaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = anggotaModel::orderBy('id', 'DESC')->get();
        return view('content.anggota.anggota', ['anggota' => $anggota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.anggota.tambahAnggota');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->jenis());
        // dd();
        $pesan = [
            'required' => 'attribute wajib diisi',
            'mimes' => 'File harus berupa file jgp, png, jpeg',
        ];

        $this->validate($request, [

            'nip' => 'required',
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'password' => 'required',
            'nohp' => 'required',
            'foto' => 'mimes:jpg,png,jpeg',
        ], $pesan);



        $dokumen = $request->file('foto');
        $nama_file = $dokumen->getClientOriginalName();
        $dokumen->move('img/', $nama_file);


        anggotaModel::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jeniskelamin,
            'jabatan' => $request->jabatan,
            'username' => $request->username,
            'password' => $request->password,
            'nohp' => $request->nohp,
            'foto' => $nama_file,
        ]);
        return redirect('/anggota')->with(['success' => 'Data Berhasil Ditambahkan']);
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
        $anggota = anggotaModel::select('*')->where('id', $id)->get();
        return view('content.anggota.editAnggota', ['anggota' => $anggota]);
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
        $pesan = [
            'required' => 'attribute wajib diisi',
            'mimes' => 'File harus berupa file jgp, png, jpeg',
        ];

        $this->validate($request, [

            'nip' => 'required',
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'password' => 'required',
            'nohp' => 'required',
            'foto' => 'mimes:jpg,png,jpeg',
        ], $pesan);



        if ($request->file('foto') == "") {
            $nama_file = $request->foto_lama;
        } else {
            $dokumen = $request->file('foto');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('img/', $nama_file);
        }


        anggotaModel::where('id', $request->id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jeniskelamin,
            'jabatan' => $request->jabatan,
            'username' => $request->username,
            'password' => $request->password,
            'nohp' => $request->nohp,
            'foto' => $nama_file,
        ]);
        return redirect('/anggota')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = anggotaModel::findOrFail($id);
        $file_path = public_path('img/' . $file->file_pdf);
        File::delete($file_path);
        $file->delete();

        return redirect('/anggota')->with(['success' => 'Data Berhasil Di Hapus']);
    }


    public function editProfile($id)
    {
        $anggota = anggotaModel::select('*')->where('id', $id)->get();
        return view('content.anggota.editProfile', ['anggota' => $anggota]);
    }

    public function updateProfile(Request $request)
    {
        // print_r($request->all());
        // dd();
        $pesan = [
            'required' => 'attribute wajib diisi',
            'mimes' => 'File harus berupa file jgp, png, jpeg',
        ];


        $this->validate($request, [

            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            // 'password' => 'required',
            'nohp' => 'required',
            'foto' => 'mimes:jpg,png,jpeg',
        ], $pesan);



        if ($request->file('foto') == "") {
            $nama_file = $request->foto_lama;
            if ($request->password == "") {

                $request->password = $request->password_lama;
            }
        } else {
            $dokumen = $request->file('foto');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('img/', $nama_file);
        }


        anggotaModel::where('id', $request->id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
            'username' => $request->username,
            'password' => $request->password,
            'nohp' => $request->nohp,
            'foto' => $nama_file,
        ]);
        return redirect('/anggota')->with(['success' => 'Data Berhasil Diubah']);
    }
}
