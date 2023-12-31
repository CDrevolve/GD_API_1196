<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try{
            $barang = Barang::all();
            return response()->json([
                "status" => true,
                "message" => 'berhasil ambil data',
                "data" => $barang
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                "status"=>false,
                "message"=> $e->getMessage(),
                "data"=>[]
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $barang = Barang::create($request->all());
            return response()->json([
                "status" => true,
                "message" => 'Berhasil insert data',
                "data" => $barang
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                "status"=>false,
                "message"=> $e->getMessage(),
                "data"=>[]
            ], 400);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        try{
            $barang =Barang::find($id);

            if(!$barang) throw new \Exception("Barang tidak ditemukan");

            return response()->json([
                "status" => true,
                "message" => 'berhasil ambil data',
                "data" => $barang
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                "status"=>false,
                "message"=> $e->getMessage(),
                "data"=>[]
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try{
            $barang = Barang::find($id);

            if(!$barang) throw new \Exception("Barnag tidak ditemukan");

            $barang->update($request->all());
            return response()->json([
                "status" => true,
                "message" => 'berhasil update data',
                "data" => $barang
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                "status"=>false,
                "message"=> $e->getMessage(),
                "data"=>[]
            ], 400);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try{
            $barang = Barang::find($id);

            if(!$barang) throw new \Exception("Barang tidak ditemukan");

            $barang->delete();

            return response()->json([
                "status" => true,
                "message" => 'Berhasil delete data',
                "data" => $barang
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                "status"=>false,
                "message"=> $e->getMessage(),
                "data"=>[]
            ], 400);
        }
    }
}
