<template>
    <section @mousedown="$emit('close')" class="flex justify-center items-center">
        <main @mousedown.stop class="w-[900px] bg-white shadow-sm rounded-sm">
            <header class="flex justify-end bg-gray-200">
                <button class="w-10 h-10 bg-gray-300 text-gray-600 hover:bg-red-200 active:bg-red-100" @click="$emit('close')">
                    <i class="fal fa-times relative top-px"></i>
                </button>
            </header>
            <section v-if="user" class="p-4 bg-gray-50">
                <swiper
                    :slides-per-view="5"
                    :space-between="10"
                >
                    <swiper-slide @click="changePeriod(index + 1)" v-for="(period, index) in user?.allperiods">
                        <main :class="{'bg-white shadow': activePeriod == (index + 1)}" class="border bg-gray-100 p-2 pt-0 border-transparent cursor-pointer hover:bg-pink-200">
                            <div class="flex justify-between items-center  mb-2 pt-1">
                                <h3 class="text-sm text-gray-600 font-semibold">
                                    Mavsum {{ index + 1}} 
                                </h3>
                                <i :class="{'text-yellow-600': paymentPeriodToggle(index + 1) == 1, 'text-teal-600': paymentPeriodToggle(index + 1) == 2 }" class="fal fa-check-circle text-gray-400 relative top-px"></i>
                            </div>
                            <aside class="flex text-xs justify-between items-center">
                                <div class="w-10 text-center bg-gray-200 rounded-sm overflow-hidden shadow">
                                    <h3 class="bg-black text-white py-0.5">
                                        {{ getMonth(period[0]) }}
                                    </h3>
                                    <p class=" py-0.5">
                                        {{ getDay(period[0]) }}
                                    </p>
                                </div>
                                <div class="border-t w-12 border-gray-400 mx-2">
    
                                </div>
                                <div class="w-10 text-center bg-gray-200 rounded-sm overflow-hidden shadow">
                                    <h3 class="bg-black text-white py-0.5">
                                        {{ getMonth(period[1]) }}
                                    </h3>
                                    <p class=" py-0.5">
                                        {{ getDay(period[1]) }}
                                    </p>
                                </div>
                            </aside>
                        </main>
                    </swiper-slide>
                </swiper>
                <main class="flex justify-between my-5 items-end">
                    <div>
                        <span class="font-semibold">Universal bonus {{ totalPrice }} + {{ startBonus }} </span>
                    </div>
                </main>
                <vue-tree v-if="user" class="w-full h-[600px] shadow bg-white" :dataset="vehicules"
                    :config="{ nodeWidth: 150, nodeHeight: 80, levelHeight: 200 }" linkStyle="straight">
                    <template v-slot:node="{ node, collapsed }">
                        <div class="bg-white border-t-2 border-pink-500 w-32 px-2 pt-1 pb-2 shadow relative">
                            <main class="flex flex-col px-1">
                                <div class="flex justify-between items-center w-full">
                                    <span class="text-gray-500 text-md font-semibold">{{ node.name }}</span>
                                    <span class="text-pink-500 text-md ">{{ node.summaBranch }}</span>
                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <span class="text-gray-500 text-xs">{{ node.total }}</span>
                                    <span class="text-gray-500 text-xs">{{ node.procent }}</span>
                                </div>
                            </main>
                            <span v-if="node.childrenCount > 0 && collapsed"
                                class="absolute right-1/2 bottom-0 translate-x-1/2">
                                <i class="fal fa-angle-down leading-none relative top-[5px] text-pink-500"></i>
                            </span>
                        </div>
                    </template>
                </vue-tree>
                <div class="h-[600px] bg-gray-100" v-else> 

                </div>
                <main v-if="totalPrice + startBonus != 0" class="flex justify-end items-center mt-4">
                    <p v-if="payment != null" class="mr-5 text-green-600 font-semibold">
                        {{ payment?.summa }}$ To'landi
                    </p>
                    <button :disabled="payment != null || payloader" @click="paymentMoney"
                        :class="{'!bg-gray-200': payment != null || payloader}"
                        class="bg-pink-500 w-20 py-1 text-white">
                        <span v-if="payloader == false">
                            To'lov 
                        </span>
                        <span v-else>
                            <i class="fal fa-spinner-third animate-spin"></i>
                        </span>
                    </button>
                </main>
            </section>
        </main>
    </section>
</template>

<script setup>
import VueTree from "@ssthouse/vue3-tree-chart"
import "@ssthouse/vue3-tree-chart/dist/vue3-tree-chart.css"
import 'swiper/css';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { reactive, watch, ref, computed } from "vue"
import { Init } from '../helpers/userAccount'
import moment from '../helpers/moment'
import axios from "axios";
const activePeriod = ref(selectedUser.lastPeriod)
const startBonuses = ref([])
const payment = ref(null)
const payloader = ref(false)

const userAllPayments = ref([])

const { selectedUser } = defineProps(['selectedUser'])

const vehicules = reactive({ name: null, children: [] })

const { levels, totalPrice, user, period, getSelectedPeoples } = Init(selectedUser.id, activePeriod.value)

function changePeriod(period){
    totalPrice.value = null
    activePeriod.value = period
    getPayment()
    getSelectedPeoples(period,selectedUser.id)
}


axios.get('startbonus').then(({data}) => {
    startBonuses.value = data
})


axios.get(`money/${selectedUser.id}`).then(({data}) => {
    userAllPayments.value = data
})

const startBonus = computed(() => {
    const active = startBonuses.value.find((elem) => elem.period == activePeriod.value)
    return totalPrice.value/100 * active?.prosent
})



watch(() => user.value, () => {
    vehicules.name = user.value.fname
    vehicules.total = user.value.periodSumma
    vehicules.children = user.value.children
    vehicules.childrenCount = user.value.children.length
})


function paymentMoney(){
    payloader.value = true
    axios.post('money', {
        summa: totalPrice.value + startBonus.value,
        period: activePeriod.value,
        user_id: selectedUser.id
    }).then(({data}) => {
        setTimeout(() => {
            payloader.value = false
        }, 300)
        userAllPayments.value.push(data)
        payment.value = data
    })
}

function paymentPeriodToggle(period){


    const select = userAllPayments.value.find((elem) => elem.period == period)
    if(select) {
        if(select.check == true) return 2
        else return 1
    }
    else return 0



}



function getPayment(){
    axios.get(`money/${activePeriod.value}/${selectedUser.id}`).then(({data}) => {
        if(data.length == 0) return payment.value = null
        payment.value = data
    })
}
getPayment()


function getDay(day){
    return moment(day).format("D") 
}

function getMonth(day){
    return moment(day).format("MMM") 
}
</script>