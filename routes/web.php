<?php

use App\Http\Controllers\Admin\LoginController;
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

Route::get('/image-01', function () {

    $url1 = url('/logo/image-01.jpg');
    $url2 = url('/logo/image-02.webp');

    return "
        <h1>Client :→ Please make it Beautiful!!</h1>
        <div style='display: flex'>
            <img style='display: block; margin-left: auto; margin-right: auto; width: 30%;' src=$url1>
            <img style='display: block; margin-left: auto; margin-right: auto; width: 30%;' src=$url2>
        </div>
    ";
});

Route::middleware('guest')->group(function () {
    Route::view('/admin/login','admin.login');
    Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
});

Route::middleware('auth')->group(function () {
    Route::view('home', 'admin.home')->name('admin.home');
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
});
