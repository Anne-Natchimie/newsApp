<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\NewsStandardController;

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
    return view('welcome');
});

/* Route de news.blade.php */
Route::get('/news', [NewsController::class, 'index'])->name('news.news') ; 

/* Affichage des news par le client */ 

Route::get('/newsstandard', [NewsStandardController::class, 'index'])->name('news.standard') ; 
Route::get('/newsstandard/{actu}', [NewsStandardController::class, 'detail'])->name('news.standard.detail') ; 


/* Fin d'affichage des news par le client */ 

Route::get('/secure', function () {
    return view('secure');
})->middleware(['auth']); //Securiser la route avec auth 

Route::get('/notsecure', function () {
    return view('notsecure');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () { 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Route sécurisée pour la gestion des News */

Route::middleware(['auth'])->group(function () {
    Route::get('admin/news/add', [AdminNewsController::class, 'formAdd'])->name('news.add') ; // Route pour ajouter
    Route::post('admin/news/add', [AdminNewsController::class, 'add'])->name('news.add') ; 

    Route::get('admin/news/edit/{id}', [AdminNewsController::class, 'formEdit'])->name('news.edit') ; // Route pour modifier
    Route::post('admin/news/edit/{id}', [AdminNewsController::class, 'edit'])->name('news.edit') ; 

    Route::get('admin/news/liste', [AdminNewsController::class, 'index'])->name('news.liste') ; // Route pour lister
    Route::get('admin/news/delete/{id}', [AdminNewsController::class, 'delete'])->name('news.delete') ; // Route pour supprimer
    // Route::get('admin/news/delete/{actu}', [AdminNewsController::class, 'delete'])->name('news.delete') ; 

});

require __DIR__.'/auth.php';
