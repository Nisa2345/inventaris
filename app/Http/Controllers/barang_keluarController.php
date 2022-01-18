<?php

namespace App\Http\Controllers;

use App\Models\barang_keluar;
use App\Models\barang;
use Illuminate\Http\Request;

class barang_keluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = barang_keluar::all();
        return view('barang_keluar.index', compact('barang_keluar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        return view('barang_keluar.create', compact('barang'));
        // return view('barangkeluar.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate(
        //     ['id_barang' => 'required',
        //         'nama_barang' => 'required',
        //     'jumlah' => 'required',
        //     'tgl' => 'required',
        //     ]);
//   $barang_keluar->nama_barang = $request->nama_barang;

        $barangkeluar = new barang_keluar;
        $barangkeluar->id_barang = $request->id_barang;
        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->tgl = $request->tgl;
        $barangkeluar->save();

        $barang = barang::findOrFail($request->id_barang);
        $produk->stock -= $request->jumlahkeluar;
        $produk->save();
        return redirect()->route('barang_keluar.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang_keluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangkeluar = barang_Keluar::findOrFail($id);
        return view('barang_keluar.show', compact('barang_keluar'));

    }
}
