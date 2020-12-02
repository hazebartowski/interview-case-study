import Register from './views/auth/RegistrationForm'
import Login from './views/auth/LoginForm'
import Homepage from './views/pages/Homepage'


export const routes = [
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

];