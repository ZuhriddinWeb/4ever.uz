<template>
    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 flex flex-col px-2">
        <div class="w-full p-3 flex flex-col bg-white my-2 rounded-md border  overflow-hidden">
            <main class="-m-3 mb-3 relative">
                <div class="absolute top-0 left-0 w-full h-full bg-black/10"></div>
                <img class="h-[250px] w-full scale-90 object-contain" :src="'/images/' + product.images_product" />
                <div @click="addToCart(product.id)"
                    class="cursor-pointer absolute bottom-3 right-3 w-[48px] h-[48px] bg-white/70 rounded-full shadow-inner flex justify-center items-center text-gray-700"
                    :class="{ '!bg-orange-600 text-white': $store.state.cart.includes(product.id) }">

                    <i v-if="$store.state.cart.includes(product.id) == false" class="fal fa-shopping-bag text-xl"></i>
                    <i v-else class="fal fa-check text-xl"></i>
                </div>
                <div
                    class="text-center leading-none absolute bottom-3 left-3 w-[48px] h-[48px] text-xs bg-white/70 rounded-full shadow-inner flex items-center justify-center">
                    18 <br> Aug
                </div>
            </main>
            <main class="flex flex-col">
                <div class="mb-1.5 text-xl text-gray-700 text-ellipsis overflow-hidden whitespace-nowrap">
                    {{ product.product_name }}
                </div>
                <div class="text-gray-400 text-xs mb-1.5">
                    {{ product.category?.category_name }}
                </div>
                <div  v-if="!$store.state.user" class="text-orange-400 text-xs">
                    32$
                </div>
                <div v-else class="text-orange-400 text-xs">
                    {{ product.price }}$
                </div>
                <router-link
                    class="block border-gray-300 text-gray-500 border text-center mt-6 rounded shadow-inner py-0.5 hover:bg-orange-500 hover:text-white hover:border-0"
                    :to="{ name: 'product-view', params: { id: product.id } }">
                    Подробнее
                </router-link>
            </main>
        </div>
    </div>
</template>

<script setup>
const { product } = defineProps(['product'])
import { addToCart } from '../helpers/addToCart'
</script>