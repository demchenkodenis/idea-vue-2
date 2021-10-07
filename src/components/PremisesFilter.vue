<template>
    <div class="container">
        <div class="md:mb-100">
            <div v-for="(item, key) in projectFilter" :key="key" class="inline-block py-5 font-Raleway-Regular tracking-wide px-15 md:px-20 bg-black-5 text-black-100 text-14 leading-200% mb-15 mr-15 hover:bg-black-100 hover:text-white-100 transition duration-300 ease-in-out  magic-hover magic-hover__square"
            :class="{ 'bg-black-100': item.selected, 'text-white-100': item.selected, 'hidden': !isFilterOpen  && mobile }">
                <label>
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

                <div class="inline-block overflow-hidden relative magic-hover magic-hover__square"  @click="openBox(`/img/portfolio/${item.id}/${item.preview_img}`)">
                    <img :src="`/img/portfolio/${item.id}/${item.preview_img}`" class="block transition-transform duration-1000 transform hover:scale-110 2xl:w-665 2xl:h-390 xl:w-500 xl:h-290 lg:w-440 lg:h-250 md:w-320 md:h-190 sm:h-290 xs:h-200 object-cover">
                    <span class="absolute bottom-15 left-15 md:left-20 md:bottom-40 bg-black-100 text-white-100 leading-200% tracking-wide text-14 font-Raleway-Regular px-20 py-5 magic-hover magic-hover__square">{{ item.title }}</span>
                </div>
            </div>
        </div>

        <transition name="fade">
            <app-lightbox :close="closeBox" :imgsource="currentPic" v-if="lightBoxToggle"></app-lightbox>
        </transition>
        <div class="w-full flex justify-center">
            <button class="mb-100 text-14 font-Raleway-Regular text-black-100 tracking-wide py-15 px-20 border border-black-10 hover:border-black-100" @click="getMoreProject(filterActive)">Загрузить еще</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import { isMobile } from 'mobile-device-detect'
import appLightbox from '@/components/Lightbox'

export default {
    name: "PremisesFilter",
    components: {
        appLightbox
    },
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
        filterActive: 0,
        currentPic: '',
        lightBoxToggle: false
    }),
    methods: {
        openBox: function(d) {
            this.currentPic = d;
            this.lightBoxToggle = !this.lightBoxToggle;
        },
        closeBox: function() {
            this.lightBoxToggle = false;
        },
        onChange: function($event) {
            
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
            self.loader = true

            if(id == 0 || id === undefined){
                url = ''
            }else{
                url = '?id=' + id
            }
            
            axios.get('../api/getPremises.php' + url)
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
            
            axios.get(`../api/getMorePremises.php?offset=${offset}${url}`)
                .then((res) => {
                    res.data.forEach(element => {
                        self.projects.push(element)
                    })
                })
            
        },
        getCategoryProject: function () {
            let self = this
            axios.get('../api/getCategoryPremises.php')
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
        this.getProjects(),
        this.filterButton()
    }
}
</script>
<style scoped>
input[type=radio]{
    display: none;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}

</style>