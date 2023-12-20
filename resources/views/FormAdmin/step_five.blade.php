@extends('app')
@section('title', 'Step Ke Lima')
@section('content')
<div class="step_four_form w-full h-full min-h-screen">
    <div class="flex justify-center">
        <div class="w-3/5 bg-white shadow-md p-4 rounded mt-20">
          @if ($errors->any())
              @foreach ($errors->all() as $err)
                  <p>{{ $err }}</p>
              @endforeach
          @endif
            <form action="{{ Route('form.step.five.process') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="smt_choice">
                <label for="class_smt" class="block text-sm mb-2">Semester</label>
                <select class="w-full select select-sm" name="class_semester_id" id="class_smt">
                  <option value="smt_1">Semester 5</option>
                </select>
              </div>
              <div class="science mt-5">
                <label for="science" class="block text-sm mb-2">Nilai IPA</label>
                @error('science')
                <div class="bg-rose-50 border-2 border-solid border-rose-500 rounded w-full h-auto p-1 px-4 mb-3">
                  <p class="text-rose-500 text-sm capitalize">{{ $message }}</p>
                </div>
                @enderror
                <x-input type="text" name="science" id="science" value="{{ old('science') }}" labelName="Masukkan Nilai IPA Pada Semester Yang Sudah Dipilih" />
              </div>
              <div class="indonesian_language_lesson mt-5">
                <label for="indonesian_language_lesson" class="block text-sm mb-2">Nilai B.Indo</label>
                @error('indonesian_language_lesson')
                <div class="bg-rose-50 border-2 border-solid border-rose-500 rounded w-full h-auto p-1 px-4 mb-3">
                  <p class="text-rose-500 text-sm capitalize">{{ $message }}</p>
                </div>
                @enderror
                <x-input type="text" name="indonesian_language_lesson" value="{{ old('indonesian_language_lesson') }}" id="indonesian_language_lesson" labelName="Masukkan Nilai B.Indo Pada Semester Yang Sudah Dipilih" />
              </div>
              <div class="english_language_lesson mt-5">
                <label for="english_language_lesson" class="block text-sm mb-2">Nilai B.Inggris</label>
                @error('english_language_lesson')
                <div class="bg-rose-50 border-2 border-solid border-rose-500 rounded w-full h-auto p-1 px-4 mb-3">
                  <p class="text-rose-500 text-sm capitalize">{{ $message }}</p>
                </div>
                @enderror
                <x-input type="text" name="english_language_lesson" id="english_language_lesson" value="{{ old('english_language_lesson') }}" labelName="Masukkan Nilai B.Inggris Pada Semester Yang Sudah Dipilih" />
              </div>
              <div class="mathematics mt-5">
                <label for="mathematics" class="block text-sm mb-2">Nilai MTK</label>
                 @error('mathematics')
                <div class="bg-rose-50 border-2 border-solid border-rose-500 rounded w-full h-auto p-1 px-4 mb-3">
                  <p class="text-rose-500 text-sm capitalize">{{ $message }}</p>
                </div>
                @enderror
                <x-input type="text" name="mathematics" id="mathematics" value="{{ old('mathematics') }}" labelName="Masukkan Nilai MTK Pada Semester Yang Sudah Dipilih" />
              </div>
              <div class="student_proof_of_grade_report mt-5">
                <label for="student_proof_of_grade_report" class="block text-sm mb-2">Bukti Nilai SMT 5</label>
                 @error('student_proof_of_grade_report')
                <div class="bg-rose-50 border-2 border-solid border-rose-500 rounded w-full h-auto p-1 px-4 mb-3">
                  <p class="text-rose-500 text-sm capitalize">{{ $message }}</p>
                </div>
                @enderror
                <input type="file" name="student_proof_of_grade_report" id="student_proof_of_grade_report" class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
              </div>
              <div class="btn_next flex justify-end mt-3">
                <button type="submit" class="py-1 px-4 rounded text-center border-2 border-green-500 bg-green-100 text-green-500 hover:bg-green-500 hover:text-white transition-colors duration-150">
                  <span>Finish</span>
                </button>
              </div>
            </form>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="steps mt-5">
            <ul class="steps steps-horizontal space-x-2">
                <li class="step step-neutral">
                  <span class="text-sm">Step 1</span>
                </li>
                <li class="step step-neutral">
                  <span class="text-sm">Step 2</span>
                </li>
                <li class="step step-neutral">
                  <span class="text-sm">Step 3</span>
                </li>
                <li class="step step-neutral">
                  <span class="text-sm">Step 4</span>
                </li>
                <li class="step step-neutral">
                  <span class="text-sm">Step 5</span>
                </li>
            </ul>
        </div>
    </div>
</div> 
@endsection