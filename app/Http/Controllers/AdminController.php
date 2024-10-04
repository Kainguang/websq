<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showDashboard(){
        // ดึงข้อมูลคอร์สทั้งหมด
        $totalCourses = Course::count(); 
        
        // ดึงจำนวนเทรนเนอร์ทั้งหมด
        $totalEmployees = Employee::where('role_id', 1)->count(); 
        
        // ดึงรายได้สุทธิจากการสมัครคอร์ส
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
            ->select('enrolls.id', 'customers.firstname', 'customers.lastname', 'customers.id as customer_id', 'courses.id as course_id', 'courses.course_name', 'enrolls.payment_status', 'enrolls.course_status', 'enrolls.slip_picture', 'enrolls.updated_at') // เพิ่ม customers.id as customer_id
            ->where('enrolls.payment_status', '=', 1)
            ->orderBy('enrolls.updated_at', 'desc')
            ->get();    

        $cancelledBills = DB::table('enrolls')
            ->join('customers', 'enrolls.customer_id', '=', 'customers.id')
            ->join('courses', 'enrolls.course_id', '=', 'courses.id')
            ->select('enrolls.id', 'customers.firstname', 'customers.lastname', 'customers.id as customer_id', 'courses.course_name', 'enrolls.payment_status', 'enrolls.course_status', 'enrolls.slip_picture', 'enrolls.updated_at') // เพิ่ม customers.id as customer_id
            ->where('enrolls.payment_status', '=', 3)
            ->orderBy('enrolls.updated_at', 'desc')
            ->get();
        

        return view('admin.admin_dashboard', compact('totalCourses', 'totalEmployees', 'totalRevenue', 'courseNames', 'studentsPerCourse', 'approvedBills', 'cancelledBills'));
    }

    public function delete($id){
        // ลบข้อมูลบิลตาม ID
        DB::table('bills')->where('id', $id)->delete();
        return redirect('admin/bill');
    }
      
}