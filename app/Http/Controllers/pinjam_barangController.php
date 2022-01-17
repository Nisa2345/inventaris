<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pinjam_barang;
class pinjam_barangController extends Controller
{
    public function index()
    {
        $pinjambarang = pinjam_barang::all();
        return view('pinjam_barang.index', compact('pinjam_barang'));

        //Buat respon json
        //return response()->json([
            //'succes' => true,
           // 'message' => 'List Data pinjam_barang',
          //'data' => $barang
       // ], 200);
    }

    public function create()
    {
        $pinjambarang = pinjam_barang::all();
        return view('pinjam_barang.index'. compact('pinjam_barang'));
    }


    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'waktu' => 'required',
            'kode_barang' => 'required',
        ]);

        $pinjambarang = new pinjam_barang;
        $pinjambarang->nama_barang = $request->nama_barang;
        $pinjambarang->jumlah_barang = $request->jumlah_barang;
        $pinjambarang->waktu = $request->waktu;
        $pinjambarang->save();
        return redirect()->route('.index');
    }

    public function show($id)
    {
        $pinjambarang = pinjam_barang::findOrFail($id);
        return view('pinjam_barang.show'. compact('pinjam_barang'));
    }


    public function edit($id)
    {
        $pinjam_barang = pinjam_barang::findOrFail($id);
        return view('pinjam_barang.edit'. compact('pinjam_barang'));
    }


    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'waktu' => 'required',
            'kode_barang' => 'required',
        ]);

        $pinjambarang = new pinjam_barang;
        $pinjambarang->nama_barang = $request->nama_barang;
        $pinjambarang->jumlah_barang = $request->jumlah_barang;
        $pinjambarang->waktu = $request->waktu;
        $pinjambarang->kode_barang = $request->kode_barang;
        $pinjambarang->save();
        return redirect()->route('pinjam_barang.index');

    }

    public function destroy($id)
     {

        $pinjambarang = pinjam_barang::findOrFail($id);
        $pinjambarang->delete();
        return redirect()->route('pinjam_barang.index');

     }
}
