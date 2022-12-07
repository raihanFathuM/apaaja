<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jasa;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Jasa::all();

        return response()->json([
            "message" => "Jasa Pengiriman anda :",
            "data" => $table
        ], 201);
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
        $table = Jasa::create([
            "username" => $request->username,
            "jasa" => $request->jasa,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Jasa Pengiriman Dikirim',
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
        $jasa = Jasa::find($id);
        if ($jasa) {
            return response()->json([
                'status' => 200,
                'data' => $jasa
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak ditemukan'
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
        $jasa = Jasa::find($id);
        if ($jasa) {
            $jasa->username = $request->username ? $request->username : $jasa->username;
            $jasa->jasa = $request->jasa ? $request->jasa : $jasa->jasa;
            $jasa->save();
            return response()->json([
                'status' => 200,
                'data' => $jasa
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
        $jasa = Jasa::where('id', $id)->first();
        if ($jasa) {
            $jasa->delete();
            return response()->json([
                'status' => 200,
                'message' => 'jasa pengiriman berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}