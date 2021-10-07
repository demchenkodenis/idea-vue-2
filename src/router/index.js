import Vue from 'vue'
import VueRouter from 'vue-router'

import Main from '../views/Main'
import Services from '../views/Services'
import Decor from '../views/Decor'
import Contact from '../views/Contact'
import Portfolio from '../views/Portfolio'
import About from '../views/About'
import Project from '../views/Project'

Vue.use(VueRouter)

const routes = [{
        path: '/',
        name: 'Main',
        component: Main
    },
    {
        path: '/service/decor',
        name: 'Decor',
        component: Decor,
    },
    {
        path: '/service/:id',
        name: 'Service',
        component: Services,
        props: true,
    },
    {
        path: '/portfolio',
        name: 'Portfolio',
        component: Portfolio
    },
    {
        path: '/contact',
        name: 'Contact',
        component: Contact
    },
    {
        path: '/about',
        name: 'About',
        component: About
    },
    {
        path: '/project/:id',
        name: 'Project',
        component: Project,
        props: true
    }
]

const router = new VueRouter({
    // mode: 'history',
    // base: process.env.BASE_URL,
    routes,
    scrollBehavior() {
        return { x: 0, y: 0 }
    }
})

// router.beforeEach((to, from, next) => {
//     console.log(to, from, next)
//     next();
//     this.$router.push(to.path)
// });

export default router