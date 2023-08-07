<template>
    <section class="flex flex-col justify-between h-screen">
        <AddCat @added="gridRestart" @close="category_input = null" :selectedDataInput="category_input"
            v-if="category_input" />
        <DeleteCat @added="gridRestart" @close="category_delete = null" :selectedDataEdit="category_delete"
            v-if="category_delete" />
        <UpdateCat @added="gridRestart" @close="category_update = null" :selectedDataEdit="category_update"
            v-if="category_update" />
        <div class="flex justify-between mb-4">
            <div></div>
            <div>
                <button class="bg-gray-100 border-b border-orange-500  py-1 px-4  hover:bg-orange-200"
                    @click="category_input = true">
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
import AddCat from '../admincomponents/category/AddCat.vue'
import DeleteCat from '../admincomponents/category/DeleteCat.vue'
import UpdateCat from '../admincomponents/category/UpdateCat.vue'

const category_input = ref(null);
const category_update = ref(null);
const category_delete = ref(null);

const gridApi = ref(null); // Optional - for accessing Grid's API
const onGridReady = (params) => {
    gridApi.value = params.api;
};
const rowData = ref(null); // Set rowData to Array of Objects, one Object per Row
const columnDefs = reactive([
    { headerName: "T/r", valueGetter: "node.rowIndex + 1", width: 120 },
    { headerName: "Kod", field: "id", width: 120 },
    // { headerName: "Unique ID", field: "category_id",width: 500 },
    { headerName: "Nomi", field: "category_name", flex: 1 },
    {
        headerName: "",
        field: "",
        width: 70,
        onCellClicked: function (select) {
            return getEdit(select.data);
        },
        cellRenderer: (params) =>
            "<div><button @click='category_update=true'><i class='fal fa-edit  text-xl hover:text-green-400'></i></button></div>",
    },
    {
        headerName: "",
        field: "",
        width: 70,
        onCellClicked: function (select) {
            return getDelete(select.data);
        },
        cellRenderer: (params) =>
            "<div><button @click='category_delete=true'><i class='fal fa-trash-alt text-xl hover:text-red-400'></i></button></div>",
    },
],
);

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
function gridRestart() {
    getRowData();
}
async function getRowData() {
    const { data } = await axios.get(`category`);
    rowData.value = data;
}

onMounted(async () => {
    getRowData();
});
</script>