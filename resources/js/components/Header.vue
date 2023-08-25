<template>
    <header>
        <main class="fixed w-72 right-0 h-full bg-white z-50 shadow">

        </main>
        <div class="flex justify-between container px-3 items-center mx-auto py-5">
            <div class="flex justify-between order-1 md:order-2 items-center">
                <RouterLink class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm md:text-xl"
                    to="/">
                    <i class="fas fa-gem text-orange-600 mr-3"></i> 4EVER.UZ
                </RouterLink>
                <RouterLink to="/eshop" class="text-gray-600 ml-4 text-sm md:text-base">
                    Все продукты
                </RouterLink>
                <a :href="'/images/FOREVER.pdf'" class="text-gray-600 ml-4 text-sm md:text-base"  target="_blank">О нас</a>
            </div>
            <div class="order-2 md:order-3 flex items-center text-xl" id="nav-content">
                <RouterLink v-if="$store.state.user" to="/profile" class="px-2">
                    <i class="fal fa-user"></i>
                </RouterLink>
                <RouterLink v-else to="/login" class="px-2">
                    <i class="fal fa-user-circle"></i>
                </RouterLink>
                <RouterLink to="/checkout" class="relative px-2  ml-3">
                    <i class="fal fa-shopping-bag"></i>
                    <span class="bg-orange-500 w-4 h-4 absolute top-0 right-0 rounded-full text-xs text-white flex justify-center items-center">
                        {{ $store.state.cart.length }}
                    </span>
                </RouterLink>

                <button class="px-3 py-1 ml-2 inline-block md:hidden">
                    <i class="far fa-bars"></i>
                </button>
            </div>
        </div>
        <!-- <main class="flex justify-start container items-center mx-auto">
            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1 -mx-2" id="menu">
                <nav class="flex justify-between">
                    <div class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                        <RouterLink class="inline-block no-underline hover:border-b-1 border-orange-500 " to="/eshop">
                            <span class="pl-8  text-gray-600">Mahsulotlar</span>
                        </RouterLink>
                    </div>
                </nav>
            </div>
        </main> -->
    </header>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { RouterLink } from "vue-router";
const emit = defineEmits(['open'])
const categories = ref(null);


onMounted(async () => {
    const { data } = await axios.get(`category`)
    categories.value = data;
});
</script>