<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RequestItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Session::get('user')['id'];

        $requests = RequestItem::with('product')
        ->where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('user.requestItems.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('stok', '>', 0)->get();
        return view('user.requestItems.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'alasan' => 'required|string|max:255',
        ]);
    
        // Periksa stok produk
        $product = Product::find($request->product_id);
        if (!$product || $product->stok <= 0) {
            return back()->withErrors(['product_id' => 'Stok barang tidak mencukupi.']);
        }
    
        // Simpan permintaan barang ke database
        RequestItem::create([
            'user_id' => Session::get('user')['id'],
            'product_id' => $request->product_id,
            'alasan' => $request->alasan,
            'status' => 'pending', // Default status
        ]);
    
        return redirect()->route('user.requestItems.index')->with('success', 'Permintaan barang berhasil diajukan.');
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
    }
}