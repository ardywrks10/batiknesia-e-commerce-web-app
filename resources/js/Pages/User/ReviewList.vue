<script setup>
import { Link, router, useForm } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import {defineProps} from 'vue';
import Hero from './Layouts/Hero.vue';
import Products from '../User/Components/Products.vue';
import Toastify from 'vue3-toastify';
import 'vue3-toastify/dist/index.css'; // Import the styles

// Products list
defineProps({
    reviews: Array,
});

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('en-US', options);
};

</script>
<template>
    <UserLayouts>
        <div class="bg-slate-200 pt-10">
            <div class="mx-auto max-w-2xl px-4 py-40 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-3xl  font-bold  mb-10">Daftar <span class="text-[#004AAD]">Ulasan</span></h2>
                <div class="space-y-4 w-2/3">
                    <div v-for="(review, index) in reviews" :key="index" class="bg-white p-8 rounded-lg mb-4 text-left ">
                        <div class="flex mb-2">
                            <img src="/product_images/unknown.jpg" class="w-6 h-6 mr-3 rounded-lg" alt="">
                            <p class="font-bold ">{{ review.name}}</p>
                            <span class="text-gray-500 ml-auto">{{ formatDate(review.created_at) }}</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <p class="text-2xl" v-for="i in 5" :key="i" style="color: gold">{{ i <= review.rating ? '★' : '☆' }}</p>
                            </div>
                            <p class="text-gray-700">{{ review.comment }}</p>
                        </div>
                    </div>
                    <div class="w-1/3">

                    </div>
            </div>
        </div>
    </UserLayouts>
</template>