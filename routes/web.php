<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/Orderlist', function () {
    return view('user.Orderlist');
});
Route::get('/payment', function () {
    return view('user.payment');
});
// Route::get('/Increasethenumber', function () {
//     return view('user.Increasethenumber');
// });


Route::get('/Increasethenumber', function () {
    return view('user.Increasethenumber');
})->name('Increasethenumber');

Route::get('/Orderlist', function () {
    return view('user.Orderlist');
})->name('Orderlist');

Route::get('/payment', function () {
    return view('user.payment');
})->name('payment');

Route::get('/index', function () {
    return view('user.index');
})->name('index');
 
Route::get('/yoga', function () {
    return view('user.yoga');
})->name('yoga');

Route::get('/dance', function () {
    return view('user.dance');
})->name('dance');

Route::get('/zumba', function () {
    return view('user.zumba');
})->name('zumba');

Route::get('/muaythai', function () {
    return view('user.muaythai');
})->name('muaythai');

Route::get('/class_time', function () {
    return view('user.class_time');
})->name('class_time');

Route::get('/class_gender', function () {
    return view('user.class_gender');
})->name('class_gender');

Route::get('/edit-profile', function () {
    return view('user.edit-profile');
})->name('edit-profile');

Route::get('/history-booking', function () {
    return view('user.history-booking');
})->name('history-booking');

Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::get('/profile', function () {
    return view('user.profile');
})->name('profile');

Route::get('/register', function () {
    return view('user.register');
})->name('register');

Route::get('/trainer_apply', function () {
    return view('user.trainer_apply');
})->name('trainer_apply');

Route::get('/admin/dashboard', function () {
    return view('admin.admin_dashborad');
})->name('admin.dashboard');

Route::get('/admin/course', function () {
    return view('admin.admin_course');
})->name('admin.course');

Route::get('/admin/bill', function () {
    return view('admin.admin_bill');
})->name('admin.bill');

Route::get('/admin/trainer', function () {
    return view('admin.admin_trainer');
})->name('admin.trainer');

Route::get('/admin/profile', function () {
    return view('admin.admin_profile');
})->name('admin.profile');