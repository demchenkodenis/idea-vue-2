<template>
    <div class="fixed w-full lg:w-3/4 h-full right-0 bg-white-100 z-50">
        <div class="h-60 md:h-88 border-b border-black-10">
            <div class="container h-full flex justify-between items-center">
                <router-link to="/" exact>
                    <img src="/img/logo.svg" class="w-70 md:w-110 xl:max-w-full" alt="Idea logo" @click="closeMenu">
                </router-link>
                <div class="flex items-center justify-center border border-black-10 w-35 h-35 md:w-55 md:h-55 rounded-full"
                    @click="closeMenu"
                >
                    <img src="/img/close-menu.svg" class="w-20 md:w-30" alt="Idea logo">
                </div>
            </div>
        </div>
        <div class="md:h-1/2 grid container grid-col-1 md:grid-cols-3 lg:grid-cols-2 auto-rows-max md:place-content-end">
            <ul class="md:col-span-2 lg:col-span-1  font-Raleway-Regular tracking-wide text-14 md:text-20">
                <li v-for="item in serviceList" :key="item.id" class="py-12 first:border-t border-b border-black-10" @click="closeMenu">
                    <router-link :to="`/service/${item.id}`" exact class="transition-colors duration-300 hover:text-red-100" @click="closeMenu">{{ item.title }}</router-link>
                </li>
            </ul>
            <div class="grid md:place-content-between mt-10 md:mt-0">
                <ul class="flex flex-col items-stretch h-full font-Raleway-Regular text-black-40  tracking-wide">
                    <li class="flex items-center transition-colors duration-300 hover:text-red-100" @click="closeMenu">
                        <router-link to="/about" exact>О компании</router-link>
                    </li>
                    <li class="flex items-center my-20 transition-colors duration-300 hover:text-red-100" @click="closeMenu">
                        <router-link to="/portfolio" exact>Портфолио</router-link>
                    </li>
                    <li class="flex items-center transition-colors duration-300 hover:text-red-100" @click="closeMenu">
                        <router-link to="/contact" exact>Контакты</router-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container grid md:h-2/5 grid-col-1 md:grid-cols-2 auto-rows-max md:place-content-end ">
            <div class="h-full my-10 md:mt-20">
                <a href="tel:89003703839" class="font-Raleway-Regular text-20 lining-nums text-black-100">+7 (910) 327-55-40</a>
            </div>
            <div class="flex flex-row md:mb-20 md:justify-end ">
                <ul class="flex ">
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
    </div>
</template>
<script>
import VkIcon from '@/components/VkIcon'
import InstagramIcon from '@/components/InstagramIcon'

export default {
    name: 'SideMenu',
    components: {
        VkIcon,
        InstagramIcon
    },
    props: ['open'],
    data: () => ({
        serviceList: [
            {
                id: 2,
                title: 'Дизай частного интерьера',
            },
            {
                id: 1,
                title: 'Дизай коммерческого интерьера',
            },
            {
                id: 5,
                title: 'Ремонт и отделка',
            },
            {
                id: 3,
                title: 'Архитектурное проектирование',
            },
            {
                id: 6,
                title: 'Строительство',
            },
            {   
                id: 4,
                title: 'Комплектация и декор',
            },
        ],
    }),
    methods: {
        closeMenu: function() {
            this.$emit('closeMenu', false)
        } 
    }
}
</script>
