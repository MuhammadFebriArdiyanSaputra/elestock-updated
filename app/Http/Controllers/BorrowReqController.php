<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowReq; // Model untuk pengajuan
use App\Models\Product;
use Illuminate\Support\Facades\Auth; // Untuk autentikasi user
use Illuminate\Support\Facades\Session;

class BorrowReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Session::get('user')['id'];

        // Ambil data borrow requests hanya untuk user ini
        $borrowRequests = BorrowReq::with('product')
            ->where('user_id', $userId) // Filter data berdasarkan user ID dari session
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.borrowReqs.index', compact('borrowRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('stok', '>', 0)->get();
        return view('user.borrowReqs.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'borrow_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:borrow_date',
            'reason' => 'required|string|max:255',
        ]);

        // Periksa stok produk
        $product = Product::find($request->product_id);
        if (!$product || $product->stok <= 0) {
            return back()->withErrors(['product_id' => 'Stok barang tidak mencukupi.']);
        }

        // Simpan pengajuan peminjaman ke database
        BorrowReq::create([
            'user_id' => Session::get('user')['id'],
            'product_id' => $request->product_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('user.borrowReqs.index')->with('success', 'Pengajuan peminjaman berhasil dikirim. Menunggu validasi dari admin.');
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