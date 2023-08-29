<template>
    <section @click="emit('close')" class="flex justify-end fixed top-0 left-0 w-full h-full bg-black bg-opacity-30 z-40">
        <aside @click.stop class="w-3/5 justify-between  overflow-y-auto  p-4  bg-gray-50 shadow">
            <div class="menu flex flex-col justify-between">
                <div class="text-black flex justify-between pb-4 pr-4">
                    <span></span>
                    <button @click="emit('close')">
                        <i class="fal fa-times cursor-pointer text-2xl hover:text-red-600 pr-0"></i>
                    </button>
                </div>
                <div class="flex justify-center items-center text-2xl">
                    <p><span><i class="fal fa-file-certificate text-orange-500 mr-4"></i></span> Buyurtma ma'lumotlarini
                        kiritish</p>
                </div>
                <form class="w-full  mb-8 mt-8" @submit.prevent="onSubmit" enctype="multipart/form-data">
                    <p>User ID:</p>
                    <input @input="select_info" v-model="result.user_id"
                        class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none"
                        type="number" />
                    <main class="w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="flex flex-col w-full">
                            <p class="text-gray-400 text-sm">Телефон</p>
                            <input v-model="result.phone" type="text"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                                placeholder="Имя">
                        </div>
                        <div class="flex flex-col w-full">
                            <p class="text-gray-400 text-sm">Имя</p>
                            <input v-model="result.name" type="text"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                                placeholder="Имя">
                        </div>
                    </main>
                    <main class="w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="flex flex-col w-full">
                            <p class="text-gray-400 text-sm">Область </p>
                            <select v-model="result.viloyat_id" @change="getRegion($event)" id="underline_select"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-300 py-2 focus:outline-none">
                                <option value="false" disabled selected>
                                    Выберите
                                </option>
                                <option v-for="team in viloyat" :value="team.id">
                                    {{ team.viloyat }}
                                </option>
                            </select>
                        </div>
                        <div class="flex flex-col w-full">
                            <p class="text-gray-400 text-sm">Город / Район </p>
                            <select v-model="result.tuman_id" id="underline_select"
                                class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-300 py-2 focus:outline-none">
                                <option value="false" disabled selected>
                                    Выберите
                                </option>
                                <option v-for="team in tuman" :value="team.id">
                                    {{ team.tuman }}
                                </option>
                            </select>
                        </div>
                    </main>
                    <div class="flex flex-col w-full">
                        <p class="text-gray-400 text-sm">Адрес </p>
                        <input v-model="result.address" type="text"
                            class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                            placeholder="">
                    </div>
                    <div class="flex flex-col w-full">
                        <p class="text-gray-400 text-sm">Ориентир </p>
                        <input v-model="result.point" type="text"
                            class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 leading-tight border-b border-gray-200 py-2 focus:outline-none"
                            placeholder="">
                    </div>
                    <aside class="flex text-gray-600 text-sm">
                        <div>
                            <label for="genderinp" :class="{ '!bg-orange-100': formData.gender == null }"
                                class="radio-button" @click="">
                                <span class="mr-1.5">
                                    Все
                                </span>
                                <input type="radio" class="accent-orange-600" v-model="formData.gender"
                                    @change="getProducts()" :value="null" name="gender" id="genderinp">
                            </label>
                        </div>
                        <div v-for="gender in pageData.genders">
                            <label :for="'gender' + gender.id" :class="{ '!bg-orange-100': formData.gender == gender.id }"
                                class="radio-button">
                                <span class="mr-1.5">
                                    {{ gender.name }}
                                </span>
                                <input type="radio" class="accent-orange-600" v-model="formData.gender" :value="gender.id"
                                    @change="getProducts()" name="gender" :id="'gender' + gender.id">
                            </label>
                        </div>
                    </aside>
                    <div class="my-4">
                        <h3 class="text-sm text-gray-400 md:text-left  mb-0.5">Категория</h3>
                        <aside class="flex text-gray-600 text-sm">
                            <div v-for="category in pageData.categories">
                                <label :for="'category' + category.id"
                                    :class="{ '!bg-orange-500 text-white': formData.categories.includes(category.id) }"
                                    class="radio-button">
                                    <span class="mr-1.5">
                                        {{ category.category_name }}
                                    </span>
                                    <input type="checkbox" v-model="formData.categories" @change="getProducts()"
                                        :true-value="[]" hidden :value="category.id" :id="'category' + category.id">
                                </label>
                            </div>
                        </aside>
                    </div>
                    <VueMultiselect
                        v-model="selected"
                        :options="options"
                        :multiple="true"
                        placeholder="Pick some" label="name"
                        track-by="name"
                        @update:modelValue="updateSelected"
                    />
                        
                    <!-- <main>
                        <div v-for="item in pageData.products" class="flex justify-between items-center mb-3 border-b-2">
                            <div class="w-3/5">
                                {{ item.product_name }}
                            </div>
                            <div class="w-1/5">
                                {{ item.price }}
                            </div>
                            <div class="w-1/5">
                                <div class="text-center flex justify-start w-full mb-2">
                                    <button class="mr-2 bg-gray-200" @click="decrement(item.count_products)">
                                        <i class="fal fa-chevron-left p-2"></i>
                                    </button>
                                    <span class="px-3">{{ item.count }}</span>
                                    <button class="ml-2 bg-gray-200" @click="increment(item)">
                                        <i class="fal fa-chevron-right p-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </main> -->
                    <div class="flex justify-between">
                        <!-- <button type="submit" @click="agreement()"
                            class="bg-gray-100 w-1/2 py-1 px-4 mr-2 border-b-2 border-blue-500 hover:bg-blue-200">
                            <i class="far fa-layer-plus mx-2"></i>Saqlash
                        </button>
                        <button @click="emit('close')"
                            class="bg-gray-100 w-1/2 py-1 px-4 ml-2 border-b-2 border-rose-500 hover:bg-rose-200">
                            <i class="far fa-times mx-2"></i>Bekor qilish
                        </button> -->
                    </div>
                </form>
            </div>
        </aside>
    </section>
