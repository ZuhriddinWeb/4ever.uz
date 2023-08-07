<template>
    <section class="bg-gray-200 h-screen flex flex-col flex-grow justify-between">
        <main class="flex justify-between h-32">
            <div
                class="flex flex-grow justify-between w-1/4 h-32 rounded-sm shadow mr-3 items-center text-3xl bg-gradient-to-r from-green-400 to-green-500">
                <div class="flex justify-center mx-4 my-4  items-center w-1/3">
                    <i
                        class="fal fa-chart-line w-1/3 flex justify-center rounded-full bg-white items-center p-2 text-green-500"></i>
                </div>
                <div class="flex justify-between mx-4 my-4  items-center w-2/3 text-white">
                    <p class="flex justify-end">Umumiy Savdo</p>
                </div>
            </div>
            <div
                class="flex flex-grow justify-between w-1/4 h-32 rounded-sm shadow mr-3 items-center text-3xl bg-gradient-to-r from-blue-400 to-blue-500">
                <div class="flex justify-center mx-4 my-4  items-center w-1/3">
                    <i
                        class="fal fa-cart-plus w-1/3 flex justify-center rounded-full bg-white items-center p-2 text-blue-500"></i>
                </div>
                <div class="flex justify-between mx-4 my-4  items-center w-2/3 text-white">
                    <p class="flex justify-end">Umumiy Xaridlar</p>
                </div>
            </div>
            <div
                class="flex flex-grow justify-between w-1/4 h-32 rounded-sm shadow mr-3 items-center text-3xl bg-gradient-to-r from-rose-400 to-rose-500">
                <div class="flex justify-center mx-4 my-4  items-center w-1/3">
                    <i
                        class="far fa-box-usd w-1/3 flex justify-center rounded-full bg-white items-center px-3 py-2 text-rose-500"></i>
                </div>
                <div class="flex justify-between mx-4 my-4  items-center w-2/3 text-white">
                    <p class="flex justify-end">Jami Buyurtmalar</p>
                </div>
            </div>
            <div
                class="flex flex-grow justify-between w-1/4 h-32 rounded-sm shadow mr-1 items-center text-3xl bg-gradient-to-r from-orange-400 to-orange-500">
                <div class="flex justify-center mx-4 my-4  items-center w-1/3">
                    <i
                        class="fal fa-heart-rate w-1/3 flex justify-center rounded-full bg-white items-center p-2 text-orange-500"></i>
                </div>
                <div class="flex justify-between mx-4 my-4  items-center w-2/3 text-white">
                    <p class="flex justify-end">Umumiy O'sish</p>
                </div>
            </div>
        </main>

        <section class="flex justify-between mt-4">
            <div class="bg-white w-1/2 mr-1  h-full items-center flex-grow shadow p-4">
                <p class="text-xl font-medium">Umumiy Savdo</p>
                <JSCharting :options="chartOptions" class="columnChart"></JSCharting>
            </div>
            <div class="flex flex-col justify-between  w-1/2 ml-2 ">
                <div class="flex justify-between">
                    <div class="w-1/2 bg-white mr-1 shadow p-4">
                        <p class="text-xl font-medium">Umumiy Savdo</p>
                        <JSCharting :options="chartOptions" class="columnChart"></JSCharting>
                    </div>
                    <div class="w-1/2 bg-white ml-2 shadow p-4">
                        <p class="text-xl font-medium">Umumiy Savdo</p>
                        <JSCharting :options="chartOptions" class="columnChart"></JSCharting>
                    </div>
                </div>
                <div class="flex flex-col justify-between w-full bg-white mt-4 p-4 shadow">
                    <div class="text-2xl font-medium items-center">Kunlik jo'natmalar:</div>
                    <hr>
                    <div class="flex justify-between">
                        <div class="text-3xl">
                            <i class="fal fa-donate  text-green-500 mr-2"></i>
                            <span>123 ta jo'natildi</span>
                        </div>
                        <div class="text-3xl">
                            <i class="fal fa-donate  text-orange-500 mr-2"></i>
                            <span>123 ta jarayonda</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex justify-between mt-4 h-full">
            <div class="bg-white w-2/3 mr-2">
                <p class="p-4 text-3xl font-medium">Foydalanuvchilar:</p>
                <ag-grid-vue class="ag-theme-material  h-[300px]  shadow border-0 overflow-y-scroll"
                    :columnDefs="columnDefs" :rowData="rowData" :defaultColDef="defaultColDef" animateRows="true"
                    :rowSelection="'multiple'">
                </ag-grid-vue>
            </div>
            <div class="bg-white w-1/3 h-full ml-2 shadow p-4">
                <p class="text-3xl font-medium">Umumiy Savdo</p>
                <JSCharting :options="chartOptionsPie" class="columnChart"></JSCharting>
            </div>
        </section>

    </section>
</template>
<script setup>
import JSCharting from 'jscharting-vue';
import { ref } from 'vue';
import { reactive, onMounted } from "vue";
import axios from "axios";

const chartOptions = ref({
    type: 'line spline',
    series: [
        {
            pattern: { month: "*" },
            name: 'Sotilgan',
            points: [
                { id: "p1", x: "1/1/2020", y: 23 },
                { id: "p1", x: "1/1/2022", y: 40 },
                { id: "p1", x: "1/1/2023", y: 50 },
                { id: "p1", x: "1/1/2024", y: 60 },

            ]

        },
        {
            name: 'Daromat',
            points: [
                { x: 'A', y: 10 },
                { x: 'B', y: 30 },
                { x: 'C', y: 60 }
            ]

        }
    ]
})
const chartOptionsPie = ref({
    type: 'pie',
    series: [
        {
            pattern: { month: "*" },
            name: 'Sotilgan',
            points: [
                { id: "p1", x: "1/1/2020", y: 23 },
                { id: "p1", x: "1/1/2022", y: 40 },
                { id: "p1", x: "1/1/2023", y: 50 },
                { id: "p1", x: "1/1/2024", y: 60 },

            ]

        },
        {
            name: 'Daromat',
            points: [
                { x: 'A', y: 10 },
                { x: 'B', y: 30 },
                { x: 'C', y: 60 }
            ]

        }
    ]
})
const gridApi = ref(null); // Optional - for accessing Grid's API
const onGridReady = (params) => {
    gridApi.value = params.api;
};
const rowData = ref(null); // Set rowData to Array of Objects, one Object per Row
const columnDefs = reactive([
    { headerName: "T/r", valueGetter: "node.rowIndex + 1", width: 120 },
    { headerName: "Kod", field: "id", width: 120 },
    { headerName: "Familiya", field: "lname", flex: 1 },
    { headerName: "Ism", field: "fname", flex: 1 },
    { headerName: "Telefon", field: "phone", flex: 1 },
    { headerName: "Manzil", field: "address", flex: 1 },
    { headerName: "Status", field: "fname", flex: 1 },
    {
        headerName: "",
        field: "",
        width: 70,
        onCellClicked: function (select) {
            return getEdit(select.data);
        },
        cellRenderer: (params) =>
            "<div><button @click='protocol_edit=true'><i class='fal fa-eye  text-xl hover:text-green-400'></i></button></div>",
    },
],
);

const defaultColDef = {
    sortable: true,
    filter: true,
};



function gridRestart() {
    getRowData();
}
async function getRowData() {
    const { data } = await axios.get(`users-select`);
    rowData.value = data;
}

onMounted(async () => {
    getRowData();
});
</script>

<style>.columnChart {
    height: 300px;
}</style>