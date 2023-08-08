<template>
    <section @click="emit('close')" class="flex justify-end fixed top-0 left-0 w-full h-full bg-black bg-opacity-30 z-40">
        <aside @click.stop  class="w-2/5 justify-between  overflow-y-auto  p-4  bg-gray-50 shadow">
            <div class="menu flex flex-col justify-between">                  
                <div class="text-black flex justify-between pb-4 pr-4">
                    <span></span>
                    <button @click="emit('close')">
                        <i  class="fal fa-times cursor-pointer text-2xl hover:text-red-600 pr-0"></i>
                    </button>
                </div> 
                <div class="flex justify-center items-center text-2xl">
                    <p><span><i class="fal fa-file-certificate text-orange-500 mr-4"></i></span> Mahsulot ma'lumotlarini kiritish</p>
                </div>
                <form class="w-full  mb-8 mt-8" @submit.prevent="onSubmit" enctype="multipart/form-data">
                    <p>Mahsulot nomi:</p>
                    <input v-model="result.product_name" class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none" type="text" />     
                    <p>Mahsulot tipini tanlang:</p>
                    <select v-model="result.category_id" id="underline_select" class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none">
                            <option v-for="team in tree_result" :value="team.id">
                                {{ team.category_name }}
                            </option>
                        </select>
                            <p>Mahsulot hidini kiriting:</p>
                            <input v-model="result.flavor" class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none" type="text" />                        
                            <p>Mahsulot narxi:</p>
                            <input v-model="result.product_price" class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none" type="number" />
                            <p>Mahsulot hajmi:</p>
                            <input v-model="result.volume" class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none" type="number" />
                            <p>Mahsulot soni:</p>
                            <input v-model="result.product_count" class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none" type="number" />
                            <p>Mahsulot haqida ma'lumot:</p>
                            <textarea v-model="result.product_descr" name="" id="" cols="30" rows="5" class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none"></textarea>
                            <p>Mahsulot instruksiyasi:</p>
                            <textarea v-model="result.product_instr" name="" id="" cols="30" rows="5" class="mb-2 appearance-none bg-transparent w-full text-gray-700 mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none"></textarea>
                    <UploadImage :formData="result"/>
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
        </aside>
    </section>
</template>
  
<script setup>
import { reactive, onMounted, ref } from "vue";
import UploadImage from "./UploadImage.vue";
import store from "../../store";
const emit = defineEmits(['close'])
const tree_result = ref(null);
const usd_api = ref(null);

const result = reactive({
    product_name:"",
    category_id:"",
    flavor:"",
    tree_id:store.state.id_selected,
    product_price:"",
    volume:"",
    product_count:"",
    product_descr:"",
    product_instr:"",
    usd_api:"",
    images: []
});


axios.get(`category`).then((res) => {
      tree_result.value = res.data;
})
const onSubmit = async () => {
    const formdata = new FormData()


    for (const key in result) {

        if(key == 'images'){
            result.images.forEach(image => {
                formdata.append('images[]', image)
            })
        }
        else formdata.append(key, result[key])

    }

    const { data } = await axios.post("product-save", formdata);
    if (data.status == 200) {
        emit("added");
        emit("close");
    }
};
</script>