<script setup>
import { ref } from "vue";
import UserLayouts from "./Layouts/UserLayouts.vue";

const promoCodes = ref({
    product1: "PROMO10",
    product2: "DISCOUNT30",
    product3: "NEWYEAR23",
});

const showPromoCode = ref({
    product1: false,
    product2: false,
    product3: false,
});

const togglePromoCode = (product) => {
    showPromoCode.value[product] = !showPromoCode.value[product];
};
</script>

<template>
    <UserLayouts>
        <Header></Header>

        <section class="pt-20 pb-20">
            <div class="container mx-auto p-4">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                    <!-- Product 1 -->
                    <div
                        class="bg-white p-8 rounded-lg shadow-md flex flex-col items-center"
                    >
                        <img
                            src="product_images/diskon1.jpg"
                            alt="Product Image"
                            class="w-full h-64 object-cover rounded-md mb-4"
                        />
                        <h1 class="text-2xl font-bold mb-4">Diskon Spesial!</h1>

                        <div class="flex items-center justify-between mb-4">
                            <div class="text-lg">Produk Terpilih</div>
                            <span class="text-red-500 font-bold"> -10%</span>
                        </div>

                        <div
                            class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-4 rounded-md"
                        >
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <!-- Icon keuntungan (misalnya: ceklis) -->
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-semibold">
                                        Hemat 10% untuk setiap pembelian
                                        pertama.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center mt-2">
                                <div class="flex-shrink-0">
                                    <!-- Icon keuntungan (misalnya: ceklis) -->
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-semibold">
                                        Produk berkualitas tinggi dengan harga
                                        yang lebih terjangkau.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center mt-2">
                                <div class="flex-shrink-0">
                                    <!-- Icon keuntungan (misalnya: ceklis) -->
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-semibold">
                                        Pengalaman belanja yang menguntungkan
                                        dan menyenangkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                            @click="togglePromoCode('product1')"
                        >
                            Lihat Kode Promo
                        </div>
                        <!-- Display the promo code if it is set to show -->
                        <div v-if="showPromoCode.product1">
                            <p class="mt-4">
                                Kode Promo: {{ promoCodes.product1 }}
                            </p>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div
                        class="bg-white p-8 rounded-lg shadow-md flex flex-col items-center"
                    >
                        <img
                            src="product_images/diskon2.jpg"
                            alt="Product Image"
                            class="w-full h-64 object-cover rounded-md mb-4"
                        />
                        <h1 class="text-2xl font-bold mb-4">Diskon Spesial!</h1>

                        <div class="flex items-center justify-between mb-4">
                            <div class="text-lg">Produk Terpilih</div>
                            <span class="text-red-500 font-bold"> -30%</span>
                        </div>

                        <div
                            class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-4 rounded-md"
                        >
                            <div class="flex items-center mt-2">
                                <div class="flex-shrink-0">
                                    <!-- Icon keuntungan (misalnya: ceklis) -->
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-semibold">
                                        Beli 3 produk sekaligus dan dapatkan
                                        diskon 30%!
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center mt-2">
                                <div class="flex-shrink-0">
                                    <!-- Icon keuntungan (misalnya: ceklis) -->
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-semibold">
                                        Produk berkualitas tinggi dengan harga
                                        yang lebih terjangkau.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center mt-2">
                                <div class="flex-shrink-0">
                                    <!-- Icon keuntungan (misalnya: ceklis) -->
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-semibold">
                                        Pengalaman belanja yang menguntungkan
                                        dan menyenangkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                            @click="togglePromoCode('product2')"
                        >
                            Lihat Kode Promo
                        </div>
                        <!-- Display the promo code if it is set to show -->
                        <div v-if="showPromoCode.product2">
                            <p class="mt-4">
                                Kode Promo: {{ promoCodes.product2 }}
                            </p>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div
                        class="bg-white p-8 rounded-lg shadow-md flex flex-col items-center"
                    >
                        <img
                            src="product_images/diskon3.jpg"
                            alt="Product Image"
                            class="w-full h-64 object-cover rounded-md mb-4"
                        />
                        <h1 class="text-2xl font-bold mb-4">Diskon Spesial!</h1>

                        <div class="flex items-center justify-between mb-4">
                            <div class="text-lg">Produk Terpilih</div>
                            <span class="text-red-500 font-bold"> -20%</span>
                        </div>

                        <div
                            class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-4 rounded-md"
                        >
                            <div class="flex items-center mt-2">
                                <div class="flex-shrink-0">
                                    <!-- Icon keuntungan (misalnya: ceklis) -->
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-semibold">
                                        Diskon Spesial Tahun Baru! Hemat 20%
                                        untuk pembelian spesial ini.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center mt-2">
                                <div class="flex-shrink-0">
                                    <!-- Icon keuntungan (misalnya: ceklis) -->
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-semibold">
                                        Produk berkualitas tinggi dengan harga
                                        yang lebih terjangkau.
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center mt-2">
                                <div class="flex-shrink-0">
                                    <!-- Icon keuntungan (misalnya: ceklis) -->
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-semibold">
                                        Pengalaman belanja yang menguntungkan
                                        dan menyenangkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                            @click="togglePromoCode('product3')"
                        >
                            Lihat Kode Promo
                        </div>
                        <!-- Display the promo code if it is set to show -->
                        <div v-if="showPromoCode.product3">
                            <p class="mt-4">
                                Kode Promo: {{ promoCodes.product3 }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <Footer></Footer>
    </UserLayouts>
</template>
