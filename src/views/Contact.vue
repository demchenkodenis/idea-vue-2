<template>
    <div>
        <div class="mt-100 md:mt-150 container">
            <h1 class="mb-70 text-26 md:text-42 xl:text-50 text-black-100 font-Oswald uppercase">Контакты</h1>
            <div class="md:grid md:grid-cols-2 xl:grid-cols-4">
                <div v-for="item in contacts" :key="item.post" class="mb-50 last:mb-100 md:mr-88 lg:mr-120 xl:mr-70 xl:last:mr-0 2xl:mr-95 2xl:last:mr-95">
                    <p class="mb-20 pb-3 text-14 text-black-40 font-Raleway-Regular border-b border-black-10 tracking-wide lining-nums xl:text-16">/ {{item.post}}:</p>
                    <p class="mb-10 text-18 xl:text-20 font-Raleway-Regular text-black-100 tracking-wide lining-nums">{{ item.phone }}</p>
                    <p class="text-18 xl:text-20 font-Raleway-Regular text-black-100 tracking-wide lining-nums">{{ item.email }}</p>
                </div>
            </div>
        </div>
        <div class="md:container relative h-520 2xl:h-700 mb-100 xl:mb-150">
            <div class="bg-white-100 
                        absolute
                        p-20
                        md:p-30
                        xl:p-50
                        w-280
                        md:w-620
                        lg:h-210 
                        lg:w-440 
                        xl:h-250 
                        xl:w-520 
                        2xl:h-210 
                        2xl:w-665
                        bottom-20 
                        left-20 
                        md:left-70 
                        md:bottom-30 
                        lg:bottom-30 
                        lg:left-80 
                        xl:left-100 
                        xl:bottom-50 
                        z-10">
                <p class="text-14 text-black-100 font-Raleway-Regular border-b border-black-10 tracking-wide lining-nums xl:text-16 mb-20">г. Белгород, ул.Губкина 51, оф.6</p>
                <p class="font-Raleway-Regular text-black-100 tracking-wide lining-nums">Режим работы: с понедельника по пятницу с 9:00 до 18:00 <br><span class="text-12 text-black-40 tracking-wide font-Raleway-Regular lining-nums">(по предварительной договоренности работаем в выходные дни)</span></p>
            </div>
            <yandex-map :coords="coords" zoom="16" :controls="controls">
                <ymap-marker
                    marker-id="1" 
                    :coords="coords"
                    :icon="markerIcon"
                />
            </yandex-map>
        </div>
        </div>
</template>
<script>
import { yandexMap, ymapMarker } from 'vue-yandex-maps'
import axios from 'axios'
export default {
    name: 'Contact',
    components: { yandexMap, ymapMarker },
    data: () => ({
        contacts: [],
        //Настройки яндекс карты
        settings: {
            apiKey: 'f62390e2-6389-4479-a02e-a0af57ab4168',
            lang: 'ru_RU',
            coordorder: 'latlong',
            version: '2.1',
            zoom: 1
        },
        controls: ['fullscreenControl', 'zoomControl'],
        coords: [50.572388, 36.552126],
        markerIcon: {
            layout: 'default#imageWithContent',
            //imageHref: 'https://image.flaticon.com/icons/png/512/33/33447.png',
            imageSize: [40, 37],
            imageOffset: [0, 0],
            //content: '123 v12',
            contentOffset: [0, 15],
            contentLayout: '<div style="background: red; width: 50px; color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        }
    }),
    methods: {
        getContacts: function() {
            let self = this
            axios.get('../api/getContact.php')
                .then((res) => {
                    self.contacts = res.data
                })
        }
    },
    mounted() {
        this.getContacts()
    }
}
</script>
<style scoped>
.ymap-container {
    height: 100%;
}
</style>