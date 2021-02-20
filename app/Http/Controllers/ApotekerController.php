<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ApotekerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $apoteker = User::where('level','Apoteker')->orderBy('created_at', 'desc')->get();
        return view('apoteker.index', compact('apoteker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apoteker.tambah');
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

        $apoteker = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => bcrypt($request->password),
            'level' => 'Apoteker'
        ]);
        
        return redirect()->route('apoteker.index')->with('status', 'Berhasil Menambah Data');
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
        $apoteker = User::findorfail($id);
        return view('apoteker.edit', compact('apoteker'));
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

        $apoteker = User::findorfail($id);

        if($request->input('password')) {
            $apoteker_data = [
                'name' => $request->name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'password' => bcrypt($request->password),
            ];
        } else {
            $apoteker_data = [
                'name' => $request->name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
            ];
        }

        $apoteker->update($apoteker_data);

        return redirect()->route('apoteker.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apoteker = User::findorfail($id);
        $apoteker->delete();

        return redirect()->route('apoteker.index')->with('status', 'Berhasil Menghapus Data');
    }
}
