<template>
    <main
        @click="$emit('close')"
        class="fixed top-0 left-0 z-40 w-full h-full bg-black bg-opacity-40 flex justify-center items-center p-20"
    >
    <section @click.stop class="bg-white shadow h-4/5 xl:w-[500px] rounded-sm md:w-[320px]">
            <div class="text-right flex flex-col h-full">
                <main class="flex  justify-between w-full items-center bg-gray-100 shadow-sm">
                    <div class="flex justify-between p-2 w-full">
                        <header class="flex justify-center items-center text-xl text-gray-500">
                            <span class="inline-block text-center">Введите номер и срок действия карты</span>
                        </header>                    
                        <div class="text-xl">
                            <button @click="$emit('close')" class="px-3 py-1 hover:text-red-600">
                                <i class="fal fa-times"></i>
                            </button>
                        </div>
                    </div>
                </main>
                <article class="flex justify-center w-full">
                    <form class="mb-8 mt-8 mx-2" @submit.prevent="onSubmit" enctype="multipart/form-data">
                        <div class=" text-white">
                            <main class="w-1/2 shadow shadow-gray-400 flex flex-col justify-center text-xl min-w-[315px] h-[200px] rounded-xl bg-gray-500">
                                <div class="flex mx-4 my-4 font-medium" >
                                    <input v-model="result.number" placeholder="Номер карты" class="text-sm mb-2 appearance-none bg-transparent w-full text-white mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none" type="text" />
                                </div>
                                <div class="flex justify-between mx-4 items-center">
                                    <span class="text-sm">Срок действия карты</span>
                                    <input v-model="result.date"  class="mb-2 text-sm appearance-none bg-transparent w-[60px] text-white mr-3 px-2 leading-tight border-b border-gray-300 py-2 focus:outline-none" type="text" placeholder="oo/yy" />
                                </div>
                            </main>
                        </div>
                        <div class="flex justify-between mt-12">
                                <button type="submit" class=" w-1/2 py-1 px-4 mr-2 bg-green-500 text-white hover:bg-green-600">
                                    <i class="far fa-layer-plus mx-2"></i>Добавить
                                </button>
                                <button @click="emit('close')" class="w-1/2 py-1 px-4 ml-2 bg-rose-500 text-white hover:bg-rose-600">
                                    <i class="far fa-times mx-2"></i>Назад
                                </button>
                            </div>
                    </form>                   
                </article>              
            </div>
        </section>
    </main>
</template>

<script setup>
import { reactive, onMounted, ref } from "vue";
import { useRouter } from 'vue-router'

const router = useRouter();
const emit = defineEmits("added");
const card_number=ref(null);
const result = reactive({
   number:"",
   date:"",
   user_id:store.state.user.id
});


const onSubmit = async () => {
    const { data } = await axios.post("user-card-save", result);
    if (data.status == 200) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Kartangiz Muvafaqiyatli qo\'shildi',
            showConfirmButton: false,
            timer: 2000
        })
        router.push('profile')
    }
};
</script>
