<template>
<!-- :class="{ 'justify-end relative': $store.state.opened }" -->

    <nav id="header" class="w-full z-30 top-0 py-1 flex flex-col">
        <!-- <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3"> -->

            <!-- <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle" /> -->


           
            <!-- <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1 -mx-2" id="menu">
                <nav class="flex justify-between">
                    <div class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0" v-for="item in categories">
                        <router-link :to="{name:'categories', params: {id: item.id}}" class="inline-block no-underline hover:text-black hover:underline py-2 px-4">
                            {{item.category_name}} 
                        </router-link>                       
                    </div>
                </nav>
            </div> -->
            <div class="flex justify-between container items-center mx-auto py-5">
                <div class="flex justify-between order-1 md:order-2 ml-2 items-center">
                    <i class="fal fa-bars text-center text-2xl"></i>
                    <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="/">
                        <!-- <svg class="fill-current text-orange-500 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                        </svg> -->
                        <!-- <i class="far fa-shopping-bag mr-2 text-orange-500"></i> -->
                        <img class="w-[150px] h-[50px] inline-block text-center justify-center" :src="'/images/header.png'">

                    </a>
                </div>
                <div class="order-2 md:order-3 flex items-center mr-4" id="nav-content">
                    <!-- <router-link v-if="$store.state.user" class="inline-block no-underline hover:border-b-1 border-orange-500 " to="/profile">                        
                        <i class="fal fa-truck text-2xl pr-8"></i>                  
                    </router-link>     -->
                    <router-link v-if="$store.state.user" class="inline-block no-underline hover:border-b-1 border-orange-500 " to="/profile">   
                        <i class="fal fa-user text-2xl"></i>                     
                    </router-link>  
                    <router-link v-else class="inline-block no-underline hover:border-b-1 border-orange-500"   to="/login">    
                        <!-- <i class="fal fa-registered text-2xl"></i>                     -->
                        <i class="fal fa-user-circle text-2xl"></i>                           
                    </router-link>  
                    <!-- <router-link  class="inline-block no-underline hover:border-b-1 border-orange-500 "   to="/register">    
                        <i class="fal fa-registered text-2xl"></i>                    
                    </router-link>   -->
                    <!-- <button v-else @click="emit('open')" class="inline-block no-underline hover:text-black" href="#" :class="{ 'justify-end relative': $store.state.opened }">                   
                        <i class="fal fa-user-circle text-2xl"></i>
                    </button>  -->
                    <router-link  @click="emit('open')" class="inline-block no-underline hover:border-b-1 border-orange-500 " to="/checkout">                        
                        <i class="fal fa-shopping-bag text-2xl pl-8 relative">
                            <span class="bg-orange-500 w-4 h-4 absolute rounded-full text-sm text-center text-white">
                                {{ $store.state.cart.length }}
                            </span>
                        </i>
                    </router-link>    
                     
                </div>
            </div>
            <main class="flex justify-start container items-center mx-auto">
                <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1 -mx-2" id="menu">
                <nav class="flex justify-between">
                    <div class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                        <!-- <router-link :to="{name:'categories', params: {id: item.id}}" class="inline-block no-underline hover:text-black hover:border-b-2 border-orange-500 py-2 px-4">
                            {{item.category_name}} 
                        </router-link> -->
                        <router-link class="inline-block no-underline hover:border-b-1 border-orange-500 " to="/eshop">
                            <span  class=" pl-8  text-gray-600">Mahsulotlar</span>
                        </router-link>                       
                    </div>
                </nav>
            </div>
            </main>
        <!-- </div> -->
    </nav>
    <!-- Header end -->

</template>

<script setup>
import { onMounted, ref } from "vue";
const emit = defineEmits(['open'])
const categories = ref(null);


// import store from "../../store";

onMounted(async () => {
    const { data } = await axios.get(`category`)
    categories.value = data;  
});
  </script>