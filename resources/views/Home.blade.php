@extends('app')
@section('title', "Beranda")
@section('content')
<section class="main_page w-full h-full min-h-screen">
    <div class="upper_section flex justify-center">
        <div class="lg:w-3/4 w-11/12 mt-10 mb-20 overflow-x-hidden">
            <div class="swiper-info-home mt-5">
                <div class="swiper-wrapper">
                    <div class="swiper-slide w-auto">
                      <img src="https://source.unsplash.com/random/?city,night" class="w-full md:max-h-96 max-h-48 rounded-md" />
                    </div>
                    <div class="swiper-slide w-auto">
                       <img src="https://source.unsplash.com/random/?city,night" class="w-full md:max-h-96 max-h-48 rounded-md" />
                    </div>
                </div>
            </div>
            <div class="about_school lg:mt-10 mt-5">
                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                    <div class="about lg:mt-20 mt-5 lg:mb-0 mb-5">
                        <div class="flex items-center justify-center md:space-x-2 space-x-1">
                            <p class="md:text-2xl text-sm text-center">Welcome to,</p>
                            <p class="md:text-2xl text-sm font-extrabold uppercase tracking-widest" style="font-family: 'Roboto Slab', serif;">Guh International School</p>
                        </div>
                        <p class="mt-3 text-slate-600 text-center md:text-base text-sm">Kami sangat senang Anda memilih sekolah kami untuk perjalanan
                            pendidikan Anda. Di sini, Anda akan menemukan lingkungan yang mendukung, guru yang
                            berkomitmen, dan peluang tak terbatas untuk belajar, tumbuh, menjalin hubungan yang berarti
                            dengan sesama siswa, dan menjelajahi beragam kegiatan ekstrakurikuler yang akan membantu
                            Anda mengembangkan minat dan bakat Anda.</p>
                    </div>
                    <div class="image_main">
                        <img src="{{ asset("img/main_image.png") }}" class="w-full h-full" alt="Main Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="keunggulan_section w-full bg-gradient-to-l from-blue-500 to-blue-primary p-8">
        <div class="flex justify-center">
            <div class="md:w-3/4 w-full bg-white rounded-md shadow-md shadow-blue-300 p-4">
                <p class="md:text-base text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis consectetur veniam distinctio
                    accusantium architecto, error quam explicabo impedit doloribus consequuntur nesciunt? Unde ratione,
                    quas rerum placeat quidem aliquam eaque sunt optio, dolores quo quia odio velit magni accusamus
                    impedit suscipit earum temporibus quae molestias vitae consequuntur harum id. Placeat voluptatem
                    fugiat eveniet perferendis et? Natus nam sit quibusdam fuga architecto, unde aut, repudiandae,
                    possimus sed deleniti assumenda veritatis eaque nulla distinctio et autem adipisci. Animi
                    exercitationem sed, quia dignissimos sit tempora cupiditate aut eveniet ducimus nostrum pariatur
                    aliquid minus reprehenderit iure inventore nam laboriosam similique laborum sequi libero. Incidunt,
                    sapiente.</p>
            </div>
        </div>
    </div>
    <div class="extrakurikuler_section mt-5 mb-20">
        <div class="flex justify-center">
            <div class="w-3/4">
                <div class="header_text mb-5">
                    <p class="text-center text-2xl font-semibold text-slate-600 uppercase">extracurricular</p>
                    <div class="custom_border flex justify-center items-center space-x-4 mt-2">
                        <div class="w-[40px] h-[5px] rounded bg-gradient-to-l from-red-300 via-yellow-400 to-blue-400"></div>
                        <div class="w-[40px] h-[5px] rounded bg-gradient-to-r from-red-300 via-yellow-400 to-blue-400"></div>
                    </div>
                </div>
                <div class="list_extra grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-5">
                    <div class="basket w-full group bg-blue-200 hover:bg-blue-500 border-2 border-blue-500 transition-colors duration-200 cursor-pointer shadow-md flex justify-around items-center p-2 py-4 rounded">
                        <img src="{{ asset("img/Extra_IMG/basket-ball.png") }}" class="w-20 h-20" alt="">
                        <p class="text-slate-600 group-hover:text-white font-bold text-2xl">BASKET</p>
                    </div>
                    <div class="basket w-full group bg-green-200 hover:bg-green-500 border-2 border-green-500 transition-colors duration-200 cursor-pointer shadow-md flex justify-around items-center p-2 py-4 rounded">
                        <img src="{{ asset("img/Extra_IMG/robotic.png") }}" class="w-20 h-20" alt="">
                        <p class="text-slate-600 group-hover:text-white font-bold text-2xl">ROBOTIC</p>
                    </div>
                    <div class="basket w-full group bg-violet-200 hover:bg-violet-500 border-2 border-violet-500 transition-colors duration-200 cursor-pointer shadow-md flex justify-around items-center p-2 py-4 rounded">
                        <img src="{{ asset("img/Extra_IMG/kir.png") }}" class="w-20 h-20" alt="">
                        <p class="text-slate-600 group-hover:text-white font-bold text-2xl text-center">KARYA ILMIAH REMAJA</p>
                    </div>
                    <div class="basket w-full group bg-yellow-200 hover:bg-yellow-500 border-2 border-yellow-500 transition-colors duration-200 cursor-pointer shadow-md flex justify-around items-center p-2 py-4 rounded">
                        <img src="{{ asset("img/Extra_IMG/sinematografi.png") }}" class="w-20 h-20" alt="">
                        <p class="text-slate-600 group-hover:text-white font-bold text-2xl">SINEMATOGRAFI</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('js')
<script>
  const swiper = new Swiper('.swiper-info-home', {
                  freeMode: true,
                  speed: 700,
                  spaceBetween: 100,
                  grabCursor: true,
                });
        swiper.slideNext();
</script>
@endpush
@endsection
