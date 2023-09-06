<template>
    <section @mousedown="$emit('close')" class="flex justify-center items-center py-4">
        <main @mousedown.stop class="w-[920px] h-full bg-white shadow-sm rounded-sm flex flex-col">
            <header class="flex justify-end bg-gray-200">
                <button class="w-10 h-10 bg-gray-300 text-gray-600 hover:bg-red-200 active:bg-red-100" @click="$emit('close')">
                    <i class="fal fa-times relative top-px"></i>
                </button>
            </header>
            <section class="px-4 py-2 bg-white flex-grow flex flex-col">
                <Tree :selectedUser="selectedUser"></Tree>
            </section>
        </main>
    </section>
</template>

<script setup>
import Tree from "../components/Tree.vue"
const { selectedUser } = defineProps(['selectedUser'])
</script>