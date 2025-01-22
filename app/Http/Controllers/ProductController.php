<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Location;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Session::get('user');
        if ($user['role'] !== 'admin') {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'Unauthorized access.']);
        }

        $locations = Location::all();
        return view('admin.products.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Session::get('user');
        if ($user['role'] !== 'admin') {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'Unauthorized access.']);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'spesifikasi' => 'required|string',
            'stok' => 'required|integer|min:1',
            'location_id' => 'required|exists:locations,id',
        ]);

        Product::create($request->all());
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('location')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $locations = Location::all(); 
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'spesifikasi' => 'required',
            'stok' => 'required|integer',
            'location_id' => 'required|exists:locations,id',
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}