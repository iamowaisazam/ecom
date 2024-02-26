<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::get('/',function(){
    
    return redirect('/admin/login'); 
});


//Blogs
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/products/{id}', [App\Http\Controllers\HomeController::class, 'product']);

Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop']);
Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart']);

Route::post('/cart/add_to_cart', [App\Http\Controllers\HomeController::class, 'add_to_cart']);
Route::get('/cart/remove/{id}', [App\Http\Controllers\HomeController::class, 'cart_remove']);


Route::get('/combination_maker', [App\Http\Controllers\HomeController::class, 'combination_maker']);



Route::get('/blogs/categories/{id}', [App\Http\Controllers\HomeController::class, 'blog_categories']);



//promotions

Route::get('/promotions', [App\Http\Controllers\PromotionController::class, 'promotions']);
Route::get('/promotions1', [App\Http\Controllers\PromotionController::class, 'promotions1']);

Route::get('/promotions/search', [App\Http\Controllers\PromotionController::class, 'search']);
Route::get('/promotions/stores', [App\Http\Controllers\PromotionController::class, 'stores']);
Route::get('/promotions/stores/{slug}', [App\Http\Controllers\PromotionController::class, 'store']);
Route::get('/promotions/categories', [App\Http\Controllers\PromotionController::class, 'categories']);
Route::get('/promotions/categories/{id}', [App\Http\Controllers\PromotionController::class, 'category']);



//Admin
Route::get('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');
Route::post('/admin/login_submit', [App\Http\Controllers\Admin\AuthController::class, 'login_submit']);

