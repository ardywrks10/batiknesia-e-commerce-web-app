<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class GambarProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ProductImage::all();
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
        //
        $validasi = $request->validate([

            'image'=> 'required|image|mimes:png,jpg|max:1024',
            'product_id'=>'required',

        ],);
        try{
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('product_images', $fileName, 'public');
            $validasi['image'] = $path;
            $response = ProductImage::create($validasi);
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
        //
        $validasi = $request->validate([
            'image'=> 'required|image|mimes:png,jpg|max:1024',
            'product_id'=>'required',

        ],);
        try{
            if($request->file('image')){
                $fileName = time().$request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('product_images', $fileName, 'public');
                $validasi['image'] = $path;
            }
            $response = ProductImage::find($id)->update($validasi);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $produk=ProductImage::find($id);
            $produk->delete();
            return response()->json([
                'success'=> true,
                'message'=>'success'
            ]);
        }   catch (\Exception $e) {
            return response()->json([
                'message'=> 'Err',
                'errors'=>$e->getMessage()
            ]);
            }
    }
}
