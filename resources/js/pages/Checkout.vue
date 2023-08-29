<template>
    <section>
        <div class="my-5 w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0 mx-auto ">
            <main class=" md:w-2/3 lg:w-3/4 py-10">
                <h1 class="text-2xl md:text-4xl mb-3">Информация биллинга</h1>
                <form class="flex flex-col justify-between" @submit.prevent="onPayment">
                    <main class="w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="flex flex-col w-full">
                            <p class="text-gray-400 text-sm">Телефон</p>
                            <input v-model="result.phone" type="text"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                                placeholder="Имя">
                        </div>
                        <div class="flex flex-col w-full">
                            <p class="text-gray-400 text-sm">Имя</p>
                            <input v-model="result.name" type="text"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                                placeholder="Имя">
                        </div>
                    </main>
                    <main class="w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="flex flex-col w-full">
                            <p class="text-gray-400 text-sm">Область </p>
                            <select v-model="result.viloyat_id" @change="getRegion($event)" id="underline_select"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-300 py-2 focus:outline-none">
                                <option value="false" disabled selected>
                                    Выберите
                                </option>
                                <option v-for="team in viloyat" :value="team.id">
                                    {{ team.viloyat }}
                                </option>
                            </select>
                        </div>
                        <div class="flex flex-col w-full">
                            <p class="text-gray-400 text-sm">Город / Район </p>
                            <select v-model="result.tuman_id" id="underline_select"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-300 py-2 focus:outline-none">
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
                        <p class="text-gray-400 text-sm">Адрес </p>
                        <input v-model="result.address" type="text"
                            class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                            placeholder="">
                    </div>
                    <div class="flex flex-col w-full">
                        <p class="text-gray-400 text-sm">Ориентир </p>
                        <input v-model="result.point" type="text"
                            class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                            placeholder="">
                    </div>
                    <div class="flex flex-col mb-3">
                        <p class="text-gray-400 text-sm">Способ оплаты</p>
                        <select v-model="result.pay_id" id="underline_select"
                            class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-300 py-2 focus:outline-none">
                            <option value="false" disabled selected>
                                Выберите
                            </option>
                            <option v-for="team in getpay" :value="team.id">
                                {{ team.name }}
                            </option>
                        </select>
                    </div>
                    <button @click="agreement()" class="w-full theme-button">
                        <p class="text-xl">Заказать</p>
                    </button>
                </form>
            </main>
            <aside class="w-full md:w-1/3 lg:w-1/4 py-10">
                <main class="flex flex-col justify-between md:w-3/3 lg:w-w-5/5">
                    <div class="flex justify-between font-medium uppercase border-y py-4 bg-gray-50 px-3">
                        <p class="w-2/6">Товар</p>
                        <p class="w-1/6 text-center"></p>
                        <p class="w-1/6 text-center"></p>
                        <p class="w-1/6 text-center"></p>
                    </div>
                    <div v-for="item in result.cart_user"
                        class="flex justify-between items-start uppercase pt-4 border-b-2 pb-4">
                        
                        <div class="flex justify-start w-2/6 mr-2">
                            <main class="mr-3">                               
                            </main>
                            <main class="uppercase py-4">
                                <p class="font-medium">#{{ item.products.id }}</p>
                                <p>
                                    <span class="mr-3 text-gray-400">Аромат</span>{{ item.products?.flavor }}
                                </p>
                                <p>
                                    <span class="mr-3 text-gray-400">Объем</span>{{ item.products?.volume }}
                                </p>
                                <p>
                                    <span class="mr-3 text-gray-400">Категория</span>{{
                                        item.products?.category.category_name }}
                                </p>
                                <p>
                                    <span class="mr-3 text-gray-400">остаток:</span>{{ item.products?.count_products }} ta
                                </p>
                            </main>
                        </div>

                        <main class="w-2/6 flex flex-col justify-between">
                            <article class="w-full flex justify-between">
                                <div class="w-1/6 text-center">
                                    {{ item.products?.price }}
                                    <span class="font-medium text-green-500">USD</span>
                                </div>
                                <div class="w-1/6 text-center">
                                    {{ item.products?.price * item.count }}
                                    <span class="font-medium text-green-500">USD</span>
                                </div>
                                <div class="mr-3">
                                    <button @click="delete_is_cart(item)">
                                        <i
                                            class="fal fa-times text-2xl text-rose-500 cursor-pointer hover:text-rose-600"></i>
                                    </button>
                                </div>
                            </article>
                            <div class="text-center flex justify-start w-full mt-8">
                                <button class="mr-2 bg-gray-200" @click="decrement(item)">
                                    <i class="fal fa-chevron-left p-2"></i>
                                </button>
                                <span class="px-3">{{ item.count }}</span>
                                <button class="ml-2 bg-gray-200" @click="increment(item)">
                                    <i class="fal fa-chevron-right p-2"></i>
                                </button>
                            </div>
                        </main>
                    </div>
                </main>
                <article class="flex flex-col bg-gray-50 mt-4 uppercase md:w-3/3 lg:w-5/5">
                    <p class="border-b mx-4 font-medium py-4">
                        Информация
                    </p>
                    <div class="flex justify-between mx-4 py-4 text-sm">
                        <p>В корзине: <span class="font-medium">{{ $store.state.cart.length }}</span> товара</p>
                        <p>
                            <span class="text-green-500 font-medium">{{summa }}</span>
                            <span class="font-medium"> USD</span>
                        </p>
                    </div>
                </article>

            </aside>
        </div>
    </section>
