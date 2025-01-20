<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\{
    AuthController,
    ProductController,
    LocationController,
    SupplierController,
    DashboardController,
    AvailableItemController,
    BorrowReqController,
    AdminBorrowRequestController,
    RequestItemController,
    AdminRequestItemController,
    UserDashboardController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route untuk halaman Home
Route::get('/', function () {
    $user = Session::get('user');
    
    if ($user) {
        // Redirect berdasarkan role user
        if ($user['role'] === 'admin') {
            return redirect('admin/dashboard');
        } else {
            return redirect('user/dashboard');
        }
    }

    // Jika user belum login, tampilkan halaman home
    return view('home');
})->name('home');

// Route untuk login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Route untuk register
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Route untuk logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route dashboard user
Route::get('user/dashboard', function () {
    $user = Session::get('user');
    if ($user && $user['role'] === 'user') {
        return view('user.dashboard');
    } else {
        return redirect('login');
    }
})->name('user.dashboard');

Route::get('user/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');

// Route dashboard admin
Route::get('admin/dashboard', function () {
    $user = Session::get('user');
    if ($user && $user['role'] === 'admin') {
        return view('admin.dashboard');
    } else {
        return redirect('login');
    }
})->name('admin.dashboard');

Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// Resource routes for admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('suppliers', SupplierController::class);

    Route::get('borrow-requests', [AdminBorrowRequestController::class, 'index'])->name('borrowRequests.index');
    Route::post('borrow-requests/{id}/approve', [AdminBorrowRequestController::class, 'approve'])->name('borrowRequests.approve');
    Route::post('borrow-requests/{id}/reject', [AdminBorrowRequestController::class, 'reject'])->name('borrowRequests.reject');

    Route::get('request-items', [AdminRequestItemController::class, 'index'])->name('requestItems.index');
    Route::post('request-items/{id}/approve', [AdminRequestItemController::class, 'approve'])->name('requestItems.approve');
    Route::post('request-items/{id}/reject', [AdminRequestItemController::class, 'reject'])->name('requestItems.reject');
});

// Route untuk Barang Tersedia
Route::get('user/items/available', [AvailableItemController::class, 'index'])->name('user.availableItems.index');

Route::get('/borrow-requests', [BorrowReqController::class, 'index'])->name('user.borrowReqs.index');
Route::get('/borrow-requests/create', [BorrowReqController::class, 'create'])->name('user.borrowReqs.create');
Route::post('/borrow-requests', [BorrowReqController::class, 'store'])->name('user.borrowReqs.store');

Route::get('user/items/requests', [RequestItemController::class, 'index'])->name('user.requestItems.index');
Route::get('user/items/requests/create', [RequestItemController::class, 'create'])->name('user.requestItems.create');
Route::post('user/items/requests', [RequestItemController::class, 'store'])->name('user.requestItems.store');