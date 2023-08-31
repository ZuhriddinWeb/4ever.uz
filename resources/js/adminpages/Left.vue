<template>
    <section class="flex flex-col justify-between h-screen">
        <AddLeftOrders @added="gridRestart" @close="left_input = null" :selectedDataInput="left_input" v-if="left_input" />
        <div class="flex justify-between mb-4">
            <div></div>
            <div>
                <button class="bg-gray-100 border-b border-orange-500  py-1 px-4  hover:bg-orange-200"
                    @click="left_input = true">
                    <i class="far fa-layer-plus mx-2"></i>Yangi qo'shish
                </button>
            </div>
        </div>
        <ag-grid-vue class="ag-theme-material h-full w-full shadow border-0" :columnDefs="columnDefs" :rowData="rowData"
            :defaultColDef="defaultColDef" animateRows="true" :rowSelection="'multiple'">
        </ag-grid-vue>
    </section>
</template>
  
<script setup>
import axios from "axios";
import { reactive, onMounted, ref, inject } from "vue";
import store from "../store";
import AddLeftOrders from "../admincomponents/left/AddLeftOrders.vue";

const left_input = ref(null);

const gridApi = ref(null); // Optional - for accessing Grid's API
const onGridReady = (params) => {
    gridApi.value = params.api;
};
const rowData = ref(null); // Set rowData to Array of Objects, one Object per Row
const columnDefs = reactive([
    { headerName: "T/r", valueGetter: "node.rowIndex + 1", width: 120 },
    { headerName: "Kod", field: "id", width: 120 },
    { headerName: "User Id", field: "user_id", width: 120 },
    { headerName: "Ism", field: "name", flex: 1 },
    { headerName: "Telefon", field: "phone", flex: 1 },

    // { headerName: "Buyurtma vaqti", field: "order_check",flex:1 },
    { headerName: "Buyurtma vaqti", field: "created_at", flex: 1 },
    // {
    //     headerName: "",
    //     field: "",
    //     width: 70,
    //     onCellClicked: function (select) {
    //         return getEdit(select.data);
    //     },
    //     cellRenderer: (params) =>
    //         "<div><button @click='category_update=true'><i class='fal fa-edit  text-xl hover:text-green-400'></i></button></div>",
    // },
    // {
    //     headerName: "",
    //     field: "",
    //     width: 70,
    //     onCellClicked: function (select) {
    //         return getDelete(select.data);
    //     },
    //     cellRenderer: (params) =>
    //         "<div><button @click='category_delete=true'><i class='fal fa-trash-alt text-xl hover:text-red-400'></i></button></div>",
    // },
],
);
function gridRestart() {
    getRowData();
}
const defaultColDef = {
    sortable: true,
    filter: true,
};
async function getEdit(e) {
    if (e.id != "") {
        console.log(e);
        store.state.id_selected = e.id;
        category_update.value = true;
    }
}

async function getDelete(e) {
    // console.log(e);
    if (e.id != "") {
        store.state.id_selected = e.id;
        category_delete.value = true;
    }
}

async function getRowData() {
    const { data } = await axios.get(`orders-left`);
    rowData.value = data;
}
getRowData();
// onMounted(async () => {   
//     const { data } = await axios.get(`orders-left`);
//     rowData.value = data;
// });

</script>