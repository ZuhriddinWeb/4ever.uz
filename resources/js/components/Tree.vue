<template>
    <section class="flex-grow flex flex-col">
        <main>
            <swiper :width="160" :space-between="10" class="!py-0.5">
                <swiper-slide @click="changePeriod(index + 1)" v-for="(period, index) in user?.allperiods">
                    <main :class="{ '!border-orange-500 bg-white shadow': activePeriod == (index + 1) }"
                        class="border bg-gray-100 p-2 pt-0 border-transparent cursor-pointer transition-all">
                        <div class="flex justify-between items-center  mb-2 pt-1">
                            <h3 :class="{'text-orange-500': activePeriod == (index + 1)}" class="text-sm text-gray-600 font-semibold">
                                Период {{ index + 1 }}
                            </h3>
                            <i :class="{ 'text-orange-500': paymentPeriodToggle(index + 1) == 1, 'text-teal-600': paymentPeriodToggle(index + 1) == 2 }"
                                class="fas fa-circle text-gray-400 relative top-px text-[10px]"></i>
                        </div>
                        <aside class="flex text-xs justify-between items-center">
                            <div class="w-10 text-center bg-gray-200 rounded-sm overflow-hidden shadow">
                                <h3 class="bg-black text-white py-1">
                                    {{ getMonth(period[0]) }}
                                </h3>
                                <p class=" py-0.5">
                                    {{ getDay(period[0]) }}
                                </p>
                            </div>
                            <div class="border-t w-12 border-gray-300 mx-2"></div>
                            <div class="w-10 text-center bg-gray-200 rounded-sm overflow-hidden shadow">
                                <h3 class="bg-black text-white py-1">
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
        </main>

        <table class="border border-gray-100 mt-3">
            <thead>
                <tr class="bg-stone-50 text-gray-600">
                    <td class="border-y px-2 py-0.5 border-gray-100">
                        Стартовый Бонус
                    </td>

                    <td class="border-y px-2 py-0.5 border-gray-100">
                        Универсальный бонус
                    </td>
                    <td class="border-y px-2 py-0.5 border-gray-100">
                        Лидерский Бонус
                    </td>
                    <td class="border-y px-2 py-0.5 border-gray-100">
                        Сумма
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-y px-2 py-1 border-gray-100">
                        {{ Math.round(startBonus) }}
                    </td>
                    <td class="border-y px-2 py-1 border-gray-100">
                        {{ Math.round(totalPrice) }}
                    </td>
                    <td class="border-y px-2 py-1 border-gray-100">
                        {{ totalPrice }}
                    </td>
                    <td class="border-y px-2 py-1 border-gray-100">
                        {{ totalPrice }}
                    </td>
                </tr>
            </tbody>
        </table>
        <aside class="relative flex-grow">
            <div class="flex flex-col absolute top-3 right-3 z-50 text-right">
                <label class="text-xs text-gray-500">Квалификация</label>
                <span class="text-orange-500 text-xl">
                    {{ $store.state.statuses[levels - 1] }} <i class="fas fa-gem"></i>
                </span>
            </div>
            <div class="pb-3 absolute top-3 left-3 z-50 inline-block">
                <button @click="tree.zoomIn()"
                    class="w-10 h-10 bg-white rounded-full shadow hover:bg-orange-100 active:bg-orange-50 mr-2">
                    <i class="fal fa-search-plus text-gray-600"></i>
                </button>
                <button @click="tree.zoomOut()"
                    class="w-10 h-10 bg-white rounded-full shadow hover:bg-orange-100 active:bg-orange-50">
                    <i class="fal fa-search-minus text-gray-600"></i>
                </button>
            </div>
            <vue-tree
                ref="tree"
                class="w-full h-full shadow-inner bg-stone-50"
                :dataset="vehicules"
                :config="{ nodeWidth: 200, nodeHeight: 100, levelHeight: 180 }"
                linkStyle="straight"
            >
                <template v-slot:node="{ node, collapsed }">
                    <div class="bg-white border-t-2 border-pink-500 w-44 px-2 pt-1 pb-2 shadow relative">
                        <main class="flex flex-col px-1">
                            <div class="flex justify-between items-center w-full leading-none">
                                <span class="text-gray-500 text-md font-semibold">{{ node.name }}</span>
                                <span v-if="node.summaBranch" class="text-gray-400 text-sm" title="Объём Ветки">О.В</span>
                            </div>
                            <div class="text-right leading-none mb-1.5">
                                <span class="text-pink-500 text-md">{{ node.summaBranch }}</span>
                            </div>
                            <div class="flex justify-between items-center w-full leading-[5px]">
                                <header>
                                    <p class="text-gray-400 text-sm">Покупка</p>
                                    <span class="text-gray-500 text-xs">${{ node.total }}</span>
                                </header>
                                <footer v-if="node.procent" class="text-right">
                                    <p class="text-gray-400 text-sm" title="Универсальный бонус">У.Б</p>
                                    <span class="text-gray-500 text-xs">{{ node.procent }}</span>
                                </footer>
                            </div>
                        </main>
                        <span v-if="node.childrenCount > 0 && collapsed"
                            class="absolute right-1/2 bottom-0 translate-x-1/2">
                            <i class="fal fa-angle-down leading-none relative top-[5px] text-pink-500"></i>
                        </span>
                    </div>
                </template>
            </vue-tree>
        </aside>
    </section>
</template>

<script setup>
import { reactive, watch, ref, computed } from "vue"
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Init } from '../helpers/userAccount'
import moment from '../helpers/moment'
// HTML Element
const tree = ref()

const { selectedUser } = defineProps(['selectedUser'])

const activePeriod = ref(selectedUser?.lastPeriod)
const startBonuses = ref([])
const payment = ref(null)

const userAllPayments = ref([])


const vehicules = reactive({ name: null, children: [] })

const { levels, totalPrice, user, period, getSelectedPeoples } = Init(selectedUser?.id, activePeriod.value)

function changePeriod(period) {
    totalPrice.value = null
    activePeriod.value = period
    // getPayment()
    getSelectedPeoples(period, selectedUser?.id)
}


axios.get('startbonus').then(({ data }) => {
    startBonuses.value = data
})


axios.get(`money/${selectedUser?.id}`).then(({ data }) => {
    userAllPayments.value = data
})

const startBonus = computed(() => {
    const active = startBonuses.value.find((elem) => elem.period == activePeriod.value)
    return totalPrice.value / 100 * active?.prosent
})



watch(() => user.value, () => {
    vehicules.name = user.value.fname
    vehicules.total = user.value.periodSumma
    vehicules.children = user.value.children
    vehicules.childrenCount = user.value.children.length
})

function paymentPeriodToggle(period) {
    const select = userAllPayments.value.find((elem) => elem.period == period)

    if (select) {
        if (select.check == true) return 2

        else return 1
    }

    else return 0
}



function getPayment() {
    axios.get(`money/${activePeriod.value}/${selectedUser?.id}`).then(({ data }) => {
        if (data.length == 0) return payment.value = null
        payment.value = data
    })
}
getPayment()



const getDay = (day) => moment(day).format("D")
const getMonth = (day) => moment(day).format("MMM")
watch(() => user.value, () => {
    vehicules.name = user.value.fname
    vehicules.total = user.value.periodSumma
    vehicules.children = user.value.children
    vehicules.childrenCount = user.value.children.length
})
</script>