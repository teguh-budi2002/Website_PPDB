@extends('dashboard.app_dashboard')
@section('breadcrumb')
<ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
    <li class="leading-normal text-sm">
        <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
    </li>
    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
        aria-current="page">
        <a href="{{ Route('manage.data_students') }}" class="opacity-50 text-slate-700">Manage Data Students</a>
    </li>
    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
        aria-current="page">Validate Data Student</li>
</ol>
<h6 class="mb-0 font-bold capitalize">Validate Data Student</h6>
@endsection
@section('content')
<div class="flex flex-wrap mt-6 -mx-3">
    <div class="w-full max-w-3xl px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
        <div
            class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div class="flex-auto p-4">
              <p>Nama Siswa: <span class="font-semibold text-lg">{{ $data_student->fullname }}</span></p>
              @foreach ($data_student->user_class_semesters as $semester)
              <div class="data_student_wrapper mt-5 mb-5">
                <div class="border-t border-b">
                  <p class="text-center text-xl font-bold">{{ $semester->semester }}</p>
                </div>
                <div class="data_student_value grid grid-cols-3 mt-3">
                  <div class="subjects">
                    <p>IPA</p>
                    <p>Bahasa Indonesia</p>
                    <p>Bahasa Inggris</p>
                    <p>Matematika</p>
                  </div>
                  <div class="subject_value col-span-2">
                    @foreach ($semester->data_students as $studentScore)
                    <p>{{ $studentScore->science }}</p>  
                    <p>{{ $studentScore->indonesian_language_lesson }}</p>  
                    <p>{{ $studentScore->english_language_lesson }}</p>  
                    <p>{{ $studentScore->mathematics }}</p>  
                    @endforeach
                  </div>
                </div>
                <div class="img_grade_repoort mt-3">
                  @foreach ($semester->data_students as $studentGradeReport)
                  <a href="{{ asset('/storage/report-grade/' . $studentGradeReport->student_proof_of_grade_report) }}" target="_blank">
                    <img src="{{ asset('/storage/report-grade/' . $studentGradeReport->student_proof_of_grade_report) }}" class="mx-auto" alt="">
                  </a>
                  @endforeach
                </div>
              </div>
              @endforeach
              <div>
                <p class="text-sm">Nilai Rata-Rata Siswa: <span class="font-semibold text-base">{{ $data_student->avg_value_student }}</span></p>
              </div>
              <div class="btn_approve_or_declined mt-5 flex items-center space-x-5">
                @if (!is_null($data_student->isUserVerfied))
                <div class="flex justify-center w-full">
                  <button type="button" class="py-1 px-10 rounded-lg text-white {{ $data_student->isUserVerfied ? 'bg-green-600' : 'bg-rose-600' }}">{{ $data_student->isUserVerfied ? 'Siswa Berhasil Lolos Seleksi' : 'Siswa Tidak Lolos Seleksi' }}</button>
                </div>
                @else
                <form action="{{ Route('approve_student', ['studentId' => $data_student->id]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="py-2.5 px-10 rounded-md bg-gradient-to-br from-green-400 to-emerald-600 text-white">Approved</button>
                </form>
                <form action="{{ Route('declined_student', ['studentId' => $data_student->id]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="py-2.5 px-10 rounded-md bg-gradient-to-br from-rose-400 to-pink-600 text-white">Declined</button>
                </form>
                @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection