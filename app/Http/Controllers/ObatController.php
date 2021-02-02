<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use File;

class ObatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $obat = Obat::orderBy('created_at', 'desc')->get();
        return view('obat.index', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.tambah');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg,JPG,PNG|max:2048',
            'harga'  => 'required',
            'stock'  => 'required',
            'satuan'  => 'required',
            'kemasan'  => 'required',
            'komposisi'  => 'required',
            'dosis'  => 'required',
            'keterangan'  => 'required',
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().'.'.$gambar->getClientOriginalExtension();

        $obat = Obat::create([
            'nama' => $request->nama,
            'gambar' => 'uploads/obats/'.$new_gambar,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'satuan' => $request->satuan,
            'kemasan' => $request->kemasan,
            'komposisi' => $request->komposisi,
            'dosis' => $request->dosis,
            'keterangan' => $request->keterangan,
        ]);
        
        $gambar->move('uploads/obats/', $new_gambar);

        return redirect()->route('obat.index')->with('status', 'Berhasil Menambah Data');
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
        $obat = Obat::findorfail($id);
        return view('obat.edit', compact('obat'));
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
        $this->validate($request, [
            'nama' => 'required',
            'gambar'  => 'image|mimes:jpeg,png,jpg,JPG,PNG|max:2048',
            'harga'  => 'required',
            'stock'  => 'required',
            'satuan'  => 'required',
            'kemasan'  => 'required',
            'komposisi'  => 'required',
            'dosis'  => 'required',
            'keterangan'  => 'required',
        ]);

        $obat = Obat::findorfail($id);

        if($request->has('gambar')) {
            File::delete($obat->gambar);
            $gambar = $request->gambar;
            $new_gambar = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move('uploads/obats/', $new_gambar);
            $obat_data = [
                'nama' => $request->nama,
                'gambar' => 'uploads/obats/'.$new_gambar,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'satuan' => $request->satuan,
                'kemasan' => $request->kemasan,
                'komposisi' => $request->komposisi,
                'dosis' => $request->dosis,
                'keterangan' => $request->keterangan,
            ];
        } else {
            $obat_data = [
                'nama' => $request->nama,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'satuan' => $request->satuan,
                'kemasan' => $request->kemasan,
                'komposisi' => $request->komposisi,
                'dosis' => $request->dosis,
                'keterangan' => $request->keterangan,
            ];
        }

        $obat->update($obat_data);

        return redirect()->route('obat.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::findorfail($id);
        File::delete($obat->gambar);
        $obat->delete();

        return redirect()->route('obat.index')->with('status', 'Berhasil Menghapus Data');
    }
}
