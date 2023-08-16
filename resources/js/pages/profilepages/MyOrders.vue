<template>
    <AddImage @close="add_Check = null" :selectedDataEdit="add_Check" v-if="add_Check" />
    <OrderInfo @close="order_info = null" :selectedDataEdit="order_info" v-if="order_info" />
    <!-- <div class="items-center bg-transparent w-full border-collapse ml-4 h-full">
            <ag-grid-vue
                    class="ag-theme-material h-full w-full shadow border-0"
                    :columnDefs="columnDefs"
                    :rowData="orders"
                    :defaultColDef="defaultColDef"
                    animateRows="true"
                    :rowSelection="'multiple'"
                    @rowDoubleClicked="rowProtocolSelect">
            </ag-grid-vue>
        </div> -->
    <div class="w-full overflow-scroll">
        <h3 class="text-3xl h-28 ">Мои заказы</h3>
        <table class="items-center bg-transparent w-full border-collapse ml-4">
            <thead>
                <tr class="text-center">
                    <th
                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Номер заказа
                    </th>
                    <th
                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Дата заказа
                    </th>
                    <th
                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Сумма
                    </th>
                    <th
                        class="align-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Статус
                    </th>
                    <th
                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Фиксированный чек
                    </th>
                    <!-- <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                       Funksiyalar
                                   </th> -->
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in orders">
                    <th
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                        {{ item.id }}
                    </th>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                        {{ item.created_at }}
                    </td>
                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        {{ item.order_summa }} USD
                    </td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        <span v-if="item.order_check == null" class="px-4 text-lg rounded-sm bg-orange-400 text-white">
                            Проверка
                        </span>
                        <span v-if="item.order_check == 'COMPLETED'"
                            class="px-4 text-lg rounded-sm bg-green-400 text-white">
                            <span>Подтвержденный</span>
                        </span>
                        <span v-if="item.order_check == 'DECLINED'"
                            class="px-4 text-lg rounded-sm bg-rose-400 text-white">
                            <span>Отменён</span>
                        </span>
                    </td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                       <a :href="item.urlCheck" class="px-4 text-lg rounded-sm bg-blue-400 text-white" target="_blank" rel="noopener noreferrer">Посмотреть чек</a>
                    </td>
                    <!-- <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        <button class="bg-violet-500 text-white" @click="order_info = true, $store.state.id_selected = item.id">
                            <span class="px-4 text-lg rounded-sm hover:bg-violet-600">
                                <i class="fal fa-list-ul mr-1"></i>
                                Batafsil
                            </span>
                        </button>
                    </td> -->

                </tr>
            </tbody>

        </table>
    </div>
</template>

<script setup>
import { reactive, ref } from "vue";
import store from "../../store";
import AddImage from "./../../components/profile/AddImage.vue";
import OrderInfo from "./../../components/profile/OrderInfo.vue";
const orders = ref(null);
const peoples = ref(null);

const add_Check = ref(null);
const order_info = ref(null);
const gridApi = ref(null); // Optional - for accessing Grid's API
const onGridReady = (params) => {
    gridApi.value = params.api;
};
const rowData = ref(null); // Set rowData to Array of Objects, one Object per Row
const columnDefs = reactive([
    { headerName: "T/r", valueGetter: "node.rowIndex + 1", width: 120 },
    { headerName: "Kod", field: "id", width: 120 },
    { headerName: "Buyurtma sanasi", field: "created_at", width: 500 },
    // { headerName: "Jami", field:  totalPrice(products),flex:1 },
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

axios.get(`user-order/${store.state.user.id}`).then(({ data }) => {
    orders.value = data;
})


function totalPrice(products) {
    if (products.length == 1) {
        store.state.summa_price = (+products[0].products_info.price * +products[0].count);
        return (+products[0].products_info.price * +products[0].count)
    }
    else {
        store.state.summa_price = products.reduce((accum, product) => (+accum.products_info.price * +accum.count) + (+product.products_info.price * +product.count));
        return products.reduce((accum, product) => (+accum.products_info.price * +accum.count) + (+product.products_info.price * +product.count))
    }
}


</script>
