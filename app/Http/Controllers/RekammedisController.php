<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Rekammedis;
use App\Resep;

class RekammedisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pasien = Pasien::orderBy('created_at', 'desc')->get();
        $rekam_medis = Rekammedis::where('status_rekam_medis', 'Antri')->orderBy('created_at', 'asc')->get();

        return view('rekam_medis.index', compact('pasien','rekam_medis'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_pasien' => 'required',
            'keluhan' => 'required',
        ]);
        $rekam_medis = Rekammedis::create([
            'no_rekam' => time(),
            'id_pasien' => $request->id_pasien,
            'keluhan' => $request->keluhan,
            'status_rekam_medis' => 'Antri',
        ]);
        return redirect()->route('rekam_medis.index')->with('status', 'Berhasil Menambah Data');
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        $rekam_medis = Rekammedis::findorfail($id);
        $resep = Resep::orderBy('created_at', 'desc')->get();
        return view('rekam_medis.diagnosa_edit', compact('rekam_medis','resep'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $rekam_medis = Rekammedis::findorfail($id);
        $rekam_medis->delete();
        return redirect()->route('rekam_medis.index')->with('status', 'Berhasil Menghapus Data');
    }

    public function diagnosa() 
    {
        $rekam_medis = Rekammedis::where('status_rekam_medis', 'Antri')->orderBy('created_at', 'asc')->get();
        return view('rekam_medis.diagnosa', compact('rekam_medis'));
    }
}
