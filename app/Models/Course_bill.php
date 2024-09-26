<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_bill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'customer_id', 'slip_picture', 'payment_status'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'course_course_bills', 'course_bill_id', 'course_id')
        ->withPivot('amount')
        ->withTimestamps();
    }

    public function course_participants() {
        return $this->hasMany(Course_participant::class, 'course_bill_id');
    }

}
