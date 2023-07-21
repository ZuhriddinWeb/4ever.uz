<template>
    <main
        class="xl:mx-auto md:mx-4   w-full h-full flex flex-col justify-center space-y-4 md:flex-row md:space-x-4 md:space-y-0">
        <article class="xl:w-2/5 md:w-full m-4 h-full">
            <section class="flex flex-col justify-center bg-white">
                <p class="text-3xl text-blue-900 font-semibold text-center">B{{ order[0]?.id }} оплатите заказ!</p>
                <p class="text-3xl text-blue-900 font-semibold text-center">Сумма платежа:{{ order[0]?.order_summa }} сум</p>
                <form class="flex flex-col justify-center mt-4"  @submit.prevent="onSubmit">
                    <p>Номер карты</p>
                    <input v-model="result.card_code" type="text"
                        class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-orange-400 py-2 focus:outline-none"
                        placeholder="">
                    <div class="flex justify-between">
                       <div>
                        <p>Месяц</p>
                        <input v-model="result.card_month" type="text"
                            class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-orange-400 py-2 focus:outline-none"
                            placeholder="">
                       </div>
                       <div>
                           <p>Год</p>
                       <input v-model="result.card_year" type="text"
                           class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-orange-400 py-2 focus:outline-none"
                           placeholder="">
                       </div>
                    </div>
                    <div>
                        <p>СМС код</p>
                    <input v-model="result.card_code" type="text"
                        class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-orange-400 py-2 focus:outline-none"
                        placeholder="">
                    </div>
                    <button class="bg-orange-500 text-white p-1 hover:bg-orange-600">Получить код активации</button>
                </form>
            </section>
        </article>
    </main>
</template>

<script setup>
import { reactive, onMounted, ref } from "vue";
import store from "../store";
import Header from "../components/Header.vue";

const user_id = defineProps(["id", "user_id"]);

const order = ref(null);

const result = reactive({
    card_code: "",
    card_month: "",
    card_year: "",
});

axios.get(`latest`).then((res) => {
    order.value = res.data;
})
const onSubmit = async () => {
    const { data } = await axios.post("payment-save", formdata);
    if (data.status == 200) {
        emit("added");
        emit("close");
    }
};
</script>

<style></style>