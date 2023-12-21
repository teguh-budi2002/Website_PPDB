@extends('dashboard.app_dashboard')
@section('breadcrumb')
<ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
    <li class="leading-normal text-sm">
        <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
    </li>
    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
        aria-current="page">Manage Data Students</li>
</ol>
<h6 class="mb-0 font-bold capitalize">Management Data Students</h6>
@endsection
@section('content')
<div class="w-full h-full min-h-[600px]">
  <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-full max-w-full px-3">
          <div
              class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <p class="font-bold">Data Siswa Yang Sudah Submit Nilai</p>
              </div>
              <div class="flex-auto px-0 pt-0 pb-2">
                  <div class="p-0 overflow-x-auto">
                      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                          <thead class="align-bottom">
                              <tr>
                                  <th
                                      class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                      Nama Siswa</th>
                                  <th
                                      class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                      NISN</th>
                                  <th
                                      class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                      Status Active</th>
                                  <th
                                      class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                      Tanggal Submit</th>
                                  <th
                                      class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($data_students as $student)
                            <tr>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-0 text-sm leading-normal">{{ $student->fullname }}</h6>
                                            <p class="mb-0 text-xs leading-tight text-slate-400">{{ $student->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $student->nisn }}</p>
                                </td>
                                <td
                                    class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <span
                                        class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Active</span>
                                </td>
                                @foreach ($student->user_class_semesters->take(1) as $user_submit)
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <span class="text-xs font-semibold leading-tight text-slate-400">{{ $user_submit->created_at->format('d-F-Y H:i:s') }}</span>
                                </td>
                                @endforeach
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="" class="text-xs font-semibold leading-tight bg-gradient-to-tl from-blue-600 to-sky-400 hover:from-sky-400 hover:to-blue-600 transition duration-200 text-white p-2 rounded-md">Validasi Nilai Siswa</a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