Route::middleware(['web', 'auth'])->group(function () {

Route::get('/admin/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout']);
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
Route::get('/admin/changepassword', [App\Http\Controllers\Admin\DashboardController::class, 'changepassword']);
Route::post('/admin/changepassword_submit', [App\Http\Controllers\Admin\DashboardController::class, 'changepassword_submit']);

Route::get('/admin/status', [App\Http\Controllers\Admin\DashboardController::class, 'status']);


//Users
Route::get('/admin/users/index', [App\Http\Controllers\Admin\UserController::class, 'index']);
Route::get('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create']);
Route::post('/admin/users/store', [App\Http\Controllers\Admin\UserController::class, 'store']);
Route::get('/admin/users/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
Route::post('/admin/users/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
Route::get('/admin/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete']);

//Roles
Route::get('/admin/roles/index', [App\Http\Controllers\Admin\RoleController::class, 'index']);
Route::get('/admin/roles/create', [App\Http\Controllers\Admin\RoleController::class, 'create']);
Route::post('/admin/roles/store', [App\Http\Controllers\Admin\RoleController::class, 'store']);
Route::get('/admin/roles/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit']);
Route::post('/admin/roles/update/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update']);
Route::get('/admin/roles/delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'delete']);


//products
Route::get('/admin/products/index', [App\Http\Controllers\Admin\ProductController::class, 'index']);
Route::get('/admin/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create']);
Route::post('/admin/products/store', [App\Http\Controllers\Admin\ProductController::class, 'store']);
Route::get('/admin/products/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
Route::post('/admin/products/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
Route::get('/admin/products/remove-image/{id}', [App\Http\Controllers\Admin\ProductController::class, 'remove_image']);
Route::get('/admin/products/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete']);


Route::post('/admin/products/variations/{id}', [App\Http\Controllers\Admin\ProductController::class, 'variations']);
Route::get('/admin/products/remove-variation/{id}', [App\Http\Controllers\Admin\ProductController::class, 'remove_variation']);


 //filemanager
 Route::get('admin/filemanager',[App\Http\Controllers\Admin\FilemanagerController::class,'index']);
 Route::get('admin/filemanager/create',[App\Http\Controllers\Admin\FilemanagerController::class,'create']);
 Route::post('admin/filemanager/store',[App\Http\Controllers\Admin\FilemanagerController::class,'store']);
 Route::get('admin/filemanager/edit/{id}',[App\Http\Controllers\Admin\FilemanagerController::class,'edit']);
 Route::post('admin/filemanager/update/{id}',[App\Http\Controllers\Admin\FilemanagerController::class,'update']);
 Route::get('admin/filemanager/delete/{id}',[App\Http\Controllers\Admin\FilemanagerController::class,'delete']);


//Store_Category
Route::get('/admin/storecategories/index', [App\Http\Controllers\Admin\StoreCategoryController::class, 'index']);
Route::get('/admin/storecategories/create', [App\Http\Controllers\Admin\StoreCategoryController::class, 'create']);
Route::post('/admin/storecategories/store', [App\Http\Controllers\Admin\StoreCategoryController::class, 'store']);
Route::get('/admin/storecategories/edit/{id}', [App\Http\Controllers\Admin\StoreCategoryController::class, 'edit']);
Route::post('/admin/storecategories/update/{id}', [App\Http\Controllers\Admin\StoreCategoryController::class, 'update']);
Route::get('/admin/storecategories/delete/{id}', [App\Http\Controllers\Admin\StoreCategoryController::class, 'delete']);
Route::get('/admin/storecategories/status/{id}', [App\Http\Controllers\Admin\StoreCategoryController::class, 'status']);


//Stores
Route::get('/admin/stores/index', [App\Http\Controllers\Admin\StoreController::class, 'index']);
Route::get('/admin/stores/create', [App\Http\Controllers\Admin\StoreController::class, 'create']);
Route::post('/admin/stores/store', [App\Http\Controllers\Admin\StoreController::class, 'store']);
Route::get('/admin/stores/edit/{id}', [App\Http\Controllers\Admin\StoreController::class, 'edit']);
Route::post('/admin/stores/update/{id}', [App\Http\Controllers\Admin\StoreController::class, 'update']);
Route::get('/admin/stores/delete/{id}', [App\Http\Controllers\Admin\StoreController::class, 'delete']);
Route::get('/admin/stores/view/{id}', [App\Http\Controllers\Admin\StoreController::class, 'view']);
Route::get('/admin/stores/status/{id}', [App\Http\Controllers\Admin\StoreController::class, 'status']);

//Coupens
Route::get('/admin/coupons/index', [App\Http\Controllers\Admin\CouponController::class, 'index']);
Route::get('/admin/coupons/create', [App\Http\Controllers\Admin\CouponController::class, 'create']);
Route::post('/admin/coupons/store', [App\Http\Controllers\Admin\CouponController::class, 'store']);
Route::get('/admin/coupons/edit/{id}', [App\Http\Controllers\Admin\CouponController::class, 'edit']);
Route::post('/admin/coupons/update/{id}', [App\Http\Controllers\Admin\CouponController::class, 'update']);
Route::get('/admin/coupons/delete/{id}', [App\Http\Controllers\Admin\CouponController::class, 'delete']);
Route::get('/admin/coupons/view/{id}', [App\Http\Controllers\Admin\CouponController::class, 'view']);
Route::get('/admin/coupons/status/{id}', [App\Http\Controllers\Admin\CouponController::class, 'status']);
Route::get('/admin/coupons/sort', [App\Http\Controllers\Admin\CouponController::class, 'sort']);
Route::post('/admin/coupons/sort_update', [App\Http\Controllers\Admin\CouponController::class, 'sort_update']);

//Blogs
Route::get('/admin/blogs/index', [App\Http\Controllers\Admin\BlogController::class, 'index']);
Route::get('/admin/blogs/create', [App\Http\Controllers\Admin\BlogController::class, 'create']);
Route::post('/admin/blogs/store', [App\Http\Controllers\Admin\BlogController::class, 'store']);
Route::get('/admin/blogs/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit']);
Route::post('/admin/blogs/update/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update']);
Route::get('/admin/blogs/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'delete']);



//Settings
Route::get('admin/settings/edit', [App\Http\Controllers\Admin\SettingController::class, 'edit']);
Route::post('admin/settings/update', [App\Http\Controllers\Admin\SettingController::class, 'update']);



});

// Auth::routes();

Route::fallback(function () {
    return redirect('/'); 
});