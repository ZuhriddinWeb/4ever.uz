<template>
    <main
        class="xl:mx-auto md:mx-4 bg-white my-5 w-full flex flex-col text-center justify-center space-y-4 md:flex-row md:space-x-4 md:space-y-0">
        <article class="xl:w-3/5 md:w-full m-4">
            <p class="text-center font-medium">Личный кабинет</p>
            <form class="flex flex-col justify-center mt-4" autocomplete="off" @submit.prevent="onLogin">
                <div class="flex justify-between">
                    <input class="w-1/5 mb-2 appearance-none bg-transparent text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none" type="text" value="+998" disabled>
                    <input v-model="result_login.phone" type="text"
                    class="w-4/5  mb-2 appearance-none bg-transparent text-gray-700  px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                    placeholder="Мобильный телефон">
                </div>
                <input v-model="result_login.password" type="password"
                    class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                    placeholder="Парол">
                <button
                    class="flex justify-center items-center w-full py-3 bg-orange-500 text-white text-xs font-bold uppercase px-5  shadow  leading-normal cursor-pointer rounded-sm"><i
                        class="fal fa-door-open mr-2 text-base"></i>Войти</button>
            </form>
        </article>
    </main>
</template>

<script setup>
// import VuePhoneNumberInput from 'vue-phone-number-input';948537875
import { kMaxLength } from "buffer";
import Header from "../components/Header.vue"
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
});
const result_login = reactive({
    phone: "",
    password: "",
});
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

    }
};
const onLogin = async () => {
    await store.dispatch('login', result_login)
};
onMounted(async () => {   
    setInterval(() => {
		loader.value=true
	}, 1500)
});
</script>
