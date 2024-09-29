<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// เส้นทางสำหรับ Customer
Route::middleware(['authenticateCustomer'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    });
});

// เส้นทางสำหรับ Admin (Employee with role_id = 2)
Route::middleware(['auth:employee', 'checkAdminRole'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::middleware(['auth:customer'])->group(function () {
    //user
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::get('/profile/edit/{id}', [UserController::class, 'editProfile'])->name('profile_edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile_update');
    Route::get('/history-booking', [UserController::class, 'showBookingHistory'])->name('history-booking');
    Route::post('/cancel-booking/{id}', [UserController::class, 'cancelBooking'])->name('cancel_booking');
    //booking
    Route::get('/orderlist/{course_id}', [BookingController::class, 'showOrderList'])->name('orderlist');
    Route::post('/storeOrder', [BookingController::class, 'storeOrder'])->name('storeOrder');
    Route::get('/payment', [BookingController::class, 'showPayment'])->name('payment');
    Route::post('/store-booking', [BookingController::class, 'storeBooking'])->name('booking.store');
    Route::get('/clearsession', [BookingController::class, 'clearSession'])->name('clearsession');


});

Route::middleware('auth:employee')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showAll'])->name('admin_dashboard');
});

// user
Route::get('/home', [CourseController::class, 'showClass'])->name('index');


//login/out/register
Route::get('/register', [UserController::class, 'showRegister'])->name('show_register');
Route::post('/register_success', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'showLogin'])->name('show_login');
Route::post('/login_seccess', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


// show class
Route::get('/yoga', [CourseController::class, 'showYoga'])->name('yoga');
Route::get('/dance', [CourseController::class, 'showDance'])->name('dance');
Route::get('/muaythai', [CourseController::class, 'showMuaythai'])->name('muaythai');
Route::get('/zumba', [CourseController::class, 'showZumba'])->name('zumba');
Route::get('/course_time', [CourseController::class, 'showCoursesTime'])->name('course_time');
Route::get('/course_gender', [CourseController::class, 'showCoursesGender'])->name('course_gender');

// Route::get('/edit-profile', function () {
//     return view('user.edit-profile');
// })->name('edit-profile');
// Route::get('/profile', function () {
//     return view('user.profile');
// })->name('profile');


// Route::get('/history-booking', function () {
//     return view('user.history-booking');
// })->name('history-booking');

// Route::get('/login', function () {
//     return view('user.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('user.register');
// })->name('register');

Route::get('/trainer_apply', function () {
    return view('user.trainer_apply');
})->name('trainer_apply');

//Admin
Route::get('/admin/course', [AdminController::class, 'showcourse'])->name('admin_course');
Route::get('/admin/trainer', [AdminController::class, 'showtrainer'])->name('admin_trainer');
Route::get('/admin/bill', [AdminController::class, 'showbill'])->name('admin_trainer');