<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DokterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dokter = User::where('level','Dokter')->orderBy('created_at', 'desc')->get();
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'spesialis' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'biaya_tindakan' => 'required',
            
        ]);

        $dokter = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'spesialis' => $request->spesialis,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'biaya_tindakan' => $request->biaya_tindakan,
            'password' => bcrypt($request->password),
            'level' => 'Dokter'
        ]);
        
        return redirect()->route('dokter.index')->with('status', 'Berhasil Menambah Data');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $dokter = User::findorfail($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'spesialis' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'biaya_tindakan' => 'required',
        ]);

        $dokter = User::findorfail($id);

        if($request->input('password')) {
            $dokter_data = [
                'name' => $request->name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'spesialis' => $request->spesialis,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'biaya_tindakan' => $request->biaya_tindakan,
                'password' => bcrypt($request->password),
            ];
        } else {
            $dokter_data = [
                'name' => $request->name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'spesialis' => $request->spesialis,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'biaya_tindakan' => $request->biaya_tindakan,
            ];
        }

        $dokter->update($dokter_data);

        return redirect()->route('dokter.index')->with('status', 'Berhasil Mengubah Data');
    }

    public function destroy($id)
    {
        $dokter = User::findorfail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('status', 'Berhasil Menghapus Data');
    }
}
