<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import Swiper from 'swiper';
import 'swiper/css';

</script>

<template>
     <section class="bg-white dark:bg-gray-900 pt-20">
        <div class="bg-slate-50">
        <!-- Isi konten atau elemen lain di sini -->
        <section  class="bg-indigo-900 dark:bg-gray-900">
            <div class="swiper slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden"
                id="top">
                <div class="swiper-wrapper" aria-live="off"
                    style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                    <div class="swiper-slide bg-indigo-900 dark:bg-gray-900 swiper-slide-active" role="group"
                        aria-label="1 / 3">
                        <div
                            class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 justify-start">
                            <div class="mr-auto place-self-center lg:col-span-7">
                                <h1 class="max-w-2xl mb-4 font-bold text-white text-3xl lg:text-6xl  dark:text-white">
                                    Keren, Murah dan <br /> Berkualitas</h1>
                                <p
                                    class="max-w-2xl mb-6 font-light text-white lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                                    Memahami dan menghargai warisan budaya, dapat memperkaya jati diri bangsa dan mempromosikan keberagaman yang menjadikan kita kuat</p>
                                <a href="#"
                                    class="p-4 inline-flex items-center justify-center py-3 mr-3 text-base font-medium text-center text-[#004AAD] rounded-lg bg-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                    Pesan Sekarang
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-[#004AAD]" width="16" height="16" fill="currentColor"  viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                    </svg>
                                </a>
                            </div>
                            <div  class=" hidden lg:mt-0 lg:col-span-5 lg:flex ">
                                <img src="product_images/kemeja10.png" alt="mockup" class=" w-4/5 rounded-full" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-xhidden overflow-y-auto"
            id="exampleModalLg" tabindex="-1" arialabelledby="exampleModalLgLabel" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col wfull pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    @include('frontpage.calendar')
                </div>
            </div>
        </div>
        <section id="about" class="bg-gray-50 dark:bg-gray-800">
            <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
                <!-- Row -->
                <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                    <div class="flex">
                        <img class="hidden w-1/2 xl:h-[350px] mt-10 mb-4 rounded-lg lg:mb-0 lg:flex mr-8 shadow-lg hover:scale-105 transition duration-300 ease-in-out" src="/product_images/kemeja3.png" alt="dashboard feature image">
                        <div>
                            <img class="hidden mb-4 w-full xl:h-[200px] rounded-lg lg:mb-5 lg:flex mb shadow-lg hover:scale-105 transition duration-300 ease-in-out" src="/product_images/kemeja2.png" alt="dashboard feature image">
                            <img class="hidden mb-4 w-full xl:h-[200px] rounded-lg lg:mb-0 lg:flex shadow-lg hover:scale-105 transition duration-300 ease-in-out" src="/product_images/kemeja1.png" alt="dashboard feature image">
                        </div>
                    </div>
                    <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                        <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Mengapa memilih <span class="text-[#004AAD]">BatikNesia</span>?</h2>
                        <p class="mb-8 font-light lg:text-xl">Memilih batik kemeja adalah sebuah bentuk penghormatan terhadap warisan budaya Indonesia. Batik bukan sekadar pakaian, melainkan simbol dari kekayaan tradisi dan seni yang telah diwariskan dari generasi ke generasi</p>
                        <!-- List -->
                        <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-[#004AAD] dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Bahan berkualitas tinggi</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-[#004AAD] dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Penggunaan teknik tradisional namun cermat</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-[#004AAD] dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Desain dan motif yang estetis</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-[#004AAD] dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Batik khas beragam daerah di Indonesia</span>
                            </li>
                        </ul>
                        <p class="mb-8 font-light lg:text-xl">Setiap helai kain batik menjadi pengingat akan keberagaman dan keunikan Indonesia</p>
                    </div>.
                </div>
                <!-- Row -->
            </div>
      </section>
      <section class="bg-white ">
        <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
            <div class="lg:flex lg:flex-wrap">
                <div class="lg:w-1/3 lg:pr-20">
                    <h1 class="font-bold text-4xl">Filosofi <span class="text-[#004AAD]">Batik</span></h1>
                    <p class="pt-10 mb-8 text-lg font-medium tracking-tight text-gray-600 dark:text-white ">
                        Batik, sebagai seni tradisional Indonesia, memiliki filosofi yang mendalam. Dalam setiap corak dan warna, terdapat makna yang mengandung 
                        nilai-nilai mendalam tentang kehidupan, kearifan lokal, dan warisan budaya.
                    </p>
                    <Link :href="route('history.kocak')" class="text-[#004AAD] border border-[#004AAD] transition ease-in-out delay-50 hover:bg-[#004AAD] hover:text-white focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 0  
                    focus:outline-none">Explore Selengkapnya</Link>
                </div>
                <div class="lg:w-2/3 items-center">
                    <div class="lg:grid grid-cols-3 lg:gap-7">
                        <div>
                            <div class="">
                                <div class="img mb-5 group relative overflow-hidden">
                                    <img src="/product_images/solo.png" alt="" class="rounded-lg hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="absolute inset-0 bg-[rgba(246,248,251,0.83)] opacity-0 hover:scale-105 transition duration-300 ease-in-out group-hover:opacity-100 flex items-center justify-center">
                                        <p class="text-slate-800 text-center text-sm p-3">Batik Solo adalah salah satu jenis batik tradisional Indonesia yang berasal dari kota Surakarta, 
                                        yang juga dikenal sebagai Solo.</p>
                                    </div>
                                </div>
                                <h2 class="text-center font-bold text-lg mb-4">Batik Solo</h2>
                            </div>    
                        </div>
                        <div>
                            <div class="">
                                <div class="img mb-5 group relative overflow-hidden">
                                    <img src="/product_images/gentongan.png" alt="" class="rounded-lg hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="absolute inset-0 bg-[rgba(246,248,251,0.83)] opacity-0 hover:scale-105 transition duration-300 ease-in-out group-hover:opacity-100 flex items-center justify-center">
                                        <p class="text-slate-800 text-center text-sm p-3">Batik Gentongan adalah jenis batik yang memiliki ciri khas kaya warna dan bervarias, 
                                    mencerminkan keberagaman masyarakat Madura.</p>
                                    </div>
                                </div>
                                <h2 class="text-center font-bold text-lg mb-4">Batik Gentongan</h2>
                            </div>
                        </div>
                        <div>
                            <div class="">
                                <div class="img mb-5 group relative overflow-hidden">
                                    <img src="/product_images/keraton.png" alt="" class="rounded-lg hover:scale-105 transition duration-300 ease-in-out">
                                    <div class="absolute inset-0 bg-[rgba(246,248,251,0.83)] opacity-0 hover:scale-105 transition duration-300 ease-in-out group-hover:opacity-100 flex items-center justify-center">
                                        <p class="text-slate-800 text-center text-sm p-3">Batik Keraton ini mencerminkan keagungan, keindahan, dan kehalusan yang terkait dengan budaya istana.</p>
                                    </div>
                                </div>
                                <h2 class="text-center font-bold text-lg mb-4">Batik Keraton</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <section id="diskon" class="max-w-screen-xl mx-auto">
            <div class="container">
                <div class="flex flex-wrap justify-center hp:flex-wrap-reverse">
                    <div class="w-full items-center px-12 lg:w-1/2 mt-20">
                        <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                            <h2 class="mb-4 text-3xl pb-5 font-extrabold tracking-tight text-[#004AAD] dark:text-white">Diskon fantastis, <span class="text-orange-500">belanja jadi lebih seru!</span></h2>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-12 mr-10 text-[#004AAD] bg-white px-2 rounded-full" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                <p class=" mb-8 font-light lg:text-md">Diskon istimewa yang kami sediakan dimulai dari angka yang sangat menarik, memberikan anda kesempatan untuk menikmati produk berkualitas dengan harga yang lebih terjangkau.</p>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-12 mr-10 text-[#004AAD] bg-white px-2 rounded-full" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                                </svg>

                                <p class="mb-8 font-light lg:text-md">Diskon ini sangat terbatas dan hanya berlaku pada hari-hari tertentu. Jadi, pastikan Anda tidak melewatkan kesempatan emas ini untuk mendapatkan penawaran istimewa</p>
                            </div>
                        </div>
                        <Link :href="route('diskon.promo')" class="text-[#004AAD] border border-[#004AAD] transition ease-in-out delay-50 hover:bg-[#004AAD] hover:text-white focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 0  focus:outline-none">Check Detail</Link>
                    </div>
                    <div class="w-full  px-12 lg:px-2 lg:w-1/2 ">
                        <div id="controls-carousel" class="relative" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative w-[620px] h-[500px] overflow-hidden rounded-lg">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item ="active">

                                   <img src="/product_images/diskon1.jpg" alt="" class="h-[300px] w-[620px] mt-24 rounded-lg">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>

                                <img src="/product_images/diskon3.jpg" alt="" class="h-[300px] w-[620px] mt-24 rounded-lg">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out " data-carousel-item>
                                    <img src="/product_images/diskon3.jpg" alt="" class="h-[300px] w-[620px] mt-24 rounded-lg">

                                </div>
                                <!-- Item 4 -->
                                <div class="hidden duration-700 ease-in-out items-center" data-carousel-item>
                                    <img src="/product_images/diskon4.png" alt="" class="h-[300px] w-[620px] mt-24 rounded-lg">
                                </div>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 dark:bg-gray-800/30 group-hover:bg-black/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 dark:bg-gray-800/30 group-hover:bg-black/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     </div>
    </section>
</template>
