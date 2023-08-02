<template>
    <section class="w-full container mx-auto flex items-start justify-between mt-0 py-3">
        <div class="w-1/6 mr-2">
            <h3 class="flex justify-center items-center h-10 text-xl border-b-2 border-orange-500">
                <i class="fas fa-th-large mx-2"></i>Kategoriyalar
            </h3>
            <div v-for="items in tree">
                <main @click="items.opened = !items.opened" :class="{ 'bg-gray-100': items.opened }"
                    class="flex justify-between items-center py-1.5 px-2 cursor-pointer">
                    <span @click="select_tree_id(items.id)">{{ items.name }}</span>
                    <i :class="{ 'rotate-180': items.opened }" class="fal fa-angle-down transition-all"></i>
                </main>
                <section v-if="categories" @click.stop>
                    <section v-for="item in categories" :class="{ '!h-auto py-1.5': items.opened }"
                        class="px-2 h-0 overflow-hidden">
                        <div @click="select_products(item.id)"
                            class="px-2 py-1 flex justify-between cursor-pointer items-center hover:border-b-2 border-orange-500">
                            <span class="w-4/4">
                                {{ item.category_name }}
                            </span>
                        </div>
                    </section>
                </section>
            </div>
        </div>
        <div class="w-5/6 ml-1">
            <main class="flex flex-wrap w-full">
                <Card v-for="product in products" :product="product"></Card>
            </main>
        </div>
    </section>
</template>
<script setup>
import { ref } from "vue"
import Card from "../components/Card.vue"
const categories = ref(null);
const tree = ref(null)
const products = ref(null);
const product_id = defineProps(["id", "product_id"]);


axios.get(`tree`).then((res) => {
    res.data.forEach(item => {
        item.opened = false
    })
    tree.value = res.data;
});
function select_tree_id(id) {
    store.state.id_selected = id;
}
function select_products(tree_id) {
    axios.get(`products-with-query/${store.state.id_selected}/${tree_id}`).then((res) => {
        products.value = res.data;
    });
}

axios.get(`category`).then((res) => {
    categories.value = res.data;
});
</script>

<style setup></style>
