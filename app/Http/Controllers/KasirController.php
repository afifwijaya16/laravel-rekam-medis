<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class KasirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kasir = User::where('level','Kasir')->orderBy('created_at', 'desc')->get();
        return view('kasir.index', compact('kasir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            
        ]);

        $kasir = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => bcrypt($request->password),
            'level' => 'Kasir'
        ]);
        
        return redirect()->route('kasir.index')->with('status', 'Berhasil Menambah Data');
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
        $kasir = User::findorfail($id);
        return view('kasir.edit', compact('kasir'));
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $kasir = User::findorfail($id);

        if($request->input('password')) {
            $kasir_data = [
                'name' => $request->name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'password' => bcrypt($request->password),
            ];
        } else {
            $kasir_data = [
                'name' => $request->name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
            ];
        }

        $kasir->update($kasir_data);

        return redirect()->route('kasir.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasir = User::findorfail($id);
        $kasir->delete();

        return redirect()->route('kasir.index')->with('status', 'Berhasil Menghapus Data');
    }
}
