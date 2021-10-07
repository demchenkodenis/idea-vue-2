<template>
    <div>
        <div class="mt-100 md:mt-150 mb-30 md:mb-50 container">
            <div class="flex justify-between flex-col lg:flex-row pb-10 border-b border-black-10">
                <h1 class="text-26 md:text-42 xl:text-50 text-black-100 font-Oswald uppercase mb-20">Портфолио</h1>
                <div>
                    <button class="py-15 px-20 md:py-20 md:px-30 border mr-10  text-14 font-Raleway-Regular tracking-wide text-black-100 md:text-16 mb-10 md:mb-0 border-black-10 magic-hover magic-hover__square" :class="{ 'border-black-100 ': isProject }"
                    @click="projectActive">По проектам</button>
                    <button class="py-15 px-20 md:py-20 md:px-30 border text-14 font-Raleway-Regular tracking-wide text-black-100 md:text-16 border-black-10 magic-hover magic-hover__square"
                    :class="{ 'border-black-100 ': !isProject }" @click="premisesActive">По помещениям</button>
                </div>
            </div>
        </div>

        <div>
            <project-filter v-if="isProject" />
            <premises-filter v-if="isPremises" />
        </div>
        
    </div>
</template>
<script>
import ProjectFilter from '@/components/ProjectFilter'
import PremisesFilter from '@/components/PremisesFilter'

export default {
    name: 'Portfolio',
    components: {
        ProjectFilter,
        PremisesFilter
    },
    data: () => ({
        isProject: true,
        isPremises: false
    }),
    methods: {
        projectActive: function () {
            this.isProject = true
            this.isPremises = false
        },
        premisesActive: function () {
            this.isProject = false
            this.isPremises = true
        }
    }
}
</script>
