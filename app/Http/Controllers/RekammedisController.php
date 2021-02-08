<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Rekammedis;
use App\Resep;
use App\Obat;
use App\Detailresep;
use Auth;
use Session;

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
        $obat = Obat::orderBy('created_at', 'desc')->get();
        $rekam_medis = Rekammedis::findorfail($id);
        $resep = Resep::orderBy('created_at', 'desc')->get();

        $rekam_medis_data = [
            'id_dokter' => Auth::user()->id,
            'status_rekam_medis' => 'Pemeriksaan',
        ];
        $rekam_medis->update($rekam_medis_data);

        return view('rekam_medis.diagnosa_edit', compact('rekam_medis','resep','obat'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_resep' => 'required',
            'tindakan' => 'required',
            'catatan' => 'required',
        ]);

        $rekam_medis = Rekammedis::findorfail($id);

        $rekam_medis_data = [
            'id_resep' => $request->id_resep,
            'tindakan' => $request->tindakan,
            'catatan' => $request->catatan,
            'status_rekam_medis' => 'Selesai Pemeriksaan',
        ];

        $rekam_medis->update($rekam_medis_data);

        return redirect()->route('diagnosa')->with('status', 'Pasien Telah Diperiksa');
    }

    public function destroy($id)
    {
        $rekam_medis = Rekammedis::findorfail($id);
        $rekam_medis->delete();
        return redirect()->route('rekam_medis.index')->with('status', 'Berhasil Menghapus Data');
    }

    public function cek_pasien($id) 
    {
        $pasien_cek = Pasien::findorfail($id);
        return view('rekam_medis.modal_pasien', compact('pasien_cek'))->renderSections()['modal'];
    }

    public function diagnosa() 
    {
        $rekam_medis = Rekammedis::where('status_rekam_medis', 'Antri')->orderBy('created_at', 'asc')->get();
        $rekam_medis_pemeriksaan = Rekammedis::where('status_rekam_medis', 'Pemeriksaan')->orderBy('updated_at', 'desc')->get();
        $rekam_medis_selesai = Rekammedis::where('status_rekam_medis', 'Selesai Pemeriksaan')->orderBy('updated_at', 'desc')->get();
        return view('rekam_medis.diagnosa', compact('rekam_medis','rekam_medis_pemeriksaan', 'rekam_medis_selesai'));
    }

    public function tambah_resep_obat(Request $request) {

        $this->validate($request, [
            'obat' => 'required',
            'resep' => 'required',
        ]);

        $resep = Resep::create([
            'no_resep' => time(),
            'resep' => $request->resep,
            'id_user' => Auth::user()->id,
        ]);
        
        $obat = $request->obat;
        $data = [];
        foreach($obat as $obat_id) {
            $data[] = [
                'id_obat' => $obat_id,
                'id_resep' => $resep->id,
                'keterangan' => ' ',
            ];
        }
        Detailresep::insert($data);

        return back()->withInput()->with('status', 'Berhasil Menambah Data');;
    }

}
