<template>
	<div class="about mt-100 md:mt-150">
		<div class="container">
			<div class="grid grid-cols-4 xl:grid-cols-16 mb-70">
				<h1 v-if="about && about.title" class="
					font-Oswald
					text-26
					tracking-wide
					col-start-1
					col-end-5
					mb-30
					md:text-42
					xl:col-start-1 
					xl:col-end-8
					xl:text-50">{{ about.title }}</h1>
				<div v-if="about && about.subtitle" class="
					col-start-1
					col-end-5
					xl:col-start-10 
					xl:col-end-17">
					<p class="font-Raleway-Regular text-16 tracking-wide text-black-40 leading-200%">{{ about.subtitle }}</p>
				</div>
			</div>
		</div>
		<div v-if="about && about.image" class="mb-100 md:container md:mb-150">
			<img :src="`/img/about/${ about.image }`" alt="">
		</div>
		<div v-if="about && about.heading" class="container lg:grid lg:grid-cols-8 xl:grid-cols-16">
			<h2 class="text-20 font-Oswald tracking-wide text-black-100 md:text-36 xl:text-40 mb-30 lg:col-span-4 xl:col-start-1 xl:col-end-17 animated wow slideInUp">
				{{ about.heading }}
			</h2>
			<div v-if="about && about.subheading_1" class="mb-150 lg:col-span-6 xl:grid xl:grid-cols-16 xl:row-start-2 xl:col-start-1 xl:col-end-17">
				<p class="mb-10 md:mb-20 font-Raleway-Regular text-16 tracking-wide text-black-40 leading-200% xl:col-start-1 xl:col-end-8 animated wow slideInUp">
					{{ about.subheading_1 }}
				</p>
				<p v-if="about && about.subheading_2" class="font-Raleway-Regular text-16 tracking-wide text-black-40 leading-200% xl:col-start-9 xl:col-end-17 animated wow slideInUp">{{ about.subheading_2 }}</p>
			</div>
			<h2 v-if="about && about.our_team_text" class="col-start-1 md:col-end-5 lg:col-end-5 xl:col-end-8 mb-100 font-Oswald text-20 md:text-36 xl:text-40 tracking-wide uppercase animated wow slideInUp">
				{{ about.our_team_text }}
			</h2>
		</div>
		<div class="mb-150 md:mb-180 container grid grid-cols-4 auto-rows-auto md:grid-cols-8 xl:flex xl:flex-wrap xl:justify-between animated wow slideInUp">
			<div v-for="(item, i) in team" :class="`mb-50 md:mb-70 xl:w-260 2xl:w-346
				odd:col-start-1 
				odd:col-end-4 
				even:col-start-2 
				even:col-end-5 
				sm:odd:col-start-1
				sm:odd:col-end-3
				sm:even:col-start-3
				sm:even:col-end-5
				sm:row-start-${i + 1}
				sm:row-end-${i + 1}
				md:odd:col-start-1
				md:odd:col-end-4
				md:even:col-start-5
				md:even:col-end-8
				md:row-start-auto
				md:row-end-auto
				`" :key="i">
				
				<img :src="`/img/about/${ item.photo }`" alt="">
				<p class="mt-20 md:mt-30 mb-10 text-black-100 text-18 font-Raleway-Regular tracking-wide">{{ item.name }} {{ item.lastname }}</p>
				<p class="text-10 md:text-14 font-Raleway-Regular text-black-40 tracking-wide">{{ item.position }}</p>
				
			</div>
		</div>
		<div class="container">
			<h2 v-if="about && about.task_text" class="col-start-1 md:col-end-5 lg:col-end-5 xl:col-end-8 mb-100 font-Oswald text-20 md:text-36 xl:text-40 tracking-wide uppercase animated wow slideInUp">{{ about.task_text }}</h2>
			<ul class="mb-150 md:mb-250 xl:mb-250 lg:grid lg:grid-cols-8 lg:gap-x-80 animated wow slideInUp">
				<li 
					v-for="item in task"
					:key="item.id"
					class="lg:col-span-4"
				>	
					
					<p class="mb-30 text-black-100 text-18 md:text-20 tracking-wide border-b font-Raleway-Regular border-black-10">
						{{ item.title }}
						<span class="hidden text-black-20 md:inline-block float-right text-20 font-Raleway-Regular lining-nums tracking-wide">/ 0{{ item.id }}</span>
					</p>
					<p :class="item.class" class="mb-50 text-black-40 leading-200% text-12 md:text-14 font-Raleway-Regular tracking-wide">
						{{ item.text }}
					</p>
				</li>
			</ul>

			<div class="grid grid-cols-4 md:grid-cols-8 mb-150 xl:grid-cols-16">
				<div v-if="about && about.image_1" class="col-start-1 col-end-5 pr-20 md:pr-0 md:col-start-1 md:col-end-6 xl:col-start-1 xl:col-end-10">
					<img :src="`/img/about/${ about.image_1 }`" class="img-parallax-1">
				</div>
				<div v-if="about && about.image_2" class="col-start-2 col-end-5 -mt-30 md:col-start-5 md:col-end-9 md:row-start-2 md:-mt-150 xl:col-start-9 xl:col-end-17">
					<img :src="`/img/about/${ about.image_2 }`" class="img-parallax-2">
				</div>
				<div v-if="about && about.image_3" class="col-start-1 col-end-3 -mt-30 md:col-start-2 md:col-end-4 md:row-start-2 md:mt-50 xl:col-start-2 xl:col-end-7">
					<img :src="`/img/about/${ about.image_3 }`" class="img-parallax-3">
				</div>
				<div v-if="about && about.image_4" class="col-start-2 col-end-5 -mt-30 md:col-start-5 md:col-end-8 md:-mt-380 xl:col-start-8 xl:col-end-16">
					<img :src="`/img/about/${ about.image_4 }`" class="img-parallax-4">
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios'
import simpleParallax from 'simple-parallax-js';

export default {
	name: 'About',
	data: () => ({
		about: null,
		task: null,
		team: null
	}),
	methods: {
        getAbout: function() {
            let self = this
            axios.get('../api/getAbout.php')
                .then((res) => {
                    self.about = res.data.about
					self.task = res.data.task
					self.team = res.data.team
                })
				.then(() => {

					const img_1 = document.getElementsByClassName('img-parallax-1');
					new simpleParallax(img_1, {
						overflow: true,
						scale: 1.3,
						delay: 1.3,
						transition: 'cubic-bezier(0,0,0,1)'
					});

					const img_2 = document.getElementsByClassName('img-parallax-2');
					new simpleParallax(img_2, {
						overflow: true,
						scale: 2,
						delay: 1.3,
						transition: 'cubic-bezier(0,0,0,1)'
					});

					const img_3 = document.getElementsByClassName('img-parallax-3');
					new simpleParallax(img_3, {
						overflow: true,
						scale: 1.7,
						delay: 1.3,
						transition: 'cubic-bezier(0,0,0,1)'
					});

					const img_4 = document.getElementsByClassName('img-parallax-4');
					new simpleParallax(img_4, {
						overflow: true,
						scale: 2.1,
						delay: 1,
						transition: 'cubic-bezier(0,0,0,1)'
					});

				})
        },

    },
	computed: {
		isActiveParallax: function (){
            const width = window.innerWidth
            
            if(width >= 1200){
                return true
            }else{
				return false
			}
        }
	},
    mounted() {
        this.getAbout()		
    }

}
</script>