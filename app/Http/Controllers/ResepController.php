<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resep;
use App\Obat;
use App\Detailresep;
use Auth;
class ResepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $obat = Obat::orderBy('created_at', 'desc')->get();
        $resep = Resep::with('detailreseps')->orderBy('created_at', 'desc')->get();
        return view('resep.index', compact('resep','obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obat = Obat::orderBy('created_at', 'desc')->get();
        return view('resep.tambah', compact('obat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'resep' => 'required',
            'obat' => 'required',
        ]);

        $resep = Resep::create([
            'no_resep' => time(),
            'resep' => $request->resep,
            'id_user' => Auth::user()->id,
        ]);
        
        $obat = $request->obat;
        $data = [];
        foreach($obat as $obat_id) {
            $data[] = [
                'id_obat' => $obat_id,
                'id_resep' => $resep->id,
                'keterangan' => ' ',
            ];
        }
        Detailresep::insert($data);

        return redirect()->route('resep.index')->with('status', 'Berhasil Menambah Data');
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
        $resep = Resep::with('detailreseps')->find($id);
        $obat = Obat::orderBy('created_at', 'desc')->get();
        return view('resep.edit', compact('resep','obat'));
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
            'resep' => 'required',
            'obat' => 'required',
        ]);

        $resep = Resep::findorfail($id);

        $resep_data = [
            'resep' => $request->resep,
        ];

        $resep->update($resep_data);

        $Detailresep = Detailresep::where('id_resep', $id);;
        $Detailresep->delete();

        $obat = $request->obat;
        $data = [];
        foreach($obat as $obat_id) {
            $data[] = [
                'id_obat' => $obat_id,
                'id_resep' => $resep->id,
                'keterangan' => ' ',
            ];
        }
        Detailresep::insert($data);

        return redirect()->route('resep.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Detailresep = Detailresep::where('id_resep', $id);;
        $Detailresep->delete();
        
        $resep = Resep::findorfail($id);
        $resep->delete();
        return redirect()->route('resep.index')->with('status', 'Berhasil Menghapus Data');
    }
}
