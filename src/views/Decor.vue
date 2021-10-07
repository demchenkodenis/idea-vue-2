<template>
    <div>
        <div class="container">
            <h1 class="mt-100 md:mt-150 mb-30 text-26 font-Oswald tracking-wide uppercase md:text-center md:text-42">{{ pageData.title }}</h1>
            <p class="mb-20 text-14 font-Raleway-Regular tracking-wide leading-200% text-black-40 md:mx-auto md:text-center md:text-16 md:max-w-950">{{ pageData.description }}</p>
            <div class="w-full flex mb-50 md:mb-70 md:justify-center">
                <button class="text-14 font-Raleway-Regular text-black-100 tracking-wide py-15 px-20 border border-black-10 hover:border-black-100 magic-hover magic-hover__square" @click="scrollToFooter()">Давайте попробуем</button>
            </div>
        </div>
        <div class="md:container mb-150 md:mb-250">
            <img :src="pageData.image" class="2xl:h-700 object-cover" alt="">
        </div>
        <div class="container mb-100">
            <div class="xl:grid xl:grid-cols-2">
                <h2 class="mb-30 text-20 font-Oswald tracking-wide uppercase md:text-36 lg:max-w-480 xl:text-40">{{ pageData.heading }}</h2>
                <div class="mb-100 md:mb-150 text-14 font-Raleway-Regular tracking-wide leading-200% text-black-40 md:text-16 lg:max-w-720 xl:pl-95" v-html="pageData.subheading"></div>
            </div>
            

            <div class="grid md:grid-cols-2 md:gap-x-40 xl:grid-cols-16">
                <div
                    v-for="(item, i) in service.project" :key="i" 
                    class="
                        mb-50                    
                        last:mb-100
                        md:even:mt-70
                        md:odd:col-span-1
                        md:even:col-start-2
                        md:even:col-span-1
                        xl:odd:col-start-1 
                        xl:odd:col-end-8
                        xl:even:col-start-10
                        xl:even:col-end-17
                        animated wow slideInUp
                    "
                >
                    
                <router-link :to="`/project/${item.id}`">
                    <div class="inline-block overflow-hidden lg:mb-20 xl:mb-50">
                        <div v-if="serviceVideo(item.additional_src)">
                            <video loop="" muted="" autoplay="">
                                <source :src="`/img/portfolio/${item.id}/${item.additional_src}`" type="video/mp4">
                            </video>
                        </div>
                        <div v-else-if="serviceAdditionalImg(item.additional_src)" class="inline-block overflow-hidden">
                            <img :src="`/img/portfolio/${item.id}/${item.additional_src}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                        </div>
                        <div v-else class="inline-block overflow-hidden">
                            <img :src="`/img/portfolio/${item.id}/${item.preview_img}`" class="block transition-transform duration-1000 transform hover:scale-110" alt="">
                        </div>
                    </div>
                    <p class="lg:mb-10 text-18 font-Raleway-Regular tracking-wide">{{ item.title }}</p>
                    <p class="hidden font-Raleway-Regular lg:block text-14 text-black-40 tracking-wide leading-200% 2xl:max-w-570">{{ item.description.substring(0,110)+"..." }}</p>
                </router-link>
                </div>
            </div>
            <div class="flex justify-center mb-150 md:mb-250">
                <router-link to="/portfolio/" class="text-14 font-Raleway-Regular text-black-100 tracking-wide py-15 px-20 border border-black-10 hover:border-black-100 magic-hover magic-hover__square">Смотреть все проекты</router-link>
            </div>
            <div class="faq xl:flex">
                <div class="xl:w-1/2 xl:mr-70">
                    <h2 class="mb-30 text-20 font-Oswald tracking-wide uppercase md:text-36 lg:max-w-480 xl:text-40  magic-hover magic-hover__square">{{ pageData.heading_faq }}</h2>
                </div>
                <div class="xl:w-1/2">
                    <div v-for="(item, i) in service.faq" :key="i" class="border-t border-black-10 last:border-b py-20 xl:col-start-2 xl:col-grid-3">
                        <div v-html="item.question" @click="openFAQ(i)" class="text-20 tracking-wide font-Raleway-Regular magic-hover magic-hover__square hover:text-red-100"
                        :class="activeFAQ(i)"></div>
                        <div v-html="item.answer" v-show="i == idFaq" class="mt-10 text-14 tracking-wide text-black-40 leading-200% font-Raleway-Regular"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    name: 'Decor',
    data: () => ({
        service: {},
        idFaq: '-1',
        pageData: ''
    }),
    methods: {
        scrollToFooter: function () {
			const el = this.$parent.$refs.footer.$el
			if(el){
				console.log(el)
				el.scrollIntoView({ behavior: 'smooth' })
			}
		},
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
        openFAQ: function (i) {
            if(this.idFaq == i){
                this.idFaq = '-1'
            }else{
                this.idFaq = i
            }
        },
        activeFAQ: function (i) {
            if(i == this.idFaq){
                return 'text-red-100'
            }
        },
        getService: function () {
            let self = this

            axios.get('../api/getService.php?id=4')
            .then((res) => {
                self.service = res.data
                self.pageData = res.data.data[0]
            })
        },
    },
    mounted(){
        this.getService()
    }
}
</script>