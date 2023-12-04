<?php

namespace App\Http\Controllers;

use App\Models\ClassSemester;
use App\Models\DataStudentSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                "user_id" => $request->user("id"),
                "semester" => $request->input("class_semester"),
            ]);
            $validation['class_semester_id'] = $createSemester->id;
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
                "user_id" => $request->user("id"),
                "semester" => $request->input("class_semester"),
            ]);
            $validation['class_semester_id'] = $createSemester->id;
            $data_student = DataStudentSchool::create($validation);
            DB::commit();
            return redirect()->route("form.step.two");
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage(), "ERROR SERVERSIDE");
            
            return redirect()->back();
        }
    }

    protected function custom_validator($data) {
        $validate = $data->validate([ 
            "class_semester" => "required",
            "science" => "required|numeric",
            "indonesian_language_lesson" => "required",
            "english_language_lesson" => "required",
            "mathematics" => "required",
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
        ]);

        return $validate;
    }
}
