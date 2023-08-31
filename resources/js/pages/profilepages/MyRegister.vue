<template>
        <article class="xl:w-3/5 md:w-full m-4">
            <p class="flex text-center font-medium"><span>Зарегистрировать нового члена Клуба ForeverGAB</span></p>
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
                <div class="flex justify-between">
                    <input class="w-1/5 mb-2 appearance-none bg-transparent text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none" type="text" value="+998" disabled>
                    <input v-model="result.phone" type="text"
                    class="w-4/5  mb-2 appearance-none bg-transparent text-gray-700 mr-3 px-2 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                    placeholder="Мобильный телефон">
                </div>
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
                <p class="mr-3 px-2">{{ $store.state.user.fname}} {{$store.state.user.lname}} </p>
                <button
                    class="flex justify-center items-center w-full py-3 mt-4 bg-orange-500 text-white text-xs font-bold uppercase px-5  shadow  leading-normal cursor-pointer rounded-sm"><i
                        class="fal fa-door-open mr-2 text-base"></i>Создать</button>
            </form>
        </article>
</template>

<script setup>
import { reactive, onMounted, ref, computed } from "vue";
const emit = defineEmits(['close'])

const openTab = ref(1);
const showPassword = ref(false);
const showPasswordTwo = ref(false);
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
    code: store.state.user.promo_code,
    parent_name:""
});
axios.get(`parent_name/${result.code}`).then(({ data }) => {
    parent_name.value = data
    // console.log(data);
})
const onRegistration = async () => {
    const { data } = await axios.post("regstration", result);
    if (data.status == 200) {
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Успешная регистрация!',
            showConfirmButton: false,
            timer: 2000
        })
        openTab.value = 2
        result.lname=''
        result.fname=''
        result.passport=''
        result.phone=''
        result.password=''
        result.password_confirmation=''

    }
};


</script>
