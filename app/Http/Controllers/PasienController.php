<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\User;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $pasien = Pasien::orderBy('created_at', 'desc')->get();
        return view('pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telepon' => 'required',
            'alergi_obat' => 'required',
            'email' => 'required',
        ]);

        $pasien_acc = User::create([
            'name' => $request->nama_pasien,
            'email' => $request->email,
            'no_telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tgl_lahir,
            'password' => bcrypt('123'),
            'level' => 'User',
            
        ]);

        $pasien = Pasien::create([
            'nomor_pasien' => time(),
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'telepon' => $request->telepon,
            'alergi_obat' => $request->alergi_obat,
            'user_id' => $pasien_acc->id
        ]);


        return redirect()->route('pasien.index')->with('status', 'Berhasil Menambah Data');
    }

    public function show($id)
    {
        $pasien = Pasien::findorfail($id);
        return view('pasien.show', compact('pasien'));
    }

    
    public function edit($id)
    {
        $pasien = Pasien::findorfail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telepon' => 'required',
            'alergi_obat' => 'required',
        ]);

        $pasien = Pasien::findorfail($id);
        $pasien_acc = User::where('id', $pasien->user_id);

        $pasien_data = [
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'telepon' => $request->telepon,
            'alergi_obat' => $request->alergi_obat,
        ];

        if($request->input('password')) {
            $pasien_data_acc = [
                'name' => $request->nama_pasien,
                'email' => $request->email,
                'no_telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tgl_lahir,
                'password' => bcrypt($request->password),
            ];
        } else {
            $pasien_data_acc = [
                'name' => $request->nama_pasien,
                'email' => $request->email,
                'no_telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tgl_lahir,
            ];
        }

        $pasien_acc->update($pasien_data_acc);

        $pasien->update($pasien_data);

        return redirect()->route('pasien.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::findorfail($id);
        $pasien_acc = User::where('id', $pasien->user_id);
        $pasien->delete();
        $pasien_acc->delete();

        return redirect()->route('pasien.index')->with('status', 'Berhasil Menghapus Data');
    }
}
