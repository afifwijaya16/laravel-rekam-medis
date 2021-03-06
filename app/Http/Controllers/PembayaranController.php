<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekammedis;
use App\Resep;
use Auth;
class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $belum_bayar = Rekammedis::where('status_rekam_medis', 'Telah Di Cek Apoteker')->where('status_pembayaran', '0')->orderBy('updated_at', 'desc')->get();
        $sudah_bayar = Rekammedis::where('status_rekam_medis', 'Telah Di Cek Apoteker')->where('status_pembayaran', '1')->orderBy('updated_at', 'desc')->get();
        return view('pembayaran.index', compact('belum_bayar', 'sudah_bayar'));
    }

    public function cek_data($id) {

        $rekam_medis = Rekammedis::findorfail($id);
        $total_harga = collect($rekam_medis->resep->detailpengeluaran)->sum('total'); 
        return view('pembayaran.modal_detail', compact('rekam_medis','total_harga'))->renderSections()['modal'];
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
        $rekam_medis = Rekammedis::findorfail($id);
        $total_harga = collect($rekam_medis->resep->detailpengeluaran)->sum('total');
        return view('pembayaran.cetak',compact('rekam_medis','total_harga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $rekam = Rekammedis::findorfail($id);
        $rekam_data = [
            'status_pembayaran' => '1',
            'id_kasir' => Auth::user()->id,
        ];
        $rekam->update($rekam_data);
        return redirect()->route('pembayaran.index')->with('status', 'Pasien Berhasil Melakukan Pembayaran');
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
}
