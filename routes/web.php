<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentOnlController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('users.index');
// });
// Route::get('/rooms', function () {
//     return view('users.room');
// });
// Route::get('/about', function () {
//     return view('users.about');
// });
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'home'])->name('users.home');
    Route::get('/rooms', [UserController::class, 'rooms'])->name('users.rooms');
    Route::get('/about', [UserController::class, 'about'])->name('users.about');
    Route::get('/blog', [UserController::class, 'blog'])->name('users.blog');
    Route::get('/single_blog', [UserController::class, 'single_blog'])->name('users.single_blog');
    Route::get('/elements', [UserController::class, 'elements'])->name('users.elements');
    Route::get('/sign_in', [UserController::class, 'sign_in'])->name('users.sign_in');
    Route::get('/sign_up', [UserController::class, 'sign_up'])->name('users.sign_up');
});
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
    Route::get('/chat', [AdminController::class, 'chat'])->name('admin.chat');
    Route::get('/user_profile', [AdminController::class, 'user_profile'])->name('admin.user_profile');
    //room type
    Route::controller(RoomTypeController::class)->name('room_types.')
        ->prefix('room_types/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            
            Route::get('edit/{id}','edit')->name('edit') 
                ->where('id','[0-9]+');
            Route::put('update/{id}','update')->name('update') 
                ->where('id','[0-9]+');
                
            Route::delete('destroy/{id}','destroy')->name('destroy')
                ->where('id','[0-9]+');
        });

    Route::controller(RoomController::class)->name('rooms.')
        ->prefix('rooms/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');

            Route::get('detail/{id}','detail')->name('detail') 
            ->where('id','[0-9]+');
            
            Route::get('edit/{id}','edit')->name('edit') 
                ->where('id','[0-9]+');
            Route::put('update/{id}','update')->name('update') 
                ->where('id','[0-9]+');
                
            Route::delete('destroy/{id}','destroy')->name('destroy')
                ->where('id','[0-9]+');
        });
    Route::controller(AmenityController::class)->name('amenities.')
        ->prefix('amenities/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');

            Route::get('detail/{id}','detail')->name('detail') 
            ->where('id','[0-9]+');
            
            Route::get('edit/{id}','edit')->name('edit') 
                ->where('id','[0-9]+');
            Route::put('update/{id}','update')->name('update') 
                ->where('id','[0-9]+');
                
            Route::delete('destroy/{id}','destroy')->name('destroy')
                ->where('id','[0-9]+');
        });
    Route::controller(ScheduleController::class)->name('schedules.')
        ->prefix('schedules/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');

            Route::get('detail/{id}','detail')->name('detail') 
            ->where('id','[0-9]+');
            
            Route::get('edit/{id}','edit')->name('edit') 
                ->where('id','[0-9]+');
            Route::put('update/{id}','update')->name('update') 
                ->where('id','[0-9]+');
                
            Route::delete('destroy/{id}','destroy')->name('destroy')
                ->where('id','[0-9]+');
        });
    Route::controller(BookingController::class)->name('bookings.')
        ->prefix('bookings/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            
            Route::get('edit/{id}','edit')->name('edit') 
                ->where('id','[0-9]+');
            Route::put('update/{id}','update')->name('update') 
                ->where('id','[0-9]+');
                
            Route::delete('destroy/{id}','destroy')->name('destroy')
                ->where('id','[0-9]+');
        });
    Route::controller(InvoiceController::class)->name('invoices.')
        ->prefix('invoices/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
        });

    Route::controller(BannerController::class)->name('banners.')
        ->prefix('banners/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            
            Route::get('edit/{id}','edit')->name('edit') 
                ->where('id','[0-9]+');
            Route::put('update/{id}','update')->name('update') 
                ->where('id','[0-9]+');
                
            Route::delete('destroy/{id}','destroy')->name('destroy')
                ->where('id','[0-9]+');
        });
    Route::controller(PromotionController::class)->name('promotions.')
        ->prefix('promotions/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            
            Route::get('edit/{id}','edit')->name('edit') 
                ->where('id','[0-9]+');
            Route::put('update/{id}','update')->name('update') 
                ->where('id','[0-9]+');
                
            Route::delete('destroy/{id}','destroy')->name('destroy')
                ->where('id','[0-9]+');
        });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/rooms', [HomeController:: class, 'roomTypes'])->name('rooms');
Route::get('/detail/{id}', [HomeController:: class, 'detailRoom'])->name('detail')
     ->where('id','[0-9]+');
Route::get('/booking/{id}', [HomeController:: class, 'booking'])->name('booking')
    ->where('id','[0-9]+');
Route::post('/processPayment', [PaymentController::class, 'processPayment'])->name('processPayment');
Route::post('/onlinePayment', [PaymentController::class, 'vnpay'])->name('onlinePayment');
Route::get('/offlinePayment', [PaymentController::class, 'offlinePayment'])->name('offlinePayment');
Route::get('/vnpay-return', [PaymentController::class, 'vnpayReturn'])->name('vnpayReturn');
Route::get('/detailBooking', [HomeController::class, 'detailBooking'])->name('detailBooking');

