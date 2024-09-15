<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Produk;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class BatikAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tittle = 'Admin Batik';
        $produk = Product::paginate(2);
        $produk = new Product;
        if (isset($_GET['s'])) {
            $s=$_GET['s'];

            $produk = $produk->where('title', 'like', "%$s%");
        }
        if (isset($_GET['brand_id'])&&$_GET['brand_id']!='') {

            $produk = $produk->where('brand_id', 'like', $_GET['brand_id']);
        }

        $produk = $produk->paginate(3);
        $seller = Brand::all();
        //dd($produk);
        return view('backpage.adminBatik', compact('tittle', 'produk', 'seller'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tittle = 'input Page';
        $seller = Brand::all();
        return view('backpage.inputproduk', compact('tittle', 'seller'));
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
        ]);

        try {
            Product::create($validasi);
            return redirect('gambar/create');
        } catch (\Exception $e) {
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
        $tittle = 'Edit Page';
        $seller = Brand::all();
        $produk = Product::find($id);
        return view('backpage.inputproduk', compact('tittle', 'seller', 'produk'));
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
        ]);

        try {
            Product::find($id)->update($validasi);
            return redirect('batik');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $produk=Product::find($id);
            $produk->delete();
            return redirect('batik');
        }   catch (\Throwable $e) {
                echo $e->getMessage();
            }

    }
}
