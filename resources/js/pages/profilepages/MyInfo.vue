<template>
    <section>
        <h3 class="text-2xl text-gray-700 mb-4">Личные данные</h3>
    </section>
    <form @submit.prevent="updateUser" class="border border-gray-100 p-4 inline-block">
        <div class="bg-gray-50 rounded-t-md w-72 py-1.5 px-3 border-b border-gray-800 mb-4">
            <label for="formName" class="text-gray-400 block text-sm">Имя</label>
            <input id="formName" disabled class="bg-transparent outline-none" v-model="formData.fname" type="text">
        </div>
        <div class="bg-gray-50 rounded-t-md w-72 py-1.5 px-3 border-b border-gray-800 mb-4">
            <label for="formLast" class="text-gray-400 block text-sm">Фамилия</label>
            <input id="formLast" disabled class="bg-transparent outline-none" v-model="formData.lname" type="text">
        </div>
        <div class="bg-gray-50 rounded-t-md w-72 py-1.5 px-3 border-b border-gray-800 mb-4">
            <label for="formPassport" class="text-gray-400 block text-sm">Паспортные данные</label>
            <input id="formPassport" disabled class="bg-transparent outline-none" v-model="formData.passport" type="text">
        </div>
        <div class="bg-gray-50 rounded-t-md w-72 py-1.5 px-3 border-b border-gray-800 mb-4">
            <label for="formPhone" class="text-gray-400 block text-sm">Мобильный телефон</label>
            <input id="formPhone" disabled class="bg-transparent outline-none" v-model="formData.phone" type="text">
        </div>
        <div class="text-right">
            <button disabled class="rounded shadow px-3 py-1.5 bg-orange-600 text-white active:bg-orange-400 hover:bg-orange-500 disabled:bg-gray-400">
                Изменить
            </button>
        </div>
    </form>
</template>
<script setup>
import { reactive } from 'vue'

const formData = reactive({
    fname: store.state.user.fname,
    lname: store.state.user.lname,
    passport: store.state.user.passport,
    phone: store.state.user.phone,
})
function updateUser() {

}
</script>
