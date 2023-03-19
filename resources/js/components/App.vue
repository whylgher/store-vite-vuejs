<template>
    <toolbar id="toolbar-store">
        <div id="toolbar-botton">
            <router-link to="/"> Home </router-link>
        </div>
        <div id="toolbar-botton">
            <router-link to="/cart"> Cart </router-link>
        </div>
        <div id="toolbar-botton">
            <router-link to="/login"> Login </router-link>
        </div>
        <div id="toolbar-botton">
            <router-link to="" @click="logout"> Log out </router-link>
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


