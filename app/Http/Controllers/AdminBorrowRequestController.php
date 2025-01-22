<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BorrowReq;

class AdminBorrowRequestController extends Controller
{

    public function index()
    {
        $borrowRequests = BorrowReq::with('user', 'product.location')->get();

        return view('admin.borrowRequests.index', compact('borrowRequests'));
    }

    public function approve($id)
    {
        $borrowRequest = BorrowReq::findOrFail($id);
        // Pastikan status request masih pending
        if ($borrowRequest->status == 'pending') {
            // Ambil produk terkait
            $product = $borrowRequest->product;
            
            // Periksa apakah stok cukup sebelum approve
            if ($product->stok > 0) {
                // Panggil method approve() dari model RequestItem
                $borrowRequest->approve();

                return redirect()->route('admin.borrowRequests.index')->with('success', 'Permintaan barang disetujui dan stok produk diperbarui.');
            } else {
                return redirect()->route('admin.borrowRequests.index')->with('error', 'Stok produk tidak cukup.');
            }
        }   

        return redirect()->back()->with('success', 'Pengajuan berhasil disetujui.');
    }

    public function reject($id)
    {
        $borrowRequest = BorrowReq::findOrFail($id);
        $borrowRequest->status = 'rejected';
        $borrowRequest->save();

        return redirect()->back()->with('success', 'Pengajuan berhasil ditolak.');
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