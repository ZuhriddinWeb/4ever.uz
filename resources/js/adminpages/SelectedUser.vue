<template>
    <section @mousedown="$emit('close')" class="flex justify-center items-center py-4">
        <main @mousedown.stop class="w-[920px] h-full bg-white shadow-sm rounded-sm flex flex-col">
            <header class="flex justify-end bg-gray-200">
                <button class="w-10 h-10 bg-gray-300 text-gray-600 hover:bg-red-200 active:bg-red-100" @click="$emit('close')">
                    <i class="fal fa-times relative top-px"></i>
                </button>
            </header>
            <section v-if="user" class="px-4 py-2 bg-white flex-grow flex flex-col">
                <Tree :selectedUser="selectedUser"></Tree>
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
import Tree from "../components/Tree.vue"
import { reactive, watch, ref, computed } from "vue"
import { Init } from '../helpers/userAccount'
import moment from '../helpers/moment'
import axios from "axios";
const startBonuses = ref([])
const payment = ref(null)
const payloader = ref(false)

const userAllPayments = ref([])

const { selectedUser } = defineProps(['selectedUser'])
const activePeriod = ref(selectedUser.lastPeriod)

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