<template>
    <div class="px-3">
        <h3 class="text-xl font-semibold">
            <span>Darajangiz:</span><span class="text-teal-500 pl-2">{{ $store.state.statuses[levels - 1] }} </span>
        </h3>
        <h3 class="text-xl font-semibold">
            <span>{{ period }} mavsum uchun pul miqdori:</span><span class="text-teal-500 pl-2">{{ totalPrice }}</span>
        </h3>
        <main class="flex justify-between mb-5 items-end">
            <div>
                <span class="font-semibold">Mavsum kunlari:</span>
                <span class="pl-2"> {{ user?.days[0] }} - {{ user?.days[1] }}</span>
            </div>
            <div class="flex flex-col">
                <label for="period" class="text-gray-500 mb-1 w-full inline-block text-right text-sm">Mavsum</label>
                <select id="period" v-model="period" @change="changePeriod" class="border-b outline-none px-2 py-0.5">
                    <option v-for="period in $store.state.user.lastPeriod" :value="period">{{ period }} Mavsum</option>
                </select>
            </div>
        </main>

        <div class="flex justify-start mb-2">
            <button @click="tree.zoomIn()" >
                <i class="fal fa-search-plus text-xl mr-4 p-4"></i>
            </button>
            <button @click="tree.zoomOut()" >
                <i class="fal fa-search-minus text-xl ml-6"></i>
            </button>
        </div>
        <vue-tree ref="tree" v-if="user" class="bg-stone-50 w-full h-[700px] shadow-inner " :dataset="vehicules"
            :config="{ nodeWidth: 150, nodeHeight: 80, levelHeight: 200 }" linkStyle="straight">
            <template v-slot:node="{ node, collapsed }">
                <div class="bg-white border-t-2 border-pink-500 w-32 px-2 pt-1 pb-2 shadow relative">
                    <main class="flex flex-col px-1">
                        <div class="flex justify-between items-center w-full">
                            <span class="text-gray-500 text-md font-semibold" >{{ node.name }}</span>
                            <span class="text-pink-500 text-md ">{{ node.summaBranch }}</span>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <span class="text-gray-500 text-xs">{{ node.total }}</span>
                            <span class="text-gray-500 text-xs">{{ node.procent }}</span>
                        </div>
                    </main>
                    <span v-if="node.childrenCount > 0 && collapsed" class="absolute right-1/2 bottom-0 translate-x-1/2">
                        <i class="fal fa-angle-down leading-none relative top-[5px] text-pink-500"></i>
                    </span>
                </div>
            </template>
        </vue-tree>
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