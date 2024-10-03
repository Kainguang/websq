<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Customer;
use App\Models\Course_bill;
use App\Models\Course_participant;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function showOrderList($course_id) {
        // ดึงข้อมูลคอร์สที่กำลังถูกจองรวมถึงวันเรียน
        $course = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') // เชื่อมกับตาราง enrolls
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id') // เชื่อมกับตาราง course_days
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id') // เชื่อมกับตาราง days เพื่อดึงชื่อวัน
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times',
                'courses.period', // ดึงข้อมูล period
                'courses.max_participant',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'), // นับจำนวนผู้ที่จองจากตาราง enrolls
                'courses.picture_path',
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days') // รวมวันเรียนในรูปแบบ Group_concat
            )
            ->where('courses.id', $course_id)
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.period', 'courses.max_participant', 'employees.firstname', 'employees.lastname', 'courses.picture_path')
            ->first();
    
        // ส่งข้อมูล $course ไปยัง view
        return view('user.orderlist', compact('course'));
    }

    public function bookCourse($course_id) {
        // ตรวจสอบว่าผู้ใช้ล็อกอินใน Guard ของ customer หรือไม่
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('show_login')->with('message', 'กรุณาล็อกอินก่อนทำการจอง');
        }
    
        // ถ้าผู้ใช้ล็อกอินอยู่แล้ว ทำงานต่อไปได้ตามปกติ
        $course = Course::find($course_id);
        
        // ตรวจสอบว่าคอร์สเต็มหรือไม่ (ถ้ามีการจำกัดจำนวนผู้เข้าร่วม)
        if ($course->max_participant <= $course->current_participant) {
            return redirect()->back()->with('error', 'คอร์สนี้เต็มแล้ว');
        }
        
        // เก็บข้อมูล course ลงใน session เพื่อแสดงในหน้า orderlist
        session(['course_id' => $course->id]);
    
        return redirect()->route('orderlist');
    }

    public function storeOrder(Request $request) {
        // ดึงข้อมูล course จากฐานข้อมูล
        $course = Course::find($request->input('course_id'));
    
        // เก็บข้อมูลที่จำเป็นลงใน session
        session([
            'course_id' => $course->id,
            'total' => $request->input('total'),
        ]);
    
        // ยืนยันการจองทันทีและ redirect ไปหน้าชำระเงิน
        return redirect('payment');
    }

    public function showPayment() {
        return view('user.payment');
    }

    public function clearSession() {
        // ลบข้อมูล session ที่เกี่ยวข้อง
        session()->forget(['course_id', 'total']);
    
        // เปลี่ยนเส้นทางไปยัง URL เก่า
        return redirect('home');
    }
    

    public function storeBooking(Request $request) {
        // ดึงข้อมูลที่เก็บไว้ใน session
        $course_id = session('course_id');
        $customer = Auth::user();
        $customer_id = $customer->id;
    
        $total = session('total'); // ราคารวม
    
        // ตรวจสอบว่ามีการอัปโหลดไฟล์สลิปหรือไม่
        if ($request->hasFile('slip_picture')) {
            $file = $request->file('slip_picture');
            // ดึงชื่อไฟล์เดิมโดยไม่เปลี่ยนชื่อ
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
    
            // เก็บไฟล์ไว้ใน storage/app/public/slip_pictures โดยใช้ชื่อเดิม
            $slipPath = $file->storeAs('slip_pictures', $fileName . '.' . $extension, 'public');
    
            // บันทึก path ของไฟล์ลงในฐานข้อมูล
            $customer->slip_picture = $slipPath;
        }
    
        // สร้างข้อมูลการจองในตาราง enrolls
        DB::table('enrolls')->insert([
            'course_id' => $course_id,
            'customer_id' => $customer_id,
            'totalprice' => $total,
            'slip_picture' => $slipPath,
            'payment_status' => 0, // รอการยืนยัน
            'course_status' => 1, // รอการยืนยันการเริ่มคอร์ส
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // ลบข้อมูลใน session หลังจาก insert เสร็จ
        session()->forget(['course_id', 'total']);
    
        // Redirect ไปยังหน้าการชำระเงินเสร็จสิ้น
        return redirect('home')->with('success', 'การจองเสร็จสมบูรณ์ กำลังรอยืนยันการชำระเงิน');
    }
    
    
}
