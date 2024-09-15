<script setup>
import { defineProps } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import Hero from './Layouts/Hero.vue';
import Products from '../User/Components/Products.vue';
import Toastify from 'vue3-toastify';
import 'vue3-toastify/dist/index.css'; // Import the styles
const { products } = defineProps(['products']);

// Data
const batikItems = [
  {
    title: 'Kemeja Batik Solo',
    image: '/product_images/solo.png',
    description: 'Batik Solo adalah salah satu jenis batik tradisional Indonesia yang berasal dari kota Surakarta, yang juga dikenal sebagai Solo.',
  },
  {
    title: 'Kemeja Batik Gentongan',
    image: '/product_images/gentongan.png',
    description: 'Batik Gentongan adalah jenis batik yang memiliki ciri khas kaya warna dan bervarias, mencerminkan keberagaman masyarakat Madura.',
  },
  {
    title: 'Kemeja Batik Keraton',
    image: '/product_images/keraton.png',
    description: 'Batik Keraton adalah seni tradisional pewarnaan kain yang dilakukan dengan menggunakan malam atau lilin untuk mencegah pewarna menyebar ke seluruh kain. Proses ini memberikan pola-pola yang indah dan rumit pada kain.',
  },
  {
    title: 'Kemeja Batik Mayung',
    image: '/product_images/mayung.png',
    description: 'Batik Mayung sangat dikenal pas untuk dikenakan pada saat kondangan (menghadiri pesta pernikahan). Ini karena Batik Mayung memiliki motif yang sangat menarik serta dibuat dari bahan berkualitas.',
  },
  {
    title: 'Kemeja Batik Garutan',
    image: '/product_images/batik2.png',
    description: 'Batik Garutan merujuk pada batik yang diproduksi atau berasal dari Garut, sebuah kota di Jawa Barat, Indonesia. Garut dikenal sebagai salah satu pusat produksi batik di Indonesia, dan batik yang dihasilkan dari daerah ini memiliki ciri khas tertentu.',
  },
  {
    title: 'Kemeja Batik Tibodunyo',
    image: '/product_images/batik4.png',
    description: 'Kemeja Batik Tibodunyo adalah simbol elegansi dan keindahan warisan budaya Indonesia yang terwujud dalam setiap motif dan warnanya. Dengan sentuhan modern, kemeja ini tidak hanya menampilkan keahlian tinggi dalam pembuatan batik tradisional',
  },
  {
    title: 'Kemeja Batik Lasem',
    image: '/product_images/batik11.png',
    description: 'Batik Lasem adalah gaya batik tradisional yang berasal dari daerah Lasem, sebuah kota kecil di Jawa Tengah, Indonesia. Batik Lasem memiliki ciri khas tertentu yang membedakannya dari gaya batik lainnya',
  },
  {
    title: 'Kemeja Batik Semar',
    image: '/product_images/batik12.png',
    description: 'Batik Semar adalah gaya batik tradisional yang memiliki kaitan dengan tokoh mitologi Jawa, yaitu Semar. Semar merupakan salah satu tokoh dalam wayang kulit Jawa yang dikenal sebagai tokoh cerdas, bijaksana, dan memiliki peran sebagai dalang spiritual. ',
  },
];

</script>
<template>
    <UserLayouts>
        <!-- here section  -->
        <Header></Header>
        <!-- end -->
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl">
                <section class="bg-white lg:py-16">
                    <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-10 lg:px-6">
                        <div class="lg:flex lg:flex-wrap">
                            <div class="lg:w-1/3 lg:pr-20">
                                <h1 class="font-bold text-3xl">Populer <span class="text-[#004AAD]">untuk Batik</span></h1>
                                <div class="news-1">
                                    <img src="/product_images/berita1.jpg" alt="" class="rounded-lg mt-10 mb-5">
                                    <a href="https://travel.kompas.com/read/2020/10/05/174000427/alasan-batik-indonesia-diakui-unesco-sebagai-warisan-budaya-dunia?page=all" text-slate-800 text-center text-xl my-10><p class="text-lg">Alasan Batik Indonesia Diakui UNESCO Sebagai Warisan Budaya Dunia</p></a>
                                </div>
                                <div class="news-2">
                                    <img src="/product_images/btk.jpg" alt="" class="rounded-lg mt-10 mb-5">
                                    <a href="https://id.my-best.com/136342" text-slate-800 text-center text-xl my-10><p class="text-lg">10 Rekomendasi Kemeja Batik Pria Terbaik (Terbaru Tahun 2023)</p></a>
                                </div>
                                <div class="news-3">
                                    <img src="/product_images/btk2.jpg" alt="" class="rounded-lg mt-10 mb-5">
                                    <a href="https://www.kompas.com/tren/read/2022/10/02/130000065/hari-ini-dalam-sejarah--batik-ditetapkan-sebagai-warisan-budaya-dunia?page=all" text-slate-800 text-center text-xl my-10><p class="text-lg">Hari Ini dalam Sejarah: Batik Ditetapkan sebagai Warisan Budaya Dunia</p></a>
                                </div>
                                <div class="news-3">
                                    <img src="/product_images/btk2.jpg" alt="" class="rounded-lg mt-10 mb-5">
                                    <a href="https://www.kompas.com/tren/read/2022/10/02/130000065/hari-ini-dalam-sejarah--batik-ditetapkan-sebagai-warisan-budaya-dunia?page=all" text-slate-800 text-center text-xl my-10><p class="text-lg">Hari Ini dalam Sejarah: Batik Ditetapkan sebagai Warisan Budaya Dunia</p></a>
                                </div>
                            </div>
                            <div class="lg:w-2/3 items-center">
                                <h2 class="text-3xl text-center font-bold text-[#004AAD] mb-10">Filosofi <span class="text-slate-800">Kemeja Batik</span></h2>
                                <hr class="my-6 sm:mx-auto dark:border-gray-700 lg:my-4 lg:w-full lg:h-2">
                                <div class="lg:grid grid-cols-3 lg:gap-7">
                                <div v-for="(batik, index) in batikItems" :key="index">
                                    <div>
                                    <div>
                                        <div class="img mb-5 group relative overflow-hidden">
                                        <img :src="batik.image" alt="" class="rounded-lg hover:scale-105 transition duration-300 ease-in-out"/>
                                        <div class="absolute inset-0 bg-[rgba(246,248,251,0.83)] opacity-0 hover:scale-105 transition duration-300 ease-in-out group-hover:opacity-100 flex items-center justify-center">
                                            <p class="text-slate-800 text-center text-sm p-3">{{ batik.description }}</p>
                                        </div>
                                        </div>
                                        <h2 class="text-center font-bold text-lg mb-4">{{ batik.title }}</h2>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <Footer></Footer>
    </UserLayouts>
</template>