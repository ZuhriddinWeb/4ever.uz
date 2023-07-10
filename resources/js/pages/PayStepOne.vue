<template>
    <main
        class="xl:mx-auto md:mx-4 bg-gray-100  w-full h-full flex flex-col justify-center space-y-4 md:flex-row md:space-x-4 md:space-y-0">
        <article class="xl:w-3/5 md:w-full m-4 h-full">
            <section class="flex justify-center bg-white">
                <p class="text-3xl text-blue-900 font-semibold">Пополнить личный счет {{ user_id.id }}</p>
                <form class="flex flex-col justify-center mt-4" @submit.prevent="onPayment">
                    <p></p>
                    <input v-model="result.fname" type="text"
                    class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                    placeholder="Имя">
                </form>
            </section>
        </article>
    </main>
</template>

<script setup>
const user_id = defineProps(["id", "user_id"]);

</script>

<style></style>