@extends('app')
@section('title', "LOGIN")
@section('content')
<style>
    .login_page {
        background-image: url('{{ asset('img/bg-login.png') }}');
        z-index: 1;
    }
</style>
<section class="login_page w-full h-full min-h-screen flex justify-center items-center relative">
    <div class="lg:w-2/6 md:w-3/4 w-11/12 h-auto bg-white shadow-lg rounded-md p-4 relative">
        <div class="box_design md:block hidden absolute -rotate-6 -left-3 bg-gradient-to-tr from-violet-500 -z-[10] to-blue-primary w-[535px] h-[285px] shadow-lg rounded-md">
        </div>
        <p class="text-center text-2xl font-bold text-[#535353]">LOGIN PPDB</p>
        <div class="border border-slate-100 mt-4 w-3/4 mx-auto"></div>
        <form action="{{ Route('login.process') }}" method="POST">
            @csrf
            <div class="mb-3 mt-5">
            @error('nisn')
              <div class="bg-rose-50 border-2 border-solid border-rose-500 rounded w-full h-auto p-1 px-4 mb-3" role="alert">
                  <p class="text-rose-500 text-sm capitalize">{{ $message }}</p>
              </div>
            @enderror
                <x-input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}" labelName="Masukkan NISN Anda"/>
            </div>
            <div class="mb-3">
            @error('password')
              <div class="bg-rose-50 border-2 border-solid border-rose-500 rounded w-full h-auto p-1 px-4 mb-3" role="alert">
                  <p class="text-rose-500 text-sm capitalize">{{ $message }}</p>
              </div>
            @enderror
                <x-input type="password" name="password" id="password" labelName="Masukkan Password"/>
            </div>
            <div class="remember_me flex items-center space-x-2">
                <input type="checkbox" name="remember_me" id="remember_me" class="checkbox checkbox-xs" />
                <label for="remember_me" class="text-sm text-slate-500">Ingat saya?</label>
            </div>
            <div class="btn_submit text-center mt-10">
                <button class="md:w-auto w-full py-2.5 px-16 rounded-md bg-blue-primary shadow-md text-white font-semibold">LOGIN</button>
            </div>
        </form>
    </div>
</section>
@endsection