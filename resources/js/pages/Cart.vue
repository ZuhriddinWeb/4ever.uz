<template>
    <header>
        <Header />
    </header>
    <Preloader @close="loader = true" v-if="!loader" />

    <section class="w-full container mx-auto flex flex-col mt-0 py-3">
        <p class="text-2xl font-semibold mx-2">Корзина</p>
        <div class=" justify-between w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0 mx-2"
            v-if="cart_user.length">
            <main class="flex flex-col justify-between  mr-3 md:w-2/3 lg:w-w-4/5">
                <div class="flex justify-between font-medium uppercase border-t-2 border-b-2 py-4 bg-gray-50">
                    <p class="w-2/6">Товар</p>
                    <p class="w-1/6 text-center"></p>
                    <p class="w-1/6 text-center"></p>
                    <p class="w-1/6 text-center"></p>
                    <div></div>
                </div>
                <div v-for="item in cart_user" class="flex justify-between items-start uppercase pt-4 border-b-2 pb-4">
                    <div class="flex justify-start w-2/6 mr-2">
                        <main class="mr-4">
                            <!-- <img
                                class="h-full w-full"
                                v-bind:src="
                                    '/images/' +
                                    item.products?.images_product
                                "
                            /> -->
                        </main>
                        <main class="uppercase py-4">
                            <p class="font-medium">#{{ item.products.id }}</p>
                            <p>
                                <span class="mr-4 text-gray-400">Аромат</span>{{ item.products?.flavor }}
                            </p>
                            <p>
                                <span class="mr-4 text-gray-400">Объем</span>{{ item.products?.volume }}
                            </p>
                            <p>
                                <span class="mr-4 text-gray-400">Категория</span>{{
                                    item.products?.category.category_name }}
                            </p>
                            <p>
                                <span class="mr-4 text-gray-400">остаток:</span>{{ item.products?.count_products }} ta
                            </p>
                        </main>
                    </div>

                    <main class="w-2/6 flex flex-col justify-between">
                        <article class="w-full flex justify-between">
                            <div class="w-1/6 text-center">
                                {{ item.products?.price }}
                                <span class="font-medium text-green-500">UZS</span>
                            </div>
                            <div class="w-1/6 text-center">
                                {{ item.products?.price * item.count }}
                                <span class="font-medium text-green-500">UZS</span>
                            </div>
                            <div class="mr-4">
                                <button @click="delete_is_cart(item)">
                                    <i class="fal fa-times text-2xl text-rose-500 cursor-pointer hover:text-rose-600"></i>
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
            <article class="flex flex-col bg-gray-50  mx-4 h-48 uppercase md:w-1/3 lg:w-1/5">
                <p class="border-b-2 mx-4 font-medium py-4">
                    Информация
                </p>
                <div class="flex justify-between mx-4 py-4 text-sm">
                    <p>В корзине: <span class="font-medium">{{ $store.state.cart.length }}</span> товара</p>
                    <p><span class="text-green-500 font-medium">{{ summa }}</span> <span class="font-medium">UZS</span></p>
                </div>
                <!-- <button @click="agreement(cart_user)"
                    class="border-b-2 border-orange-500 mx-4 text-xl hover:text-orange-500">
                    <i class="fal fa-handshake mx-2"></i>ОФОРМИТЬ
                </button> -->
                <router-link :to="{
                    name: 'checkout',
                    params: { id: store.state.user.id },
                }" 
                    class="border-b-2 border-orange-500 mx-4 text-xl hover:text-orange-500">
                    <i class="fal fa-handshake mx-2"></i>ОФОРМИТЬ
                </router-link>
            </article>
        </div>
        <div v-else class="w-full h-96">
            <p class="flex flex-col justify-center text-center text-4xl mt-24">
                <i class="fal fa-exclamation-circle text-orange-500"></i>
                <span>Вы ничего добавли в корзину</span>
            </p>
        </div>
    </section>
</template>
<script setup>
import Header from "../components/Header.vue";
import { reactive, ref } from "vue";
import { useRouter } from 'vue-router'
import store from "../store";
import Preloader from '../components/Preloader.vue';

const router = useRouter();
const cart_user = ref([]);
const summa = ref(null);
const loader = ref(null);


axios.get(`cart-user/${store.state.user.id}`).then(({ data }) => {
    data.forEach((element) => {
        element.count = 1;
        element.price = element.count * element.products.price;
        summa.value += element.price
    });
    cart_user.value = data;
    setInterval(() => {
        loader.value = true
    }, 1500)
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
async function agreement(cart) {
    const { data } = await axios.post("order-save", cart);
    if (data.status == 200) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Спасибо, ваша заявка принята',
            showConfirmButton: false,
            timer: 2000
        })
        axios.post("cart-clear");

        router.push('profile')
    }

}
async function delete_is_cart(cart) {
    Swal.fire({
        title: "Aniq o`chirmoqchimisiz?",
        text: "Malumotni tiklab bo'lmaydi!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "rgb(249 115 22)",
        confirmButtonText: "Ha!",
        cancelButtonText: "Yoq!",
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
</script>
<style setup></style>
