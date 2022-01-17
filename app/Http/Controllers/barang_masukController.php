<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang_masuk;
class barang_masukController extends Controller
{
    public function index()
    {
        $barangmasuk = barang_masuk::all();
        return view('barang_masuk.index', compact('barang_masuk'));
    }

    public function create()
    {
        $barangmasuk = barang_masuk::all();
        return view('barang_masuk.create'. compact('barang_masuk'));
    }


    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
        ]);

        $barangmasuk = new barang_masuk;
        $barangmasuk->kode_barang = $request->nama_barang;
        $barangmasuk->nama_barang = $request->nama_barang;
        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->save();
        return redirect()->route('barang_masuk.index');
    }

    public function show($id)
    {
        $barangmasuk = barang_masuk::findOrFail($id);
        return view('barang_masuk.show'. compact('barang_masuk'));
    }


    public function edit($id)
    {
        $barangmasuk = barang_masuk::findOrFail($id);
        return view('barang_masuk.edit'. compact('barang_masuk'));
    }


    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
        ]);

        $barangmasuk = new barang_masuk;
        $barangmasuk->id_barang = $request->id_barang;
        $barangmasuk->nama_barang = $request->nama_barang;
        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->save();
        return redirect()->route('barang_masuk.index');

    }

    public function destroy($id)
     {

        $barangmasuk = barang_masuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('barang_masuk.index');

     }
}
