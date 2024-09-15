<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tittle = 'Admin Batik';
        $seller = Brand::all();
        //dd($produk);
        //dd($seller);
        return view('backpage.seller', compact('tittle', 'seller'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tittle = 'input Page';
        $seller = Brand::all();
        return view('backpage.inputseller', compact('tittle', 'seller'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'name'=>'required',
            'slug'=>'required',

        ],);
        try{
            $response = Brand::create($validasi);
            return redirect('seller');

        } catch (\Exception $e){
            echo $e->getMessage();
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $seller=Brand::find($id);
            $seller->delete();
            return redirect('seller');
        }   catch (\Throwable $e) {
                echo $e->getMessage();
            }
    }
}
