<template>
    <div class="container">
        <div class="md:mb-100">
            <div v-for="(item, key) in projectFilter" :key="key" class="inline-block py-5 font-Raleway-Regular tracking-wide px-15 md:px-20 bg-black-5 text-black-100 text-14 leading-200% mb-15 mr-15 hover:bg-black-100 hover:text-white-100 transition duration-300 ease-in-out"
            :class="{ 'bg-black-100': item.selected, 'text-white-100': item.selected, 'hidden': !isFilterOpen && mobile }">
                <label class="magic-hover magic-hover__square">
                    {{ item.title }}
                    <input 
                        type="radio"         
                        name="project"
                        :value="key"
                        :checked="item.selected"
                        @change="onChange"
                    />
                </label>
            </div>
        </div>

        <button class="md:hidden mb-100 text-14 font-Raleway-Regular text-black-100 tracking-wide w-full py-10 border border-black-10" @click="isFilterOpen = !isFilterOpen">{{ isFilterOpen ? 'Скрыть фильтр' : 'Показать фильтр' }}</button>

        <div class="grid md:grid-cols-2 md:gap-x-40 xl:grid-cols-16">
            <div
                v-for="(item, i) in projects" :key="i" 
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
                    animated
                    wow 
                    slideInUp
                "
            >
                <router-link :to="`/project/${item.id}`" class="magic-hover magic-hover__square">
                    <div class="inline-block overflow-hidden">
                        <div v-if="serviceVideo(item.preview_img)">
                            <video loop="" muted="" autoplay="">
                                <source :src="`/img/portfolio/${item.id}/${item.preview_img}`" type="video/mp4">
                            </video>
                        </div>
                        <div v-else class="inline-block overflow-hidden">
                            <img :src="`/img/portfolio/${item.id}/${item.preview_img}`" class="block transition-transform duration-1000 transform hover:scale-110 2xl:w-665 2xl:h-390 xl:w-500 xl:h-290 lg:w-440 lg:h-250 md:w-320 md:h-190 sm:h-290 xs:h-270 object-cover" :alt="item.title">
                        </div>
                    </div>
                    <p class="lg:mt-20 xl:mt-50 lg:mb-10 text-18 font-Raleway-Regular tracking-wide">{{ item.title }}</p>
                    <p class="hidden font-Raleway-Regular lg:block text-14 text-black-40 tracking-wide leading-200% 2xl:max-w-570">{{ item.description.substring(0,120)+"..." }}</p>
                </router-link>

            </div>
        </div>

        <div class="w-full flex justify-center">
            <button class="mb-100 text-14 font-Raleway-Regular text-black-100 tracking-wide py-15 px-20 border border-black-10 hover:border-black-100  magic-hover magic-hover__square" @click="getMoreProject(filterActive)">Загрузить еще</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import { isMobile } from 'mobile-device-detect'

export default {
    name: "ProjectFilter",
    data: () => ({
        mobile: isMobile ? true : false,
        isFilterOpen: false,
        projectFilter: [
            {
                "id": "0",
                "title": "Все",
                "selected": true
            },    
        ],
        projects: null,
        filterActive: 0
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
        onChange($event) {  
            for (const key in this.projectFilter) {
                this.projectFilter[key].selected = key === $event.target.value;
            }

            this.filterActive = $event.target.value
            this.getProjects($event.target.value)
            this.isFilterOpen = false
        },
        getProjects: function (id) {
            let self = this
            let url = ''

            if(id == 0 || id === undefined){
                url = ''
            }else{
                url = '?id=' + id
            }
            
            axios.get('../api/getProjects.php' + url)
                .then((res) => {
                    self.projects = res.data     
                })
        },
        getMoreProject: function (id) {
            let self = this
            let url = ''
            let offset = this.projects.length
            self.loader = true

            if(id == 0 || id === undefined){
                url = ''
            }else{
                url = '&id=' + id
            }
            
            axios.get(`../api/getMoreProjects.php?offset=${offset}${url}`)
                .then((res) => {
                    res.data.forEach(element => {
                        self.projects.push(element)
                    })
                })
            
        },
        getCategoryProject: function () {
            this.loader = true
            let self = this
            axios.get('../api/getCategoryProject.php')
                .then((res) => {
                    res.data.forEach(element => {
                        self.projectFilter.push(element)
                    })
                })
        },
        filterButton(){
            const width = window.innerWidth
            
            if(width >= 768){
                this.isFilterOpen = true
            }

        }
    },
    mounted() {
        this.getCategoryProject(),
        this.filterButton(),
        this.getProjects()
    }
}
</script>
<style scoped>
    input[type=radio]{
        display: none;
    }
</style>