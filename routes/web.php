<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
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
})->name('guest.home');

Route::get('/list-article', [PublicController::class, 'all'])->name('guest.article.all');
Route::get('/list-article/{article}', [PublicController::class, 'show'])->name('guest.article.show');
Route::middleware(['auth'])->group(function(){
    Route::resource('article', ArticleController::class);
});

require __DIR__.'/auth.php';
require __DIR__.'/api.php';
