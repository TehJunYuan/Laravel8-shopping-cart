<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addCategory', function () {
    return view('addCategory');
});

Route::get('/addProduct', function () {
    return view('addProduct',['categoryID'=>App\Models\Category::all()]);
});

//upload new information route
Route::post('/addCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
Route::post('/addProduct', [App\Http\Controllers\ProductController::class, 'store'])->name('storeProduct');
Route::post('/updateProduct', [App\Http\Controllers\ProductController::class, 'update'])->name('updateProduct');
Route::post('/addCart', [App\Http\Controllers\CartController::class, 'add'])->name('add.to.cart');
Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');

Route::get('/showCategory', [App\Http\Controllers\CategoryController::class, 'view'])->name('viewCategory');

Route::get('/showProduct', [App\Http\Controllers\ProductController::class, 'view'])->name('viewProduct');
//1
Route::get('/deleteProduct/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('deleteProduct');

Route::get('editProduct/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('editProduct');

Route::get('/productDetail/{id}',[App\Http\Controllers\ProductController::class,'productdetail'])->name('product.detail');

Route::get('/myCart', [App\Http\Controllers\CartController::class, 'showMyCart'])->name('show.my.cart');

Route::get('/deleteCart/{id}',[App\Http\Controllers\CartController::class,'delete'])->name('delete.cart.item');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'viewProduct'])->name('products');

Route::post('/products', [App\Http\Controllers\ProductController::class, 'search'])->name('search');

Route::get('/myorder', [App\Http\Controllers\PaymentController::class, 'show'])->name('my.order');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
