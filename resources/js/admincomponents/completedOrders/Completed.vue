<template>
    <main
        @click="$emit('close')"
        class="fixed top-0 left-0 z-40 w-full h-full bg-black bg-opacity-40 flex justify-center items-center p-20"
    >
    <section @click.stop class="bg-white shadow h-4/5 w-4/6 rounded-sm">
            <div class="text-right flex flex-col h-full">
                <main class="flex  justify-between w-full items-center bg-gray-100 shadow-sm">
                    <div class="flex justify-between p-2 w-full">
                        <header class="flex justify-center items-center text-xl text-gray-500">
                            Jo'natma ma'lumotnomasi
                        </header>                    
                        <div class="text-xl">
                            <button @click="$emit('close')" class="px-3 py-1 hover:text-red-600">
                                <i class="fal fa-times"></i>
                            </button>
                        </div>
                    </div>
                </main>
                <article class="flex justify-between w-full h-full">
                    <ag-grid-vue
                        class="ag-theme-material h-full w-full shadow border-0 text-center"
                        :columnDefs="columnDefs"
                        :rowData="rowData"
                        :defaultColDef="defaultColDef"
                        animateRows="true"
                        :rowSelection="'multiple'"
                        @rowDoubleClicked="rowProtocolSelect"
                        :getRowClass="getRowClass"
                >
        </ag-grid-vue>
                </article>              
            </div>
        </section>
    </main>
</template>

<script setup>
import { reactive, onMounted, ref } from "vue";
const { selectedDataDelete } = defineProps(["selectedDataDelete"]);

const emit = defineEmits("added");

const gridApi = ref(null); // Optional - for accessing Grid's API
const onGridReady = (params) => {
    gridApi.value = params.api;
};
const rowData = ref(null); // Set rowData to Array of Objects, one Object per Row
const columnDefs = reactive([
        { headerName: "T/r",headerClass:'items-center', valueGetter: "node.rowIndex + 1", width: 120 },
        { headerName: "Kod", field: "id",width: 120 },
        { headerName: "Mahsulot ID", valueGetter: params => {return params.data.products_info.id;} },
        { headerName: "Mahsulot nomi", valueGetter: params => {return params.data.products_info.product_name;} },        
        { headerName: "Aromat",valueGetter: params => {return params.data.products_info.flavor;}},
        { headerName: "Soni",field: "count"},
        { headerName: "Buyurtma vaqti", field: "created_at"},

        {
            headerName: "",
            field: "",
            width: 70,
            onCellClicked: function (select) {
                getEdit(select.data);
            },
            cellClass:[
                'hover:bg-gray-100',
                'cursor-pointer',
                'items-center'
            ],
            cellRenderer: (params) => {
                    return "<i  @click='viewDetails=true' class='fal fa-exclamation-circle text-gray-400  text-xl'></i>"                   
               
            }
           
            
        },
      ],
     );

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
    const { data } = await axios.get(`getWithProducts/${store.state.id_selected}`);
    rowData.value = data;
}

onMounted(async () => {   
    getRowData();
});
</script>
