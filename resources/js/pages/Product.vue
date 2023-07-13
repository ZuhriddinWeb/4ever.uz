<template>
    <header>
        <Header />
    </header>
    <Preloader @close="loader = true" v-if="!loader" />

    <section class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">
        <article class="flex flex-col w-full ">
            <div class="w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                <div class="flex justify-between md:w-2/3 lg:w-3/4 py-5 ">
                    <div class="w-5/6 mx-3 bg-gray-200">
                        <img class="h-wull w-full" v-bind:src="'/images/' + currentProduct?.images_product" />
                    </div>
                </div>
                <div class="flex flex-col justify-between my-2 px-4 py-5 lg:w-1/4  md:w-2/3">
                    <article class="flex flex-col h-2/3 ">
                        <p class="text-gray-300">#{{ currentProduct.id }}</p>
                        <h3 class="text-2xl my-3">
                            {{ currentProduct.product_name }}
                        </h3>
                        <p class="font-medium text-xl">
                            <span class="mr-1">Категория:</span><span class="text-orange-500">{{
                                currentProduct.category?.category_name
                            }}</span>
                        </p>
                        <p class="font-medium text-xl">
                            <span class="mr-1">Аромат:</span><span class="text-orange-500">{{
                                currentProduct.flavor
                            }}</span>
                        </p>
                        <p class="font-medium text-xl">
                            <span class="mr-1">Доступность:</span>
                            <span v-if="currentProduct.count_products > 0" class="text-green-500">на складе</span>
                            <span v-else class="text-rose-500">нет складе</span>
                        </p>
                    </article>
                    <main class="flex flex-col">
                        <div></div>
                        <div>
                            <p class="my-2">
                                <span class="mr-1 text-xl">Объем :</span>{{ currentProduct.volume }}ml
                            </p>
                            <p class="text-md font-bold uppercase my-1 text-xl">
                                {{ currentProduct.price }}$
                            </p>
                            <div class="flex justify-start items-center">
                                <button @click="add_cart_user(currentProduct.id)"
                                    :class="{ 'bg-orange-600 text-white': $store.state.cart.includes(currentProduct.id) }"
                                    class="border border-orange-600 text-orange-600 px-4 py-2 rounded-sm hover:opacity-70 text-xs font-bold uppercase">
                                    <span v-if="$store.state.cart.includes(currentProduct.id) == false"><i
                                            class="fal fa-shopping-bag pr-3"></i>В корзину</span>

                                    <span v-else><i class="fal fa-check pr-3"></i>Удалить из корзины </span>

                                </button>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <div class="px-2">
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                <a class="text-xs font-bold uppercase px-5 py-3 block leading-normal cursor-pointer hover:text-orange-500"
                                    v-on:click="toggleTabs(1)" :class="{
                                        'text-black': openTab !== 1,
                                        'border-b-2 border-orange-500':
                                            openTab === 1,
                                    }">
                                    Описание продукта
                                </a>
                            </li>
                            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                <a class="text-xs font-bold uppercase px-5 py-3 block leading-normal cursor-pointer hover:text-orange-500"
                                    v-on:click="toggleTabs(2)" :class="{
                                        'text-black': openTab !== 2,
                                        'border-b-2 border-orange-500':
                                            openTab === 2,
                                    }">
                                    Ингредиенты
                                </a>
                            </li>
                        </ul>
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6">
                            <div class="px-4 py-5 flex-auto">
                                <div class="tab-content tab-space">
                                    <div v-bind:class="{
                                        hidden: openTab !== 1,
                                        block: openTab === 1,
                                    }">
                                        <p>
                                            {{
                                                currentProduct.description_product
                                            }}
                                            <br />
                                            <br />
                                        </p>
                                    </div>
                                    <div v-bind:class="{
                                                hidden: openTab !== 2,
                                                block: openTab === 2,
                                            }">
                                        <p>
                                            {{
                                                currentProduct.instruction_product
                                            }}
                                            <br />
                                            <br />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <h3 v-if="product_with_cat"
                    class="flex h-10 text-xl px-2 mx-2 mb-2 items-center border-b-2 border-orange-500 justify-center rounded-sm">
                    <i class="fal fa-leaf-maple mr-2"></i>МЫ РЕКОМЕНДУЕМ
                </h3>
                <div class="flex flex-wrap w-full">
                    <router-link v-if="product_with_cat" v-for="(similarProducts, index) in product_with_cat" :to="{
                        name: 'product-view',
                        params: { id: similarProducts.id },
                    }" class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col px-2  cursor-pointer border-gray-50">
                        <div
                            class="w-full p-4 flex flex-col bg-white mb-2 rounded-sm border border-gray-100 hover:shadow-lg">
                            <main class="-m-4 mb-3 relative overflow-hidden">
                                <div class="absolute top-0 left-0 w-full h-full bg-black/20"></div>
                                <img class="h-[180px] w-full object-contain"
                                    v-bind:src="'/images/' + similarProducts?.images_product" />
                            </main>
                            <main class="flex flex-col">
                                <!-- <h3 class="font-semibold text-xl">{{ similarProducts.id }}</h3> -->
                                <p class="text-orange-500">
                                    #{{ similarProducts.id }}
                                </p>
                                <p class="text-gray-400 mb-4">
                                    {{ similarProducts.description_product }}
                                </p>
                                <main class="text-gray-400 flex justify-between items-center">
                                    <span>
                                        <i class="fal fa-certificate text-orange-500 mr-1"></i>
                                        {{ similarProducts.category_name }}
                                    </span>
                                    <div>
                                        <span class="text-xs"> 17 Mar </span>
                                        <i class="ml-1 fal text-orange-500 fa-calendar"></i>
                                    </div>
                                </main>
                            </main>
                        </div>
                    </router-link>
                </div>
            </div>
        </article>
    </section>
    <!-- <footer>
<Footer/>
</footer> -->
</template>
<script setup>
import { reactive, onMounted, ref, watch } from "vue";
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import Preloader from '../components/Preloader.vue';
import { useRoute } from "vue-router";
const route = useRoute();
const loader = ref(null);

const openTab = ref(1);
const product_with_cat = ref(null);
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


function getProducts() {
    axios.get(`products-by-id/${product_id.id}`).then(({ data }) => {
        currentProduct.value = data[0];

        axios.get(`products-with-cat/${data[0].category_id}`).then((res) => {
            product_with_cat.value = res.data;
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