</template>
  
<script setup>
import { reactive, onMounted, ref } from "vue";
import store from "../../store";


function updateSelected(data){
    console.log(data)
}

const emit = defineEmits(['close'])
const viloyat = ref(null);
const tuman = ref(null);
const summa = ref(null);
const selected = ref([]);
const value=ref([]);
const options = ref([
        { name: 'Vue.js', language: 'JavaScript' },
        { name: 'Adonis', language: 'JavaScript' },
        { name: 'Rails', language: 'Ruby' },
        { name: 'Sinatra', language: 'Ruby' },
        { name: 'Laravel', language: 'PHP' },
        { name: 'Phoenix', language: 'Elixir' }
      ]);
const result = reactive({
    user_id: "",
    phone: "",
    name: "",
    viloyat_id: "",
    tuman_id: "",
    category_id: "",
    count: "",
    pay_id: 3,
    cart_user: "null",
});
const pageData = reactive({
    genders: null,
    products: null,
    categories: null
})

const formData = reactive({
    gender: null,
    categories: [],
})
axios.get(`viloyat`).then((res) => {
    viloyat.value = res.data;

})
function getRegion(e) {
    axios.get(`tuman/${e.target.value}`).then((res) => {
        tuman.value = res.data;
    })
}

function onCheck() {

}

function getProducts() {
    axios.post('products-filter', formData).then(({ data }) => {
        data.forEach((element) => {
            // console.log(element)
            element.count = 0;
            element.pri = element.count * element.price;
            summa.value += element.pri
            store.state.summa = summa.value
        });
        pageData.products = data
        result.cart_user = data
        console.log(pageData.products);

    }
    )
}

getProducts()
axios.get('tree').then(({ data }) => pageData.genders = data)
axios.get('category').then(({ data }) => pageData.categories = data)

function increment(cart) {
    if (cart.count < cart.count_products) {
        cart.count++;
        summa.value += cart.price
    }
}

function decrement(cart) {
    if (cart.count > 1) {
        cart.count--;
        summa.value -= cart.price
    }
}
const onSubmit = async () => {
    const formdata = new FormData()


    for (const key in result) {

        if (key == 'images') {
            result.images.forEach(image => {
                formdata.append('images[]', image)
            })
        }
        else formdata.append(key, result[key])

    }

};
function select_info(e) {
    axios.get(`user-info/${result.user_id}`).then((res) => {
        result.name = res.data[0].fname
        result.phone = res.data[0].phone
    })

}
async function agreement() {
    const { data } = await axios.post("order-save", result);
    if (data.status == 200 && result.pay_id == 3) {
        // Swal.fire({
        //     position: 'top-end',
        //     icon: 'success',
        //     title: 'Спасибо, ваша заявка принята',
        //     showConfirmButton: false,
        //     timer: 2000
        // })
        // axios.post("cart-clear");
        // console.log(data.message)
        // router.push(data.message)
        orderId.value = data.orderId
        axios.post("/order-pay-check", orderId.value)
        // window.location.href = data.message;
    }

}
</script>