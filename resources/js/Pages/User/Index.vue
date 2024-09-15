<script setup>
import { Link, router, useForm } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import Hero from './Layouts/Hero.vue';
import Products from '../User/Components/Products.vue';
import Toastify from 'vue3-toastify';
import 'vue3-toastify/dist/index.css'; // Import the styles

// Products list
defineProps({
    products: Array,
});
</script>
<template>
    <UserLayouts>
        <!-- here section  -->
        <Hero></Hero>
        <!-- end -->
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <Link :href="route('products.index')" class="flex">
                    <h2 class="text-2xl mr-2 font-extrabold">Daftar <span class="">produk</span></h2>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </Link>
                <!-- product list component -->
                <Products :products="products"></Products>
                <!-- end -->
                <Toastify position="top-right" />
            </div>
        </div>
    </UserLayouts>
</template>


