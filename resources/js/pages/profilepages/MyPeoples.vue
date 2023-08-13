<template>
    <div class="px-3 flex flex-col h-full">
        <header>
            <h3 class="text-xl font-semibold">
                <span>Квалификация</span><span class="text-teal-500 pl-2">{{ $store.state.statuses[levels - 1] }} </span>
            </h3>
            <h3 class="text-xl font-semibold">
                <span>Сумма за расчётный период</span><span class="text-teal-500 pl-2">{{ totalPrice }}</span>
            </h3>
            <main class="flex justify-between mb-5 items-end">
                <div>
                    <span class="font-semibold">Расчётный период</span>
                    <span class="pl-2"> {{ user?.days[0] }} - {{ user?.days[1] }}</span>
                </div>
                <div class="flex flex-col">
                    <label for="period" class="text-gray-500 mb-1 w-full inline-block text-right text-sm">Период</label>
                    <select id="period" v-model="period" @change="changePeriod" class="border-b outline-none px-2 py-0.5">
                        <option v-for="period in $store.state.user.lastPeriod" :value="period">{{ period }} Период</option>
                    </select>
                </div>
            </main>
        </header>
        <section class="flex-grow flex flex-col relative">
            <div class="pb-3 absolute top-2 left-2 z-50 inline-block">
                <button @click="tree.zoomIn()" class="w-10 h-10 bg-white rounded-full shadow hover:bg-orange-100 active:bg-orange-50 mr-2">
                    <i class="fal fa-search-plus text-gray-600"></i>
                </button>
                <button @click="tree.zoomOut()" class="w-10 h-10 bg-white rounded-full shadow hover:bg-orange-100 active:bg-orange-50">
                    <i class="fal fa-search-minus text-gray-600"></i>
                </button>
            </div>
            <vue-tree ref="tree" v-if="user" class="bg-stone-50 w-full shadow-inner h-[600px] md:h-full" :dataset="vehicules"
                :config="{ nodeWidth: 200, nodeHeight: 100, levelHeight: 180 }" linkStyle="straight">
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
                        <span v-if="node.childrenCount > 0 && collapsed" class="absolute right-1/2 bottom-0 translate-x-1/2">
                            <i class="fal fa-angle-down leading-none relative top-[5px] text-pink-500"></i>
                        </span>
                    </div>
                </template>
            </vue-tree>
        </section>
    </div>
</template>
<script setup>
import VueTree from "@ssthouse/vue3-tree-chart"
import "@ssthouse/vue3-tree-chart/dist/vue3-tree-chart.css"
import { reactive, ref, watch } from "vue"
import { Init } from '../../helpers/userAccount'
const vehicules = reactive({ name: null, children: [] })
const { levels, totalPrice, user, period, changePeriod } = Init(null, store.state.user.lastPeriod)
const tree = ref(null);

watch(() => user.value, () => {
    vehicules.name = user.value.fname
    vehicules.total = user.value.periodSumma
    vehicules.children = user.value.children
    vehicules.childrenCount = user.value.children.length
})
</script>
<style>
.tree-container .link {
    stroke-width: 1px !important;
    stroke: #ee5fa6 !important;
}
</style>