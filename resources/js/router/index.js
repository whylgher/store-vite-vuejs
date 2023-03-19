import { createRouter, createWebHistory } from 'vue-router'

import login from '../components/auth/login.vue'
import products from '../components/home.vue'
import index from '../components/products/index.vue'

const routes = [
    {
        path: '/',
        name: 'Products',
        component: products,
    },
    {
        path: '/product/:id',
        name: 'Product',
        component: index,
        props: true
    }, {
        path: '/login',
        name: 'Login',
        component: login,
    },
    // {
    //     path: '/:pahtMatch(.*)*',
    //     name: 'Not Found',
    //     component: notFound,
    // }
]

const router = createRouter(
    {
        history: createWebHistory(import.meta.env.BASE_URL),
        routes,
    }
)

export default router
