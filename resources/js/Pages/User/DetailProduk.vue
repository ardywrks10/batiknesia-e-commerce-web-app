<script setup>
import { defineProps, ref, onMounted } from 'vue';
import { Link, router, usePage, useForm} from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import 'vue3-toastify/dist/index.css';
import Swal from 'sweetalert2';

defineProps({
    errors:Object,
    product:Array,
    stars: Array,
    reviews:Object,
});

// Daftar Variabel
const selectedSize = ref(null);
const jumlahItem = ref(1);


const items = ref([
    {id : 9, title:'Batik Khas Solo', image:'/product_images/solo.png', rate: 4.5, type:'Kemeja', price:276000},
    {id : 10, title:'Batik Keraton', image:'/product_images/keraton.png', rate: 4.2, type:'Kemeja', price:319000},
    {id : 11, title:'Batik Lasem', image:'/product_images/batik11.png', rate: 4.8, type:'Dress', price:350000},
    {id : 12, title:'Batik Mayung', image:'/product_images/batik1.png', rate: 3.9, type:'Kemeja', price:425000},
]);


const form = useForm({
    username: null,
    rating: null,
    comment: null,
    product_id:null,
});

function submit() {
    router.post('/produks', form);
    form.username = null;
    setRating(0);
    form.comment = null;
    form.product_id = null;

    Swal.fire({
        icon: 'success',
        title: 'Ulasan Terkirim!',
        text: 'Terimakasih telah memberikan ulasan',
        showConfirmButton: false,
        timer: 2000 
    });

}


const stars = ref(Array(5).fill('☆'));
const setRating = (rating) => {
    form.rating = rating; 
    stars.value = stars.value.map((_, index) => (index < rating ? '★' : '☆'));
};

const setSize = (size) => {
    selectedSize.value = size;
};

const tambahItem = () => {
    jumlahItem.value += 1;
};

const kurangiItem = () => {
    if (jumlahItem.value > 1) {
        jumlahItem.value -= 1;
    }
};

const formatCurrency = (value) => {
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    });
    return formatter.format(value);
};

const addToCart = (product) => {
    if (!selectedSize.value) {
        return;
    }
    const cartItem = {
        product: product,
        size: selectedSize.value,
    };
    router.post(route('cart.store', cartItem), {
        onSuccess: (page) => {
        },
    });
};

</script>


