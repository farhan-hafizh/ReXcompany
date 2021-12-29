<?php
use App\Models\GameDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddGameController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GameDetailController;
use App\Http\Controllers\TransHistoryController;
use App\Http\Controllers\TransInfoController;

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


//trans-history
Route::get('/trans-history/{id}', [TransHistoryController::class,'index'])->middleware('member');
Route::get('/trans-history', [TransHistoryController::class,'index'])->middleware('auth');

//admin only
Route::get('/manage-game', [ManagerController::class,'index'])->middleware('admin');
Route::get('/add-game', [AddGameController::class,'index'])->middleware('admin');
Route::post('/add-game', [AddGameController::class,'store'])->middleware('admin');
Route::resource('game', ManagerController::class);

//auth
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');//tell laravel it's login
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');//only guest can access
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

//game detail
Route::get('/game-detail/{slug}', [GameDetailController::class,'index']);
//profile
Route::get('/profile', [ProfileController::class,'index'])->middleware('auth');
//friends
Route::get('/friends', [FriendsController::class,'index'])->middleware('auth');
Route::get('/friends/cancel/{id}',[FriendsController::class, 'cancelFriendRequest'])->middleware('auth');
Route::get('/friends/reject/{id}',[FriendsController::class, 'rejectFriendRequest'])->middleware('auth');
Route::get('/friends/accept/{id}',[FriendsController::class, 'acceptFriendRequest'])->middleware('auth');
Route::post('/friends',[FriendsController::class, 'addFriend']);

//agecheck
Route::post('/age-check', [GameDetailController::class,'open'])->middleware('isAdult');
Route::get('/game-detail/add-cart/{slug}', [GameDetailController::class,'addCart'])->middleware('auth');
//cart
Route::get('/cart/delete/{id}', [CartController::class,'deleteCart'])->middleware('auth');
Route::resource('cart', CartController::class);
Route::get('/checkout/{price}', [TransInfoController::class,'index'])->middleware('auth');
//trans info
Route::post('/trans-info',[TransInfoController::class,'insert'])->middleware('auth');



