<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    // กำหนดฟิลด์ที่สามารถกรอกได้ (fillable)
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'phonenum', 'address', 'birthdate', 'weight', 'height', 'gender', 'profile_picture'
    ];

    // ซ่อนฟิลด์ที่ไม่ควรเปิดเผย เช่น password
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function course_bills() {
        return $this->hasMany(Course_bill::class);
    }

    public function courses() {
        return $this->belongsToMany(Course::class);
    }
}
