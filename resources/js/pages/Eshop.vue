<template>
    <section class="w-full container mx-auto flex items-start justify-between mt-0 py-3">
        <div class="w-1/6 mr-2">
            <h3 class="flex justify-center items-center h-10 text-xl border-b-2 border-orange-500">
                <i class="fas fa-th-large mx-2"></i>Kategoriyalar
            </h3>
            <div v-for="items in tree">
                <main @click="items.opened = !items.opened" :class="{ 'bg-gray-100': items.opened }" class="flex justify-between items-center py-1.5 px-2 cursor-pointer">
                    <span @click="select_tree_id(items.id)">{{ items.name }}</span>
                    <i :class="{ 'rotate-180': items.opened }" class="fal fa-angle-down transition-all"></i>
                </main>
                <section v-if="categories" @click.stop>
                    <section v-for="item in categories" :class="{ '!h-auto py-1.5': items.opened }" class="px-2 h-0 overflow-hidden">
                        <div @click="select_products(item.id)" class="px-2 py-1 flex justify-between cursor-pointer items-center hover:border-b-2 border-orange-500">
                            <span class="w-4/4"  >
                                {{ item.category_name }}
                            </span>
                        </div>
                    </section>
                </section>
            </div>           
        </div>
        <div class="w-5/6 ml-1">
            <h3 v-if="!product_with_cat" class="flex h-10 text-xl  px-2 mx-2 mb-2 items-center border-b-2 border-orange-500 justify-center"><i class="fal fa-leaf-maple mr-2"></i>Tavsiya etilgan mahsulotlar</h3>
            <h3 v-else class="flex h-10 text-xl  px-2 mx-2 mb-2 items-center border-b-2 border-orange-500 justify-center"><i class="fal fa-leaf-maple mr-2"></i>Eng so'ngi mahsulotlar</h3>
            <main class="flex flex-wrap w-full">
            <router-link v-if="product_with_cat" v-for="item,index in product_with_cat" :to="{name:'product-view', params: {id: item.product_id}}"  class="px-2 md:w-1/4 xl:w-1/5 cursor-pointer border-gray-50" >
                <div class="w-full p-4 flex flex-col bg-white mb-2 rounded-sm border border-gray-100 hover:shadow-lg" >
                    <main class="-m-4 mb-3 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-full bg-black/20"></div>
                        <img class=" h-[180px] w-full object-contain " v-bind:src="'/images/' + currentProduct.category?.category_image" alt="">
                    </main>
                   <main class="flex flex-col">
                        <!-- <h3 class="font-semibold text-xl">{{ item.id }}</h3> -->
                        <p class="text-orange-500">#{{ item.id }}</p>
                        <p class="text-gray-400 mb-4">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, sint velit cumque similique rerum impedit earum...
                        </p>
                        <main class="text-gray-400 flex justify-between items-center">
                            <span>
                                <i class="fal fa-certificate text-orange-500 mr-1"></i> {{ item.category_name }}
                            </span>
                            <div >
                                <span class="text-xs">
                                    17 Mar 
                                </span>
                                <i class="ml-1 fal text-orange-500 fa-calendar"></i>
                            </div>
                        </main>
                   </main>           
                </div>
            </router-link>
            <router-link v-else v-for="item,index in new_products" :to="{name:'product-view', params: {id: item.product_id}}"  class="px-2 md:w-1/4 xl:w-1/5 cursor-pointer border-gray-50" >
                <div class="w-full p-4 flex flex-col bg-white mb-2 rounded-sm border border-gray-100 hover:shadow-lg" >
                    <main class="-m-4 mb-3 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-full bg-black/20"></div>
                        <img class=" h-[180px] w-full object-contain " v-bind:src="'/images/'+item?.category_image" alt="">
                        <!-- <img :src="`@/images/${item.category_image}`"> -->
                    </main>
                   <main class="flex flex-col">
                        <!-- <h3 class="font-semibold text-xl">#{{ item.id }}</h3> -->
                        <p class="text-orange-500">#{{ item.id }}</p>
                        <p class="text-gray-400 mb-4">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem, sint velit cumque similique rerum impedit earum...
                        </p>
                        <main class="text-gray-400 flex justify-between items-center">
                            <span>
                                <i class="fal fa-certificate text-orange-500 mr-1"></i> {{ item.category_name }}
                            </span>
                            <div >
                                <span class="text-xs">
                                    17 Mar 
                                </span>
                                <i class="ml-1 fal text-orange-500 fa-calendar"></i>
                            </div>
                        </main>
                   </main>           
                </div>
            </router-link>
        </main>
        </div>
    </section>
</template>
<script setup>
import { reactive, onMounted, ref } from "vue";
import Header from "../components/Header.vue";

// import store from "../../store";
const openTab = ref(1);
const categories = ref(null);
const tree = ref(null);
const product_with_cat = ref(null);
const product_id = defineProps(["id", "product_id"]);
const product = ref(null);

const new_products = ref(null);

axios.get(`products-limit`).then((res) => {
    new_products.value = res.data;
    console.log(res.data);
})


axios.get(`tree`).then((res) => {
    res.data.forEach(item => {
        item.opened = false
    })
    tree.value = res.data;
});
function select_tree_id(id){
    store.state.id_selected=id;
}
function select_products(tree_id){
    // console.log(tree_id)
    // const { data } = await axios.get(`products-with-query/${store.state.id_selected}/${tree_id}`)
    // product_with_cat.value = data

    axios.get(`products-with-query/${store.state.id_selected}/${tree_id}`).then((res) => {
    product_with_cat.value = res.data;
});
}

axios.get(`category`).then((res) => {
    categories.value = res.data;
});
</script>

<style setup></style>
