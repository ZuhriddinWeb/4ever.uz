<template>
    <section @click="emit('close')" class="flex justify-start fixed top-0 left-0 w-full h-full bg-black bg-opacity-30 z-40">
        <aside @click.stop  class="w-80 justify-between h-full overflow-hidden p-4 pr-0 bg-gray-50 shadow ">
            <div class="menu flex flex-col justify-between">                  
                <div class="text-black flex justify-between pb-4 pr-4">
                    <span></span>
                    <button @click="emit('close')">
                        <i  class="fal fa-times cursor-pointer text-2xl hover:text-red-600"></i>
                    </button>
                </div> 
                <router-link :to="{name: 'monitoring'}" class="button flex mb-2  p-2 hover:border-r-4 border-orange-500  items-center  active:bg-gray-200" >
                   <i class="fal fa-home text-gray-400 text-xl"></i>
                    <span  class=" pl-6  text-gray-600 ">Bosh sahifa</span>
                </router-link>
                <router-link :to="{ name: 'users'}" class="button flex mb-2  p-2   hover:border-r-4 border-orange-500  items-center  active:bg-gray-200">
                    <i class="fal fa-users-class text-gray-400 text-xl"></i>
                    <span  class=" pl-6  text-gray-600 ">Foydalanuvchilar</span>
                </router-link>
                <router-link :to="{ name: 'orders'}" class="button flex mb-2  p-2   hover:border-r-4 border-orange-500  items-center  active:bg-gray-200">
                    <i class="fab fa-first-order-alt text-gray-400 text-xl"></i>
                    <span  class=" pl-6  text-gray-600 ">Buyurtmalar</span>
                </router-link>
                <router-link :to="{ name: 'category'}" class="button flex mb-2  p-2   hover:border-r-4 border-orange-500  items-center  active:bg-gray-200">
                    <i class="fal fa-list-ul text-gray-400 text-xl"></i>
                    <span  class=" pl-6  text-gray-600 ">Kategoriyalar</span>
                </router-link>
                <router-link :to="{ name: 'tree'}" class="button flex mb-2  p-2   hover:border-r-4 border-orange-500  items-center  active:bg-gray-200">
                    <i class="fal fa-folder text-gray-400 text-xl"></i>
                    <span  class=" pl-6  text-gray-600 ">Turlar</span>
                </router-link>
                <router-link :to="{ name: 'products'}" class="button flex mb-2  p-2   hover:border-r-4 border-orange-500  items-center  active:bg-gray-200">
                    <i class="fal fa-boxes text-gray-400 text-xl"></i>
                    <span  class=" pl-6  text-gray-600 ">Mahsulotlar</span>
                </router-link>  
                <router-link :to="{ name: 'completedOrders'}" class="button flex mb-2  p-2   hover:border-r-4 border-orange-500  items-center  active:bg-gray-200">
                    <i class="fal fa-luggage-cart text-gray-400 text-xl"></i>                    
                    <span  class=" pl-6  text-gray-600 ">Jo'natmalar</span>
                </router-link>                
                <router-link :to="{ name: 'left'}" class="button flex mb-2  p-2   hover:border-r-4 border-orange-500  items-center  active:bg-gray-200">
                    <i class="fal fa-shopping-bag text-gray-400 text-xl"></i>
                    <span  class=" pl-6  text-gray-600 ">Buyurtma qilish</span>
                </router-link>                
                <router-link :to="{ name: 'status'}" class="button flex mb-2  p-2   hover:border-r-4 border-orange-500  items-center  active:bg-gray-200">
                    <i class="fal fa-sort-alpha-up text-gray-400 text-xl"></i>
                    <span  class=" pl-6  text-gray-600 ">Statuslar</span>
                </router-link>
            </div>          
        </aside>
    </section>
</template>

<script setup>
const emit = defineEmits(['close'])
</script>
<style>
.button.router-link-active{
    color: orange!important;
}

.button.router-link-active i{
    color: orange!important;
}
</style>