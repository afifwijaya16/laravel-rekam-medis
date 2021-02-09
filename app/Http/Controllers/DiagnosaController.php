<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Rekammedis;
use App\Resep;
use App\Obat;
use App\Detailresep;
use App\Pengeluaranobat;
use Auth;
use Session;

class DiagnosaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rekam_medis = Rekammedis::where('status_rekam_medis', 'Antri')->orderBy('created_at', 'asc')->get();
        $rekam_medis_pemeriksaan = Rekammedis::where('status_rekam_medis', 'Pemeriksaan')->orderBy('updated_at', 'desc')->get();
        $rekam_medis_selesai = Rekammedis::where('status_rekam_medis', 'Selesai Pemeriksaan')->orderBy('updated_at', 'desc')->get();
        return view('diagnosa.index', compact('rekam_medis','rekam_medis_pemeriksaan', 'rekam_medis_selesai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $obat = Obat::orderBy('created_at', 'desc')->get();
        $rekam_medis = Rekammedis::findorfail($id);
        $resep = Resep::orderBy('created_at', 'desc')->get();

        $rekam_medis_data = [
            'id_dokter' => Auth::user()->id,
            'status_rekam_medis' => 'Pemeriksaan',
        ];
        $rekam_medis->update($rekam_medis_data);


        return view('diagnosa.edit', compact('rekam_medis','resep','obat'));
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

        $pObat = Resep::with('detailreseps')->find($request->id_resep);
        $data = [];
        foreach($pObat->detailreseps as $pobats) {
            $data[] = [
                'id_obat' => $pobats->id_obat,
                'id_resep' => $pobats->id_resep,
                'qty' => 0,
                'total' => 0,
                'keterangan' => ' ',
            ];
        }
        Pengeluaranobat::insert($data);

        return redirect()->route('diagnosa.index')->with('status', 'Pasien Telah Diperiksa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        return back()->withInput()->with('status', 'Berhasil Menambah Data');
    }

}
