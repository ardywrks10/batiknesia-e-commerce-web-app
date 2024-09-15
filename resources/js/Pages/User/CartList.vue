<script setup>
import { computed, ref, reactive } from 'vue'
import UserLayouts from './Layouts/UserLayouts.vue';
import { router, usePage } from '@inertiajs/vue3';

defineProps({
    userAddress: Object
})

const carts = computed(() => usePage().props.cart.data.items)
const products = computed(() => usePage().props.cart.data.products)
const jumlahTotal = computed(() => {
    return carts.value.reduce((total, item) => total + item.quantity, 0);
})

const discountCode = ref(null);
const subtotal = computed(() => usePage().props.cart.data.total)
const itemId = (id) => carts.value.findIndex((item) => item.product_id === id);

const form = reactive({
    address1: null,
    state: null,
    city: null,
    zipcode: null,
    country_code: null,
    type: null,
})

const formatCurrency = (value) => {
  const formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
  });
  return formatter.format(value);
};

const formFilled = computed(()=>{
   return (form.address1 !== null &&
    form.state !== null &&
    form.city !== null &&
    form.zipcode !== null &&
    form.country_code !== null &&
    form.type !== null )
})

const getDiscountPercentageForCode = (code) => {
    if (code.toLowerCase() === 'promo10') {
        return 10; 
    }
    else if (code.toLowerCase() === 'discount30') {
        return 30; 
    }
    else if (code.toLowerCase() === 'newyear23') {
        return 20; 
    }
    return 0; 
};

const discountAmount = computed(() => {
    if (discountCode.value) {
        const discountPercentage = getDiscountPercentageForCode(discountCode.value); // Replace with your logic
        return (subtotal.value * discountPercentage) / 100;
    }
    return 0;
});

const totalDenganDiskon = computed(() => {
    if (discountCode.value) {
        return subtotal.value - discountAmount.value;
    }
    return subtotal.value; 
});

const persentasePajak = 11; 
const pajak = computed(() => (totalDenganDiskon.value * persentasePajak) / 100);
const total = computed(() => totalDenganDiskon.value + pajak.value);

const update = (product, quantity) =>
    router.patch(route('cart.update', product), {
        quantity,
    });

const remove = (product) => router.delete(route('cart.delete', product));

function submit() {
    router.visit(route('checkout.store'), {
        method: 'post',
        data: {
            carts: usePage().props.cart.data.items,
            products: usePage().props.cart.data.products,
            subtotal: usePage().props.cart.data.total,
            total: total.value,
            address: form,
            discountCode: discountCode.value,
        }
    })

    Swal.fire({
        icon: 'success',
        title: 'Pesanan Terkirim!',
        text: 'Terimakasih telah melakukan pembelian',
        showConfirmButton: false,
        timer: 2000 
    });
}
</script>

