<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.addcategory');
});



Route::get('/add_category','categoryController@create')->name('addcategory');
//Route::post('/upload_category','categoryController@store')->name('uploadcategory');
Route::get('/show_category','categoryController@show')->name('showcategory');
//Route::get('/edit_category/{id}','categoryController@edit')->name('editcategory');
//Route::post('/updatecategory/{id}','categoryController@update')->name('updatecategory');
//Route::get('/delete_category/{id}','categoryController@destroy')->name('deletecategory');

Route::get('/add_product','productController@create')->name('addproduct');
//Route::post('/upload_product','productController@store')->name('uploadproduct');
Route::get('/show_product','productController@show')->name('showproduct');
// Route::get('/edit_product/{id}','productController@edit')->name('editproduct');
// Route::post('/update_product/{id}','productController@update')->name('updateproduct');
// Route::get('/delete_product/{id}','productController@destroy')->name('deleteproduct');
// Route::get('/product_details/{id}','productController@productdetails')->name('productdetails');









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
