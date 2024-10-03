<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Course;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class Admin_TrainerController extends Controller
{
    public function showTrainerDashboard() {
        // จำนวนเทรนเนอร์ทั้งหมด
        $totalEmployees = Employee::where('role_id', '1')->count();
    
        // คิดสองตัวชี้วัดใหม่:
        // 1. จำนวนคอร์สที่มีการสอนโดยเทรนเนอร์ทั้งหมด
        $totalCoursesTaught = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->where('employees.role_id', 1)
            ->count();
    
        // 2. เงินเดือนเฉลี่ยของเทรนเนอร์ทั้งหมด
        $averageSalary = Employee::where('role_id', 1)->avg('salary');

        // ดึงข้อมูลจากตาราง employees
        $alltrainerchart = DB::table('employees')
            ->join('courses', 'employees.id', '=', 'courses.employee_id')
            ->join('enrolls', 'courses.id', '=', 'enrolls.course_id')
            ->select('employees.firstname as Trainer', DB::raw('COUNT(enrolls.id) as Total_Students'))
            ->where('employees.role_id', 1)  // กรองเฉพาะเทรนเนอร์
            ->groupBy('employees.firstname')
            ->get();

        $trainers = $this->getAllTrainersWithSchedule();

        $alltrainers = $this->allTrainers();

        // ส่งข้อมูลไปยังหน้า view
        return view('admin.admin_trainer', compact('totalEmployees', 'totalCoursesTaught', 'averageSalary', 'alltrainerchart', 'trainers', 'alltrainers'));
    }

    public function allTrainers(){
        // ดึงข้อมูลเทรนเนอร์ทั้งหมดพร้อมกับชื่อคอร์สที่สอน
        $alltrainers = DB::table('employees')
            ->where('employees.role_id', 1)
            ->whereNull('employees.deleted_at')
            ->get();
    
        return $alltrainers;
    }
    

    public function getAllTrainersWithSchedule()
    {
        // ดึงข้อมูลเทรนเนอร์พร้อมกับตารางเวลา
        $trainers = DB::table('employees')
            ->join('courses', 'employees.id', '=', 'courses.employee_id')  // join ตาราง courses
            ->join('course_days', 'courses.id', '=', 'course_days.course_id')  // join ตาราง course_days
            ->join('days', 'course_days.day_id', '=', 'days.id')  // join ตาราง days
            ->where('employees.role_id', 1)  // เพิ่มเงื่อนไขให้ดึงเฉพาะเทรนเนอร์
            ->select(
                'employees.id',
                'employees.firstname',
                'employees.lastname',
                'employees.email',
                'employees.phonenum as phone',
                'courses.course_name as course',
                'courses.start_time',
                'courses.end_time',
                'days.name as day_name'
            )
            ->whereNull('employees.deleted_at')  // เงื่อนไขเพื่อดึงเฉพาะที่ไม่ถูกลบ
            ->orderBy('employees.id')
            ->get();
    
        return $trainers;
    }
        // ฟังก์ชันสำหรับแสดงฟอร์มเพิ่มหรือแก้ไขเทรนเนอร์
    public function showTrainerForm($id = null){
        // ถ้ามี $id ให้ดึงข้อมูลเทรนเนอร์มาแก้ไข
        $trainer = $id ? Employee::find($id) : null;
    
        // ส่งข้อมูลไปยัง view พร้อมกับตรวจสอบว่ากำลังแก้ไขหรือเพิ่มเทรนเนอร์
        return view('admin.admin_addtrainer', compact('trainer'));
    }
    
        // ฟังก์ชันสำหรับบันทึกข้อมูลเทรนเนอร์ (เพิ่มหรือแก้ไข)
    public function storeOrUpdate(Request $request, $id = null){
        // ถ้ามี $id ให้แก้ไขข้อมูลเทรนเนอร์
        $trainer = $id ? Employee::find($id) : new Employee();
    
        // ตั้งค่าคุณสมบัติของเทรนเนอร์
        $trainer->firstname = $request->firstname;
        $trainer->lastname = $request->lastname;
        $trainer->email = $request->email;
        $trainer->phonenum = $request->phonenum;
        $trainer->address = $request->address;
        $trainer->birthdate = $request->birthdate;
        $trainer->weight = $request->weight;
        $trainer->height = $request->height;
        $trainer->gender = $request->gender;
        $trainer->salary = $request->salary;
        // ตั้งค่า role_id เป็น 1 โดยอัตโนมัติสำหรับเทรนเนอร์
        $trainer->role_id = 1;
    
        // เฉพาะในกรณีที่เป็นการเพิ่มลูกค้าใหม่ (ไม่มี $id)
        if (!$id) {
            // เข้ารหัสรหัสผ่านด้วย Hash::make()
            $trainer->password = Hash::make($request->password);
        }

        // ตรวจสอบการอัปโหลดไฟล์รูปภาพ
        if ($request->hasFile('profile_picture')) {
            // ลบรูปเก่าก่อนถ้ามี
            if ($trainer->profile_picture && Storage::exists('public/' . $trainer->profile_picture)) {
                Storage::delete('public/' . $trainer->profile_picture);
            }

                // อัปโหลดรูปภาพใหม่
            $file = $request->file('profile_picture');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filePath = $file->storeAs('trainer_pictures', $fileName . '.' . $extension, 'public');

            // บันทึกเส้นทางรูปภาพใหม่ในคอร์ส
            $trainer->profile_picture = $filePath;
        }            // บันทึกข้อมูลลูกค้าลงฐานข้อมูล
        $trainer->save();
    
        return redirect('/admin/trainer');
    }

    public function delete(Request $request){
        $trainer = Employee::find($request->trainer_id);
        if ($trainer) {
            $trainer->delete();
        }
        return redirect('admin/trainer');
    }

}
