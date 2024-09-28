<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'phonenum', 'address', 'birthdate', 'weight', 'height', 'gender', 'profile_picture'];

    protected $hidden = ['password', 'remember_token'];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function course() {
        return $this->hasOne(Course::class);
    }
}
