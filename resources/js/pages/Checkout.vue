<template>
        <Header />

    <section class="w-full container mx-auto flex flex-col mt-0 py-3">
        <div class="bg-white my-5 w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
            <main class=" md:w-2/3 lg:w-3/4 px-5 py-10">
                <h1 class="text-2xl md:text-4xl">Информация биллинга</h1>
                <form class="flex flex-col justify-between" @submit.prevent="onPayment">
                    <main class="w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="flex flex-col w-full">
                            <p>Телефон </p>
                            <input v-model="result.phone" type="text"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                                placeholder="Имя">
                        </div>
                        <div class="flex flex-col w-full">
                            <p>Имя </p>
                            <input v-model="result.name" type="text"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                                placeholder="Имя">
                        </div>
                    </main>
                    <main class="w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="flex flex-col w-full">
                            <p>Область </p>
                            <select v-model="result.viloyat_id" @change="getRegion($event)" id="underline_select"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none">
                                <option value="false" disabled selected>
                                    Выберите
                                </option>
                                <option v-for="team in viloyat" :value="team.id">
                                    {{ team.viloyat }}
                                </option>
                            </select>
                        </div>
                        <div class="flex flex-col w-full">
                            <p>Город / Район </p>
                            <select v-model="result.tuman_id" id="underline_select"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none">
                                <option value="false" disabled selected>
                                    Выберите
                                </option>
                                <option v-for="team in tuman" :value="team.id">
                                    {{ team.tuman }}
                                </option>
                            </select>
                        </div>
                    </main>
                    <div class="flex flex-col w-full">
                        <p>Адрес </p>
                        <input type="text"
                            class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                            placeholder="Имя">
                    </div>
                    <div class="flex flex-col w-full">
                        <p>Ориентир </p>
                        <input type="text"
                            class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                            placeholder="Имя">
                    </div>
                    <div class="flex flex-col">
                        <p>Способ оплаты</p>
                        <select v-model="result.pay_id" id="underline_select"
                            class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none">
                            <option value="false" disabled selected>
                                Выберите
                            </option>
                            <option v-for="team in getpay" :value="team.id">
                                {{ team.name }}
                            </option>
                        </select>
                    </div>
                    <button class="w-full bg-orange-500 text-white">
                        <p class="text-xl">Заказать</p>
                    </button>
                </form>
            </main>
            <aside class="bg-green-300 md:w-1/3 lg:w-1/4 px-5 py-40">
                <h1 class="text-2xl md:text-4xl">Sidebar</h1>

            </aside>
        </div>
    </section>
</template>

<script setup>
import { reactive, onMounted, ref } from "vue";
import Header from "../components/Header.vue";

const user_id = defineProps(["id", "user_id"]);

const viloyat = ref(null);
const tuman = ref(null);
const user_info = ref(null);
const getpay = ref(null);

const result = reactive({
    phone: "",
    name: "",
    viloyat_id: 'false',
    tuman_id: 'false',
    address: "",
    point: "",
    pay_id: 'false',

});
axios.get(`viloyat`).then((res) => {
    viloyat.value = res.data;

})
axios.get(`getPay`).then((res) => {
    getpay.value = res.data;

})
function getRegion(e) {
    axios.get(`tuman/${e.target.value}`).then((res) => {
        tuman.value = res.data;
    })
}
axios.get(`user-info/${user_id.id}`).then((res) => {
    result.name = res.data[0].fname
    result.phone = res.data[0].phone


})
</script>

<style></style>