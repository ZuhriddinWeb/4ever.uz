<template>
    <div class="flex flex-col h-full">
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
        <section class="flex-grow flex flex-col">
            <ag-grid-vue class="ag-theme-material h-96 w-full shadow border-0" :columnDefs="columnDefs"
                :rowData="users" :defaultColDef="defaultColDef" animateRows="true" :rowSelection="'multiple'"
            />
        </section>
    </div>
</template>
<script setup>
import "@ssthouse/vue3-tree-chart/dist/vue3-tree-chart.css"
import { reactive, ref, watch } from "vue"
import { Init } from '../../helpers/userAccount'
const vehicules = reactive({ name: null, children: [] })
const { users, levels, totalPrice, user, period, changePeriod } = Init(null, store.state.user.lastPeriod)

watch(() => user.value, () => {
    vehicules.name = user.value.fname
    vehicules.total = user.value.periodSumma
    vehicules.children = user.value.children
    vehicules.childrenCount = user.value.children.length
})

const columnDefs = reactive([
    { headerName: "T/r", valueGetter: "node.rowIndex + 1", width: 90 },
    // { headerName: "Kod", field: "id",width: 90 },
    // { headerName: "Buyurtma vaqti", field: "order_check",flex:1 },
    { headerName: "Имя ", field: "fname", width: 120 },
    { headerName: "Фамилия ", field: "lname", width: 120 },
    { headerName: "Степень", field: 'level' },
    { headerName: "Сумма", field: 'total' },
    { headerName: "Процент", field: 'procent', flex: 1 },
],
);

const defaultColDef = {
    sortable: true,
    filter: true,
};
</script>
<style>
.tree-container .link {
    stroke-width: 1px !important;
    stroke: #ee5fa6 !important;
}
</style>