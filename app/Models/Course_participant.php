<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_participant extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function course_bill() {
        return $this->belongsTo(Course_bill::class);
    }
}
