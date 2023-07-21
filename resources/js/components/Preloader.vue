<template>
    <div class="flex justify-center items-center fixed top-0 left-0 right-0 bottom-0 bg-white z-40">
        <div class="preloader-inner relative flex items-center justify-center w-[300px] h-[300px]">
            <div class="animate-spin rounded-full w-full h-full  border-b-4 border-orange-500 absolute top-0 left-0">
            </div>
            <div class="preloader-img pere-text text-center">
                <img class="w-[50px] h-[50px] inline-block mb-4" :src="'/images/logo.png'">
                <h3 class="flex justify-between text-3xl font-medium">
                    <span>Forever</span>
                    <span class="text-orange-500">Gab</span>
                </h3>
                <h3 class="text-3xl font-medium">perfume</h3>
            </div>
        </div>
    </div>
</template>