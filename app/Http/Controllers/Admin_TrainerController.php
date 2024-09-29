<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Course;
use App\Models\Role;
// use Illuminate\Support\Facades\Hash; // ใช้สำหรับเข้ารหัสรหัสผ่าน
use Illuminate\Support\Facades\DB;

class Admin_TrainerController extends Controller
{
    public function showTrainerDashboard() {
        // จำนวนเทรนเนอร์ทั้งหมด
        $totalEmployees = Employee::where('role_id', '1')->count();
    
        // คิดสองตัวชี้วัดใหม่:
        // 1. จำนวนคอร์สที่มีการสอนโดยเทรนเนอร์ทั้งหมด
        $totalCoursesTaught = DB::table('courses')->count();
    
        // 2. เงินเดือนเฉลี่ยของเทรนเนอร์ทั้งหมด
        $averageSalary = Employee::avg('salary');
    
        // นับจำนวนจำนวนนักเรียนของแต่ละเทรนเนอร์ (แสดงในกราฟ)
        // $trainerStudentsCount = DB::table('employees')
        //     ->join('courses', 'employees.id', '=', 'courses.employee_id')
        //     ->select('employees.firstname as Trainer', DB::raw('COUNT(courses.id) as Total_Students'))
        //     ->groupBy('employees.firstname')
        //     ->get();

        // ดึงข้อมูลจากตาราง employees
        $alltrainerchart = DB::table('employees')
        ->join('courses', 'employees.id', '=', 'courses.employee_id')
        ->join('enrolls', 'courses.id', '=', 'enrolls.course_id') // เปลี่ยนจาก course_course_bills เป็น enrolls
        ->select('employees.firstname as Trainer', DB::raw('COUNT(enrolls.id) as Total_Students')) // ใช้ COUNT เพื่อดึงจำนวนนักเรียนที่ลงทะเบียน
        ->groupBy('employees.firstname')
        ->get();

        $trainers = $this->getAllTrainersWithSchedule();

        // ส่งข้อมูลไปยังหน้า view
        return view('admin.admin_trainer', compact('totalEmployees', 'totalCoursesTaught', 'averageSalary', 'alltrainerchart', 'trainers'));
    }

    public function getAllTrainersWithSchedule()
    {
        // ดึงข้อมูลเทรนเนอร์พร้อมกับตารางเวลา
        $trainers = DB::table('employees')
            ->join('courses', 'employees.id', '=', 'courses.employee_id')  // join ตาราง courses
            ->join('course_days', 'courses.id', '=', 'course_days.course_id')  // join ตาราง course_days
            ->join('days', 'course_days.day_id', '=', 'days.id')  // join ตาราง days
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
        public function showTrainerForm($id = null)
        {
            $courses = Course::all(); // ดึงข้อมูลคอร์สทั้งหมด
            $roles = Role::all(); // ดึงข้อมูลตำแหน่งทั้งหมด
    
            // ถ้ามี $id ให้ดึงข้อมูลเทรนเนอร์มาแก้ไข
            $trainer = $id ? Employee::find($id) : null;
    
            // ส่งข้อมูลไปยัง view พร้อมกับตรวจสอบว่ากำลังแก้ไขหรือเพิ่มเทรนเนอร์
            return view('admin.admin_addtrainer', compact('courses', 'roles', 'trainer'));
        }
    
        // ฟังก์ชันสำหรับบันทึกข้อมูลเทรนเนอร์ (เพิ่มหรือแก้ไข)
        public function storeOrUpdate(Request $request, $id = null)
        {
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
            $trainer->role_id = $request->role_id;
    
            // บันทึกรูปโปรไฟล์ (ถ้ามี)
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $filePath = $file->store('profile_pictures', 'public');
                $trainer->profile_picture = $filePath;
            }
    
            // บันทึกข้อมูลเทรนเนอร์ลงฐานข้อมูล
            $trainer->save();
    
            // อัปเดต employee_id ในตาราง courses
            DB::table('courses')
                ->where('id', $request->class)
                ->update(['employee_id' => $trainer->id]);
    
            return redirect('/admin/trainer');
        }

    // // ฟังก์ชันสำหรับแสดงฟอร์มเพิ่มเทรนเนอร์
    // public function showAddTrainerForm(){
    //     // ดึงข้อมูลคอร์สจากตาราง courses
    //     $courses = DB::table('courses')->get();
        
