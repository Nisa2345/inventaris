<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock_barang;
class stock_barangController extends Controller
{
    public function index()
    {
        $barangmasuk = Barangs::all();
        return view('', compact('barang_masuk'));
    }

    public function create()
    {
        $barangmasuk = Barangs::all();
        return view(''. compact('barang_masuk'));
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
        return redirect()->route('.index');
    }

    public function show($id)
    {
        $barangmasuk = Barang_masuk::findOrFail($id);
        return view('barang_masuk.show'. compact('barang_masuk'));
    }


    public function edit($id)
    {
        $barangmasuk = Barang_masuk::findOrFail($id);
        return view('barang_masuk.edit'. compact('barang_masuk'));
    }


    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
        ]);

        $barangmasuk = new Barang_masuk;
        $barangmasuk->kode_barang = $request->kode_barang;
        $barangmasuk->nama_barang = $request->nama_barang;
        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->save();
        return redirect()->route('barang_masuk.index');

    }

    public function destroy($id)
     {

        $barangmasuk = Barang_masuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('Barang_masuk.index');

     }
}
