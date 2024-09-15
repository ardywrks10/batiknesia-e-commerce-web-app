<script setup>
import UserLayouts from './Layouts/UserLayouts.vue'

defineProps({
    orders: Array
})

const formatCurrency = (value) => {
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    });
    return formatter.format(value);
};

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('en-US', options);
};
</script>
<template>
    <UserLayouts>
        <div class="relative  max-w-screen-xl mx-auto overflow-x-auto py-40">
            <h2 class="mb-4 text-3xl pb-5 font-extrabold tracking-tight text-[#004AAD] dark:text-white">Riwayat Transaksi</h2>
            <table v-show="order.order_items.length > 0" v-for="order in orders" :key="order.id"
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-5">
                <thead class="text-xs text-gray-700   dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6  text-lg py-8">
                            Detail Transaksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in order.order_items" :key="item.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-md text-gray-900 whitespace-nowrap dark:text-white">
                           {{item.product.title}}
                        </th>
                        <td class="px-6 py-4 text-md">
                           {{item.product.brand.name}}
                        </td>
                        <td class="px-6 py-4 text-md">
                            {{item.product.category.name}}
                        </td>
                        <td class="px-6 py-4 text-md">
                            {{ formatCurrency(item.product.price) }}
                        </td>
                        <td class="px-6 py-4 text-md">
                            {{ formatDate(item.created_at) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </UserLayouts></template>