<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_participant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_bill_id',  // เพิ่มบรรทัดนี้
        'firstname',
        'lastname',
        'email',
        'phonenum',
        'height',
        'weight',
        'gender',
    ];
    
    public function course_bill() {
        return $this->belongsTo(Course_bill::class);
    }
}
