import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


import Register from './views/auth/RegistrationForm'
import Login from './views/auth/LoginForm'
import Homepage from './views/pages/Homepage'

export const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path:'/register',
            name: 'register',
            component:Register
        },
        {
            path:'/login',
            name: 'login',
            component:Login,

        },
        {
            path:'/',
            name: 'home',
            component:Homepage,

        },
    ],
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('access-token') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath }
            })
        }
    } else {
        next()
    }
})