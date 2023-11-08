@extends('app')
@section('title', "DAFTAR AKUN")
@section('content')
<section class="register_page w-full h-full min-h-screen flex justify-center items-center">
  <div class="lg:w-3/5 w-11/12 h-fit relative p-4 bg-white rounded-md border-2 border-blue-primary shadow-xl">
    <div class="left_section w-full absolute -left-40 lg:block hidden">
      <div class="bg-gradient-to-l from-blue-600 to-[#54ADFF] p-4 py-10 w-2/5 min-h-[420px] rounded-lg">
        <p class="uppercase text-white text-xl font-bold">kembangkan karir anda</p>
        <p class="text-blue-100 text-xs mt-2">Selamat datang di halaman pendaftaran <span class="font-semibold text-md underline text-white">Go International School</span>, Ini adalah langkah pertama dalam perjalanan Anda menuju karir yang sukses bersama kami. Mari bersama-sama membangun masa depan yang cerah dalam dunia pendidikan dan karier.</p>
      </div>
    </div>
    <div class="header_text">
      <p class="uppercase text-4xl font-semibold text-center text-[#535353]">pendaftaran akun</p>
    </div>
    <div class="flex lg:justify-end justify-left">
      <div class="lg:w-3/4 w-full body_form mt-4">
        <form action="{{ Route('register.process') }}" method="POST">
          @csrf
          @error('fullname')
          <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
              <p class="text-white text-sm capitalize">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <x-input type="text" name="fullname" value="{{ old('fullname') }}" labelName="Nama Lengkap" id="fullname"/>
          </div>
          @error('nik')
          <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
              <p class="text-white text-sm capitalize">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <x-input type="text" name="nik" value="{{ old('nik') }}" labelName="NIK" id="nik"/>
          </div>
          <div class="grid grid-cols-2 gap-3">
            <div class="mb-3">
              @error('birth_place')
              <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
                  <p class="text-white text-sm capitalize">{{ $message }}</p>
              </div>
              @enderror
              <x-input type="text" name="birth_place" value="{{ old('birth_place') }}" labelName="Tempat Lahir" id="birth_place"/>
            </div>
            <div class="mb-3">
              @error('birth_day')
              <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
                  <p class="text-white text-sm capitalize">{{ $message }}</p>
              </div>
              @enderror
              <x-input type="date" name="birth_day" labelName="Tanggal Lahir" id="birth_day"/>
            </div>
          </div>
          @error('phone_number')
            <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
                <p class="text-white text-sm capitalize">{{ $message }}</p>
            </div>
          @enderror
          <div class="mb-3">
            <x-input type="text" name="phone_number" value="{{ old('phone_number') }}" labelName="Nomor HP (Whatsapp)" id="phone_number"/>
          </div>
          @error('email')
            <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
                <p class="text-white text-sm capitalize">{{ $message }}</p>
            </div>
          @enderror
          <div class="mb-3">
            <x-input type="email" name="email" value="{{ old('email') }}" labelName="Email (@gmail.com)" id="email"/>
          </div>
          @error('password')
            <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
                <p class="text-white text-sm capitalize">{{ $message }}</p>
            </div>
          @enderror
          <div class="mb-3">
            <x-input type="password" name="password" labelName="Password" id="password"/>
          </div>
          @error('g-recaptcha-response')
            <div class="bg-rose-400 rounded w-full h-auto p-0.5 px-4 mb-3" role="alert">
                <p class="text-white text-sm capitalize">{{ $message }}</p>
            </div>
          @enderror
          <div class="g-recaptcha mt-4 z-50 relative" data-sitekey="{{ config("recaptcha.KEY") }}"></div>
          <div class="btn_submit mt-3">
            <button class="md:w-auto w-full py-2.5 px-6 bg-blue-primary shadow-md text-white font-semibold rounded-md">DAFTAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection