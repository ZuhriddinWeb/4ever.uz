<template>
    <section class="py-8">
        <div class="flex items-center flex-wrap">
            <nav id="store" class="w-full z-30 top-0">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-1.5">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-700">
                        РЕКОМЕНДУЕМ
                    </a>
                </div>
            </nav>

            <main class="flex flex-wrap w-full -mx-2">
                <Card v-for="product in products" :product="product"></Card>
            </main>
        </div>
    </section>
</template>
  
<script setup>
import { ref } from "vue"
import Card from "./Card.vue"
const products = ref([])


axios.get(`products-limit`).then(({ data }) => {
    products.value = data;
})
</script>