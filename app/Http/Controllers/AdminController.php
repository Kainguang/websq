<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showAll()
    {
        // เรียกข้อมูลที่จำเป็นทั้งหมดจากฟังก์ชัน allDashboardchart()
        $dashboardData = $this->allDashboardchart();

        // ส่งข้อมูลทั้งหมดไปยัง view 'admin_dashboard'
        return view("admin.admin_dashboard", [
            'totalCourses' => $dashboardData['totalCourses'],
            'totalEmployees' => $dashboardData['totalEmployees'],
            'totalRevenue' => $dashboardData['totalRevenue'],
            'bills' => $this->allbill(),
            'courseNames' => $dashboardData['courseNames'],
            'revenuePerCourse' => $dashboardData['revenuePerCourse'],
            'studentsPerCourse' => $dashboardData['studentsPerCourse'],
        ]);
    }
    public function showbill()
    {
        $bills = $this->allbill();
        
        return view("admin.admin_bill", compact('bills'));
    }


    public function showcourse()
    {
        $totalCourses = $this->allCourse(); // ดึงจำนวนคอร์สทั้งหมด
        $totalEmployees = $this->allTrainner(); // ดึงจำนวนเทรนเนอร์ทั้งหมด
        $totalRevenue = $this->allRevenue();
        $courses = $this->allcoursesname(); // ดึงข้อมูลคอร์สทั้งหมด
        $coursesData = $this->allcoursechart(); // ดึงข้อมูลกราฟคอร์ส
        $averageRevenue = $this->averageRevenuePerCourse();

        return view("admin.admin_course", compact('totalCourses', 'totalEmployees', 'totalRevenue', 'courses', 'coursesData', 'averageRevenue'));
    }

    public function showtrainer()
    {
        $totalCourses = $this->allCourse();
        $totalEmployees = $this->allTrainner();
        $totalSalaries = $this->allSalary();
        $trainers = $this->allTrainerList();
        $trainerStudentsCount = $this->allTrainerchart();

        // Debug เพื่อตรวจสอบว่ามีข้อมูลหรือไม่
        if ($trainerStudentsCount->isEmpty()) {
            return redirect()->back()->withErrors('ไม่มีข้อมูลจำนวนนักเรียนที่เทรนเนอร์สอน');
        }

        return view("admin.admin_trainer", compact('totalCourses', 'totalEmployees', 'totalSalaries', 'trainers', 'trainerStudentsCount'));
    }

    public function allDashboardchart()
    {
        // ดึงจำนวนคอร์สทั้งหมด
        $totalCourses = DB::table('courses')->count();

        // ดึงจำนวนเทรนเนอร์ทั้งหมด
        $totalEmployees = DB::table('employees')->where('role_id', 1)->count();
        // ดึงรายได้ทั้งหมด
        $totalRevenue = DB::table('course_course_bills')
                        ->join('courses', 'course_course_bills.course_id', '=', 'courses.id')
                        ->selectRaw('SUM(course_course_bills.price * course_course_bills.amount) - SUM(courses.course_cost) as total_revenue')
                        ->value('total_revenue');
        // ดึงรายชื่อคอร์ส
        $courseNames = DB::table('courses')->pluck('course_name');

        // ดึงรายได้ต่อคอร์ส
        $revenuePerCourse = DB::table('course_course_bills')
                            ->join('courses', 'course_course_bills.course_id', '=', 'courses.id')
                            ->groupBy('courses.course_name')
                            ->select('courses.course_name', DB::raw('SUM(course_course_bills.price * course_course_bills.amount) as revenue'))
                            ->pluck('revenue', 'courses.course_name');

        // ดึงจำนวนนักเรียนต่อคอร์ส
        $studentsPerCourse = DB::table('course_course_bills')
                            ->join('courses', 'course_course_bills.course_id', '=', 'courses.id')
                            ->groupBy('courses.course_name')
                            ->select('courses.course_name', DB::raw('SUM(course_course_bills.amount) as total_students'))
                            ->pluck('total_students', 'courses.course_name');

        // รวมข้อมูลทั้งหมดใน array
        return [
            'totalCourses' => $totalCourses,
            'totalEmployees' => $totalEmployees,
            'totalRevenue' => $totalRevenue,
            'courseNames' => $courseNames,
            'revenuePerCourse' => $revenuePerCourse,
            'studentsPerCourse' => $studentsPerCourse,
        ];
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

    public function allTrainerList()
    {
        return DB::table('employees')
                ->where('role_id', 1)
                ->select('id', 'firstname', 'lastname', 'email', 'phonenum as phone')
                ->get();
    }

    public function allbill()
    {
        // JOIN ตาราง customer, course_bills, และ course_course_bills เพื่อดึงข้อมูล
        return DB::table('course_bills')
                ->join('customers', 'course_bills.customer_id', '=', 'customers.id')
                ->join('course_course_bills', 'course_bills.id', '=', 'course_course_bills.course_bill_id')
                ->join('courses', 'course_course_bills.course_id', '=', 'courses.id')
                ->select('customers.firstname', 'customers.lastname', 'courses.course_name')
                ->get();
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
}

