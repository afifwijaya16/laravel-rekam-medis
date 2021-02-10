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
class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function laporan_pengunjung()
    {
        return view('laporan.laporan_pengunjung');
    }

    public function filter_laporan_pengunjung(Request $request) {
        $fromDate = $request->tanggal_sekarang;
        $toDate   = $request->tanggal_mendatang;

        $rekam_medis = Rekammedis::whereRaw("(created_at >= ? AND created_at <= ?)", 
            [$fromDate." 00:00:00", $toDate." 23:59:59"]
        )->get();
        $rekam_medis_count = Rekammedis::whereRaw("(created_at >= ? AND created_at <= ?)", 
            [$fromDate." 00:00:00", $toDate." 23:59:59"]
        )->get()->count();;

        return view('laporan.laporan_pengunjung', compact('rekam_medis','rekam_medis_count'));
    }

    public function cek_data($id) {
        $rekam_medis = Rekammedis::findorfail($id);
        $total_harga = collect($rekam_medis->resep->detailpengeluaran)->sum('total'); 
        return view('laporan.modal_laporan_pengunjung', compact('rekam_medis','total_harga'))->renderSections()['modal'];
    }

    public function laporan_pengeluaran_obat() {
        return view('laporan.laporan_pengeluaran_obat');
    }

    public function filter_laporan_pengeluaran_obat(Request $request) {
        $fromDate = $request->tanggal_sekarang;
        $toDate   = $request->tanggal_mendatang;
        $pengeluaran_obat = Pengeluaranobat::whereRaw("(updated_at >= ? AND updated_at <= ?)", 
            [$fromDate." 00:00:00", $toDate." 23:59:59"]
        )->get();
        $pengeluaran_obat_total = Pengeluaranobat::whereRaw("(updated_at >= ? AND updated_at <= ?)", 
            [$fromDate." 00:00:00", $toDate." 23:59:59"]
        )->sum('total');
        return view('laporan.laporan_pengeluaran_obat', compact('pengeluaran_obat','pengeluaran_obat_total'));
    }
}
