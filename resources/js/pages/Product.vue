<template>
    <section class="w-full container mx-auto flex flex-wrap items-center justify-between">
        <article class="flex flex-col w-full">
            <div class="max-w-5xl mx-auto flex flex-col md:flex-row">
                <div class="flex justify-between md:w-3/5 lg:w-3/5">
                    <div class="w-5/6 mx-3">
                        <img class="w-full" :src="'/images/' + pageData.currentProduct?.images_product" />
                    </div>
                </div>
                <div class="flex flex-col justify-between  w-full md:w-2/5">
                    <article class="flex flex-col">
                        <div class="mb-3">
                            <label class="text-gray-400 block text-sm">Названия</label>
                            <h3 class="text-2xl text-orange-600 uppercase font-semibold">
                                {{ pageData.currentProduct?.product_name }}
                            </h3>
                        </div>
                        <div class="mb-2">
                            <label class="text-gray-400 block text-sm">Категория</label>
                            <span class="text-gray-700 font-semibold">
                                {{ pageData.currentProduct?.category?.category_name }}
                            </span>
                        </div>
                        <p class="mb-2">
                            <label class="text-gray-400 block text-sm">Аромат</label>
                            <span class="text-gray-700 font-semibold">
                                {{ pageData.currentProduct?.flavor }}
                            </span>
                        </p>
                        <p class="mb-2">
                            <label class="text-gray-400 block text-sm">Доступность</label>
                            <span class="text-gray-700 font-semibold" v-if="pageData.currentProduct?.count_products > 0">на
                                складе</span>
                            <span v-else class="text-rose-500">нет складе</span>
                        </p>
                        <p class="mb-2">
                            <label class="text-gray-400 block text-sm">Объем </label>
                            <span class="text-gray-700 font-semibold">
                                {{ pageData.currentProduct?.volume }}ml
                            </span>
                        </p>
                    </article>
                    <main class="flex justify-between items-end">
                        <div>
                            <span class="text-2xl text-orange-600">
                                {{ pageData.currentProduct?.price }}$
                            </span>
                            <br>
                            <span class="text-gray-400 border-t">
                                {{ pageData.currentProduct?.price * pageData.uzsnbu?.Rate }} сум
                            </span>
                        </div>
                        <div class="flex justify-start items-center">
                            <button @click="addToCart(pageData.currentProduct?.id)"
                                :class="{ 'bg-orange-600 text-white': $store.state.cart.includes(pageData.currentProduct?.id) }"
                                class="border border-orange-600 text-orange-600 px-4 py-2 rounded-sm hover:opacity-70 text-xs font-bold uppercase">
                                <span v-if="$store.state.cart.includes(pageData.currentProduct?.id) == false"><i
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
                                @click="pageData.openTab = 1" :class="{ 'border-orange-500 text-orange-600': pageData.openTab === 1 }">
                                Описание продукта
                            </a>
                        </li>
                        <li class="w-1/2 text-center">
                            <a class="text-xs font-bold uppercase px-5 py-3 block border-b-2 cursor-pointer hover:text-orange-500"
                                @click="pageData.openTab = 2" :class="{ 'border-orange-500 text-orange-600': pageData.openTab === 2 }">
                                Ингредиенты
                            </a>
                        </li>
                    </ul>
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6">
                        <div class="flex-auto text-gray-600">
                            <div class="tab-content tab-space">
                                <div :class="{ hidden: pageData.openTab !== 1, block: pageData.openTab === 1 }">
                                    <p>{{ pageData.currentProduct?.description_product }}</p>
                                </div>
                                <div :class="{ hidden: pageData.openTab !== 2, block: pageData.openTab === 2 }">
                                    <p>{{ pageData.currentProduct?.instruction_product }}</p>
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
                    <card v-for="product in pageData.products" :product="product"></card>
                </div>
            </div>
        </article>
    </section>
</template>
<script setup>
import { watch , reactive } from "vue"
import { useRoute } from "vue-router"
import Card from "../components/Card.vue"
import { addToCart } from "../helpers/addToCart"
const { id } = defineProps(["id"])

const pageData = reactive({
    openTab: 1,
    products: null,
    uzsnbu: null,
    currentProduct: null
})



const getProducts =  () => axios.get(`products-by-id/${id}`).then(({data}) => pageData.currentProduct = data)
axios.get(`uzsnbu`).then(({ data }) => pageData.uzsnbu = data[0])
axios.post('products-filter').then(({data}) => pageData.products = data)


getProducts()

const route = useRoute()
watch(() => route.params.id, () => getProducts())
</script>