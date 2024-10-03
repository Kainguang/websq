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
            ->select('courses.course_name', 'courses.picture_path')
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
            $view->with('filteredCourses', $filteredCourses->unique('course_name_en')->sortBy('order')->values());
        });
    }
}
