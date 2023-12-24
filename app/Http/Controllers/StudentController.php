<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function approvedStudent($studentId) {
        $apporvedStudent = User::where('id', $studentId)->update([
            'isUserVerfied' => 1
        ]);

        toastr()->success("Siswa Dinyatakan Berhasil Lolos Seleksi", "Siswa Diterima");

        return redirect()->route('manage.data_students');
    }

    public function declinedStudent($studentId) {
        $declinedStudent = User::where('id', $studentId)->update([
            'isUserVerfied' => 0
        ]);

        toastr()->error("Siswa Di Nyatakan Tidak Lolos Seleksi", "Siswa Ditolak");

        return redirect()->route('manage.data_students');
    }

    public function downloadPdfStudent() { 
        $pdf = PDF::loadView('pdf.proof_of_accepted_student');

        return $pdf->download(str_replace(" ", "", Auth::user()->fullname) . '_Bukti_PPDB.pdf');
    }
}
