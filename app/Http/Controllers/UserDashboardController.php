<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowReq;
use App\Models\Product;
use App\Models\RequestItem;
use Illuminate\Support\Facades\Session;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
    // Mendapatkan ID user yang login dari session
    $userId = Session::get('user')['id'];

    // Barang yang tersedia (global atau tidak tergantung kebutuhan Anda)
    $availableItemsCount = Product::count();

   // Barang pinjaman berdasarkan user dan status "borrowed"
        $borrowedItemsCount = BorrowReq::where('user_id', $userId)
                                        ->whereIn('status', ['borrowed', 'approved']) // Sesuaikan status yang dianggap "dipinjam"
                                        ->count();

        // Permintaan barang yang diajukan oleh user berdasarkan ID
        $requestItemCount = RequestItem::where('user_id', $userId)
                                       ->where('status', 'pending')
                                       ->count();

        return view('user.dashboard', compact('availableItemsCount', 'borrowedItemsCount', 'requestItemCount'));
    }
}
