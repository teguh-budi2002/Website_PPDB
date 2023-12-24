@extends('app')
@section('title', "WELCOME")
@section('content')
<section class="w-full h-full min-h-screen relative">
    <div class="flex justify-center">
        <div class="md:w-10/12 w-11/12 md:mt-20 mt-5 md:mb-20 mb-10 overflow-x-hidden">
            <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
                <div class="flex flex-col justify-center items-center">
                    <p class="uppercase md:text-5xl text-4xl md:text-start text-center font-semibold text-slate-600"><span class="text-rose-500">GUH</span>
                        international school</p>
                    <p class="text-sm mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, et neque.
                        Eligendi ex doloribus deserunt blanditiis fuga. Odio non voluptates, reiciendis numquam alias
                        velit ea eligendi dolorem accusamus dignissimos sit.</p>
                    @if (isset($is_payment_admin_paid) && $is_payment_admin_paid->is_paid)
                      @if ($is_user_finish_input_data_student >= 5)
                      <a href="{{ Route('form.step.one') }}" class="py-2.5 px-6 rounded-md border-2 border-green-500 transition-colors duration-150 hover:bg-green-500 text-green-500 hover:text-white mt-5 font-semibold">Lihat Hasil Pengumuman</a>
                      @else
                      <a href="{{ Route('form.step.one') }}" class="py-2.5 px-6 rounded-md border-2 border-blue-primary transition-colors duration-150 hover:bg-blue-primary text-blue-primary hover:text-white mt-5 font-semibold">DAFTAR
                          SEKARANG</a>
                      @endif
                    @else
                      <button class="py-2.5 px-6 rounded-md border-2 border-blue-primary transition-colors duration-150 hover:bg-blue-primary text-blue-primary hover:text-white mt-5 font-semibold" onclick="my_modal_2.showModal()">DAFTAR SEKARANG</button>
                      <dialog id="my_modal_2" class="modal">
                        <div class="modal-box">
                          <h3 class="font-bold text-lg text-rose-400">PERHATIAN</h3>
                          <p class="py-4">Mohon Menyelesaikan Administrasi Pembayaran Sebelum Anda Melakakuan Pendaftaran.</p>
                          <a href="{{ Route('info.payment') }}" class="text-blue-500 hover:text-blue-400">Klik untuk melakukan pembayaran</a>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                          <button>close</button>
                        </form>
                      </dialog>
                    @endif
                </div>
                <div>
                    <img src="{{ asset('img/test_hello.png') }}" class="w-auto h-96 mx-auto" alt="">
                </div>
            </div>
            <div>
                <p class="text-center uppercase font-semibold text-4xl text-slate-600">Informasi</p>
            </div>
            <div class="swiper-info-after-login mt-5">
                <div class="swiper-wrapper">
                    <div class="swiper-slide w-auto">
                      <img src="{{ asset('img/Banner/Alur_Waktu.webp') }}" class="w-full object-contain h-[410px]" alt="">
                    </div>
                    <div class="swiper-slide w-auto">
                       <img src="{{ asset('img/Banner/payment.webp') }}" class="w-full object-contain h-[410px]" alt="">
                    </div>
                </div>
            </div>
            <div class="mt-5 mb-5">
                <p class="text-center uppercase font-semibold md:text-4xl text-2xl text-slate-600">Kenapa Pilih <span class="text-rose-500">GUH</span> International School ?</p>
            </div>
            <div class="grid grid-cols-2 gap-5">
              <div class="left_item">
                <div class="first_reason space-y-2 text-center">
                  <p class="capitalize font-semibold text-xl text-slate-600">KOMITMEN</p>
                  <p class="text-slate-600 text-sm">GUH INTERNATIONAL SCHOOL memiliki komitmen pada Pendidikan yang unggul. Kami bertujuan menghadirkan pendidikan berkualitas tinggi yang relevan dan kontekstual dengan apa yang dibutuhkan siswa untuk sukses dalam kehidupan nyata.
</p>
                </div>
              </div>
              <div class="right_item">
                <div class="second_reason space-y-2 text-center">
                  <p class="capitalize font-semibold text-xl text-slate-600">KONSISTENSI</p>
                  <p class="text-slate-600 text-sm">Kami memiliki praktik-praktik dan sistem pembelajaran terbaik untuk memastikan siswa kami menerima pendidikan yang berkualitas tinggi secara konsisten di setiap tahapan.</p>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="bg_custom absolute -top-10 -z-20"></div>
</section>
@push('js')
<script>
  const swiper = new Swiper('.swiper-info-after-login', {
                  effect: 'autoplay',
                  autoplay: {
                    delay: 1000,
                    pauseOnMouseEnter: true,
                  },
                  speed: 700,
                  spaceBetween: 100,
                });
        swiper.slideNext();
</script>
@endpush
@endsection
