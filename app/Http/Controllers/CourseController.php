<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function showClass() {
        $courses = Course::all();
        $filteredCourses = $this->filterCourses($courses);
        $popularCourses = $this->showPopularCourses();

        return view('user.index', compact( 'courses','filteredCourses', 'popularCourses'));
    }

    public function filterCourses($courses) {
        // ดึงข้อมูลจากตาราง courses โดยใช้ picture_path ในตาราง courses แทน
        $courses = DB::table('courses')
            ->select('courses.course_name', 'courses.picture_path') // ใช้ picture_path จากตาราง courses
            ->where(function($query) {
                $query->where('courses.course_name', 'like', 'โยคะ%')
                    ->orWhere('courses.course_name', 'like', 'เต้น%')
                    ->orWhere('courses.course_name', 'like', 'มวยไทย%')
                    ->orWhere('courses.course_name', 'like', 'ซุมบา%');
            })
            ->groupBy('courses.course_name', 'courses.picture_path') // เพิ่มการจัดกลุ่มที่ picture_path
            ->get();
    
        // กรองเฉพาะประเภทหลัก
        $filteredCourses = $courses->map(function ($course) {
            if (strpos($course->course_name, 'โยคะ') !== false) {
                $course->course_name = 'โยคะ';
                $course->course_name_en = 'yoga';
                $course->order = 1;
            } elseif (strpos($course->course_name, 'เต้น') !== false) {
                $course->course_name = 'เต้น';
                $course->course_name_en = 'dance';
                $course->order = 2;
            } elseif (strpos($course->course_name, 'มวยไทย') !== false) {
                $course->course_name = 'มวยไทย';
                $course->course_name_en = 'muaythai';
                $course->order = 3;
            } elseif (strpos($course->course_name, 'ซุมบา') !== false) {
                $course->course_name = 'ซุมบา';
                $course->course_name_en = 'zumba';
                $course->order = 4;
            }
            return $course;
        });
    
        // เรียงลำดับตามค่า 'order' และใช้ unique เพื่อกรองไม่ให้แสดงซ้ำ
        return $filteredCourses->unique('course_name_en')->sortBy('order')->values();
    }

    public function showPopularCourses() {
        // ค้นหาคอร์สที่ได้รับความนิยมสูงสุด โดยใช้ picture_path จากตาราง courses
        $popularCourses = DB::table('courses')
            ->join('enrolls', 'courses.id', '=', 'enrolls.course_id')
            ->select('courses.course_name', DB::raw('COUNT(enrolls.id) as total_participants'), 'courses.picture_path') // ใช้ picture_path จากตาราง courses
            ->groupBy('courses.id', 'courses.course_name', 'courses.picture_path')
            ->orderBy('total_participants', 'desc') // เรียงลำดับตามยอดรวมของผู้จองทั้งหมด
            ->limit(2) // แสดงคอร์สยอดนิยมสูงสุด 2 คอร์ส
            ->get();
        
        return $popularCourses;
    }
    
    public function showCoursesTime() {
        // ดึงข้อมูลคอร์สช่วงเช้า
        $morningCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id') // เชื่อมกับ course_days
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') // Join กับตาราง enrolls เพื่อดึงข้อมูลจำนวนคนที่จองโดยตรง
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times', // จำนวนครั้งต่อสัปดาห์
                'courses.max_participant',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'),
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
                'courses.picture_path' // ใช้ picture_path จากตาราง courses
            )
            ->whereTime('courses.start_time', '>=', '09:00:00')
            ->whereTime('courses.start_time', '<', '12:00:00') // กรองช่วงเช้า
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.period', 'employees.firstname', 'employees.lastname', 'courses.picture_path')
            ->get();
    
        // ดึงข้อมูลคอร์สช่วงบ่าย (แบบเดียวกับช่วงเช้า)
        $afternoonCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id') // เชื่อมกับ course_days
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id')
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times', // จำนวนครั้งต่อสัปดาห์
                'courses.max_participant',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'),
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
                'courses.picture_path' // ใช้ picture_path จากตาราง courses
            )
            ->whereTime('courses.start_time', '>=', '13:00:00')
            ->whereTime('courses.start_time', '<', '16:00:00') // กรองช่วงบ่าย
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.period', 'employees.firstname', 'employees.lastname', 'courses.picture_path')
            ->get();
        
        return view('user.class_time', compact('morningCourses', 'afternoonCourses'));
    }
    
    public function showCoursesGender() {
        // ครูผู้สอนเพศหญิง
        $femaleInstructors = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id')
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') // Join กับตาราง enrolls เพื่อดึงข้อมูลจำนวนคนที่จองโดยตรง
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times',
                'courses.max_participant',
                'courses.description',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'),
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
                'courses.picture_path'
            )
            ->where('employees.gender', 'หญิง')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'courses.picture_path')
            ->get();
    
        // ครูผู้สอนเพศชาย
        $maleInstructors = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id')
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') // Join กับตาราง enrolls เพื่อดึงข้อมูลจำนวนคนที่จองโดยตรง
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times',
                'courses.max_participant',
                'courses.description',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'),
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
                'courses.picture_path'
            )
            ->where('employees.gender', 'ชาย')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'courses.picture_path')
            ->get();
    
        return view('user.class_gender', compact('femaleInstructors', 'maleInstructors'));
    }
    
    public function showYoga() {
        $yogaCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id')
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') 
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times',
                'courses.max_participant',
                'courses.description',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'),
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
                'courses.picture_path' // ใช้ picture_path จากตาราง courses
            )
            ->where('courses.course_name', 'like', 'โยคะ%')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'courses.picture_path')
            ->get();
    
        $facilities = $this->showFacilities('โยคะ');
    
        return view('user.yoga', compact('yogaCourses', 'facilities'));
    }
    
    public function showDance() {
        $danceCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id')
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') 
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times',
                'courses.max_participant',
                'courses.description',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'),
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
                'courses.picture_path' // ใช้ picture_path จากตาราง courses
            )
            ->where('courses.course_name', 'like', 'เต้น%')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'courses.picture_path')
            ->get();
    
        $facilities = $this->showFacilities('เต้น');
    
        return view('user.dance', compact('danceCourses', 'facilities'));
    }
    
    public function showMuaythai() {
        $muaythaiCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id')
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') 
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times',
                'courses.max_participant',
                'courses.description',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'),
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
                'courses.picture_path' // ใช้ picture_path จากตาราง courses
            )
            ->where('courses.course_name', 'like', 'มวยไทย%')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'courses.picture_path')
            ->get();
    
        $facilities = $this->showFacilities('มวยไทย');
    
        return view('user.muaythai', compact('muaythaiCourses', 'facilities'));
    }    
    
    public function showZumba() {
        $zumbaCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id')
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id')
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') 
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times',
                'courses.max_participant',
                'courses.description',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'),
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'),
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'),
                'courses.picture_path' // ใช้ picture_path จากตาราง courses
            )
            ->where('courses.course_name', 'like', 'ซุมบา%')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'courses.picture_path')
            ->get();
    
        $facilities = $this->showFacilities('ซุมบา');
    
        return view('user.zumba', compact('zumbaCourses', 'facilities'));
    }    

    public function showFacilities($courseName) {
        // ดึงข้อมูลสิ่งอำนวยความสะดวกที่ไม่ซ้ำและจำกัด 4 รายการ โดยใช้ picture_path จากตาราง facilities
        $facilities = DB::table('facilities')
            ->join('course_facilities', 'facilities.id', '=', 'course_facilities.facility_id') // เชื่อมกับ course_facilities
            ->select('facilities.facility_name', 'facilities.description', 'facilities.picture_path') // ใช้ picture_path จากตาราง facilities
            ->whereIn('course_facilities.course_id', function ($query) use ($courseName) {
                $query->select('id')
                      ->from('courses')
                      ->where('course_name', 'like', $courseName.'%');
            })
            ->distinct()
            ->limit(4)
            ->get();
    
        return $facilities;
    }
}