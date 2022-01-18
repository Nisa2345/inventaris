<?php

namespace App\Http\Controllers;

use App\Models\barang_masuk;
use App\Models\barang;
use Illuminate\Http\Request;

class barang_masukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = barang_masuk::all();
        return view('barangmasuk.index',compact('barang_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        return view('barang_masuk.create',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barangmasuk = new barang_masuk;
        $barangmasuk->id_barang = $request->id_barang;
        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->nama_barang = $request->nama_barang;
        $barangmasuk->tanggal = $request->tanggal;
        $barangmasuk->save();

        $barang = barang::findOrFail($request->id_barang);
        $barang->stok += $request->jumlahmasuk;
        $barang->save();

        return redirect()->route('barang_masuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang_masuk $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $barangmasuk = barang_masuk::findOrFail($id);
         return view('barang_masuk.show', compact('barang_masuk'));

        $barangmasuk = barang_masuk::findOrFail($id);
        $barang = barang::all();
        return view('barang_masuk.show', compact('barang_masuk', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang_masuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangmasuk = barang_masuk::findOrFail($id);
        $barang = barang::all();
        return view('barang_masuk.edit', compact('barang_masuk', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barangmasuk = barang_masuk::findOrFail($id);
        $barangmasuk->nama_barang = $request->nama_barang;

        $barangmasuk->jumlahmasuk = $request->jumlahmasuk;

        $barangmasuk->save();
        return redirect()->route('barang_masuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangmasuk = barang_masuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('barang_masuk.index');

    }
}