    //     // ดึงข้อมูลตำแหน่งจากตาราง roles
    //     $roles = DB::table('roles')->get();
    //     return view('admin.admin_addtrainer', compact('courses', 'roles')); // แสดงหน้าเพิ่มเทรนเนอร์
    // }

    // // ฟังก์ชันสำหรับบันทึกข้อมูลเทรนเนอร์ใหม่
    // public function store(Request $request){
    //     // สร้างข้อมูลเทรนเนอร์ใหม่
    //     $new_trainer = new Employee();
    //     $new_trainer->firstname = $request->firstname;
    //     $new_trainer->lastname = $request->lastname;
    //     $new_trainer->email = $request->email;
    //     // $new_trainer->password = Hash::make($request->password); // เข้ารหัสรหัสผ่าน
    //     $new_trainer->phonenum = $request->phonenum;
    //     $new_trainer->address = $request->address;
    //     $new_trainer->birthdate = $request->birthdate;
    //     $new_trainer->weight = $request->weight;
    //     $new_trainer->height = $request->height;
    //     $new_trainer->gender = $request->gender;
    //     $new_trainer->salary = $request->salary;
    //     $new_trainer->role_id = $request->role_id;

    //     // บันทึกรูปโปรไฟล์ (หากมีการอัพโหลด)
    //     if ($request->hasFile('profile_picture')) {
    //         $file = $request->file('profile_picture');
    //         // $filename = $file->getClientOriginalName();
    //         $filePath = $file->store('profile_pictures','public');
    //         $new_trainer->profile_picture = $filePath;
    //     }
    //     $new_trainer->save(); // บันทึกข้อมูลลงในฐานข้อมูล

    //     // หลังจากบันทึกเทรนเนอร์ใหม่แล้ว อัปเดต employee_id ในตาราง courses
    //     DB::table('courses')
    //         ->where('id', $request->class) // อ้างอิง course_id ที่ถูกเลือก
    //         ->update(['employee_id' => $new_trainer->id]); // อัปเดต employee_id ด้วย id ของเทรนเนอร์ที่เพิ่มใหม่

    //     return redirect('/admin/trainer');
    // }

    // public function edit($id){
    //     // ดึงข้อมูลเทรนเนอร์ที่ต้องการแก้ไข
    //     $trainer = Employee::find($id);
    //     $courses = Course::all();  // คอร์สทั้งหมด
    //     $roles = Role::all();  // ตำแหน่งทั้งหมด

    //     // ส่งข้อมูลไปที่ View ของฟอร์มแก้ไข
    //     return view('admin.edit_trainer', compact('trainer', 'courses', 'roles'));
    // }

    // // ฟังก์ชันสำหรับบันทึกข้อมูลเทรนเนอร์ใหม่
    // public function update(Request $request){
    //     // สร้างข้อมูลเทรนเนอร์ใหม่
    //     $trainer = Employee::find($request->id);
    //     $trainer->firstname = $request->firstname;
    //     $trainer->lastname = $request->lastname;
    //     $trainer->email = $request->email;
    //     // $trainer->password = Hash::make($request->password); // เข้ารหัสรหัสผ่าน
    //     $trainer->phonenum = $request->phonenum;
    //     $trainer->address = $request->address;
    //     $trainer->birthdate = $request->birthdate;
    //     $trainer->weight = $request->weight;
    //     $trainer->height = $request->height;
    //     $trainer->gender = $request->gender;
    //     $trainer->salary = $request->salary;
    //     $trainer->role_id = $request->role_id;

    //     // บันทึกรูปโปรไฟล์ (หากมีการอัพโหลด)
    //     if ($request->hasFile('profile_picture')) {
    //         $file = $request->file('profile_picture');
    //         // $filename = $file->getClientOriginalName();
    //         $filePath = $file->store('profile_pictures','public');
    //         $trainer->profile_picture = $filePath;
    //     }
    //     $trainer->save(); // บันทึกข้อมูลลงในฐานข้อมูล

    //     // หลังจากบันทึกเทรนเนอร์ใหม่แล้ว อัปเดต employee_id ในตาราง courses
    //     DB::table('courses')
    //         ->where('id', $request->class) // อ้างอิง course_id ที่ถูกเลือก
    //         ->update(['employee_id' => $trainer->id]); // อัปเดต employee_id ด้วย id ของเทรนเนอร์ที่เพิ่มใหม่

    //     return redirect('/admin/trainer');
    // }

    public function delete(Request $request){
        $trainer = Employee::find($request->trainer_id);
        if ($trainer) {
            $trainer->delete();
        }
        return redirect('admin/trainer');
    }
}
