import { createRouter, createWebHistory } from 'vue-router'

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
    },
]

const router = createRouter(
    {
        history: createWebHistory(import.meta.env.BASE_URL),
        routes,
    }
)

export default router
