<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeCommentController;
use App\Models\Comment;
use App\Models\User;
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

Route::view('/', 'home', ['tab_name' => 'Home'])->name('home');

// Route::view('/artikel', 'artikel', ['tab_name' => 'Artikel'])->name('artikel');
Route::resource('/artikel', ArtikelController::class);
Route::get('/berita', [ArtikelController::class, 'index_berita'])->name('berita');
Route::get('/analisa', [ArtikelController::class, 'index_analisa'])->name('analisa');

Route::view('/artikel/asalusul', 'asalusul', ['tab_name' => 'Asal Usul Forex'])->name('asalusul');
Route::view('/artikel/price_action', 'price_action', ['tab_name' => 'Price Action'])->name('price_action');
Route::view('/artikel/SnR', 'snr', ['tab_name' => 'Support and Resistance'])->name('snr');
Route::view('/artikel/mm', 'mm', ['tab_name' => 'Support and Resistance'])->name('mm');
Route::view('/artikel/bbmarsi', 'bbmarsi', ['tab_name' => 'Support and Resistance'])->name('bbmarsi');

Route::view('/contact', 'contact', ['tab_name' => 'Contact'])->name('contact');
Route::view('/register', 'register', ['tab_name' => 'Register'])->name('register');

Route::view('/login', 'login', ['tab_name' => 'Login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

// Register Route
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Logout Route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::view('/production', 'admin.index');
Route::resource('/admin_system/dashboard_artikel', ArtikelController::class);
Route::post('/admin_system/artikel_upload_image', [ArtikelController::class, 'upload'])->name('artikel_upload_image');
Route::get('/admin_system/artikel', [ArtikelController::class, 'indexAdmin'])
  ->middleware([
    'checkAdmin'
  ])
  ->name('admin_system.index');

Route::get('/admin_system/user', function () {
  $user = User::orderBy('role')->get();
  return view('admin.user.index')->with(['data_user' => $user]);
})
  ->middleware([
    'checkAdmin'
  ])
  ->name('admin_user.index');

Route::put('/admin_system/user/{id}/{role}/edit', function ($id, $role) {
  $role = request()->role;
  if ($role == 'user') {
    User::find($id)->update([
      'role' => 'admin'
    ]);
  } else if ($role == 'admin') {
    User::find($id)->update([
      'role' => 'user'
    ]);
  }

  return redirect()->back();
})
  ->middleware([
    'checkAdmin'
  ])
  ->name('admin_user.edit');



Route::post('/article_comment', [CommentController::class, 'store']);
Route::get('/faq', function () {
  return view('faq', ['tab_name' => 'FAQ']);
})->name('faq');
Route::get('/getCommentArticle/{id?}', [CommentController::class, 'getCommentArticle']);
Route::delete('/delete_comment', [CommentController::class, 'destroy']);

Route::get('/like_or_dislike/{user_id?}/{article_id?}', [LikeCommentController::class, 'likeOrDislike']);
