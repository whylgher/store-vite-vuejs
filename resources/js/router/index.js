import { createRouter, createWebHistory } from 'vue-router'

import login from '../components/auth/login.vue'
import cart from '../components/cart/cart.vue'
import products from '../components/home.vue'
import index from '../components/products/index.vue'

const routes = [
    {
        path: '/',
        name: 'Products',
        component: products,
        meta: {
            requireAuth: false,
        },
    },
    {
        path: '/cart',
        name: 'Cart',
        component: cart,
        meta: {
            requireAuth: true,
        },
    },
    {
        path: '/product/:id',
        name: 'Product',
        component: index,
        props: true,
        meta: {
            requireAuth: false,
        },
    }, {
        path: '/login',
        name: 'Login',
        component: login,
        meta: {
            requireAuth: false,
        },
    },
    // {
    //     path: '/:pahtMatch(.*)*',
    //     name: 'Not Found',
    //     component: notFound,
    // }
];

const router = createRouter(
    {
        history: createWebHistory(import.meta.env.BASE_URL),
        routes,
    }
);

router.beforeEach((to, from) => {
    if (to.meta.requireAuth && !localStorage.getItem('token')) {
        return { name: 'Login' };
    }
    // if (to.meta.requireAuth == false && localStorage.getItem('token')) {
    //     return { name: 'Cart' };
    // }
});

export default router;
