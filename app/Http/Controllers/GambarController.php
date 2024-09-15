<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Http\Request;

class GambarController extends Controller
{
    public function index()
    {
        //
        $tittle = 'Admin Batik';
        $produk = Product::paginate(2);
        $gambar = ProductImage::paginate(10);
        return view('backpage.gambarProduk', compact('tittle', 'produk', 'gambar'));
        
    }

    public function create()
    {
        //
        $tittle = 'input Page';
        $produk = Product::all();
        return view('backpage.inputgambar', compact('tittle', 'produk'));
    }

    public function store(Request $request)
    {

        $validasi = $request->validate([

            'image'=> 'required|image|mimes:png,jpg|max:1024',
            'product_id'=>'required',

        ],);
        try{
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('product_images', $fileName, 'public');
            $validasi['image'] = $path;
            $response = ProductImage::create($validasi);
            return redirect('gambar');

        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function edit(string $id)
    {
        $tittle = 'Edit Page';
        $gambar = ProductImage::find($id);
        $produk = Product::all();
        return view('backpage.inputgambar', compact('tittle', 'gambar', 'produk'));
    }

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
            return redirect('gambar');

        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function destroy(string $id)
    {
        //
        try {
            $produk=ProductImage::find($id);
            $produk->delete();
            return redirect('gambar');
        }   catch (\Throwable $e) {
                echo $e->getMessage();
            }

    }


}
