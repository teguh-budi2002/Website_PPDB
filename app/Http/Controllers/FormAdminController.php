<?php

namespace App\Http\Controllers;

use App\Models\ClassSemester;
use App\Models\DataStudentSchool;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FormAdminController extends Controller
{
    public function createStepOne() {
        return view("FormAdmin.step_one");
    }

    public function createStepOneProcess(Request $request) { 
        $validation = $this->custom_validator($request);

        DB::beginTransaction();
        try {
            $createSemester = ClassSemester::create([
                "user_id" => Auth::user()->id,
                "semester" => "Semester 1",
            ]);
            $validation['class_semester_id'] = $createSemester->id;
            $validation['student_proof_of_grade_report'] = $this->storeImageGradeReportStudent($request->file('student_proof_of_grade_report'));
            $data_student = DataStudentSchool::create($validation);
            DB::commit();
            return redirect()->route("form.step.two");
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");

            return redirect()->back();
        }
    }

    public function createStepTwo() { 
        return view("FormAdmin.step_two");
    }

    
    public function createStepTwoProcess(Request $request) { 
        $validation = $this->custom_validator($request);

        DB::beginTransaction();
        try {
             $createSemester = ClassSemester::create([
                "user_id" => Auth::user()->id,
                "semester" => "Semester 2",
            ]);
            $validation['class_semester_id'] = $createSemester->id;
            $validation['student_proof_of_grade_report'] = $this->storeImageGradeReportStudent($request->file('student_proof_of_grade_report'));
            $data_student = DataStudentSchool::create($validation);
            DB::commit();
            return redirect()->route("form.step.three");
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");
            
            return redirect()->back();
        }
    }

    public function createStepThree() { 
        return view("FormAdmin.step_three");
    }

    
    public function createStepThreeProcess(Request $request) { 
        $validation = $this->custom_validator($request);

        DB::beginTransaction();
        try {
             $createSemester = ClassSemester::create([
                "user_id" => Auth::user()->id,
                "semester" => "Semester 3",
            ]);
            $validation['class_semester_id'] = $createSemester->id;
            $validation['student_proof_of_grade_report'] = $this->storeImageGradeReportStudent($request->file('student_proof_of_grade_report'));
            $data_student = DataStudentSchool::create($validation);
            DB::commit();
            return redirect()->route("form.step.four");
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");
            
            return redirect()->back();
        }
    }

    public function createStepFour() { 
        return view("FormAdmin.step_four");
    }

    
    public function createStepFourProcess(Request $request) { 
        $validation = $this->custom_validator($request);

        DB::beginTransaction();
        try {
             $createSemester = ClassSemester::create([
                "user_id" => Auth::user()->id,
                "semester" => "Semester 4",
            ]);
            $validation['class_semester_id'] = $createSemester->id;
            $validation['student_proof_of_grade_report'] = $this->storeImageGradeReportStudent($request->file('student_proof_of_grade_report'));
            $data_student = DataStudentSchool::create($validation);
            DB::commit();
            return redirect()->route("form.step.five");
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");
            
            return redirect()->back();
        }
    }

    public function createStepFive() { 
        return view("FormAdmin.step_five");
    }

    
    public function createStepFiveProcess(Request $request) { 
        $validation = $this->custom_validator($request);

        DB::beginTransaction();
        try {
             $createSemester = ClassSemester::create([
                "user_id" => Auth::user()->id,
                "semester" => "Semester 5",
            ]);
            $validation['class_semester_id'] = $createSemester->id;
            $validation['student_proof_of_grade_report'] = $this->storeImageGradeReportStudent($request->file('student_proof_of_grade_report'));
            $data_student = DataStudentSchool::create($validation);

            // Counting All Data Students
            $calculateStudentScore = ClassSemester::leftJoin(DB::raw('(SELECT class_semester_id, SUM(science + indonesian_language_lesson + english_language_lesson + mathematics) as total_student_score FROM data_student_schools GROUP BY class_semester_id) AS statistics'), function($join) {
                $join->on('statistics.class_semester_id', '=', 'class_semesters.id');
            })->where('user_id', Auth::user()->id)->get();
            $averageScoreStudent = $calculateStudentScore->sum('total_student_score') / 20;
            $savedAvgScore = User::where('id', Auth::user()->id)->update([
                'avg_value_student' => $averageScoreStudent
            ]);

            DB::commit();

            toastr()->success("Nilai anda berhasil disimpan, harap tunggu untuk proses validasi.", "NIlAI BERHASIL DISIMPAN");
            return redirect()->route("after.login");
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");
            
            return redirect()->back();
        }
    }

    protected function storeImageGradeReportStudent($file) {
        $filename = $file->getClientOriginalName();
        if ($file) {
            $putIntoStorage = Storage::disk('public')->putFileAs('/report-grade/', $file, $filename);
        }

        return $filename;
    }

    protected function custom_validator($data) {
        $validate = $data->validate([ 
            "class_semester_id" => "required",
            "science" => "required|numeric",
            "indonesian_language_lesson" => "required|numeric",
            "english_language_lesson" => "required|numeric",
            "mathematics" => "required|numeric",
            'student_proof_of_grade_report' => 'required|image|mimes:jpg,png,webp'
        ], [
            "science" => [
                "required" => "Nilai IPA Wajib Di Isi",
                "numeric" => "Nilai Harus Berupa Angka"
            ],
            "indonesian_language_lesson" => [
                "required" => "Nilai B.Indo Wajib Di Isi",
                "numeric" => "Nilai Harus Berupa Angka"
            ],
            "english_language_lesson" => [
                "required" => "Nilai B.Inggris Wajib Di Isi",
                "numeric" => "Nilai Harus Berupa Angka"
            ],
            "mathematics" => [
                "required" => "Nilai MTK Wajib Di Isi",
                "numeric" => "Nilai Harus Berupa Angka"
            ],
            'student_proof_of_grade_report' => [
                'required' => 'Bukti Nilai Wajib Di Upload.',
                'upload' => 'Bukti Nilai Harus Berupa Gambar.',
                'mimes' => 'Ekstensi Gambar Yang Diperbolehkan: (jpg,png,webp)'
            ]
        ]);

        return $validate;
    }
}
