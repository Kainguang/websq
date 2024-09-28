<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function course_pics() {
        return $this->hasMany(Course_pic::class);
    }

    public function customers() {
        return $this->belongsToMany(Customer::class, 'enrolls');
    }

    public function facilities() {
        return $this->belongsToMany(Facility::class);
    }

    public function days() {
        return $this->belongsToMany(Day::class, 'course_days', 'course_id', 'day_id');
    }

}
