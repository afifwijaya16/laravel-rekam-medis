<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokter;

class DokterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dokter = Dokter::orderBy('created_at', 'desc')->get();
        return view('dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_dokter' => 'required',
            'alamat_dokter' => 'required',
            'tgl_lahir_dokter' => 'required',
            'agama_dokter' => 'required',
            'telp_dokter' => 'required',
        ]);

        $dokter = Dokter::create([
            'nama_dokter' => $request->nama_dokter,
            'alamat_dokter' => $request->alamat_dokter,
            'tgl_lahir_dokter' => $request->tgl_lahir_dokter,
            'agama_dokter' => $request->agama_dokter,
            'telp_dokter' => $request->telp_dokter,
        ]);
        
        return redirect()->route('dokter.index')->with('status', 'Berhasil Menambah Data');
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
        $dokter = Dokter::findorfail($id);
        return view('dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_dokter' => 'required',
            'alamat_dokter' => 'required',
            'tgl_lahir_dokter' => 'required',
            'agama_dokter' => 'required',
            'telp_dokter' => 'required',
        ]);

        $dokter = Dokter::findorfail($id);

        $dokter_data = [
            'nama_dokter' => $request->nama_dokter,
            'alamat_dokter' => $request->alamat_dokter,
            'tgl_lahir_dokter' => $request->tgl_lahir_dokter,
            'agama_dokter' => $request->agama_dokter,
            'telp_dokter' => $request->telp_dokter,
        ];

        $dokter->update($dokter_data);

        return redirect()->route('dokter.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = Dokter::findorfail($id);
        File::delete($dokter->gambar);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('status', 'Berhasil Menghapus Data');
    }
}
