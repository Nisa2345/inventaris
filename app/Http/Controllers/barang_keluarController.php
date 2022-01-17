<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang_keluar;
class barang_keluarController extends Controller
{
    public function index()
    {
        $barangkeluar = Barang_keluar::all();
        return view('', compact('barang_keluar'));
    }

    public function create()
    {
        $barangkeluar = Barang_keluar::all();
        return view(''. compact('barang_keluar'));
    }


    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
        ]);

        $barangkeluar = new barang_masu;
        $barangkeluar->id_barang = $request->id_barang;
        $barangkeluar->nama_barang = $request->nama_barang;
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->save();
        return redirect()->route('.index');
    }

    public function show($id)
    {
        $barangkeluar = Barang_keluar::findOrFail($id);
        return view('barang_keluar.show'. compact('barang_keluar'));
    }


    public function edit($id)
    {
        $barangkeluar = Barang_keluar::findOrFail($id);
        return view('barang_keluar.edit'. compact('barang_keluar'));
    }


    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
        ]);

        $barangkeluar = new Barang_keluar;
        $barangkeluar->id_barang = $request->id_barang;
        $barangkeluar->nama_barang = $request->nama_barang;
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->save();
        return redirect()->route('barang_masuk.index');

    }

    public function destroy($id)
     {

        $barankeluar = Barang_keluar::findOrFail($id);
        $barangkeluar->delete();
        return redirect()->route('Barang_keluar.index');

     }
}
