<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Barang::all();
        return $table;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Barang::create([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "harga" => $request->harga,
            "kuantitas" => $request->kuantitas,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            return response()->json([
                'status' => 200, 
                'message' => "Data Ditemukan",
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message'=> 'id ' . $id . ' Tidak Ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $barang = Barang::find($id);
        if ($barang) {
            $barang->nama = $request->nama ? $request->nama : $produk->nama;
            $barang->deskripsi = $request->deskripsi ? $request->deskripsi : $produk->deskripsi;
            $barang->harga = $request->harga ? $request->harga : $produk->harga;
            $barang->kuantitas = $request->kuantitas ? $request->kuantitas : $produk->kuantitas;
            $barang->save();
            return response()->json([
                'status' => 200,
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::where('id', $id)->first();
        if($barang){
            $barang->delete();
            return response()->json([
                'status' => 200, 
                'message'=> 'id ' . $id . ' berhasil di hapus',
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
}
