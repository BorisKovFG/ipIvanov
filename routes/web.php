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
        Route::get('/create', 'CreateController')->name('admin.fertilizers.create');
        Route::post('/import', 'ImportController')->name('admin.fertilizers.import');
        Route::get('/export', 'ExportController')->name('admin.fertilizers.export');
        Route::post('/', 'StoreController')->name('admin.fertilizers.store');
        Route::get('/{fertilizer}', 'ShowController')->name('admin.fertilizers.show');
        Route::get('/{fertilizer}/edit', 'EditController')->name('admin.fertilizers.edit');
        Route::patch('/{fertilizer}', 'UpdateController')->name('admin.fertilizers.update');
        Route::delete('/{fertilizer}', 'DestroyController')->name('admin.fertilizers.destroy');
        Route::post('/{fertilizer}', 'RestoreController')->name('admin.fertilizers.restore');
    });

    Route::group(['prefix' => 'culture-groups', 'namespace' => 'CultureGroups'], function () {
        Route::get('/', 'IndexController')->name('admin.culturegroups.index');
        Route::get('/create', 'CreateController')->name('admin.culturegroups.create');
        Route::post('/', 'StoreController')->name('admin.culturegroups.store');
        Route::get('/{cultureGroup}', 'ShowController')->name('admin.culturegroups.show');
        Route::get('/{cultureGroup}/edit', 'EditController')->name('admin.culturegroups.edit');
        Route::patch('/{cultureGroup}', 'UpdateController')->name('admin.culturegroups.update');
        Route::delete('/{cultureGroup}', 'DestroyController')->name('admin.culturegroups.destroy');
        Route::post('/{cultureGroup}', 'RestoreController')->name('admin.culturegroups.restore');
    });

    Route::group(['prefix' => 'clients', 'namespace' => 'Clients'], function () {
        Route::get('/', 'IndexController')->name('admin.clients.index');
        Route::get('/create', 'CreateController')->name('admin.clients.create');
        //TODO if will be more then 2 exports, add new namespace for exports
        Route::get('/export', 'ExportController')->name('admin.clients.export');
        Route::get('/contract/{client}', 'ContractController')->name('admin.clients.contract');
        Route::post('/', 'StoreController')->name('admin.clients.store');
        Route::get('/{client}', 'ShowController')->name('admin.clients.show');
        Route::get('/{client}/edit', 'EditController')->name('admin.clients.edit');
        Route::patch('/{client}', 'UpdateController')->name('admin.clients.update');
        Route::delete('/{client}', 'DestroyController')->name('admin.clients.destroy');
        Route::post('/{client}', 'RestoreController')->name('admin.clients.restore');
    });

    Route::group(['prefix' => 'users', 'namespace' => 'Users'], function () {
        Route::get('/', 'IndexController')->name('admin.users.index');
        Route::get('/create', 'CreateController')->name('admin.users.create');
        Route::post('/', 'StoreController')->name('admin.users.store');
        Route::get('/{user}', 'ShowController')->name('admin.users.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.users.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.users.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.users.destroy');
        Route::post('/{user}', 'RestoreController')->name('admin.users.restore');
    });
    Route::group(['prefix' => 'import-statuses', 'namespace' => 'ImportStatuses'], function () {
        Route::get('/', 'IndexController')->name('admin.import_statuses.index');
    });
});

Route::get('/', function () {
    return view('start');
})->name('main.index');

Route::get('/start', 'StartFertilizers')->name('start');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
