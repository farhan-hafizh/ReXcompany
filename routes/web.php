<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\GameDetailController;
use App\Http\Controllers\AddGameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\TransHistoryController;
use App\Models\GameDetail;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');//tell laravel it's login
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');//only guest can access

//member only
Route::get('/trans-history/{id}', [TransHistoryController::class,'index'])->middleware('member');

//admin only
Route::get('/manage-game', [ManagerController::class,'index'])->middleware('admin');
Route::get('/add-game', [AddGameController::class,'index'])->middleware('admin');
Route::post('/add-game', [AddGameController::class,'store'])->middleware('admin');
Route::resource('game', ManagerController::class);

//auth post form
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/game-detail/{slug}', [GameDetailController::class,'index']);

Route::get('/profile', [ProfileController::class,'index'])->middleware('auth');
Route::get('/friends', [FriendsController::class,'index'])->middleware('auth');
Route::get('/trans-history', [TransHistoryController::class,'index'])->middleware('auth');

//agecheck
Route::post('/age-check', [GameDetailController::class,'open'])->middleware('isAdult');


Route::get('/game-detail/add-cart/{slug}', [GameDetailController::class,'addCart'])->middleware('auth');


