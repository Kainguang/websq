<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Employee;
use App\Models\Course_pic;
use App\Models\Day; // ดึง Model ของ Day เพื่อใช้ดึงข้อมูลวันจากฐานข้อมูล // ดึง Model ของ Day เพื่อใช้ดึงข้อมูลวันจากฐานข้อมูล
use Illuminate\Support\Facades\DB;

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
        ->select(
            'courses.id', 
            'courses.course_name', 
            'courses.course_sellprice', 
            'courses.start_time', 
            'courses.end_time', 
            DB::raw('COUNT(enrolls.id) as total_booked')
        )
        ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time')
        ->whereNull('courses.deleted_at')
        ->get();

        // ส่งข้อมูลไปยังหน้า views
        return view('admin.admin_course', compact('totalCourses', 'totalRevenue', 'averageRevenue', 'coursesData', 'courses'));
    }


    // // ฟังก์ชันสำหรับแสดงฟอร์มเพิ่มคอร์ส
    // public function showAddCourseForm(){
    //     // ดึงข้อมูลวันทั้งหมดจากตาราง days
    //     $days = Day::all();
    //     $employees = DB::table('employees')->where('role_id','1')->get();
    //     return view('admin.admin_addcourse', compact('days','employees')); // ส่งข้อมูลวันไปยัง view
    // }

    public function showCourseDetails($id){
    // Join ตาราง courses, employees, course_pics, days, และ course_days เพื่อดึงข้อมูลครบถ้วน
    $course = DB::table('courses')
        ->join('employees', 'courses.employee_id', '=', 'employees.id') // join ตาราง employees เพื่อดึงข้อมูลผู้สอน
        ->join('course_pics', 'courses.id', '=', 'course_pics.course_id') // join ตาราง course_pics เพื่อดึงรูปภาพ
        ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') // join ตาราง enrolls เพื่อดึงจำนวนคนที่จอง
        ->join('course_days', 'courses.id', '=', 'course_days.course_id') // join ตาราง course_days เพื่อดึงข้อมูลวันที่เรียน
        ->join('days', 'course_days.day_id', '=', 'days.id') // join ตาราง days เพื่อดึงข้อมูลวันเรียน
        ->select(
            'courses.id',
            'courses.course_name',
            'courses.description',
            'courses.course_sellprice',
            'courses.period',
            'courses.times',
            'courses.start_time',
            'courses.end_time',
            'courses.max_participant',
            'course_pics.picture',
            DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'), // รวมชื่อและนามสกุลผู้สอน
            DB::raw('GROUP_CONCAT(DISTINCT days.name SEPARATOR ", ") as days'), // รวมชื่อวันที่เรียนเป็นสตริง
            DB::raw('COUNT(DISTINCT enrolls.id) as total_booked') // นับจำนวนคนที่จอง
        )
        ->where('courses.id', $id)
        ->groupBy('courses.id', 'courses.course_name', 'courses.description', 'courses.course_sellprice', 'courses.period', 'courses.times', 'courses.start_time', 'courses.end_time', 'courses.max_participant', 'course_pics.picture', 'instructor_name' )
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

    // public function store(Request $request){
    //     // สร้างคอร์สใหม่และบันทึกลงในตาราง courses
    //     $new_course = new Course;
    //     $new_course->course_name = $request->course_name;
    //     $new_course->start_time = $request->start_time;
    //     $new_course->end_time = $request->end_time;
    //     $new_course->course_cost = $request->course_cost;
    //     $new_course->course_sellprice = $request->course_sellprice;
    //     $new_course->period = $request->period;
    //     $new_course->times = $request->times;
    //     $new_course->max_participant = $request->max_participant;
    //     $new_course->description = $request->description;
    //     $new_course->course_status = $request->course_status ?? '1';
    //     $new_course->employee_id = $request->employee_id; // เพิ่มบรรทัดนี้เพื่อบันทึก employee_id

    //     // บันทึกข้อมูลคอร์สหลังจากเตรียมข้อมูลทั้งหมดแล้ว
    //     $new_course->save();
        
    //     // บันทึกข้อมูลวันในตาราง course_days (ถ้ามีการเลือกวัน)
    //     if ($request->days) {
    //         $new_course->days()->attach($request->days);
    //     }

    //     // เปลี่ยนเส้นทางไปที่หน้าคอร์สหลังจากบันทึกเสร็จ
    //     return redirect('/admin/course');
    // }

    // ฟังก์ชันสำหรับแสดงฟอร์มเพิ่มหรือแก้ไขคอร์ส
    public function showCourseForm($id = null)
    {
        $employees = Employee::all(); // ดึงข้อมูลเทรนเนอร์ทั้งหมด
        $days = Day::all(); // ดึงข้อมูลวันทั้งหมด

        // ถ้ามี $id ให้ดึงข้อมูลคอร์สมาแก้ไข
        $course = $id ? Course::with('pictures')->find($id) : null;

        // ส่งข้อมูลไปยัง view พร้อมกับตรวจสอบว่ากำลังแก้ไขหรือเพิ่มคอร์ส
        return view('admin.admin_addcourse', compact('course', 'employees', 'days'));
    }

    // ฟังก์ชันสำหรับบันทึกข้อมูลคอร์ส (เพิ่มหรือแก้ไข)
    public function storeOrUpdate(Request $request, $id = null)
    {
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

        // บันทึกข้อมูลคอร์สลงฐานข้อมูล
        $course->save();

        // บันทึกวันที่เลือก (กรณีมีการเลือกวัน)
        if ($request->days) {
            $course->days()->sync($request->days); // อัปเดตข้อมูลวันที่
        }

        if ($request->hasFile('course_pics')) {
            $file = $request->file('course_pics'); // รับไฟล์เดียว
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filePath = $file->storeAs('course_pictures', $fileName . '.' . $extension, 'public');
            
            // บันทึกรูปภาพที่อัปโหลดในตาราง CoursePic
            $coursePic = new Course_pic;
            $coursePic->course_id = $course->id;
            $coursePic->picture_path = $filePath;
            $coursePic->save();
        }
        return redirect('/admin/course');
    }

    public function delete(Request $request){
        $course = Course::find($request->course_id);
        if ($course) {
            $course->delete();
        }
        return redirect('admin/course');
    }

    // // ฟังก์ชันสำหรับแสดงหน้าแก้ไขคอร์ส
    // public function edit($id)
    // {
    //     $course = Course::findOrFail($id);
    //     $days = Day::all(); // ดึงข้อมูลวันทั้งหมดเพื่อนำมาใช้ในฟอร์มแก้ไข
    //     return view('admin.admin_editcourse', compact('course', 'days')); // ส่งข้อมูล course และ days ไปยัง view
    // }

    // // ฟังก์ชันสำหรับบันทึกการแก้ไขคอร์ส
    // public function update(Request $request, $id)
    // {
    //     // Validate input
    //     $request->validate([
    //         'courseName' => 'required|string|max:255',
    //         'startTime' => 'required',
    //         'endTime' => 'required',
    //         'price' => 'required|numeric',
    //         'sessions' => 'required|integer',
    //         'trainerFirstname' => 'required|string|max:255',
    //         'trainerLastname' => 'required|string|max:255',
    //         'maxParticipant' => 'required|integer',
    //         'description' => 'required|string',
    //         'days' => 'required|array',
    //     ]);

    //     // Update course
    //     $course = Course::findOrFail($id);
    //     $course->update([
    //         'course_name' => $request->courseName,
    //         'start_time' => $request->startTime,
    //         'end_time' => $request->endTime,
    //         'price' => $request->price,
    //         'sessions' => $request->sessions,
    //         'trainer_firstname' => $request->trainerFirstname,
    //         'trainer_lastname' => $request->trainerLastname,
    //         'max_participant' => $request->maxParticipant,
    //         'description' => $request->description,
    //     ]);

    //     // Sync days with the course (อัปเดตข้อมูลวันในตาราง course_days)
    //     $course->days()->sync($request->days);

    //     return redirect()->route('admin_course')->with('success', 'คอร์สถูกแก้ไขเรียบร้อยแล้ว');
    // }

}
