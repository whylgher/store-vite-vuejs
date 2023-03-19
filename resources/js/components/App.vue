<template>
    <toolbar>
        <div>
            <router-link to="/login"> Login </router-link>
        </div>
        <div>
            <button @click="logout"> Log out </button>
        </div>
    </toolbar>
    <router-view />
</template>

<script>
import { useRouter } from 'vue-router';

export default {
    data() {
        return {
            router: useRouter(),
        }
    },
    methods: {
        logout() {
            localStorage.removeItem('token');
            this.router.push('/login');
        }
    }
}
</script>


