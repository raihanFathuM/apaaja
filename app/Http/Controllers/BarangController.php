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
        $barang = barang::all();
        return $barang;
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
        $barang = new barang();
        $barang->name = $request->input('name');
        $barang->price = $request->input('price');
        $barang->code = $request->input('code');
        $barang->description = $request->input('description');
        $barang->date_of_entry = $request->input('date_of_entry');
        $barang->date_of_out = $request->input('date_of_out');
        $barang->save();

        return response()->json([
            'status' => 201, 
            'data' => $barang
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
        $barang = barang::find($id);
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
        $barang = barang::find($id);

        if($barang){
            $barang->name = $request->name ? $request->name : $barang->name;
            $barang->price = $request->price ? $request->price : $barang->price;
            $barang->code = $request->code ? $request->code : $barang->code;
            $barang->description = $request->description ? $request->description : $barang->description;
            $barang->date_of_entry = $request->date_of_entry ? $request->date_of_entry : $barang->date_of_entry;
            $barang->date_of_out = $request->date_of_out ? $request->date_of_out : $barang->date_of_out;
            $barang->save();
            return response()->json([
                'status' => 200,
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status'=>404,
                'message'=> $id . ' tidak ditemukan'
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
        $barang = barang::where('id', $id)->first();
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
