<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $pasien = Pasien::orderBy('created_at', 'desc')->get();
        return view('pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telepon' => 'required',
            'alergi_obat' => 'required',
        ]);

        $pasien = Pasien::create([
            'nomor_pasien' => time(),
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'telepon' => $request->telepon,
            'alergi_obat' => $request->alergi_obat,
        ]);
        
        return redirect()->route('pasien.index')->with('status', 'Berhasil Menambah Data');
    }

    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $pasien = Pasien::findorfail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telepon' => 'required',
            'alergi_obat' => 'required',
        ]);

        $pasien = Pasien::findorfail($id);

        $pasien_data = [
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'telepon' => $request->telepon,
            'alergi_obat' => $request->alergi_obat,
        ];

        $pasien->update($pasien_data);

        return redirect()->route('pasien.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::findorfail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('status', 'Berhasil Menghapus Data');
    }
}
