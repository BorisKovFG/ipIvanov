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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
    Route::group(['prefix' => 'fertilizers', 'namespace' => 'Fertilizers'], function () {
        Route::get('/', 'IndexController')->name('admin.fertilizers.index');
//        Route::get('/create', 'CreateController')->name('admin.fertilizers.create');
//        Route::post('/', 'StoreController')->name('admin.fertilizers.store');
//        Route::get('/{fertilizer}', 'ShowController')->name('admin.fertilizers.show');
//        Route::get('/{fertilizer}/edit', 'EditController')->name('admin.fertilizers.edit');
//        Route::patch('/{fertilizer}', 'UpdateController')->name('admin.fertilizers.update');
//        Route::delete('/{fertilizer}', 'DestroyController')->name('admin.fertilizers.destroy');
    });
    Route::group(['prefix' => 'clients', 'namespace' => 'Clients'], function () {
        Route::get('/', 'IndexController')->name('admin.clients.index');
//        Route::get('/create', 'CreateController')->name('admin.clients.create');
//        Route::post('/', 'StoreController')->name('admin.clients.store');
//        Route::get('/{fertilizer}', 'ShowController')->name('admin.clients.show');
//        Route::get('/{fertilizer}/edit', 'EditController')->name('admin.clients.edit');
//        Route::patch('/{fertilizer}', 'UpdateController')->name('admin.clients.update');
//        Route::delete('/{fertilizer}', 'DestroyController')->name('admin.clients.destroy');
    });
});


Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
