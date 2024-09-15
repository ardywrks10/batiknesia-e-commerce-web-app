<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use App\Models\Review;
use Illuminate\Support\Facades\Redirect;


class ReviewController extends Controller
{
    public function detail($id) {
        $product = Product::with('product_images')->find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }    
        return Inertia::render('User/DetailProduk', [
            'product' => $product,
        ]);
    }

    public function store(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route('login')->with('warning', 'Silakan login terlebih dahulu.');
        }
    
        $user = $request->user();
        $validated = $request->validate([
            'rating' => 'required|numeric|between:1,5',
            'comment' => 'required|string',
            'product_id' => 'required',
        ]);
    
        $validated['user_id'] = $user->id;
    
        $review = Review::create($validated);
    
        return Redirect::back()->with('success', 'Review berhasil disimpan!');
    }

    public function nextTo($productId) {
        return Inertia::render('User/ReviewList', [
            'reviews' => Review::where('product_id', $productId)
                ->with('user')
                ->paginate(5)
                ->map(function($review) {
                    return [
                        'id' => $review->id,
                        'rating' => $review->rating,
                        'comment' => $review->comment,
                        'created_at'=> $review->created_at,
                        'name' => $review->user->name,
                    ];
                })
        ]);
    }
    
    
}
