<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;

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

// ======================client router================================
Route::get('/home', [HomeController::class,'index']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/sanpham', [HomeController::class, 'products'])->name('product');

Route::get('/', function(){
    return '<h1 style: text-align: center; >Trang chủ Unicode </h1>';
})-> name('home');

Route::get('/sp',[HomeController::class,'products']);

Route::get('/sp',[HomeController::class,'products']);
Route::get('/them-sp',[HomeController::class,'getAdd']);
Route::post('/them-sp',[HomeController::class,'postAdd'])->name('post-add');
Route::put('/them-sp',[HomeController::class,'putAdd']);
Route::get('/demo',[homeController::class,'getArray']);
Route::get('down-load',[homeController::class,'downLoad'])->name('downLoadimage');

Route::prefix('categories')->group(function () {
    //Danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index'])-> name('categories.list');

    //Lấy chi tiết một chuyên mục (Áp dụng show form sửa chuyên mục)
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])-> name('categories.edit');

    //Xử lí update chuyên mục 
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);

    // Hiển thị add Form dữ liệu 
    Route::get('/add', [CategoriesController::class, 'addCategory'])-> name('categories.add');

    // XỬ lí thêm chuyên mục
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    //Xóa chuyên mục
    Route::post('/delete/{id}', [CategoriesController::class, 'addCategory'])-> name('categories.delete');

     //Hiển thị form upload
     Route::get('upload', [CategoriesController::class, 'getFile']);
     
    //xử lí File
    Route::get('upload', [CategoriesController::class,'handleFile'])->name('categories.upload');
});

Route::get('/home',[homeController::class,'index'])->name('home');
Route::prefix('categories')->group(function () {
    //List of categories
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

});
Route::get('san-pham/{id}', [HomeController::class, 'getProductDetail']);


// ===================Admin route=================
Route::middleware('auth.login')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']); 
    Route::resource('products', ProductsController::class)->middleware('auth.login.product');
});
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth.admin');

// ====================== User Route =================
Route::prefix('users')->name('user.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('imdex');
    Route::get('/add', [UserController::class, 'add'])->name('add');
    Route::post('/add', [UserController::class, 'postAdd'])->name('post-add');
    Route::post('/edit/{id}',[UserController::class,'getEdit'])->name('edit');

    Route::post('/update',[UserController::class,'postEdit'])->name('post-exit');
    Route::post('/delete/{id}',[UserController::class,'delete'])->name('delete');
});





