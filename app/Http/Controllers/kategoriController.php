<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::all();
        return view('kategori.index', compact('kategori'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $kategori = kategori::all();
        return view('kategori.create'. compact('kategori'));
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
            'id_kategori' => 'required',
            'nama' => 'required',
        ]);

        $kategori = new kategori;
        $kategori->id_kategori = $request->id_kategori;
        $kategori->nama = $request->nama;
        $barang->save();

        $kategori = kategori::findOrFail($request->id_kategori);
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.show'. compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.edit'. compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori $kategori
     *

     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, kategori $id)
    {

        $validated = $request->validate(
            ['id' => 'required',
            ]);

            $kategori = kategori::findOrFail($id);
            $kategori->id = $request->id;
            $kategori->save();
            return redirect()->route('kategori.index');

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\kategori $kategori
         * @return \Illuminate\Http\Response
         */
        public function destroy(kategori $kategori)
        {
            $kategori = kategori::findOrFail($id);
            $kategori->delete();
            return redirect()->route('kategori.index');

     }
}

