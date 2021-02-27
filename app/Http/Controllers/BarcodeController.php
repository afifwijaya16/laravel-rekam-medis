<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Rekammedis;

class BarcodeController extends Controller
{
    public function data_pasien($id)
    {
        $pasien = Pasien::where('nomor_pasien', $id)->first();
        $rekam_medis = Rekammedis::where('id_pasien', $pasien->id)->where('status_rekam_medis', 'Telah Di Cek Apoteker')->orderBy('updated_at', 'desc')->get();
        return view('barcode.pasien', compact('pasien','rekam_medis'));
    }
}
