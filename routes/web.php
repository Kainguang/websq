<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin_CoursesController;
use App\Http\Controllers\Admin_TrainerController;
use App\Http\Controllers\Admin_BillController;
use App\Http\Controllers\Admin_CustomerController;
use App\Http\Controllers\Admin_FacilitiesController;

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
    // Admin Dashboard Data
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/admin/bill/approve/{id}', [AdminController::class, 'approveBill'])->name('admin.approveBill');
    Route::get('/admin/trainer', [Admin_TrainerController::class, 'showTrainerDashboard'])->name('admin_trainer');
    Route::get('/admin/bill', [Admin_BillController::class, 'showbill'])->name('admin_bill');
    Route::get('/admin/course', [Admin_CoursesController::class, 'showCourseDashboard'])->name('admin_course');
    Route::get('/admin/customer', [Admin_CustomerController::class, 'showCustomers'])->name('admin_customer');
    Route::get('/admin/facility', [Admin_FacilitiesController::class, 'showFacilities'])->name('admin_facility');

    // Admin Course Management
    Route::get('/admin/course/{id}/details', [Admin_CoursesController::class, 'showCourseDetails'])->name('admin.course.details');
    Route::get('/admin/course/edit/{id}', [Admin_CoursesController::class, 'edit'])->name('courses.edit');
    Route::post('/admin/course/update/{id}', [Admin_CoursesController::class, 'update'])->name('courses.update');
    Route::delete('/admin/course/delete/{id}', [Admin_CoursesController::class, 'destroy'])->name('courses.delete');

    // Admin Add Course
    Route::get('/admin/course/add', [Admin_CoursesController::class, 'showCourseForm'])->name('courses_create');
    Route::post('/admin/course/store', [Admin_CoursesController::class, 'storeOrUpdate'])->name('courses_store');
    Route::get('/admin/course/edit/{id}', [Admin_CoursesController::class, 'showCourseForm'])->name('courses_edit');
    Route::post('/admin/course/update/{id}', [Admin_CoursesController::class, 'storeOrUpdate'])->name('courses_update');
    Route::get('/admin/course/delete', [Admin_CoursesController::class, 'delete'])->name('courses.delete');

    // Admin Add Trainer
    Route::get('/admin/trainer/add', [Admin_TrainerController::class, 'showTrainerForm'])->name('trainer_create');
    Route::post('/admin/trainer/store', [Admin_TrainerController::class, 'storeOrUpdate'])->name('trainer_store');
    Route::get('/admin/trainer/edit/{id}', [Admin_TrainerController::class, 'showTrainerForm'])->name('trainer_edit');
    Route::post('/admin/trainer/update/{id}', [Admin_TrainerController::class, 'storeOrUpdate'])->name('trainer_update');
    Route::get('/admin/trainer/delete', [Admin_TrainerController::class, 'delete'])->name('trainer.delete');


    // Admin Add Customer
    Route::get('/admin/customer/add', [Admin_CustomerController::class, 'showCustomerForm'])->name('customer_create'); // Route สำหรับเพิ่มลูกค้า
    Route::post('/admin/customer/store', [Admin_CustomerController::class, 'storeOrUpdate'])->name('customer_store'); // Route สำหรับบันทึกข้อมูลลูกค้าใหม่
    Route::get('/admin/customer/edit/{id}', [Admin_CustomerController::class, 'showCustomerForm'])->name('customer_edit'); // Route สำหรับแก้ไขข้อมูลลูกค้า
    Route::post('/admin/customer/update/{id}', [Admin_CustomerController::class, 'storeOrUpdate'])->name('customer_update'); // Route สำหรับบันทึกการแก้ไขข้อมูลลูกค้า
    Route::get('/admin/customer/delete', [Admin_CustomerController::class, 'delete'])->name('customer.delete');

    // Admin bill
    Route::get('/admin/bill/delete/{id}', [Admin_BillController::class, 'delete'])->name('admin.bill.delete');
    Route::get('/admin/approve-bill/{id}', [Admin_BillController::class, 'approveBill'])->name('admin.approveBill');


    // Admin fac
    Route::get('/admin/facility/add', [Admin_FacilitiesController::class, 'showFacilityForm'])->name('facility_create');
    Route::post('/admin/facility/store', [Admin_FacilitiesController::class, 'storeOrUpdate'])->name('facility_store');
    Route::get('/admin/facility/edit/{id}', [Admin_FacilitiesController::class, 'showFacilityForm'])->name('facility_edit');
    Route::post('/admin/facility/update/{id}', [Admin_FacilitiesController::class, 'storeOrUpdate'])->name('facility_update');
    Route::get('/admin/facility/delete/', [Admin_FacilitiesController::class, 'delete'])->name('facility_delete');
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

