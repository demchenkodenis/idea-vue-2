<template>
<div>
    <div class="hidden xl:block border-b border-black-10">
        <div class="container">
            <div class="flex">
                <router-link to="/" class="magic-hover magic-hover__square" exact>
                    <img src="/img/logo.svg" alt="Idea logo" 
                    class="py-28 mr-40 xl:w-104 2xl:w-150">
                </router-link>
                <nav class="w-full relative border-black-10 border-l">
                    <div class=" h-70 flex justify-between items-baseline">
                        <div class="pl-40 xl:pl-30 h-70 flex">
                            <ul class="flex items-stretch h-full font-Raleway-Regular text-black-40">
                                <li class="flex items-center transition-colors duration-300 hover:text-red-100">
                                    <router-link to="/about" class=" magic-hover magic-hover__square" exact>О компании</router-link>
                                </li>
                                <li class="flex items-center px-30 transition-colors duration-300 hover:text-red-100">
                                    <router-link to="/portfolio" class=" magic-hover magic-hover__square" exact>Портфолио</router-link>
                                </li>
                                <li class="flex items-center transition-colors duration-300 hover:text-red-100">
                                    <router-link to="/contact" class=" magic-hover magic-hover__square" exact>Контакты</router-link>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul class="flex">
                                <li class="mr-40 mt-5">
                                    <a href="tel:89003703839" class="font-Raleway-Regular text-20 lining-nums text-black-100">+7 (910) 327-55-40</a>
                                </li>
                                <li class="mr-10 flex items-center  magic-hover magic-hover__square">
                                    <a href="https://vk.com/ideya_design" class="mr-10 group flex items-center justify-center border border-black-10 hover:border-red-100 transition-colors duration-300 w-40 h-40 rounded-full">
                                        <vk-icon />
                                    </a>
                                </li>
                                <li class="flex items-center  magic-hover magic-hover__square">
                                    <a href="https://www.instagram.com/idea31pro/" class="flex group items-center justify-center border border-black-10 hover:border-red-100 transition-colors duration-300 w-40 h-40 rounded-full">
                                        <instagram-icon />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="h-50 border-t border-black-10 flex pl-40 xl:pl-30 justify-between items-stretch font-Raleway-Regular tracking-letter-button text-16 text-black-100">
                        <li class="relative flex">
                            <span class="submenu-link group h-50 flex items-center magic-hover magic-hover__square">Дизайн интерьера
                            <ul class="
                                    border-l
                                    border-r
                                    border-b
                                    border-black-10
                                    flex
                                    flex-col
                                    items-center
                                    submenu 
                                    absolute 
                                    top-52
                                    -left-20
                                    opacity-0 
                                    transform 
                                    scale-y-1
                                    transition-transform
                                    group-hover:opacity-100 
                                    motion-safe:hover:scale-y-100
                            ">
                                <li class="px-30 py-10">
                                    <router-link to="/service/2" exact class="transition-colors duration-300 hover:text-red-100 magic-hover magic-hover__square">Частный</router-link>
                                </li>
                                <li class="px-30 py-10 border-t border-black-10">
                                    <router-link to="/service/1" exact class="transition-colors duration-300 hover:text-red-100 magic-hover magic-hover__square">Коммерческий</router-link>
                                </li>
                            </ul>
                            </span>
                        </li>
                        <li class="flex items-center">
                            <router-link to="/service/5" exact class="transition-colors duration-300 hover:text-red-100 magic-hover magic-hover__square">Ремонт и отделка</router-link>
                        </li>
                        <li class="flex items-center">
                            <router-link to="/service/3" exact class="transition-colors duration-300 hover:text-red-100 magic-hover magic-hover__square">Архитектурное проектирование</router-link>
                        </li>
                        <li class="flex items-center">
                            <router-link to="/service/6" exact class="transition-colors duration-300 hover:text-red-100 magic-hover magic-hover__square">Строительство</router-link>
                        </li>
                        <li class="flex items-center">
                            <router-link to="/service/decor" exact class="transition-colors duration-300 hover:text-red-100 magic-hover magic-hover__square">Комплектация и декор</router-link>
                        </li>
                    </ul> 
                </nav>
            </div>
        </div>
    </div>
    <div class="block xl:hidden h-60 md:h-88 border-b border-black-10">
        <transition name="slide">
            <SideMenu :open="isOpen" @closeMenu="isClosed" v-if="isOpen" />
        </transition>
        <div class="container h-full flex justify-between items-center">
            <router-link to="/" exact>
                <img src="/img/logo.svg" class="w-70 md:w-110 xl:max-w-full" alt="Idea logo">
            </router-link>
            <div class="flex items-center justify-center border border-black-10 w-35 h-35 md:w-55 md:h-55 rounded-full" @click="isOpen = !isOpen">
                <img src="/img/button-burger.svg" class="w-20 md:w-30" alt="Idea logo">
            </div>
        </div>
    </div>
</div>
</template>
<script>
import SideMenu from '@/components/SideMenu'
import VkIcon from '@/components/VkIcon'
import InstagramIcon from '@/components/InstagramIcon'

export default {
    name: 'Header',
    components: {
        SideMenu,
        VkIcon,
        InstagramIcon,
    },
    data: () => ({
        isOpen: false
    }),
    methods: {
        isClosed: function (e) {
            this.isOpen = e
        }
    }
}
</script>
<style scoped>


.slide-enter-active,
.slide-leave-active{
    transition: all .8s ease-in-out;
}

.slide-enter,
.slide-leave-to {
    transform: translateX(100%);
}

.router-link-active{
    color: #EF2936;
}


 </style>