<template>
    <section class="flex flex-col justify-between h-screen">
        <Completed
            @added="gridRestart"
            @close="viewDetails = null"
            :selectedDataInput="viewDetails"
            v-if="viewDetails"
        />
       
        <ag-grid-vue
                class="ag-theme-material h-full w-full shadow border-0"
                :columnDefs="columnDefs"
                :rowData="rowData"
                :defaultColDef="defaultColDef"
                animateRows="true"
                :rowSelection="'multiple'"
                @rowDoubleClicked="rowProtocolSelect"
                :getRowClass="getRowClass"
                >
        </ag-grid-vue>
    </section>
</template>
  
<script setup>
import axios from "axios";
import { reactive, onMounted, ref, inject } from "vue";
import store from "../store";
import Completed from '../admincomponents/completedOrders/Completed.vue'

const openInfo = ref(null);
const checkInfo = ref(null);
const viewDetails = ref(null);

const gridApi = ref(null); // Optional - for accessing Grid's API
const onGridReady = (params) => {
    gridApi.value = params.api;
};
const rowData = ref(null); // Set rowData to Array of Objects, one Object per Row
const columnDefs = reactive([
        { headerName: "T/r", valueGetter: "node.rowIndex + 1", width: 120 },
        { headerName: "Kod", field: "id",width: 120 },
        { headerName: "User Id", field: "user_id",width: 120 },
        { headerName: "Buyurtma ID", field: "orderId",flex:1 },
        { headerName: "Buyurtma vaqti", field: "created_at",flex:1 },

        {
            headerName: "",
            field: "",
            width: 70,
            onCellClicked: function (select) {
                getEdit(select.data);
            },
            cellClass:[
                'hover:bg-gray-100',
                'cursor-pointer'
            ],
            cellRenderer: (params) => {
                    return "<i  @click='viewDetails=true' class='fal fa-exclamation-circle text-gray-400  text-xl'></i>"                   
               
            }
           
            
        },
      ],
     );
// function getRowClass (params) {
//     if(params.data.order_check=='COMPLETED') return '!bg-green-100'
//     else if(params.data.order_check=='REGISTERED') return '!bg-orange-100'
//     else if(params.data.order_check=='DECLINED') return '!bg-red-100'

// };
const defaultColDef = {
    sortable: true,
    filter: true,
};
async function getEdit(e) {
    if (e.id != "") {
        store.state.id_selected = e.id;
        viewDetails.value = true;
    }
    // const { data } = await axios.get(`getOrderStatuses/${e.orderId}`);
    // checkInfo.value = data;
    // getRowData()
}


async function getRowData() {
    const { data } = await axios.get(`completedOrders`);
    rowData.value = data;
}

onMounted(async () => {   
    getRowData();
});
</script>