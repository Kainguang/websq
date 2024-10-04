<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Day;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Admin_CoursesController extends Controller
{
    // ฟังก์ชันแสดงหน้าแดชบอร์ดคอร์ส
    public function showCourseDashboard()
    {
        // นับคอร์สทั้งหมด
        $totalCourses = Course::count();

        // คำนวณรายได้ทั้งหมดจาก Pivot enrolls
        $totalRevenue = DB::table('enrolls')->sum('totalprice');

        // คำนวณรายได้เฉลี่ยต่อคอร์ส
        $averageRevenue = $totalCourses > 0 ? $totalRevenue / $totalCourses : 0;

        // ดึงข้อมูลคอร์สและจำนวนนักเรียน
        $coursesData = Course::withCount('customers')->get();

        // ดึงข้อมูลคอร์สและจำนวนนักเรียนที่สมัครจากตาราง enrolls
        $courses = DB::table('courses')
        ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id')
        ->leftJoin('employees', 'courses.employee_id', '=', 'employees.id') // Join กับตาราง employees เพื่อดึงชื่อเทรนเนอร์
        ->select(
            'courses.id',
            'courses.course_name',
            'courses.course_sellprice',
            'courses.start_time',
            'courses.end_time',
            'courses.course_status',
            DB::raw('COUNT(enrolls.id) as total_booked'),
            DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as trainer_name') // ดึงชื่อเทรนเนอร์
        )
        ->whereNull('courses.deleted_at')
        ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.course_status', 'employees.firstname', 'employees.lastname')
        ->get();

        // ส่งข้อมูลไปยังหน้า views
        return view('admin.admin_course', compact('totalCourses', 'totalRevenue', 'averageRevenue', 'coursesData', 'courses'));
    }

    public function showCourseDetails($id)
    {
        // Join ตาราง courses, employees, days, และ course_days เพื่อดึงข้อมูลครบถ้วน
        $course = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id') // join ตาราง employees เพื่อดึงข้อมูลผู้สอน
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') // join ตาราง enrolls เพื่อดึงจำนวนคนที่จอง
            ->join('course_days', 'courses.id', '=', 'course_days.course_id') // join ตาราง course_days เพื่อดึงข้อมูลวันที่เรียน
            ->join('days', 'course_days.day_id', '=', 'days.id') // join ตาราง days เพื่อดึงข้อมูลวันเรียน
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_status',
                'courses.description',
                'courses.course_sellprice',
                'courses.period',
                'courses.times',
                'courses.start_time',
                'courses.end_time',
                'courses.max_participant',
                'courses.picture_path',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'), // รวมชื่อและนามสกุลผู้สอน
                DB::raw('GROUP_CONCAT(DISTINCT days.name SEPARATOR ", ") as days'), // รวมชื่อวันที่เรียนเป็นสตริง
                DB::raw('COUNT(DISTINCT enrolls.id) as total_booked') // นับจำนวนคนที่จอง
            )
            ->where('courses.id', $id)
            ->groupBy(
                'courses.id', 'courses.course_name', 'courses.course_status', 'courses.description', 'courses.course_sellprice', 'courses.period', 'courses.times', 'courses.start_time', 'courses.end_time', 'courses.max_participant', 'courses.picture_path', 'instructor_name')
            ->first(); // ดึงข้อมูลของคอร์สที่ต้องการ
    
        // ดึงรายชื่อผู้จองคอร์ส
        $participants = DB::table('enrolls')
            ->join('customers', 'enrolls.customer_id', '=', 'customers.id')
            ->select('customers.firstname', 'customers.lastname', 'customers.email', 'customers.phonenum')
            ->where('enrolls.course_id', $id)
            ->get();
    
        // ส่งข้อมูลคอร์สและรายชื่อผู้จองไปที่ view
        return view('admin.admin_coursedetail', compact('course', 'participants'));
    }
    
    // ฟังก์ชันสำหรับแสดงฟอร์มเพิ่มหรือแก้ไขคอร์ส
    public function showCourseForm($id = null){
        $employees = DB::table('employees')->where('employees.role_id', 1); // ดึงข้อมูลเทรนเนอร์ทั้งหมด
        $days = Day::all(); // ดึงข้อมูลวันทั้งหมด

        // ถ้ามี $id ให้ดึงข้อมูลคอร์สมาแก้ไข พร้อมกับข้อมูลวันที่และรูปภาพ
        $course = $id ? Course::with('days')->find($id) : null;

        // ส่งข้อมูลไปยัง view พร้อมกับตรวจสอบว่ากำลังแก้ไขหรือเพิ่มคอร์ส
        return view('admin.admin_addcourse', compact('course', 'employees', 'days'));
    }

    // ฟังก์ชันสำหรับบันทึกข้อมูลคอร์ส (เพิ่มหรือแก้ไข)
    public function storeOrUpdate(Request $request, $id = null){
        // ตรวจสอบว่ามีการแก้ไขหรือเพิ่มคอร์สใหม่
        $course = $id ? Course::find($id) : new Course();

        // ตั้งค่าคุณสมบัติของคอร์ส
        $course->course_name = $request->course_name;
        $course->start_time = $request->start_time;
        $course->end_time = $request->end_time;
        $course->course_cost = $request->course_cost;
        $course->course_sellprice = $request->course_sellprice;
        $course->period = $request->period;
        $course->times = $request->times;
        $course->employee_id = $request->employee_id;
        $course->max_participant = $request->max_participant;
        $course->description = $request->description;
        $course->course_status = $request->course_status ?? '1'; // ถ้าไม่เลือกสถานะให้ใช้ค่าเริ่มต้น

        // บันทึกวันที่เลือก (กรณีมีการเลือกวัน)
        if ($request->days) {
            $course->days()->sync($request->days); // อัปเดตข้อมูลวันที่
        }
        // ตรวจสอบการอัปโหลดไฟล์รูปภาพ
        if ($request->hasFile('picture_path')) {
            // ลบรูปเก่าก่อนถ้ามี
            if ($course->picture_path && Storage::exists('public/' . $course->picture_path)) {
                Storage::delete('public/' . $course->picture_path);
            }

            // อัปโหลดรูปภาพใหม่
            $file = $request->file('picture_path');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filePath = $file->storeAs('course_pictures', $fileName . '.' . $extension, 'public');

            // บันทึกเส้นทางรูปภาพใหม่ในคอร์ส
            $course->picture_path = $filePath;
        }
        $course->save();

        return redirect('/admin/course');
    }

    public function delete(Request $request){
        $course = Course::find($request->course_id);
        if ($course) {
            $course->delete();
        }
        return redirect('admin/course');
    }
}
