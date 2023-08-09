<template>
   <section class="flex flex-col justify-between h-screen relative">
      <transition name="fade">
         <SelectedUser 
            v-if="PageProps.selecteduser" 
            :selectedUser="PageProps.selecteduser" 
            class="absolute inset-0 bg-black/50 z-50"
            @close="PageProps.selecteduser = null"
         />
      </transition>
      <ag-grid-vue class="ag-theme-material h-full w-full shadow border-0" :columnDefs="PageProps.columnDefs" :rowData="PageProps.rowData"
         :defaultColDef="{
            sortable: true,
            filter: true,
         }"
         animateRows="true"
         :rowSelection="'multiple'"
      />
   </section>
</template>

<script setup>
import axios from "axios";
import { reactive } from "vue"
import SelectedUser from "./SelectedUser.vue"


const PageProps = reactive({
   selecteduser: null,
   rowData: null,
   columnDefs: [
      { headerName: "T/r", valueGetter: "node.rowIndex + 1", width: 120 },
      { headerName: "Kod", field: "id", width: 120 },
      { headerName: "Familiya", field: "lname", flex: 1 },
      { headerName: "Ism", field: "fname", flex: 1 },
      { headerName: "Telefon", field: "phone", flex: 1 },
      // { headerName: "Manzil", field: "address", flex: 1 },
      { headerName: "Status", field: "fname", flex: 1 },
      { 
         headerName: "",
         width: 65,
         cellClass: ['text-center', 'bg-gray-100', 'active:bg-gray-50', 'hover:bg-gray-200'],
         onCellClicked: function (cell){
            PageProps.selecteduser = cell.data
         },
         cellRenderer: () => '<i class="fas fa-clipboard-list-check text-teal-600"></i>'
      },
   ]
})



async function getRowData() {
   const { data } = await axios.get(`users-select`);
   PageProps.rowData = data;
}
getRowData()
</script>