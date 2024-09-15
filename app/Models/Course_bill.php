<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_bill extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function courses() {
        return $this->belongsToMany(Course::class);
    }

    public function customers() {
        return $this->belongsToMany(Customer::class);
    }

}
