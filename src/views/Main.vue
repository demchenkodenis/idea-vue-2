<template>
	<div class="mt-100 md:mt-150 overflow-hidden">
		<div class="container">
			<div class="grid grid-cols-4 xl:grid-cols-16 mb-70">
				<h1 v-if="pageData && pageData.title"
					class="
					font-Oswald
					text-26
					tracking-wide
					uppercase
					col-start-1
					col-end-5
					mb-30
					md:text-42
					xl:mb-0
					xl:col-start-1 
					xl:col-end-6
					xl:text-50">{{ pageData.title }}</h1>
				<div class="
					col-start-1
					col-end-5
					xl:col-start-10 
					xl:col-end-17 
					xl:flex 
					xl:items-end">
					<p v-if="pageData && pageData.subtitle" class="font-Raleway-Regular text-16 tracking-wide text-black-40 leading-200%">
						{{ pageData.subtitle }}
					</p>
				</div>
			</div>
		</div>
		<div class="md:container">
			<div class="mb-110 xl:mb-150 bg-black-40 w-screen">
				<video muted loop autoplay>
					<source src="img/slides/video10.mp4" type="video/mp4">
				</video>
			</div>
		</div>
			<div class="container">			
				<ul class="mb-150 xl:mb-250 animated wow slideInUp">
					<li 
						v-for="(item, idx) in serviceList"
						:key="item.id"
						class="relative group grid grid-cols-4 md:grid-cols-8 xl:grid-cols-16 py-10 md:py-20 xl:py-30 text-black-10 transition duration-500 hover:text-black-100 red-cursor first:border-t border-b border-black-10"
					>	
						
							<span class="hidden lg:flex items-center text-20 font-Raleway-Bold lining-nums tracking-wide">/ 0{{ idx + 1  }}</span>
							<router-link :to="`/service/${item.id}`" :class="item.class" class="text-20 md:text-36 xl:text-40 font-Oswald tracking-wide red-cursor magic-hover magic-hover__square" exact>
								{{ item.title }}
							</router-link>
						<img :src="`img/service/${item.id}/${item.image}`" :alt="item.title"
							class="absolute hidden lg:group-hover:block transition duration-1000 z-10 w-280 h-180"
							:class="item.imgPosition"
						>
					</li>
				</ul>
				<div class="mb-50 md:mb-70 md:grid md:grid-cols-8 animated wow slideInUp">
					<h2 v-if="pageData && pageData.heading" class="mb-30 font-Oswald text-20 tracking-wide md:col-start-3 md:col-span-6 md:text-36 lg:col-start-5">{{ pageData.heading }}</h2>
					<p v-if="pageData && pageData.subheading" class="text-14 font-Raleway-Regular text-black-40 tracking-wide leading-200% md:col-start-3 md:col-span-6 lg:col-start-5">{{ pageData.subheading }}</p>
				</div>
			</div>
		<main-portfolio />
	</div>
</template>
<script>
import MainPortfolio from '@/components/MainPortfolio'
import axios from 'axios'

export default {
	name: 'Main',
	components: {
		MainPortfolio
	},
	data: () => ({
		pageData: null,
		serviceList: [
			{
				id: 2,
				title: 'ДИЗАЙН ЧАСТНОГО ИНТЕРЬЕРА',
				image: 'image_menu.jpg',
				imgPosition: 'top-190 right-150',
				class: 'col-start-1 col-end-5 md:col-start-1 md:col-end-9 lg:col-start-2 lg:col-end-9 xl:col-start-4 xl:col-end-17'
			},
			{
				id: 1,
				title: 'ДИЗАЙН КОММЕРЧЕСКОГО ИНТЕРЬЕРА',
				image: 'image_menu.jpg',
				imgPosition: 'top-160 right-176',
				class: 'col-start-1 col-end-5 md:col-start-1 md:col-end-9 md:justify-self-end lg:col-start-3 lg:col-end-9 lg:justify-self-start xl:col-start-6 xl:col-end-17'
			},
			{
				id: 5,
				title: 'РЕМОНТ И ОТДЕЛКА',
				image: 'image_menu.jpg',
				imgPosition: '-top-190 left-300',
				class: 'col-start-1 col-end-5 md:col-start-2 md:col-end-9 lg:col-start-3 lg:col-end-9 xl:col-start-9 xl:col-end-17'
				
			},
			{
				id: 3,
				title: 'АРХИТЕКТУРНОЕ ПРОЕКТИРОВАНИЕ',
				image: 'image_menu.jpg',
				imgPosition: 'top-190 left-380',
				class: 'col-start-1 col-end-5 md:col-start-2 md:col-end-9 lg:col-start-3 lg:col-end-9 xl:col-start-7 xl:col-end-17'
			},
			{
				id: 6,
				title: 'СТРОИТЕЛЬСТВО',
				image: 'image_menu.jpg',
				imgPosition: '-top-190 right-230',
				class: 'col-start-1 col-end-5 md:col-start-3 md:col-end-9 lg:col-start-5 lg:col-end-9 xl:col-start-8 xl:col-end-17'
			},
			{
				id: 4,
				title: 'КОМПЛЕКТАЦИЯ И ДЕКОР',
				image: 'image_menu.jpg',
				imgPosition: '-top-190 right-280',
				class: 'col-start-1 col-end-5 md:col-start-3 md:col-end-9 lg:col-start-4 lg:col-end-9 xl:col-start-5 xl:col-end-17'
				
			},
		],
	}),
	methods: {
		getInfoPage: function () {
			let self = this

			axios.get('../api/getMainPage.php')
				.then((res) => {
					self.pageData = res.data
				})
		}
	},
	mounted () {
		this.getInfoPage()
	}
}
</script>
