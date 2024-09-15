<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kemeja;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class KemejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Product::getKemeja()->paginate(2);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'inStock' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'brand_id' => 'required',
            'price' => 'required'

        ],);
        try{
            $response = Product::create($validasi);
            return response()->json([
                'success'=> true,
                'message'=>'success'
                
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
            ]);
            
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'inStock' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'brand_id' => 'required',
            'price' => 'required'

        ],);
        try{
            $response = Product::find($id);
            $response->update($validasi);
            return response()->json([
                'success'=> true,
                'message'=>'success'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
            ]);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $kemeja=Product::find($id);
            $kemeja->delete();
            return response()->json([
                'success'=> true,
                'message'=>'success'
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'message'=> 'Err',
                'errors'=>$e->getMessage()
            ]);
        }
    }
}
