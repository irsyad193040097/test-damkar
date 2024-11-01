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

include __DIR__.'/backend/route_backend.php';

Route::get('/', [App\Http\Controllers\Frontend\MainController::class, 'main'])->name('main');
Route::get('/post/read/{slug}', [App\Http\Controllers\Frontend\MainController::class, 'postRead'])->name('post.read');
Route::get('/page/{slug}', [App\Http\Controllers\Frontend\MainController::class, 'getPage'])->name('page.content');
Route::get('/category/{slug}', [App\Http\Controllers\Frontend\MainController::class, 'getCategory'])->name('category.main');
Route::get('/news', [App\Http\Controllers\Frontend\MainController::class, 'newsList'])->name('newsList.main');
Route::get('/gallery', [App\Http\Controllers\Frontend\MainController::class, 'galleryList'])->name('galleryList.main');
Route::post('/sendMessage', [App\Http\Controllers\Frontend\MainController::class, 'sendMessage'])->name('contact.sendMessage');

Route::get('/spbe', [App\Http\Controllers\Frontend\SpbeController::class, 'index'])->name('spbe');

Route::get('/getpengumuman', [App\Http\Controllers\Frontend\MainController::class, 'getPengumuman']);

Route::get('/page/informasi', function () {
    return view('layouts.frontend.pages.about');
})->name('page.informasi');

// Route::get('/news', function () {
//     return view('layouts.frontend.news.main');
// })->name('news.main');

Route::get('/contact', function () {
    return view('layouts.frontend.contact.main');
})->name('contact.main');

Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'dashboard'])->name('dashboard');


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
