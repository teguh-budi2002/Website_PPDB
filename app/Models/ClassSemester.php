<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSemester extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function data_students() {
        return $this->hasMany(DataStudentSchool::class);
    }

    public function user() { 
        return $this->belongsTo(User::class);
    }
}
