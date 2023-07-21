<template>
    <section class="py-8">
        <div class="flex items-center flex-wrap">
            <nav id="store" class="w-full z-30 top-0">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                        href="#">
                        Store
                    </a>
                    <div class="flex items-center" id="store-nav-content">
                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>
                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
        <a href="#">
            <img class="hover:grow hover:shadow-lg" src="https://images.unsplash.com/photo-1555982105-d25af4182e4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&h=400&q=80">
            <div class="pt-3 flex items-center justify-between">
                <p class="">Product Name</p>
                <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                </svg>
            </div>
            <p class="pt-1 text-gray-900">£9.99</p>
        </a>
    </div> -->

            <main class="flex flex-wrap w-full">
                <div v-for="item, index in new_products"
                    class="w-1/2 md:w-1/3 xl:w-1/4 p-6 flex flex-col px-2  cursor-pointer border-gray-50">
                    <div class="w-full p-4 flex flex-col bg-white my-2 rounded-sm border border-gray-100 hover:shadow-lg">
                        <main class="-m-4 mb-3 relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-full h-full bg-black/10"></div>
                            <img class="h-[180px] w-full object-contain" v-bind:src="'/images/' + item.images_product" />
                            <div @click="add_cart_user(item.id)"
                                :class="{ 'bg-orange-600 text-white': $store.state.cart.includes(item.id) }"
                                class="absolute bottom-3 right-3 w-[48px] h-[48px] bg-white rounded-full shadow-md">
                                <i v-if="$store.state.cart.includes(item.id) == false"
                                    class="fal fa-shopping-bag text-xl  text-black ml-[15px] mt-3"></i>
                                <i v-else class="fal fa-check text-xl  text-black ml-[15px] mt-3"></i>
                            </div>
                        </main>
                        <main class="flex flex-col">
                            <!-- <h3 class="font-semibold text-xl">{{ item.product_name }}</h3> 781502224-->
                            <p class="text-orange-500">#{{ item.id }}</p>
                            <router-link class="text-blue-400 mb-4" :to="{ name: 'product-view', params: { id: item.id } }">
                                {{ item.description_product }}
                            </router-link>
                            <main class="text-gray-400 flex justify-between items-center">
                                <span>
                                    <i class="fal fa-certificate text-orange-500 mr-1"></i> {{ item.category_name }}
                                </span>
                                <div>
                                    <span class="text-xs">
                                        17 Mar
                                    </span>
                                    <i class="ml-1 fal text-orange-500 fa-calendar"></i>
                                </div>
                            </main>
                        </main>
                    </div>
                </div>
            </main>
        </div>
    </section>
</template>
  
<script setup>
import { reactive, onMounted, ref } from "vue";
const new_products = ref(null);
axios.get(`products-limit`).then((res) => {
    new_products.value = res.data;
})

function add_cart_user(id_product) {
    axios.get(`cart-save/${id_product}`).then(({ data }) => {
        if (data) store.state.cart.push(id_product)
        else {
            store.state.cart = store.state.cart.filter((item) => item !== id_product)
        }
    })
}
</script>