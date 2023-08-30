<template>
    <div class="inline-block">
        <button @click="menu = !menu" class="px-3 py-1 ml-2 inline-block lg:hidden">
            <i class="far fa-bars"></i>
        </button>
        <main v-if="menu" @click="menu = false" class="bg-black/50 fixed inset-0 z-30 lg:hidden"></main>
        <main :class="{ '!translate-x-0': menu }" class="lg:hidden fixed w-72 translate-x-full right-0 top-0 h-full text-base bg-white z-50 shadow transition-all p-4">
            <div class="text-center bg-orange-400 -m-4 py-3 mb-4 relative">
                <button @click="menu = false" class="py-1.5 px-4 text-xl text-orange-800 absolute top-1 left-0">
                    <i class="fal fa-times"></i>
                </button>
                <RouterLink class="text-orange-800" to="/">
                    <i class="fas fa-gem mr-3"></i> 4EVER.UZ
                </RouterLink>
            </div>
            <label class="text-gray-400 text-sm block text-center my-3">
                Общий
            </label>
            <div class="mb-4">
                <RouterLink to="/eshop" class="text-gray-600 hover:text-orange-300">
                    <span class="w-10 inline-block mr-3 text-center">
                        <i class="fas fa-flask-potion"></i>
                    </span>
                    Все продукты
                </RouterLink>
            </div>
            <div class="mb-4">
                <a :href="'/images/FOREVER.pdf'" class="text-gray-600 hover:text-orange-300" target="_blank">
                    <span class="w-10 inline-block mr-3 text-center">
                        <i class="fas fa-file-pdf"></i>
                    </span>
                    О нас
                </a>
            </div>
            <section v-if="$store.state.user">
                <label class="text-gray-400 text-sm block text-center my-3">
                    Пользователь
                </label>
                <div class="mb-4">
                    <div class="text-gray-600">
                        <span class="w-10 inline-block mr-3 text-center">
                            <i class="fal fa-user"></i>
                        </span>
                       {{ $store.state.user.fname }} {{ $store.state.user.lname }}
                    </div>
                </div>
                <div class="mb-4">
                    <div class="text-gray-600">
                        <span class="w-10 inline-block mr-3 text-center">
                            <i class="fal fa-lightbulb-on"></i>
                        </span>
                        id пользователя: {{ $store.state.user.id }}
                    </div>
                </div>
                <div class="mb-4">
                    <router-link :to="{ name: 'myregister' }" class="text-gray-600 hover:text-orange-300">
                        <span class="w-10 inline-block mr-3 text-center">
                            <i class="fal fa-user-plus"></i>
                        </span>
                        Pегистрация
                    </router-link>
                </div>
                <div class="mb-4">
                    <router-link :to="{ name: 'mypeoples' }" class="text-gray-600 hover:text-orange-300">
                        <span class="w-10 inline-block mr-3 text-center">
                            <i class="fal fa-users"></i>
                        </span>
                        Дерево
                    </router-link>
                </div>
                <div class="mb-4">
                    <router-link :to="{ name: 'mypeoplestable' }" class="text-gray-600 hover:text-orange-300">
                        <span class="w-10 inline-block mr-3 text-center">
                            <i class="fal fa-poll-people"></i>
                        </span>
                        Таблица
                    </router-link>
                </div>
                <div>
                    <button @click="$store.dispatch('logout')" class="text-gray-600 hover:text-orange-300">
                        <span class="w-10 inline-block mr-3 text-center">
                            <i class="fal fa-sign-out"></i>
                        </span>
                        Выход
                    </button>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useRoute } from 'vue-router';
const menu = ref(false)


const route = useRoute()

watch(() => route.path, (current)=> {
    menu.value = false
})
</script>