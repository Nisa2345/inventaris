<?php

namespace App\Http\Controllers;

use App\Models\pinjam_barang;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function index(){

        $pinjambarang = pinjam_barang::all();
       // Buat respon json
        return response()->json([
            'succes' => true,
            'message' => 'List Data pinjam_barang',
          'data' => $pinjam_barang
        ], 200);


    }

    public function create(){
        //
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'waktu' => 'required',
            'id_barang' => 'required',
        ]);

        $pinjam_barang = new pinjam_barang;
        $pinjam_barang->nama_barang = $request->nama_barang;
        $pinjam_barang->jumlah_barang = $request->jumlah_barang;
        $pinjam_barang->waktu = $request->waktu;
        $pinjam_barang->save();

        //Buat respon json
        return response()->json([
            'succes' => true,
            'message' => 'List Data pinjam_barang',
          'data' => $pinjam_barang
        ], 200);
    }

    public function show($id){

        $pinjambarang = pinjam_barang::find($id);
       // Buat respon json
        return response()->json([
            'succes' => true,
            'message' => 'List Data pinjam_barang',
          'data' => $pinjam_barang
        ], 200);


    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id){

        $pinjambarang = new pinjam_barang;
        $pinjambarang->nama_barang = $request->nama_barang;
        $pinjambarang->jumlah_barang = $request->jumlah_barang;
        $pinjambarang->waktu = $request->waktu;
        $pinjambarang->save();

        //Buat respon json
        return response()->json([
            'succes' => true,
            'message' => 'List Data pinjam_barang',
          'data' => $pinjam_barang
        ], 200);

    }
}
