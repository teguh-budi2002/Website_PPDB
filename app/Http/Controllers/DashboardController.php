<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.views.main_dashboard');
    }

    public function manage_data_students() {
        $getDataStudents = User::with(['user_class_semesters'])->get();
        // dd($getDataStudents);
        return view('dashboard.views.manage_data_students', [
            'data_students' => $getDataStudents
        ]);
    }

    public function validate_student_score($studentId) {
        $getStudent = User::with('user_class_semesters.data_students')->where('id', $studentId)->firstOrFail();

        return view('dashboard.views.validate_student_score', [
            'data_student' => $getStudent
        ]);
    }
}
