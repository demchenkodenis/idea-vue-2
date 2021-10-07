<template>
    <div>
        <div v-if="isDesktop">
            <div v-html="html"></div>
        </div>
        <div v-else class="mt-50 mb-100">
            <div class="container">
                <h1 class="
                    font-Oswald
					text-26
					tracking-wide
					uppercase
                    mb-30
                ">
                    {{ title }}
                </h1>
            </div>
            <div v-if="slides">
                <agile :dots="false" :autoplay="false" :navButtons="false" :speed="1200">
                    <div v-for="slide in slides" :key="slide" class="slide">
                        <img :src="`img/mobile-slider/${slide.id_portfolio}/${slide.src}`">
                    </div>
                </agile>
            </div>
            <div class="container">
                <p class="mt-30 font-Raleway-Regular text-16 tracking-wide text-black-40 leading-200%">{{ description }}</p>
            </div>
        </div>
    </div>
</template>
<script>
import { isMobile } from 'mobile-device-detect'
import { VueAgile } from 'vue-agile'
import axios from 'axios'

export default {
    name: 'Project',
    props: ['id'],
    components: {
        agile: VueAgile 
    },
    data: () => ({
        isDesktop: isMobile ? false : true,
        project: null,
        slides: null,
        title: null,
        description: null,
        html: null
    }),
    methods: {
        getProject: function (){
            let self = this
            if(this.isDesktop){
                axios.get('/api/getProject.php', {
                    params: { 
                        id: self.id
                    }
                })
                .then((res) => {
                    self.project = res.data
                    self.html = res.data.html_code
                })
            }else{
                axios.get('/api/getMobileProject.php', {
                    params: { 
                        id: self.id
                    }
                })
                .then((res) => {
                    self.title = res.data.title
                    self.description = res.data.description
                    self.slides = res.data.slides
                })
            }
        },
    },
    mounted () {
        this.getProject()
    }
}
</script>