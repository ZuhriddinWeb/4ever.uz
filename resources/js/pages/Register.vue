<template>
    <main class="xl:mx-auto md:mx-4 bg-white my-5 w-full flex flex-col justify-center space-y-4 md:flex-row md:space-x-4 md:space-y-0">
        <article class="xl:w-3/5 md:w-full m-4">
            <p class="flex text-center font-medium"><span>Зарегистрировать нового члена Клуба ForeverGab</span></p>
            <form class="flex flex-col justify-center mt-4" @submit.prevent="onRegistration">
                <input v-model="result.fname" type="text"
                    class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                    placeholder="Имя">
                <input v-model="result.lname" type="text"
                    class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                    placeholder="Фамилия">
                <input v-model="result.passport" type="text"
                    class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                    placeholder="Паспортные данные серия номер">
                <input v-model="result.phone" type="text"
                    class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                    placeholder="Мобильный телефон">
                <div class="flex justify-between">
                    <input v-if="showPassword" type="text" v-model="result.password"
                        class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                        placeholder="Пароль" id="password" name="password_confirmation" required>
                    <input v-else type="password" v-model="result.password"
                        class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                        placeholder="Пароль" id="password" name="password_confirmation" required>
                    <span @click="toggleShow" class="cursor-pointer">
                        <i class="fal" :class="{ 'fa-eye-slash': !showPassword, 'fa-eye': showPassword }"></i>
                    </span>
                </div>
                <div class="flex justify-between">
                    <input v-if="showPasswordTwo" v-model="result.password_confirmation" type="text"
                        class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                        placeholder="Подтверждение пароля" name="password_confirmation" required>
                    <input v-else v-model="result.password_confirmation" type="password"
                        class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                        placeholder="Подтверждение пароля" name="password_confirmation" required>
                    <span @click="toggleShowTwo" class="cursor-pointer">
                        <i class="fal" :class="{ 'fa-eye-slash': !showPasswordTwo, 'fa-eye': showPasswordTwo }"></i>
                    </span>
                </div>
                <input disabled v-model="result.code" type="text"
                    class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                    placeholder="Promo Code">
                <p class="mr-3 px-2">{{ parent_name[0].fname}} {{parent_name[0].lname}} </p>
                <button
                    class="flex justify-center items-center w-full py-3 bg-orange-500 text-white text-xs font-bold uppercase px-5  shadow  leading-normal cursor-pointer rounded-sm"><i
                        class="fal fa-door-open mr-2 text-base"></i>Создать</button>
            </form>
        </article>
    </main>
</template>

<script setup>
// import VuePhoneNumberInput from 'vue-phone-number-input';948537875
import { kMaxLength } from "buffer";
// import Header from "../components/Header.vue";
import Preloader from '../components/Preloader.vue';

import { reactive, onMounted, ref, computed } from "vue";
const emit = defineEmits(['close'])
const user_id = defineProps(["id", "user_id"]);

const openTab = ref(1);
const showPassword = ref(false);
const showPasswordTwo = ref(false);
const password = ref(null);
const passwordTwo = ref(null);
const loader = ref(null);
const parent_name = ref(null);


function toggleTabs(tabNumber) {
    return openTab.value = tabNumber
}

const buttonLabel = computed(() => {
    return (showPassword.value) ? "Hide" : "Show";
})
function toggleShow() {
    showPassword.value = !showPassword.value;
}
function toggleShowTwo() {
    showPasswordTwo.value = !showPasswordTwo.value;
}
const result = reactive({
    lname: "",
    fname: "",
    passport: "",
    phone: "",
    password: "",
    password_confirmation: "",
    // promo_code:Math.random().toString(36).slice(2),
    code: user_id.id,
    parent_name:""
});
axios.get(`parent_name/${user_id.id}`).then(({ data }) => {
    parent_name.value = data
    console.log(result.parent_name);
})
const onRegistration = async () => {
    var k = Math.random().toString(36).slice(2);
    const { data } = await axios.post("regstration", result);
    if (data.status == 200) {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Regstratsiyadan muvafaqiyatli o\'tdingiz!',
            showConfirmButton: false,
            timer: 2000
        })
        openTab.value = 2
        window.location.href = '/login'
    }
};

onMounted(async () => {   
    setInterval(() => {
		loader.value=true
	}, 1500)
});
</script>
