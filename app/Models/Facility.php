<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function facility_pics() {
        return $this->hasMany(Facility_pic::class);
    }
    
    public function courses() {
        return $this->belongsToMany(Course::class);
    }

}