</template>

<script setup>
import { reactive, onMounted, ref } from "vue";
// import Header from "../components/Header.vue";
import store from "../store";
import { useRouter } from 'vue-router'

const user_id = defineProps(["id", "user_id"]);

const viloyat = ref(null);
const tuman = ref(null);
const user_info = ref(null);
const getpay = ref(null);
const summa = ref(null);
const orderId = ref(null);

// const cart_user = ref([]);

const result = reactive({
    phone: "",
    name: "",
    viloyat_id: 'false',
    tuman_id: 'false',
    address: "",
    point: "",
    pay_id: 'false',
    cart_user: null,
    
});
axios.get(`viloyat`).then((res) => {
    viloyat.value = res.data;

})
async function agreement() {
    console.log(result)
    const { data } = await axios.post("order-save", result);
    if (data.status == 200 && result.pay_id==1) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Спасибо, ваша заявка принята',
            showConfirmButton: false,
            timer: 2000
        })
        axios.post("cart-clear");
        // console.log(data.message)
        // router.push(data.message)
        orderId.value = data.orderId
        axios.post("/order-pay-check", orderId.value)
        window.location.href = data.message;
    }

}
axios.get(`getPay`).then((res) => {
    getpay.value = res.data;

})
axios.get(`cart-user/${store.state.user.id}`).then(({ data }) => {
    data.forEach((element) => {
        element.count = 1;
        element.price = element.count * element.products.price;
        summa.value += element.price
        store.state.summa = summa.value
    });
    result.cart_user = data;
});
function increment(cart) {
    if (cart.count < cart.products.count_products) {
        cart.count++;
        summa.value += cart.price
    }
}
function decrement(cart) {
    if (cart.count > 1) {
        cart.count--;
        summa.value -= cart.price
    }
}
async function delete_is_cart(cart) {
    Swal.fire({
        title: "Вы действительно хотите удалить этот Продукт?",
        text: "восстановить невозможно!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(249 115 22)",
        confirmButtonText: "Да!",
        cancelButtonText: "Нет!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`cart/${cart.id}`).then(() => {
                store.state.cart = store.state.cart.filter(
                    (item) => item !== cart.product_id
                );
                cart_user.value = cart_user.value.filter(
                    (item) => item.id !== cart.id
                );
            });
        }
    });
}
function getRegion(e) {
    axios.get(`tuman/${e.target.value}`).then((res) => {
        tuman.value = res.data;
    })
}
axios.get(`user-info/${store.state.user.id}`).then((res) => {
    result.name = res.data[0].fname
    result.phone = res.data[0].phone


})
</script>

<style></style>