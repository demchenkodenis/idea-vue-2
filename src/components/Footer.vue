<template>
    <footer class="h-222 md:h-100 bg-black-100">
        <div class="container
                    flex
                    flex-col
                    py-50 
                    md:py-0 
                    md:grid 
                    md:grid-cols-2
                    lg:grid-cols-3 
                    h-full 
                    items-center
        ">
            <div class="col-start-1 
                        md:h-full 
                        flex 
                        order-2
                        md:items-start
                        mb-30
                        md:mb-0
                        lg:justify-start
                        lg:col-start-1
                        lg:items-end 
            ">
                <a href="/docs/conf.pdf" target="_blank" class="text-white-50 magic-hover magic-hover__square">Политика конфиденциальности</a>
            </div>
            <div class="md:col-start-1 
                        md:h-full 
                        md:row-start-1 
                        flex 
                        order-1 
                        md:items-end 
                        text-white-50
                        lg:col-start-2
                        lg:justify-center 
            ">
                &copy; {{(new Date()).getFullYear()}} idea
            </div>
            <div class="flex 
                        order-3
                        md:row-start-1 
                        md:row-end-3
                        md:justify-end
                        lg:col-start-3
            ">
                <span class="text-white-10 magic-hover magic-hover__square">разработка студии</span>&nbsp;<a href="https://webmedia31.ru/" target="_blank" class="text-white-50 magic-hover magic-hover__square">«webmedia»</a>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
    name: 'Footer'
}
</script>