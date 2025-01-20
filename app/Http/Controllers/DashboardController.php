<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Location;
use App\Models\BorrowReq;
use App\Models\RequestItem; 

class DashboardController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $supplierCount = Supplier::count();
        $locationCount = Location::count();
        $borrowRequestCount = BorrowReq::where('status', 'pending')->count();
        $requestItemCount = RequestItem::where('status', 'pending')->count();

        return view('admin.dashboard', compact('productCount', 'supplierCount', 'locationCount', 'borrowRequestCount', 'requestItemCount'));
    }
}