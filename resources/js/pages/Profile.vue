<template>
    <div class="flex flex-col md:flex-row">
        <main class="sm:w-3/3 md:w-2/3 lg:w-1/4 py-4">
            <div>
                <div>
                    <div class="leading-none mb-3 bg-gray-50 px-3 py-2">
                        <div>
                            <p class="font-semibold text-xl mb-1.5">
                                <span class="mr-1">{{ $store.state.user.fname }}</span>
                                <span>{{ $store.state.user.lname }}</span>
                            </p>
                        </div>
                        <span class="text-gray-400 text-sm">Баланс</span>
                        <p class="flex justify-between flex-col text-xl text-orange-500">
                            <span>{{ my_cashback?.cashback }}</span>
                        </p>
                        <router-link :to="{name:'payStepOne', params: {id: $store.state.user.id}}" class="w-full theme-button inline-block py-1.5 my-1">
                            Пополнить лицовой счет
                        </router-link>
                    </div>

                    <!-- <div class="leading-none mb-3">
                        <span class="text-gray-400 text-sm">Бонус</span>
                        <p class="flex justify-between flex-col">
                            <span>$150 </span>
                        </p>
                    </div>

                    <div class="leading-none mb-3">
                        <span class="text-gray-400 text-sm">Кешбэк</span>
                        <p class="flex justify-between flex-col">
                            <span>$230 {{ my_cashback?.cashback }}</span>
                        </p>
                    </div> -->
                </div>


                <p class="text-gray-400 text-sm mt-4 mb-1">Реферальная ссылка</p>
                <article @click.prevent="copyToClipboard" class="w-full theme-button-gray border-0 py-1.5 cursor-pointer">
                    <input @focus="$event.target.select()" class="w-5/6 outline-0 bg-transparent cursor-pointer" ref="generator" :value="'www.4ever.uz/register/' + $store.state.user.promo_code"
                        type="text" readonly>
                        <i class="fal fa-copy mx-1"></i>
                </article>
            </div>

            <main class="pt-3">
                <router-link :to="{ name: 'myinfo' }" class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-user"></i>
                    </div>
                    <div class="flex justify-center">
                        Личные данные
                    </div>
                </router-link>
                <router-link :to="{ name: 'mywallet' }" class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-wallet"></i>
                    </div>
                    <div class="flex justify-center">
                        Карты
                    </div>
                </router-link>
                <router-link :to="{ name: 'myorders' }" class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-box"></i>
                    </div>
                    <div class="flex justify-center">
                        Заказы
                    </div>
                </router-link>
                <router-link :to="{ name: 'mypeoples' }" class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-users"></i>
                    </div>
                    <div class="flex justify-center">
                        Дерево
                    </div>
                </router-link>
                <router-link :to="{ name: 'myhistory' }" class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-receipt"></i>
                    </div>
                    <div class="flex justify-center">
                        Транзакции
                    </div>
                </router-link>
                <article @click="$store.dispatch('logout')" class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-sign-out"></i>
                    </div>
                    <div class="flex justify-center" >
                        <span class="font-normal">Выход</span>
                    </div>
                </article>
            </main>

        </main>
        <aside class="sm:w-3/3 md:w-1/3 lg:w-3/4 pl-5 py-4">
            <router-view></router-view>
        </aside>
    </div>
</template>
<script setup>
import { ref } from "vue";
const my_cashback = ref(null);
const generator = ref(null)

axios.get(`cashback`).then(({ data }) => {
    my_cashback.value = data
})
function copyToClipboard() {
    generator.value.focus()
    document.execCommand('copy');
    Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Копировано!',
        showConfirmButton: false,
        timer: 1000
    })
}
</script>