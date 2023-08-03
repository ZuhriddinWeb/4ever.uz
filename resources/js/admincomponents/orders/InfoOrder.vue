<template>
    <main
        @click="$emit('close')"
        class="fixed top-0 left-0 z-40 w-full h-full bg-black bg-opacity-40 flex justify-center items-center p-20"
    >
    <section @click.stop class="bg-white shadow h-3/5 w-[820px] rounded-sm">
            <div class="text-right flex flex-col h-full">
                <main class="flex  justify-between w-full items-center bg-gray-100 shadow-sm">
                    <div class="flex justify-between p-2 w-full">
                        <header class="flex justify-center items-center text-xl text-gray-500">
                            To'lov qabul qilish uchun ma'lumotnoma
                        </header>                    
                        <div class="text-xl">
                            <button @click="$emit('close')" class="px-3 py-1 hover:text-red-600">
                                <i class="fal fa-times"></i>
                            </button>
                        </div>
                    </div>
                </main>
                <article class="flex justify-between w-full h-full">
                    <div class="w-1/2 flex justify-center items-center text-white">
                        <!-- <main class="shadow shadow-gray-400 flex flex-col justify-between text-xl min-w-[360px] h-[240px] rounded-xl bg-gradient-to-tr  from-sky-600 via-purple-400 to-sky-400">
                            <img class="h-full w-full" :src=" '/images/' + order_info[0]?.oreder_pay_image"/>
                        </main> -->
                    </div>
                    <div class="mx-4 border-l-2">
                       <div class="text-center">
                            <p class="font-semibold">To'lov qilinishi kerak bo'lgan summa:{{ order_info[0]?.order_summa }} UZS</p>
                            <!-- <i class="fal fa-arrow-alt-to-bottom text-2xl my-4"></i> -->
                            <form class="w-full  mb-8 mt-8" @submit.prevent="onSubmit" enctype="multipart/form-data">
                            <p>Tasdiqlash</p>
                             <select v-model="result.check" id="underline_select" class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none">
                                <option>
                                    Tanlang
                                 </option> 
                                <option v-for="team in pay_check" :value="team.id">
                                     {{ team.name }}
                                 </option>
                             </select>
                             </form>
                       </div>
                       <form class="w-full  mb-8 mt-8 mx-2" @submit.prevent="onSubmit" enctype="multipart/form-data">
                            <div class="text-center">
                            </div>
                            <div class="flex justify-between">
                                <button type="submit" class="bg-gray-100 w-1/2 py-1 px-4 mr-2 border-b-2 border-blue-500 hover:bg-blue-200">
                                    <i class="far fa-layer-plus mx-2"></i>Saqlash
                                </button>
                                <button @click="emit('close')" class="bg-gray-100 w-1/2 py-1 px-4 ml-2 border-b-2 border-rose-500 hover:bg-rose-200">
                                    <i class="far fa-times mx-2"></i>Bekor qilish
                                </button>
                            </div>
                        </form>
                    </div>
                </article>              
            </div>
        </section>
    </main>
</template>

<script setup>
import { reactive, onMounted, ref } from "vue";
const { selectedDataDelete } = defineProps(["selectedDataDelete"]);

const emit = defineEmits("added");
const order_info = ref(null);
const pay_check = ref(null);

axios.get(`order-by-id/${store.state.orderId}`).then(({ data }) => {
    order_info.value = data;
    // console.log(data[0].order_summa);
   result.order_summa=data[0].order_summa
})

const result = reactive({
   id:store.state.id_selected,
   check:"",
   user_id : store.state.user_id_order,
   order_summa: "",
});

axios.get(`pay-check`).then(({ data }) => {
    pay_check.value = data;
    // console.log(data)
})
axios.get(`pay-check`).then(({ data }) => {
    pay_check.value = data;
    // console.log(data)
})
axios.post("order-pay-check", result);
// const onSubmit = async () => {    
//     const { data } = await axios.post("order-pay-check", result);
//     if (data.status == 200) {
//         emit("added");
//         emit("close");
//     }
// };
</script>
