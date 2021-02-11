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

class RekammedisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pasien = Pasien::orderBy('created_at', 'desc')->get();
        return view('rekam_medis.index', compact('pasien'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        $pasien = Pasien::findorfail($id);
        $rekam_medis = Rekammedis::where('id_pasien', $id)->where('status_rekam_medis', 'Telah Di Cek Apoteker')->orderBy('updated_at', 'desc')->get();

        return view('rekam_medis.detail', compact('pasien','rekam_medis'));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {

    }

    public function cek_data($id) {

        $rekam_medis = Rekammedis::findorfail($id);
        $total_harga = collect($rekam_medis->resep->detailpengeluaran)->sum('total'); 
        return view('rekam_medis.modal_detail', compact('rekam_medis','total_harga'))->renderSections()['modal'];
    }

}
