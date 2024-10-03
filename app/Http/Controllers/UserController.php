<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Course_bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function showLogin(){
        return view('user.login');
    }

    public function login(Request $request){
        // ตรวจสอบว่ามี email และ password
        $credentials = $request->only('email', 'password');
    
        // พยายามล็อกอินใน Guard ของ Customer ก่อน
        if (Auth::guard('customer')->attempt($credentials)) {
            // ล็อกอินสำเร็จสำหรับ Customer
            return redirect('home'); // Redirect ไปหน้า home สำหรับลูกค้า
        }
    
        // หากไม่ได้เป็น Customer, ลองล็อกอินใน Guard ของ Admin
        if (Auth::guard('employee')->attempt($credentials)) {
            // ล็อกอินสำเร็จสำหรับ Admin
            return redirect('admin/dashboard'); // Redirect ไปหน้า dashboard สำหรับแอดมิน
        }
    
        // ถ้าทั้งสองล้มเหลว ให้กลับไปแสดงข้อผิดพลาด
        return back()->withErrors(['msg' => 'Invalid login details']);
    }

    public function logout(Request $request){
        // ตรวจสอบว่าเป็น Customer ที่กำลังล็อกอินอยู่หรือไม่
        if (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
            $request->session()->invalidate(); // ล้าง session
            $request->session()->regenerateToken(); // ป้องกัน CSRF
            return redirect('home'); // Redirect ไปหน้า Home
        }

        // ตรวจสอบว่าเป็น Admin ที่กำลังล็อกอินอยู่หรือไม่
        if (Auth::guard('employee')->check()) {
            Auth::guard('employee')->logout();
            $request->session()->invalidate(); // ล้าง session
            $request->session()->regenerateToken(); // ป้องกัน CSRF
            return redirect('home'); // Redirect ไปหน้า login
        }

        // ถ้าไม่มี Guard ที่ถูกต้องอยู่ ให้กลับไปหน้า Login
        return redirect('login');
    }
    
    public function showRegister(){
        return view('user.register');
    }

    public function register(Request $request){
        $new_customer = new Customer;
        $new_customer->firstname = $request->firstname;
        $new_customer->lastname = $request->lastname;
        $new_customer->email = $request->email;
        $new_customer->password = Hash::make($request->password);
        $new_customer->phonenum = $request->phonenum;
        $new_customer->address = $request->address;
        $new_customer->birthdate = $request->birthdate;
        $new_customer->weight = $request->weight;
        $new_customer->height = $request->height;
        $new_customer->gender = $request->gender;
        $new_customer->save();

        return redirect('login');
    }

    public function showProfile(){
        // ดึงข้อมูลผู้ใช้ที่ล็อกอินอยู่
        $customer = Auth::user(); // ดึงข้อมูลผู้ใช้ที่ล็อกอิน
    
        // ตรวจสอบว่ามีข้อมูลผู้ใช้หรือไม่
        if (!$customer) {
            return redirect('login');  // ส่งไปหน้า login หากยังไม่ล็อกอิน
        }

        // ดึงประวัติการจองเฉพาะที่มี payment_status เป็น 1 หรือ 2
        $schedules = DB::table('enrolls')
        ->join('courses', 'enrolls.course_id', '=', 'courses.id')
        ->join('employees', 'courses.employee_id', '=', 'employees.id')
        ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id')
        ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
        ->select(
            'enrolls.id',
            'courses.course_name',
            DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
            'courses.start_time',
            'courses.end_time',
            'enrolls.payment_status'
        )
        ->where('enrolls.customer_id', $customer->id)
        ->whereIn('enrolls.payment_status', [1, 2]) // เงื่อนไขแสดงเฉพาะ payment_status = 1 หรือ 2
        ->groupBy('enrolls.id', 'courses.course_name', 'courses.start_time', 'courses.end_time', 'enrolls.payment_status')
        ->get();
    
        // ดึงประวัติการจองล่าสุด (รายการแรกสุด)
        $latestBooking = $this->bookingHistory($customer->id)->first(); // ใช้ first() เพื่อดึงรายการล่าสุด
        
        // ส่งข้อมูลไปยัง view
        return view('user.profile', compact('customer', 'latestBooking', 'schedules'));
    }

    public function editProfile(){
        // ดึงข้อมูลผู้ใช้ที่ล็อกอินอยู่
        $customer = Auth::user();  // ดึงข้อมูลลูกค้าที่ล็อกอินอยู่
    
        // ตรวจสอบว่ามีข้อมูลผู้ใช้หรือไม่
        if (!$customer) {
            return redirect('login');
        }
    
        // ส่งข้อมูลไปยัง view
        return view('user.edit-profile', compact('customer'));
    }

    public function updateProfile(Request $request) {
        $customer = Customer::find($request->id);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->phonenum = $request->phonenum;
        $customer->address = $request->address;
        $customer->birthdate = $request->birthdate;
        $customer->weight = $request->weight;
        $customer->height = $request->height;
        $customer->gender = $request->gender;
    
        // ตรวจสอบว่ามีการอัปโหลดไฟล์รูปภาพใหม่หรือไม่
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            // ดึงชื่อไฟล์เดิมโดยไม่เปลี่ยนชื่อ
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            // เก็บไฟล์ไว้ใน storage/app/public/profile_pictures โดยใช้ชื่อเดิม
            $filePath = $file->storeAs('profile_pictures', $fileName . '.' . $extension, 'public');

            // บันทึก path ของไฟล์ลงในฐานข้อมูล
            $customer->profile_picture = $filePath;
        }
    
        $customer->save();  // บันทึกข้อมูล
    
        return redirect('profile');
    }

    public function bookingHistory($customer_id) {
        // ดึงข้อมูลการจองจาก enrolls โดยเชื่อมกับตารางที่เกี่ยวข้อง
        $bookings = DB::table('enrolls')
        ->join('courses', 'enrolls.course_id', '=', 'courses.id')
        ->join('employees', 'courses.employee_id', '=', 'employees.id')
        ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id')
        ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
        ->select(
            'enrolls.id',
            'courses.course_name',
            DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
            'courses.start_time',
            'courses.end_time',
            'courses.period',
            'courses.times',
            'courses.course_status as course',
            DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
            'enrolls.start_day',
            'enrolls.end_day',
            'enrolls.payment_status',
            'enrolls.course_status as your_course',
            'enrolls.totalprice as price',
            'courses.picture_path',
            // นับจำนวนการจองทั้งหมดในคอร์สเดียวกันโดยไม่ใช้ subquery
            DB::raw('COUNT(enrolls.customer_id) as total_booked') // นับจำนวนการจองในคอร์สเดียวกัน
        )
        ->where('enrolls.customer_id', $customer_id)
        ->groupBy('enrolls.id', 'courses.id', 'employees.firstname', 'employees.lastname', 'courses.course_name', 'courses.start_time', 'courses.end_time', 'courses.period', 'courses.times', 'courses.course_status', 'enrolls.start_day', 'enrolls.end_day', 'enrolls.payment_status', 'enrolls.course_status', 'enrolls.totalprice', 'courses.picture_path')
        ->orderBy('enrolls.created_at', 'desc') // เรียงลำดับจากวันที่จองล่าสุดไปหาเก่าสุด
        ->get();
        
        return $bookings;
    }

    public function showBookingHistory() {
        $customer = Auth::user(); // ดึงข้อมูลลูกค้าที่ล็อกอิน
        $bookings = $this->bookingHistory($customer->id); // ส่ง customer_id ไปยังฟังก์ชันเพื่อดึงข้อมูลการจอง
        return view('user.history-booking', compact('bookings')); // ส่งข้อมูล $bookings ไปยัง view
    }

    public function cancelBooking(Request $request, $id) {
        // หา booking จาก id ที่ส่งมา
        $booking = DB::table('enrolls')->where('id', $id)->first();
    
        if ($booking) {
            // อัปเดตสถานะเป็น "รออนุมัติการยกเลิก"
            DB::table('enrolls')
                ->where('id', $id)
                ->update([
                    'payment_status' => 2, // 2: รออนุมัติการยกเลิก
                    'updated_at' => now(),
                ]);
    
            return redirect()->back()->with('success', 'การขอยกเลิกคอร์สถูกส่งแล้ว กำลังรอการอนุมัติ');
        }
    
        return redirect()->back()->with('error', 'ไม่พบข้อมูลการจอง');
    }
    
    
    
}
