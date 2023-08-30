<template>
    <div class="grid grid-cols-[1fr] lg:grid-cols-[300px,1fr] pb-6">
        <main class="p-4 bg-gray-50 shadow-inner">
            <div>
                <div>
                    <div class="leading-none mb-3">
                        <div>
                            <p class="font-semibold text-xl mb-1.5">
                                <i class="fas fa-user-circle text-gray-400 mr-2 text-2xl"></i>
                                <span class="mr-1">{{ $store.state.user.fname }}</span>
                                <span>{{ $store.state.user.lname }}</span>
                            </p>
                        </div>
                        <div class="flex justify-between mb-2">
                            <div class="w-1/2 bg-white mr-1 rounded-md">
                                <span class="text-gray-400 text-sm">Кешбэк</span>
                                <p class="flex justify-between flex-col text-xl text-gray-500">
                                    <span>{{ my_cashback?.cashback }}</span>
                                </p>
                            </div>
                            <div class="w-1/2 bg-white ml-1 rounded-md">
                                <span class="text-gray-400 text-sm">Баланс</span>
                                <p class="flex justify-between flex-col text-xl text-gray-500">
                                    <span>{{ my_cashback?.cashback }}</span>
                                </p>
                            </div>
                        </div>
                        <!-- <div class="w-full theme-button inline-block py-1.5 my-1">
                            Пополнить лицовой счет doroshenk R 12938 
                        </div> -->
                        <div class="w-full text-center bg-orange-500 py-4 my-1 inline-block text-white font-medium rounded-md">
                            <i class="fal fa-sack-dollar"></i> Пополнить лицовой счет
                        </div>
                    </div>

                    <!-- <div class="leading-none mb-3"> :to="{name:'payStepOne', params: {id: $store.state.user.id}}"
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
                    <input @focus="$event.target.select()" class="w-5/6 outline-0 bg-transparent cursor-pointer"
                        ref="generator"
                        :value="'www.4ever.uz/register/' + $store.state.user.promo_code + '/' + $store.state.user.fname + $store.state.user.lname"
                        type="text" readonly>
                    <i class="fal fa-copy mx-1"></i>
                </article>
            </div>

            <main class="pt-3">
                <router-link :to="{ name: 'myinfo' }"
                    class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-user"></i>
                    </div>
                    <div class="flex justify-center">
                        Личные данные
                    </div>
                </router-link>
                <router-link :to="{ name: 'mywallet' }"
                    class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-wallet"></i>
                    </div>
                    <div class="flex justify-center">
                        Карты
                    </div>
                </router-link>
                <router-link :to="{ name: 'myorders' }"
                    class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-box"></i>
                    </div>
                    <div class="flex justify-center">
                        Заказы
                    </div>
                </router-link>
                <router-link :to="{ name: 'mypeoples' }"
                    class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-users"></i>
                    </div>
                    <div class="flex justify-center">
                        Дерево
                    </div>
                </router-link>
                <router-link :to="{ name: 'mypeoplestable' }"
                    class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-poll-people"></i>
                    </div>
                    <div class="flex justify-center">
                        Таблица
                    </div>
                </router-link>
                <router-link :to="{ name: 'myregister' }"
                    class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-user-plus"></i>
                    </div>
                    <div class="flex justify-center">
                        Pегистрация
                    </div>
                </router-link>
                <!-- <router-link :to="{ name: 'myhistory' }" class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-receipt"></i>
                    </div>
                    <div class="flex justify-center">
                        Транзакции
                    </div>
                </router-link> -->
                <article @click="$store.dispatch('logout')"
                    class="flex items-center py-3 cursor-pointer profile hover:text-orange-300">
                    <div class="bg-gray-100 rounded-full route-icon mr-4 w-12 h-12 flex justify-center items-center">
                        <i class="fal fa-sign-out"></i>
                    </div>
                    <div class="flex justify-center">
                        <span class="font-normal">Выход</span>
                    </div>
                </article>
            </main>

        </main>
        <aside class="pt-5 lg:pt-0 lg:pl-5 pl-0">
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