<template>
    <UserLayouts>
        <Header></Header>
        <section class="bg-white dark:bg-gray-900 pt-20 pb-24">
            <div class="container mx-auto px-6 pt-28">
                <div class="lg:flex">
                    <div class="lg:w-1/2 w-10/12 items-center">
                        <div class="image">
                            <img v-if="product.product_images.length > 0" :src="`/${product.product_images[0].image}`" :alt="product.imageAlt" class="w-4/5 h-72 text-right object-cover xl:h-full rounded-lg">
                        </div>
                    </div>
                    <div class="w-full -ml-10 lg:w-1/2">
                        <h1 class="nama_menu text-xl font-extrabold capitalize lg:text-3xl dark:text-white">{{ product.title }}</h1>
                        <div class="mt-4 lg:row-span-3 lg:mt-0">
                            <h2 class="sr-only">Product information</h2>
                            <p class="text-3xl tracking-tight text-gray-900 py-5">{{ formatCurrency(product.price) }}</p>
                            <div class="flex items-center">
                                <div v-for="star in 5" :key="star" class="text-yellow-500 h-5 w-5 flex-shrink-0">
                                    <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="sr-only">5 out of 5 stars</p>
                                <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">98 reviews</a>
                            </div>
                            <p class="text-justify text-md text-gray-500 py-5">{{ product.description }}</p>
                            <h1 class="text-xl font-bold mb-4 mt-3 text-gray-500 ">Pilih Ukuran : </h1>
                            <div class="flex flex-row my-3 mb-10">
                                <div v-for="size in ['S', 'M', 'L', 'XL']" :key="size" @click="setSize(size)" :class="{ 'bg-blue-700 text-white': selectedSize === size }" class="mr-3 cursor-pointer border-2 border-gray-200 text-blue-700 rounded-md text-sm px-3 py-3">{{ size }}</div>
                            </div>
                            <div class="md:flex md:items-start mt-3">
                                <div class="flex items-center border border-blue-400 rounded-full px-4">
                                   <button @click="kurangiItem" class="p-2 bg-white rounded-lg mr-2">
                                        <svg class="fill-current text-blue-600 w-4 h-4" viewBox="0 0 448 512">
                                            <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                                        </svg>
                                    </button>
                                    <input v-model="jumlahItem" class="py-1 rounded-sm text-center w-16 lg:w-20 border-none focus:outline-none" type="number" min="1">
                                    <button @click="tambahItem" class="p-2 bg-white rounded-lg ml-2">
                                        <svg class="fill-current text-blue-600 violet-600 w-4 h-4" viewBox="0 0 448 512">
                                            <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                                        </svg>
                                    </button>
                                </div>  
                            </div>
                            <div class="flex-auto flex space-x-4 mt-8">
                                <button @click="addToCart(product)" class="h-10 p-2 pl-3 pr-3 font-semibold bg-[#004AAD] rounded-lg text-white" type="submit">
                                    <div class="flex">
                                        <div class="mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                            </svg>
                                        </div>
                                        <p>Pesan Sekarang</p>
                                    </div>
                                </button>
                                <button @click="addToCart(product)" data-bs-toggle="modal" data-bs-target="#exampleModalLg" class="h-10 p-2 pl-3 pr-3 font-semibold rounded-lg border border-[#004AAD] text-[#004AAD]" type="button">Tambah ke Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <section id="review" class=" pb-20 pt-20 bg-gray-100">
                <div class="container flex mx-auto px-6 ">
                    <div class="w-3/5 px-8 py-12 bg-white mr-16">
                        <h1 class="text-xl font-bold mb-4 text-gray-500 ">Berikan Ulasan</h1>
                        <hr>
                        <form @submit.prevent="submit" class="mb-8 mt-8">
                            <div class="mb-4">
                                <label for="userReview" class="block text-gray-600 font-medium pb-2">Ulasan</label>
                                <textarea type="text" ref="comment" v-model="form.comment" id="comment" name="comment" rows="4" class="w-full bg-gray-100 p-3 rounded-sm " placeholder="Berikan ulasan anda ....."></textarea>
                                <div class="text-red-500 text-md" v-if="errors.comment">{{ errors.comment }}</div>
                            </div>
                            <div class="mb-4 mx-auto">
                                <label for="userName" class="block text-gray-600 font-medium pb-2 pt-2">Rating</label>
                                <div class="flex items-center justify-center text-center mt-2">
                                <div class="rating" id="ratingStars">
                                    <span v-for="(star, index) in stars" :key="index" @click="setRating(index + 1)" class=" text-3xl cursor-pointer text-orange-500">{{ star }}</span>
                                </div>
                                <input type="hidden" ref="rating" v-model="form.rating" id="form.rating" name="form.rating">
                                <div class="text-red-500 text-md" v-if="errors.rating">{{ errors.rating }}</div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="userReview" class="block text-gray-600 font-medium pb-2">Id Produk</label>
                                <input type="number" ref="product_id" v-model="form.product_id" id="comment" name="comment" rows="4" class="w-full bg-gray-100 p-3 rounded-sm focus:outline-none" :placeholder="product.id">
                                <div class="text-red-500 text-md" v-if="errors.product_id">{{ errors.product_id }}</div>
                            </div>
                            <div class="flex justify-between">
                                
                            </div>
                            <button type="submit" class="bg-[#004AAD] mt-10 mr-5 text-white py-2 px-4 rounded-sm text-sm hover:bg-[#004AAD]">Kirim Ulasan</button>
                            <Link :href="`/reviews/${product.id}`" class=" text-left hover:bg-[#004AAD] text-sm hover:text-white  transition ease-in-out delay-50 font-bold mb-4 mx-auto border-[#004AAD] border text-[#004AAD] py-2 px-4">Daftar Ulasan</Link>
                        </form>
                    </div>
                    <div class="w-2/5">
                        <Link :href="route('products.index')" class="flex">
                            <h2 class="text-xl mr-2 font-extrabold">People <span class="">also view</span></h2>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </Link>
                        <div class="mt-10 ">
                            <div class="">
                                <div v-for="item in items" :key="item.id"   class=" group relative mt-6">
                                    <div v-if = "item.id != product.id">
                                        <div class="flex justify-between rounded-md hover:bg-white hover:transition-transform hover:scale-105 hover:duration-300 hover:shadow-lg hover:ease-in-out p-4">
                                            <div class="flex">
                                                <img :src="item.image" :alt="item.imageAlt" class="h-20 w-20 rounded-lg shadow-lg mr-4" />
                                                <div>
                                                    <a :href="'/produk/' + item.id" class="text-md text-slate-700">
                                                        <span class="font-extrabold text-black text-lg">{{ item.title }}</span>
                                                    </a>
                                                    <div class="flex pt-4">
                                                        <p class="text-sm mr-2"> {{ item.rate }}</p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-4 h-4 text-orange-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                        </svg>
                                                        <p class="text-sm mr-2"> | {{ item.type }}</p>
                                                    </div>
                                                </div> 
                                            </div>
                                        <div>
                                            <p class="text-sm mr-2 mt-1 bg-gray-200 p-2">  {{ formatCurrency(item.price) }}</p>
                                        </div>
                                    </div>
                                    <hr class="border border-slate-200">
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </section>
        <Footer></Footer>
    </UserLayouts>
</template>