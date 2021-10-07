<template>
    <div class="container">
        
        
        <div v-if="portfolio.length > 0">
            <div class="mb-70 sm:mb-50 md:mb-150
                sm:grid
                sm:grid-cols-4
                md:grid-cols-8
                md:items-center
            ">
                <div class="mb-70 sm:mb-50 sm:col-span-3 md:col-start-1 md:col-span-4  md:mr-40 lg:mr-50 xl:mr-70 2xl:mr-95 md:mb-0 animated wow slideInUp">
                    <router-link :to="`/project/${portfolio[0].id}`" class="magic-hover magic-hover__square">
                        <div class="inline-block overflow-hidden lg:mb-20 xl:mb-50">
                            <div v-if="serviceVideo(portfolio[0].additional_src)">
                                <video loop="" muted="" autoplay="">
                                    <source :src="`/img/portfolio/${portfolio[0].id}/${portfolio[0].additional_src}`" type="video/mp4">
                                </video>
                            </div>
                            <div v-else-if="serviceAdditionalImg(portfolio[0].additional_src)" class="inline-block overflow-hidden">
                                <img :src="`/img/portfolio/${portfolio[0].id}/${portfolio[0].additional_src}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                            </div>
                            <div v-else class="inline-block overflow-hidden">
                                <img :src="`/img/portfolio/${portfolio[0].id}/${portfolio[0].preview_img}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                            </div>
                        </div>
                        <p class="lg:mb-10 text-18 font-Raleway-Regular tracking-wide">{{ portfolio[0].title }}</p>
                        <p class="hidden font-Raleway-Regular lg:block text-14 text-black-40 tracking-wide leading-200% 2xl:max-w-570">{{ portfolio[0].description.substring(0,139)+"..." }}</p>
                    </router-link>
                </div>
                <div class="sm:col-start-2 sm:col-span-3 md:col-start-5 md:col-span-4 animated wow slideInUp">
                    <router-link :to="`/project/${portfolio[1].id}`" class="magic-hover magic-hover__square">
                        <div class="inline-block overflow-hidden lg:mb-20 xl:mb-50">
                            <div v-if="serviceVideo(portfolio[1].additional_src)">
                                <video loop="" muted="" autoplay="">
                                    <source :src="`/img/portfolio/${portfolio[1].id}/${portfolio[1].additional_src}`" type="video/mp4">
                                </video>
                            </div>
                            <div v-else-if="serviceAdditionalImg(portfolio[1].additional_src)" class="inline-block overflow-hidden">
                                <img :src="`/img/portfolio/${portfolio[1].id}/${portfolio[1].additional_src}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                            </div>
                            <div v-else class="inline-block overflow-hidden">
                                <img :src="`/img/portfolio/${portfolio[1].id}/${portfolio[1].preview_img}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                            </div>
                        </div>
                        <p class="lg:mb-10 text-18 font-Raleway-Regular tracking-wide">{{ portfolio[1].title }}</p>
                        <p class="hidden font-Raleway-Regular lg:block text-14 text-black-40 tracking-wide leading-200% 2xl:max-w-570">{{ portfolio[1].description.substring(0,139)+"..." }}</p>
                    </router-link>
                </div>
            </div>
            <div class="mb-100 sm:mb-50 md:mb-150 md:grid md:grid-cols-8 xl:grid-cols-16 animated wow slideInUp">
                <router-link :to="`/project/${portfolio[2].id}`" class="md:col-start-2 md:col-span-7 xl:col-start-3 xl:col-span-11 magic-hover magic-hover__square">
                    <div class="inline-block overflow-hidden lg:mb-20 xl:mb-50">
                        <div v-if="serviceVideo(portfolio[2].additional_src)">
                            <video loop="" muted="" autoplay="">
                                <source :src="`/img/portfolio/${portfolio[2].id}/${portfolio[2].additional_src}`" type="video/mp4">
                            </video>
                        </div>
                        <div v-else-if="serviceAdditionalImg(portfolio[2].additional_src)" class="inline-block overflow-hidden">
                            <img :src="`/img/portfolio/${portfolio[2].id}/${portfolio[2].additional_src}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                        </div>
                        <div v-else class="inline-block overflow-hidden">
                            <img :src="`/img/portfolio/${portfolio[2].id}/${portfolio[2].preview_img}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                        </div>
                    </div>
                    <p class="lg:mb-10 text-18 font-Raleway-Regular tracking-wide">{{ portfolio[2].title }}</p>
                    <p class="hidden font-Raleway-Regular lg:block text-14 text-black-40 tracking-wide leading-200% 2xl:max-w-570">{{ portfolio[2].description.substring(0,139)+"..." }}</p>
                </router-link>
            </div>
            <div class="mb-100 sm:mb-50 sm:grid sm:grid-cols-4 md:grid-cols-8 md:items-center md:mb-150 animated wow slideInUp">
                <div class="mb-70 sm:mb-50 sm:col-span-3 md:col-start-1 md:col-span-4 md:mb-0">
                    <router-link :to="`/project/${portfolio[3].id}`" class="magic-hover magic-hover__square">
                        <div class="inline-block overflow-hidden lg:mb-20 xl:mb-50">
                            <div v-if="serviceVideo(portfolio[3].additional_src)">
                                <video loop="" muted="" autoplay="">
                                    <source :src="`/img/portfolio/${portfolio[3].id}/${portfolio[3].additional_src}`" type="video/mp4">
                                </video>
                            </div>
                            <div v-else-if="serviceAdditionalImg(portfolio[3].additional_src)" class="inline-block overflow-hidden">
                                <img :src="`/img/portfolio/${portfolio[3].id}/${portfolio[3].additional_src}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                            </div>
                            <div v-else class="inline-block overflow-hidden">
                                <img :src="`/img/portfolio/${portfolio[3].id}/${portfolio[3].preview_img}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                            </div>
                        </div>
                        <p class="lg:mb-10 text-18 font-Raleway-Regular tracking-wide">{{ portfolio[3].title }}</p>
                        <p class="hidden font-Raleway-Regular lg:block text-14 text-black-40 tracking-wide leading-200% 2xl:max-w-570">{{ portfolio[3].description.substring(0,139)+"..." }}</p>
                    </router-link>
                </div>
                <div class="sm:col-start-2 sm:col-span-3 md:col-start-5 md:col-span-4 md:ml-40 lg:ml-50 xl:ml-70 2xl:ml-95  animated wow slideInUp">
                    <router-link :to="`/project/${portfolio[4].id}`" class="magic-hover magic-hover__square">
                        <div class="inline-block overflow-hidden lg:mb-20 xl:mb-50">
                            <div v-if="serviceVideo(portfolio[4].additional_src)">
                                <video loop="" muted="" autoplay="">
                                    <source :src="`/img/portfolio/${portfolio[4].id}/${portfolio[4].additional_src}`" type="video/mp4">
                                </video>
                            </div>
                            <div v-else-if="serviceAdditionalImg(portfolio[4].additional_src)" class="inline-block overflow-hidden">
                                <img :src="`/img/portfolio/${portfolio[4].id}/${portfolio[4].additional_src}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                            </div>
                            <div v-else class="inline-block overflow-hidden">
                                <img :src="`/img/portfolio/${portfolio[4].id}/${portfolio[4].preview_img}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                            </div>
                        </div>
                        <p class="lg:mb-10 text-18 font-Raleway-Regular tracking-wide">{{ portfolio[4].title }}</p>
                        <p class="hidden font-Raleway-Regular lg:block text-14 text-black-40 tracking-wide leading-200% 2xl:max-w-570">{{ portfolio[4].description.substring(0,139)+"..." }}</p>
                    </router-link>
                </div>
            </div>
        </div>
        <div class="flex justify-center mb-150 md:mb-250 animated wow slideInUp">
            <router-link to="/portfolio/" class="text-14 font-Raleway-Regular text-black-100 tracking-wide py-15 px-20 border border-black-10 magic-hover magic-hover__square">Смотреть все проекты</router-link>
        </div>
	</div>
</template>
<script>
import axios from 'axios'

export default {
    name: 'Main-portfolio',
    data: () => ({
        portfolio: [],
    }),
    methods: {
		serviceVideo: function (additional_src) {
            if(additional_src){
                const extension = additional_src.split('.')
                if(extension[1] == 'mp4'){
                    return true
                }
            }else{
                return false
            }
        },
        serviceAdditionalImg: function (additional) {
            if(additional){
                return true
            }
        },
        getMainPortfolio: function () {
            let self = this

            axios.get('../api/getMainPortfolio.php')
                .then((res) => self.portfolio = res.data)
        }
	},
    mounted () {
        this.getMainPortfolio()
    }
}
</script>