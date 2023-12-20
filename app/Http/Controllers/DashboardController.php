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

        return view('dashboard.views.manage_data_students', [
            'data_students' => $getDataStudents
        ]);
    }
}
