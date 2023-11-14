<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStudentSchool extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function class_semester() {
        return $this->belongsTo(ClassSemester::class);
    }
}
