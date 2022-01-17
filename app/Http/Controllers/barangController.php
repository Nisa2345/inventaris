<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
class barangController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::all();
        return view('barang.index', compact('barang'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $barang = barang::all();
        return view('barang.create'. compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'stock' => 'required',
            'id_kategori' => 'required',
        ]);

        $barang = new barang;
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->stock = $request->stock;
        $barang->id_kategori = $request->id_kategori;
        $barang->save();

        $barang = barang::findOrFail($request->id_barang);
        $barang->stock -= $request->barang;
        $barang->save();
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = barang::findOrFail($id);
        return view('barang.show'. compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        $barang = barang::findOrFail($id);
        return view('barang.edit'. compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang $barang
     *

     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, barang $id)
    {

        $validated = $request->validate(
            ['id' => 'required',
            ]);

            $barang = barang::findOrFail($id);
            $barang->id = $request->id;
            $barang->save();
            return redirect()->route('barang.index');

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\barang $barang
         * @return \Illuminate\Http\Response
         */
        public function destroy(barang $barang)
        {
            $barang = barang::findOrFail($id);
            $barang->delete();
            return redirect()->route('barang.index');

     }
}
