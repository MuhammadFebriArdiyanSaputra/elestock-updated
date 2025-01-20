<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestItem;
use App\Models\Product;

class AdminRequestItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = RequestItem::with('user')->get(); // Ambil semua permintaan beserta data user
        return view('admin.requestItems.index', compact('requests'));
    }

    public function approve($id)
    {
        $requestItem = RequestItem::findOrFail($id);
        
        // Pastikan status request masih pending
        if ($requestItem->status == 'pending') {
            // Ambil produk terkait
            $product = $requestItem->product;
            
            // Periksa apakah stok cukup sebelum approve
            if ($product->stok > 0) {
                // Panggil method approve() dari model RequestItem
                $requestItem->approve();

                return redirect()->route('admin.requestItems.index')->with('success', 'Permintaan barang disetujui dan stok produk diperbarui.');
            } else {
                return redirect()->route('admin.requestItems.index')->with('error', 'Stok produk tidak cukup.');
            }
        }   

        return redirect()->route('admin.requestItems.index')->with('error', 'Permintaan ini sudah diproses.');
    }
    

    /**
     * Tolak permintaan barang.
     */
    public function reject($id)
    {
        $requestItem = RequestItem::findOrFail($id);
        
        // Ubah status request menjadi 'rejected' tanpa mempengaruhi stok produk
        $requestItem->update(['status' => 'rejected']);
        $requestItem->save();
    
        return redirect()->route('admin.requestItems.index')->with('success', 'Permintaan barang ditolak.');
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