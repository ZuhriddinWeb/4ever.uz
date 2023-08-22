<template>
    <section class="py-8">
        <div class="flex items-center flex-wrap">
            <nav id="store" class="w-full z-30 top-0">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-1.5">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-700">
                        Новости
                    </a>
                </div>
            </nav>

            <main class="flex flex-wrap w-full -mx-2">
                <!-- <video class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 h-48 flex flex-col px-2" controls>
                    <source src="/images/IMG_5588.mov" type="video/mp4">
                </video> -->
                <video class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 h-48 flex flex-col px-2 my-2" controls>
                    <source src="/images/tour.mp4" type="video/mp4">
                </video>
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