<template>
    <Preloader v-if="loader" />
    <Header></Header>
    <router-view :class="{'container mx-auto px-3': $route.name != 'home'}" />
</template>

<script setup>
import Preloader from '../components/Preloader.vue'
import Header from "../components/Header.vue"
import store from '../store'
import { ref , onMounted } from 'vue'
if(store.state.user){
    axios.get(`cart-user/${store.state.user.id}`).then(({ data }) => {
        store.state.cart = data.map((cart) => cart.product_id)
    })
}
const loader = ref(true)
onMounted(() => setTimeout(()=> loader.value = false, 500) )
</script>
