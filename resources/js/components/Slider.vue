<template>
    <div class="carousel relative">
        <swiper class="rounded-md border" :slides-per-view="1" :space-between="50" @swiper="onSwiper" @slideChange="onSlideChange">
            <swiper-slide>
                <main class="h-[50vh]">
                    <div class="h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('https://i.ibb.co/0jw0BqB/df18a08e-32d2-470a-909e-6a4e0b401085.jpg');">
                        <div
                            class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <!-- <p class="text-black text-2xl my-4">ForeverGAB</p> -->
                            <!-- <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black"
                                href="#">view product</a> -->
                        </div>
                    </div>
                </main>
            </swiper-slide>
            <swiper-slide>
                <main class="h-[50vh]">
                    <div class=" h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('https://media.greenwaystart.com/banner/noname/Sharme_essential_candle_citronella_3840_1210.jpg');">
                        <div
                            class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-black text-2xl my-4">Real Bamboo Wall Clock</p>
                        </div>
                    </div>
                </main>
            </swiper-slide>
            <swiper-slide>
                <main class="h-[50vh]">
                    <div class=" h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom" style="background-image: url('https://media.greenwaystart.com/banner/noname/Welllab_Kids_Magnesium_B6_3840_1210.jpg');">
                        <div
                            class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-black text-2xl my-4">Brown and blue hardbound book</p>
                        </div>
                    </div>
                </main>
            </swiper-slide>
        </swiper>
    </div>
</template>
  
<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue'

function onSwiper(){
    console.log('onSwiper');
}


function onSlideChange(){
    console.log('onSlideChange');
}
</script>