<template>
    <header>
        <main class="flex justify-between container px-3 items-center mx-auto py-5">
            <div class="flex justify-between order-1 md:order-2 items-center">
                <RouterLink
                    class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm md:text-xl"
                    to="/">
                    <i class="fas fa-gem text-orange-600 mr-3"></i> 4EVER.UZ
                </RouterLink>
                <RouterLink to="/eshop" class="text-gray-600 ml-4 text-sm md:text-base hidden lg:inline">
                    Все продукты
                </RouterLink>
                <a :href="'/images/FOREVER.pdf'" class="text-gray-600 ml-4 text-sm md:text-base hidden lg:inline"
                    target="_blank">О нас</a>
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
                    <span
                        class="bg-orange-500 w-4 h-4 absolute top-0 right-0 rounded-full text-xs text-white flex justify-center items-center">
                        {{ $store.state.cart.length }}
                    </span>
                </RouterLink>
                <Menu />
            </div>
        </main>
    </header>
</template>

<script setup>
import Menu from "./Menu.vue"
</script>