<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.nav', function ($view) {
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
            $view->with('filteredCourses', $filteredCourses->unique('course_name')->sortBy('order')->values());
        });
    }
}
