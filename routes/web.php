<?php

use App\Http\Controllers\BlogcommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SocialShareController;
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

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/', [Frontend::class, 'frontendLayout']);
Route::get('post/{slug}', [Frontend::class, 'singlePost'])->name('singlePost');
Route::get('/contact', [Frontend::class, 'contact'])->name('contact');
Route::get('/about', [Frontend::class, 'about'])->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('backend.dashboard');
})->name('dashboard');




/**
 * All Backedn Blog Routes List.
 */
Route::resource('category', CategoryController::class);

Route::resource('blog', BlogController::class);
Route::get('blog-trash', [BlogController::class, 'blogTrash'])->name('blogTrash');
Route::get('blog-restore/{id}', [BlogController::class, 'blogRestore'])->name('blogRestore');
Route::get('blog-delete/{id}', [BlogController::class, 'blogDelete'])->name('blogDelete');
Route::get('blog-feature/{id}/{feature_post}', [BlogController::class, 'blogFeaturePost'])->name(' blogFeaturePost');
Route::get('blog-status/{id}/{status}', [BlogController::class, 'blogStatus'])->name('blogStatus');


Route::post('/blogcomment-post', [BlogcommentController::class, 'blogCommentPost'])->name('blogCommentPost');


Route::get('social-share', [SocialShareController::class, 'index']);
Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
Route::post('settings-post', [SettingsController::class, 'settingsPost'])->name('settingsPost');
/**
 * Laravel Filemanager Routes.
 */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
  \UniSharp\LaravelFilemanager\Lfm::routes();
});
