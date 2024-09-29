<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function showClass() {
        $courses = Course::all();
        $filteredCourses = $this->filterCourses($courses);
        $popularCourses = $this->showPopularCourses();

        return view('user.index', compact( 'courses','filteredCourses', 'popularCourses'));
    }

    public function filterCourses($courses) {
        // ดึงข้อมูลจากฐานข้อมูล โดยกรองเฉพาะประเภทหลัก
    $courses = DB::table('courses')
    ->join('course_pics', 'courses.id', '=', 'course_pics.course_id')
    ->select('courses.course_name', DB::raw('MAX(course_pics.picture) as picture'))
    ->where(function($query) {
        $query->where('courses.course_name', 'like', 'yoga%')
              ->orWhere('courses.course_name', 'like', 'dance%')
              ->orWhere('courses.course_name', 'like', 'muaythai%')
              ->orWhere('courses.course_name', 'like', 'zumba%');
    })
    ->groupBy('courses.course_name') // จัดกลุ่มตามชื่อคอร์สเพื่อไม่ให้ซ้ำกัน
    ->get();

    // กรองเฉพาะประเภทหลัก (ตัดเลขท้ายออกจากชื่อคอร์ส เช่น yoga1, dance2)
    $filteredCourses = $courses->map(function ($course) {
        if (strpos(strtolower($course->course_name), 'yoga') !== false) {
            $course->course_name = 'Yoga';
            $course->course_name_th = 'โยคะ';
            $course->order = 1;
        } elseif (strpos(strtolower($course->course_name), 'dance') !== false) {
            $course->course_name = 'Dance';
            $course->course_name_th = 'เต้น';
            $course->order = 2;
        } elseif (strpos(strtolower($course->course_name), 'muaythai') !== false) {
            $course->course_name = 'Muaythai';
            $course->course_name_th = 'มวยไทย';
            $course->order = 3;
        } elseif (strpos(strtolower($course->course_name), 'zumba') !== false) {
            $course->course_name = 'Zumba';
            $course->course_name_th = 'ซุมบา';
            $course->order = 4;
        }
        return $course;
    });
    // เรียงลำดับตามค่า 'order' และใช้ unique เพื่อกรองไม่ให้แสดงซ้ำ
    return $filteredCourses->unique('course_name')->sortBy('order')->values();
    }

    public function showPopularCourses() {
        // ค้นหาคอร์สที่ได้รับความนิยมสูงสุด โดยนับจำนวนผู้จองจากตาราง enrolls
        $popularCourses = DB::table('courses')
            ->join('course_pics', 'courses.id', '=', 'course_pics.course_id')
            ->join('enrolls', 'courses.id', '=', 'enrolls.course_id') // แทนที่ course_course_bills ด้วย enrolls
            ->select('courses.course_name', DB::raw('COUNT(enrolls.id) as total_participants'), DB::raw('MAX(course_pics.picture) as picture')) // นับจำนวนคนที่จองจาก enrolls
            ->groupBy('courses.id', 'courses.course_name') // จัดกลุ่มตาม course ID และ course_name
            ->orderBy('total_participants', 'desc') // เรียงลำดับตามยอดรวมของผู้จองทั้งหมด
            ->limit(2) // แสดงคอร์สยอดนิยมสูงสุด 2 คอร์ส
            ->get();
        
        return $popularCourses;
    }

    public function showCoursesTime() {
        // ดึงข้อมูลคอร์สช่วงเช้า พร้อมข้อมูลครูผู้สอนและจำนวนคนจอง
        $morningCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_pics', 'courses.id', '=', 'course_pics.course_id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id') // เชื่อมกับ course_days
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id') // เชื่อมกับ days
            // Subquery เพื่อดึงจำนวนคนที่จองต่อคอร์ส
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') // Join กับตาราง enrolls เพื่อดึงข้อมูลจำนวนคนที่จองโดยตรง
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times', // จำนวนครั้งที่คอร์สจะเกิดขึ้น
                'courses.max_participant',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'), // รวม first_name และ last_name
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'), // ใช้ค่าจาก subquery enrolls
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'), // รวมชื่อวันแบบ DISTINCT
                'course_pics.picture' // ดึงรูปภาพจากตาราง course_pics
            )
            ->whereTime('courses.start_time', '>=', '09:00:00')
            ->whereTime('courses.start_time', '<', '12:00:00') // กรองช่วงเช้า
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.period', 'employees.firstname', 'employees.lastname', 'course_pics.picture')
            ->get();
    
        // ดึงข้อมูลคอร์สช่วงบ่าย (แบบเดียวกับช่วงเช้า)
        $afternoonCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_pics', 'courses.id', '=', 'course_pics.course_id')
            ->leftJoin('course_days', 'courses.id', '=', 'course_days.course_id') // เชื่อมกับ course_days
            ->leftJoin('days', 'course_days.day_id', '=', 'days.id') // เชื่อมกับ days
            // Subquery เพื่อดึงจำนวนคนที่จองต่อคอร์ส
            ->leftJoin('enrolls', 'courses.id', '=', 'enrolls.course_id') // Join กับตาราง enrolls เพื่อดึงข้อมูลจำนวนคนที่จองโดยตรง
            ->select(
                'courses.id',
                'courses.course_name',
                'courses.course_sellprice',
                'courses.start_time',
                'courses.end_time',
                'courses.times', // จำนวนครั้งที่คอร์สจะเกิดขึ้น
                'courses.max_participant',
                'courses.period',
                DB::raw('CONCAT(employees.firstname, " ", employees.lastname) as instructor_name'), // รวม first_name และ last_name
                DB::raw('COUNT(DISTINCT enrolls.customer_id) as total_booked'), // ใช้ค่าจาก subquery enrolls
                DB::raw('GROUP_CONCAT(DISTINCT days.name ORDER BY days.id ASC SEPARATOR ", ") as class_days'), // รวมชื่อวันแบบ DISTINCT
                'course_pics.picture' // ดึงรูปภาพจากตาราง course_pics
            )
            ->whereTime('courses.start_time', '>=', '13:00:00')
            ->whereTime('courses.start_time', '<', '16:00:00') // กรองช่วงเช้า
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.period', 'employees.firstname', 'employees.lastname', 'course_pics.picture')
            ->get();
    
        return view('user.class_time', compact('morningCourses', 'afternoonCourses'));
    }
    

    public function showCoursesGender() {
        // ครูผู้สอนเพศหญิง
        $femaleInstructors = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_pics', 'courses.id', '=', 'course_pics.course_id')
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
                'course_pics.picture'
            )
            ->where('employees.gender', 'หญิง')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'course_pics.picture')
            ->get();
    
        // ครูผู้สอนเพศชาย
        $maleInstructors = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_pics', 'courses.id', '=', 'course_pics.course_id')
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
                'course_pics.picture'
            )
            ->where('employees.gender', 'ชาย')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'course_pics.picture')
            ->get();
    
        return view('user.class_gender', compact('femaleInstructors', 'maleInstructors'));
    }
    
    public function showYoga() {
        $yogaCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_pics', 'courses.id', '=', 'course_pics.course_id')
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
                'course_pics.picture'
            )
            ->where('courses.course_name', 'like', 'yoga%')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'course_pics.picture')
            ->get();
    
        $facilities = $this->showFacilities('yoga');
        $filteredCourses = $this->filterCourses($yogaCourses);
    
        return view('user.yoga', compact('yogaCourses', 'facilities', 'filteredCourses'));
    }
    
    public function showDance() {
        $danceCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_pics', 'courses.id', '=', 'course_pics.course_id')
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
                'course_pics.picture'
            )
            ->where('courses.course_name', 'like', 'dance%')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'course_pics.picture')
            ->get();
    
        $facilities = $this->showFacilities('dance');
        $filteredCourses = $this->filterCourses($danceCourses);
    
        return view('user.dance', compact('danceCourses', 'facilities', 'filteredCourses'));
    }
    
    public function showMuaythai() {
        $muaythaiCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_pics', 'courses.id', '=', 'course_pics.course_id')
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
                'course_pics.picture'
            )
            ->where('courses.course_name', 'like', 'muaythai%')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'course_pics.picture')
            ->get();
    
        $facilities = $this->showFacilities('muaythai');
        $filteredCourses = $this->filterCourses($muaythaiCourses);
    
        return view('user.muaythai', compact('muaythaiCourses', 'facilities', 'filteredCourses'));
    }
    
    public function showZumba() {
        $zumbaCourses = DB::table('courses')
            ->join('employees', 'courses.employee_id', '=', 'employees.id')
            ->leftJoin('course_pics', 'courses.id', '=', 'course_pics.course_id')
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
                'course_pics.picture'
            )
            ->where('courses.course_name', 'like', 'zumba%')
            ->groupBy('courses.id', 'courses.course_name', 'courses.course_sellprice', 'courses.start_time', 'courses.end_time', 'courses.times', 'courses.max_participant', 'courses.description', 'courses.period', 'employees.firstname', 'employees.lastname', 'course_pics.picture')
            ->get();
    
        $facilities = $this->showFacilities('zumba');
        $filteredCourses = $this->filterCourses($zumbaCourses);
    
        return view('user.zumba', compact('zumbaCourses', 'facilities', 'filteredCourses'));
    }    

    public function showFacilities($courseName) {
        // ดึงข้อมูลสิ่งอำนวยความสะดวกที่ไม่ซ้ำและจำกัด 4 รายการ
        $facilities = DB::table('facilities')
            ->join('course_facilities', 'facilities.id', '=', 'course_facilities.facility_id') // เชื่อมกับ course_facilities
            ->join('facility_pics', 'facilities.id', '=', 'facility_pics.facility_id') // เชื่อมกับ facility_pics เพื่อดึงรูปภาพ
            ->select(
                'facilities.facility_name',
                'facilities.description',
                'facility_pics.picture'
            )
            ->whereIn('course_facilities.course_id', function ($query) use ($courseName) {
                $query->select('id')
                      ->from('courses')
                      ->where('course_name', 'like', $courseName.'%'); // กำหนดคอร์สที่ต้องการ
            })
            ->distinct() // ดึงข้อมูลที่ไม่ซ้ำกัน
            ->limit(4) // จำกัดให้แสดง 4 อัน
            ->get();
    
        return $facilities;
    }
}