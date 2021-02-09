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

class ApotikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rekam_medis = Rekammedis::where('status_rekam_medis', 'Selesai Pemeriksaan')->orderBy('updated_at', 'asc')->get();
        $rekam_medis_telah_bayar = Rekammedis::where('status_rekam_medis', 'Telah Bayar')->orderBy('updated_at', 'asc')->get();
        return view('apotik.index', compact('rekam_medis','rekam_medis_telah_bayar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $rekam_medis = Rekammedis::findorfail($id);
        $total_harga = collect($rekam_medis->resep->detailpengeluaran)->sum('total'); 
        return view('apotik.edit', compact('rekam_medis','total_harga'));
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
        if ($request->submitbutton == 'tambah') {
            $po = Pengeluaranobat::findorfail($id);
            $data_stock = Obat::findorfail($request->id_obat);
            if($data_stock->stock == 0) {
                return back()->withInput()->with('status', 'Stock Habis');
            } else {
                $update_po = ['qty' => $po->qty + 1];
                $po->update($update_po);
    
                $update_stock = ['stock' => $data_stock->stock - 1];
                $data_stock->update($update_stock);

                $update_total_po = ['total' => $data_stock->harga * $po->qty];
                $po->update($update_total_po);

                return back()->withInput()->with('status', 'Berhasil Menambah Data');
            }
        
        } else if ($request->submitbutton == 'kurang'){

            $po = Pengeluaranobat::findorfail($id);
            if($po->qty >= 1 ) {
                $update_po = ['qty' => $po->qty - 1];
                $po->update($update_po);

                $data_stock = Obat::findorfail($request->id_obat);
                $update_stock = ['stock' => $data_stock->stock + 1];

                $update_total_po = ['total' => $data_stock->harga * $po->qty];
                $po->update($update_total_po);

                $data_stock->update($update_stock);
            }
            return back()->withInput()->with('status', 'Berhasil Mengurangi Data');
        } else if($request->submitbutton == 'keterangan') {
            $po = Pengeluaranobat::findorfail($id);
            $update_po = ['keterangan' => $request->keterangan];
            $po->update($update_po);
            return back()->withInput()->with('status', 'Berhasil Menambah Keterangan Data');
        } else if($request->submitbutton == 'submit_pembayaran') {
            $rekam = Rekammedis::findorfail($id);

            $rekam_data = [
                'status_rekam_medis' => 'Telah Bayar'
            ];
    
            $rekam->update($rekam_data);
    
            return redirect()->route('apotik.index')->with('status', 'Data Berhasil disimpan');
        }
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

    public function jumlahqty(Request $request, $id) {
        
    }
}
