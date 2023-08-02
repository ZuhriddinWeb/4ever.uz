<template>
    <section class="w-full container mx-auto flex flex-wrap items-center justify-between">
        <article class="flex flex-col w-full">
            <div class="max-w-5xl mx-auto flex flex-col md:flex-row">
                <div class="flex justify-between md:w-3/5 lg:w-3/5">
                    <div class="w-5/6 mx-3">
                        <img class="w-full" :src="'/images/' + currentProduct?.images_product" />
                    </div>
                </div>
                <div class="flex flex-col justify-between  w-full md:w-2/5">
                    <article class="flex flex-col">
                        <!-- <p class="text-gray-300">#{{ currentProduct.id }}</p> -->
                        <div class="mb-3">
                            <label class="text-gray-400 block text-sm">Названия</label>
                            <h3 class="text-2xl text-orange-600 uppercase font-semibold">
                                {{ currentProduct.product_name }}
                            </h3>
                        </div>
                        <div class="mb-2">
                            <label class="text-gray-400 block text-sm">Категория</label>
                            <span class="text-gray-700 font-semibold">
                                {{ currentProduct.category?.category_name }}
                            </span>
                        </div>
                        <p class="mb-2">
                            <label class="text-gray-400 block text-sm">Аромат</label>
                            <span class="text-gray-700 font-semibold">
                                {{ currentProduct.flavor }}
                            </span>
                        </p>
                        <p class="mb-2">
                            <label class="text-gray-400 block text-sm">Доступность</label>
                            <span class="text-gray-700 font-semibold" v-if="currentProduct.count_products > 0">на складе</span>
                            <span v-else class="text-rose-500">нет складе</span>
                        </p>
                        <p class="mb-2">
                            <label class="text-gray-400 block text-sm">Объем </label>
                            <span class="text-gray-700 font-semibold">
                                {{ currentProduct.volume }}ml
                            </span>
                        </p>
                    </article>
                    <main class="flex justify-between items-end">
                        <div>
                            <span class="text-2xl text-orange-600">
                                {{ currentProduct.price }}$
                            </span>
                            <br>
                            <span class="text-gray-400 border-t">
                                {{ currentProduct.price * uzsnbu.Rate }} сум
                            </span>
                        </div>
                        <div class="flex justify-start items-center">
                            <button @click="add_cart_user(currentProduct.id)"
                                :class="{ 'bg-orange-600 text-white': $store.state.cart.includes(currentProduct.id) }"
                                class="border border-orange-600 text-orange-600 px-4 py-2 rounded-sm hover:opacity-70 text-xs font-bold uppercase">
                                <span v-if="$store.state.cart.includes(currentProduct.id) == false"><i
                                        class="fal fa-shopping-bag pr-3"></i>В корзину</span>
                                <span v-else><i class="fal fa-check pr-3"></i>Удалить из корзины </span>
                            </button>
                        </div>
                    </main>
                </div>
            </div>
            <div class="mt-4">
                <div class="w-full">
                    <ul class="flex mb-4 list-none flex-wrap flex-row">
                        <li class="w-1/2 text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 block border-b-2 cursor-pointer hover:text-orange-500"
                                @click="openTab = 1" :class="{'border-orange-500 text-orange-600': openTab === 1 }">
                                Описание продукта
                            </a>
                        </li>
                        <li class="w-1/2 text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 block border-b-2 cursor-pointer hover:text-orange-500"
                                @click="openTab = 2" :class="{'border-orange-500 text-orange-600': openTab === 2 }">
                                Ингредиенты
                            </a>
                        </li>
                    </ul>
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6">
                        <div class="flex-auto text-gray-600">
                            <div class="tab-content tab-space">
                                <div :class="{hidden: openTab !== 1,block: openTab === 1}">
                                    <p>{{currentProduct.description_product}}</p>
                                </div>
                                <div :class="{hidden: openTab !== 2,block: openTab === 2}">
                                    <p>{{currentProduct.instruction_product}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="flex mb-2 text-gray-700">
                    РЕКОМЕНДУЕМ
                </h3>
                <div class="flex flex-wrap w-full -mx-2">
                    <card v-for="product in products" :product="product"></card>
                </div>
            </div>
        </article>
    </section>
</template>
<script setup>
import { ref, watch } from "vue"
import { useRoute } from "vue-router"
import Card from "../components/Card.vue"
const route = useRoute()
const loader = ref(null)

const openTab = ref(1);
const products = ref([])
const uzsnbu = ref(null);

function toggleTabs(tabNumber) {
    return (openTab.value = tabNumber);
}

const product_id = defineProps(["id", "product_id"]);

const currentProduct = ref({});

function add_cart_user(id_product) {
    axios.get(`cart-save/${id_product}`).then(({ data }) => {
        if (data) store.state.cart.push(id_product)
        else {
            store.state.cart = store.state.cart.filter((item) => item !== id_product)
        }
    })
}
axios.get(`uzsnbu`).then(({ data }) => {
    uzsnbu.value = data[0];
});

function getProducts() {
    axios.get(`products-by-id/${product_id.id}`).then(({ data }) => {
        currentProduct.value = data[0]

        axios.get(`products-with-cat/${data[0].category_id}`).then((res) => {
            products.value = res.data;
        });
        setInterval(() => {
            loader.value = true
        }, 1500)
    });
}
getProducts();

watch(() => route.params.id, (old) => getProducts())
</script>

<style setup></style>
