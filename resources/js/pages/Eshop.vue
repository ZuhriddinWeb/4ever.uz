<template>
    <section>
        <main class="mb-2 border-b border-gray-100 pb-4">
            <h3 class="text-xl text-gray-700 mb-4">Фильтрация</h3>
            <main class="flex justify-between flex-col md:flex-row">
                <div class="mb-2 md:mb-0">
                    <h3 class="text-sm text-gray-400 mb-0.5">Гендер</h3>
                    <aside class="flex text-gray-600 text-sm">
                        <div>
                            <label for="genderinp" :class="{'!bg-orange-100': formData.gender == null}" class="radio-button" @click="">
                                <span class="mr-1.5">
                                    Все
                                </span>
                                <input type="radio" class="accent-orange-600" v-model="formData.gender" @change="getProducts()" :value="null" name="gender" id="genderinp">
                            </label>                            
                        </div>
                        <div v-for="gender in pageData.genders">
                            <label :for="'gender'+gender.id" :class="{'!bg-orange-100': formData.gender == gender.id}" class="radio-button">
                                <span class="mr-1.5">
                                    {{ gender.name }}
                                </span>
                                <input type="radio" class="accent-orange-600" v-model="formData.gender" :value="gender.id" @change="getProducts()" name="gender" :id="'gender'+gender.id">
                            </label>
                        </div>
                    </aside>
                </div>
                <div>
                    <h3 class="text-sm text-gray-400 md:text-right  mb-0.5">Категория</h3>
                    <aside class="flex text-gray-600 text-sm">
                        <div v-for="category in pageData.categories">
                            <label :for="'category'+category.id" :class="{'!bg-orange-500 text-white': formData.categories.includes(category.id)}" class="radio-button">
                                <span class="mr-1.5">
                                    {{ category.category_name }}
                                </span>
                                <input type="checkbox" v-model="formData.categories" @change="getProducts()" :true-value="[]" hidden :value="category.id" :id="'category'+category.id">
                            </label>
                        </div>
                    </aside>
                </div>
            </main>
        </main>
        <main class="flex flex-wrap w-full -mx-2">
            <Card v-for="product in pageData.products" :product="product"></Card>
        </main>
    </section>
</template>
<script setup>
import { reactive } from "vue"
import Card from "../components/Card.vue"

const pageData = reactive({
    genders: null,
    products: null,
    categories: null
})

const formData = reactive({
    gender: null,
    categories: [],
})


function getProducts() {
    axios.post('products-filter', formData).then(({data}) => pageData.products = data)
}
getProducts()


axios.get('tree').then(({data}) => pageData.genders = data)
axios.get('category').then(({ data }) => pageData.categories = data)
</script>