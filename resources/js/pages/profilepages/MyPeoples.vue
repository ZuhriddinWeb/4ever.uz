<template>
    <div class="flex flex-col h-full">
        <h3 class="text-2xl text-gray-700 mb-4">Дерево</h3>
        <Tree :selectedUser="$store.state.user"/>
    </div>
</template>
<script setup>
import Tree from '../../components/Tree.vue'
</script>