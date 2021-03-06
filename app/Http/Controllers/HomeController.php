<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Rekammedis;
use App\Resep;
use App\Obat;
use App\Detailresep;
use App\Pengeluaranobat;
use App\User;
use Auth;
use Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $obat = Obat::count();
        $dokter = User::where('level','Dokter')->count();
        $pasien = Pasien::count();
        return view('home',
            compact(
                'obat',
                'dokter',
                'pasien',
            )
        );
    }

    public function password_change(Request $request) {
        $this->validate($request, [
            'password_change' => 'required',
        ]);
        $penduduk = User::findorfail(Auth::id());

        $penduduk_data = [
            'password' => Hash::make($request->password_change),
        ];
        $penduduk->update($penduduk_data);
        return redirect()->route('home');
    }

    public function perbarui_password() {
        return view('perbarui_password');
    }

    public function update(Request $request) {

        // $this->validate($request, [
        //     'current-password'     => 'required',
        //     'new_password'     => 'required',
        //     'new_password_confirm' => 'required|same:new_password',
        // ]);

        
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password Lama Salah.");
        }
            
        if(strcmp($request->get('current-password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Masukan Password Baru.");
        }
        if(!(strcmp($request->get('new_password'), $request->get('new_password_confirm'))) == 0){
            //New password and confirm password are not same
            return redirect()->back()->with("error","Ulangi Password Baru.");
        }

        $penduduk = User::findorfail(Auth::id());
        $penduduk->password = Hash::make($request->get('new_password'));
        $penduduk->save();
            
        return redirect()->back()->with("success","Password changed successfully !");
    }

}
