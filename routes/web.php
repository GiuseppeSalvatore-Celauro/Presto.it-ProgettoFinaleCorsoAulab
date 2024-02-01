<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/Annunci', [ProductController::class, 'index'])->name('product');
Route::get('/Annunci/Crea', [ProductController::class, 'create'])->name('create')->middleware('auth');
Route::get('/Annunci/{product}/Modifica', [ProductController::class, 'edit'])->name('products.edit');


Route::get('/MiSentoFortunato', [ProductController::class, 'luckywheel'])->name('luckywheel');
Route::get('/Annunci/AnnunciPersonali/{user}', [ProductController::class, 'personalProduct'])->name('personalProduct');
// Sezione revisore
Route::get('/Ricerca/Categoria/{category}', [ProductController::class, 'categoryIndex'])->name('category.index');
Route::get('/Ricerca/Prodotti/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('Ricerca/Prodotti', [ProductController::class, 'searchProducts'])->name('product.search');

Route::get('/Revisore/Vista', [RevisorController::class, 'index'])->middleware('RevisorMiddleware')->name('revisor.index');

Route::get('/Revisore/Vista/Da-revisionare', [RevisorController::class, 'toBeRewiewed'])->middleware('RevisorMiddleware')->name('revisor.toBeRewiewed');
Route::get('/Revisore/Vista/revisionate', [RevisorController::class, 'revised'])->middleware('RevisorMiddleware')->name('revisor.revised');

Route::get('/Revisore/Vista/show/{product}', [RevisorController::class, 'show'])->middleware('RevisorMiddleware')->name('revisor.show');
Route::get('/Revisore/Vista/reviewedshow/{product}', [RevisorController::class, 'reviewedshow'])->middleware('RevisorMiddleware')->name('revisor.reviewedshow');

Route::patch('/Revisore/Vista/accept/{product}', [RevisorController::class, 'revisorAccept'])->middleware('RevisorMiddleware')->name('revisor.accept');
Route::patch('/Revisore/Vista/delete/{product}', [RevisorController::class, 'revisorDelete'])->middleware('RevisorMiddleware')->name('revisor.delete');

Route::get('/WorkWithUs/Request', [RevisorController::class, 'requestRevisor'])->name('request.newRevisor');
Route::get('/WorkWithUs/Request/{user}', [RevisorController::class, 'newRevisorAccepted'])->name('request.newRevisorAccepted');

// Sezione admin
Route::get('/Admin/Index', [AdminController::class, 'index'])->middleware('AdminMiddleware')->name('admin.index');
Route::patch('/Admin/removeRevisor/{user}', [AdminController::class, 'removeRevisor'])->middleware('AdminMiddleware')->name('admin.removeRevisor');
Route::get('/Admin/WorkWithUs/Request/{user}', [AdminController::class, 'adminNewRevisorAccepted'])->middleware('AdminMiddleware')->name('admin.newRevisorAccepted');

// Cambio LANGUAGE
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
//

//Profilo
Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/create/index', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');

Route::put('/profile/edit/{profile}', [ProfileController::class, 'update'])->name('profile.edit');

// Profilo sezione commenti

Route::post('/profile/comment/create/{user}', [CommentController::class, 'store'])->name('comment.create');