<template>
    <UserLayouts>
        <section class="text-gray-600 body-font relative py-10">
            <div class="container pt-24 mx-auto">
                <div class="lg:w-full rounded-lg ">
                    <div class="flex p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <div class="text-2xl text-slate-700 font-bold tracking-wide pb-3">Keranjang Belanja</div>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Gambar</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-32 p-4">
                                    <img v-if="product.product_images.length > 0"
                                        :src="`/${product.product_images[0].image}`" alt="Apple Watch">
                                    <img v-else
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                                        alt="Apple Watch">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{ product.title }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <button @click.prevent="update(product, carts[itemId(product.id)].quantity - 1)"
                                            :disabled="carts[itemId(product.id)].quantity <= 1"
                                            :class="[carts[itemId(product.id)].quantity > 1 ? 'cursor-pointer text-purple-600' : 'cursor-not-allowed text-gray-300 dark:text-gray-500', 'inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700']"
                                            type="button">
                                            <span class="sr-only">Quantity button</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <div>
                                            <input
                                                type="number"
                                                v-model="carts[itemId(product.id)].quantity"
                                                @input="updateQuantity(product, $event)"
                                                class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required
                                                />
                                        </div>
                                        <button @click.prevent="update(product, carts[itemId(product.id)].quantity + 1)"
                                            class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                            type="button">
                                            <span class="sr-only">Quantity button</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 text-sm dark:text-white">
                                    {{formatCurrency(product.price)}}
                                </td>
                                <td class="px-6 py-4">
                                    <a @click="remove(product)" class="cursor-pointer font-medium text-center text-red-600 dark:text-red-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container  mx-auto flex sm:flex-nowrap flex-wrap">
                
                <div class="lg:w-2/3 md:w-1/2 mt-8 rounded-lg  sm:mr-10 p-10 pb-20 bg-gray-50">
                    <div v-if="userAddress">
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Shipping Address</h2>
                        <p class="leading-relaxed mb-5 text-gray-600">{{ userAddress.address1 }} , {{ userAddress.city }}, {{
                            userAddress.zipcode }}</p>
                        <p class="leading-relaxed mb-5 text-gray-600">or you can add new below</p>

                    </div>
                    <div v-else>
                        <p class="leading-relaxed mb-5 text-gray-800 text-md font-bold"> Tambahkan alamat untuk melanjutkan</p>
                    </div>
                    <form @submit.prevent="submit">
                        <div class="flex">
                            <div class="w-1/2 mr-5">
                                <div class="relative mb-4">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Alamat Lengkap</label>
                                    <input type="text" id="name" name="address1" v-model="form.address1"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="relative mb-4">
                                    <label for="email" class="leading-7 text-sm text-gray-600">Kota</label>
                                    <input type="text" id="email" name="city" v-model="form.city"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="relative mb-4">
                                    <label for="email" class="leading-7 text-sm text-gray-600">Negara</label>
                                    <input type="text" id="email" name="state" v-model="form.state"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="relative mb-4">
                                    <label for="email" class="leading-7 text-sm text-gray-600">RT</label>
                                    <input type="text" id="email" name="zipcode" v-model="form.zipcode"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="relative mb-4">
                                    <label for="email" class="leading-7 text-sm text-gray-600">RW</label>
                                    <input type="text" id="email" name="countrycode" v-model="form.country_code"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="relative mb-10">
                                    <label for="email" class="leading-7 text-sm text-gray-600">POS</label>
                                    <input type="text" id="email" name="type" v-model="form.type"
                                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <button v-if="formFilled || userAddress" type="submit"
                                    class="text-white bg-indigo-500 w-full border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Checkout</button>

                                <button v-else type="submit"
                                    class="bg-[#004AAD] inline-flex  items-center justify-center w-full px-5 py-3 mb-2 mr-2 text-sm font-medium text-white border border-gray-200 rounded-lg sm:w-auto focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Add
                                    Address to continue</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                    <div class="bg-gray-50 p-4 mb-10 pt-10">
                        <h2 class="text-gray-900 font-bold text-xl title-font mb-5">Order Summary</h2>
                        <hr class="py-2">
                        <div class="flex justify-between">
                            <p class="leading-relaxed mb-4 font-bold text-gray-900">Subtotal</p>
                            <p class="leading-relaxed mb-4 font-bold text-gray-900">{{ formatCurrency(subtotal) }} </p>
                        </div>
                        <div class="flex justify-between mb-5">
                            <label for="discountCodeSummary" class="leading-7 text-gray-900">Kode Voucher</label>
                            <input type="text" id="discountCodeSummary" name="discountCodeSummary" v-model="discountCode"
                                class="w-40 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="flex justify-between">
                            <p class="leading-relaxed mb-4 text-md  text-gray-600">Diskon</p>
                            <p class="leading-relaxed mb-4 text-md text-gray-600"> - {{ formatCurrency(discountAmount) }} </p>
                        </div>
                        <div class="flex justify-between mb-5">
                            <p class="leading-relaxed mb-4 text-md  text-gray-600">Pajak (11%)</p>
                            <p class="leading-relaxed mb-4 text-md  text-gray-600"> + {{ formatCurrency(pajak) }} </p>
                        </div>
                        <hr class="py-2">
                        <div class="flex justify-between">
                            <p class="leading-relaxed mb-4 text-xl font-bold text-gray-900">Total</p>
                            <p class="leading-relaxed  text-xl font-bold text-gray-900"> {{ formatCurrency(total) }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </UserLayouts>
</template>