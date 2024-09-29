<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function showDashboard()
    {
        // ดึงข้อมูลคอร์สทั้งหมด
        $totalCourses = Course::count(); 
        
        // ดึงจำนวนเทรนเนอร์ทั้งหมด (สมมติ role_id = 1 คือเทรนเนอร์)
        $totalEmployees = Employee::where('role_id', 1)->count(); 
        
        // ดึงรายได้สุทธิจากการสมัครคอร์ส (สมมติว่า enroll มีฟิลด์ amount หรือ price)
        $totalRevenue = DB::table('enrolls')->sum('totalprice'); 
        
        // ดึงข้อมูลจำนวนผู้เข้าร่วมต่อคอร์ส
        $courseNames = Course::pluck('course_name'); 
        $studentsPerCourse = DB::table('enrolls')
                ->join('courses', 'enrolls.course_id', '=', 'courses.id')
                ->select('courses.course_name', DB::raw('COUNT(enrolls.customer_id) as student_count'))
                ->groupBy('courses.course_name')
                ->pluck('student_count', 'courses.course_name');

        
        // ดึงข้อมูลบิล
        $approvedBills = DB::table('enrolls')
            ->join('customers', 'enrolls.customer_id', '=', 'customers.id')
            ->join('courses', 'enrolls.course_id', '=', 'courses.id')
            ->select('enrolls.id', 'customers.firstname', 'customers.lastname', 'courses.course_name', 'enrolls.payment_status', 'enrolls.course_status')
            ->where('enrolls.payment_status', '=', 1) // เงื่อนไขที่แสดงบิลที่อนุมัติแล้ว
            ->get();


        return view('admin.admin_dashboard', compact('totalCourses', 'totalEmployees', 'totalRevenue', 'courseNames', 'studentsPerCourse', 'approvedBills'));
    }


    public function allCourse()
    {
        // ดึงจำนวนคอร์สทั้งหมดจากตาราง courses
        return DB::table('courses')->count();
    }

    public function allTrainner()
    {
        // ดึงข้อมูลจำนวนเทรนเนอร์จากตาราง employees (สมมติ role_id 1 คือเทรนเนอร์)
        return DB::table('employees')->where('role_id', 1)->count();
    }

    public function allRevenue()
    {
        // JOIN ตาราง course_course_bills กับ courses ตามเงื่อนไขที่เหมาะสม
        return DB::table('course_course_bills')
                ->join('courses', 'course_course_bills.course_id', '=', 'courses.id')
                ->selectRaw('SUM(course_course_bills.price * course_course_bills.amount) - SUM(courses.course_cost) as total_revenue')
                ->value('total_revenue');
    }

    public function allSalary()
    {
        return DB::table('employees')->where('role_id', 1)->sum('salary');
    }

    public function allcoursesname()
    {
        // ดึงข้อมูลชื่อคอร์สทั้งหมดจากตาราง courses
        return DB::table('courses')->select('id', 'course_name')->get();
    }
    public function allcoursechart()
    {
        // ดึงข้อมูลจำนวนผู้สมัครของแต่ละคอร์ส
        return DB::table('course_course_bills')
                ->join('courses', 'course_course_bills.course_id', '=', 'courses.id')
                ->select('courses.course_name', DB::raw('SUM(course_course_bills.amount) as total_participants'))
                ->groupBy('courses.course_name')
                ->orderBy(DB::raw("SUBSTRING_INDEX(courses.course_name, ' ', 1)"))
                ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(courses.course_name, ' ', -1) AS UNSIGNED)"))
                ->get();
    }

    public function averageRevenuePerCourse()
    {
        return DB::table('course_course_bills')
                ->join('courses', 'course_course_bills.course_id', '=', 'courses.id')
                ->selectRaw('AVG(course_course_bills.price * course_course_bills.amount) as avg_revenue')
                ->value('avg_revenue');
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
            ->orderBy('employees.id')
            ->get();
    
        return $trainers;
    }    
    
    public function allTrainerchart()
    {
        // ดึงข้อมูลจากตาราง employees, courses และ course_course_bills
        return DB::table('employees')
                ->join('courses', 'employees.id', '=', 'courses.employee_id')
                ->join('course_course_bills', 'courses.id', '=', 'course_course_bills.course_id')
                ->select('employees.firstname as Trainer', DB::raw('SUM(course_course_bills.amount) as Total_Students'))
                ->groupBy('employees.firstname')
                ->get();
    }
    public function delete($id)
    {
        // ลบข้อมูลบิลตาม ID
        DB::table('bills')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'บิลถูกลบเรียบร้อยแล้ว');
    }
      
}