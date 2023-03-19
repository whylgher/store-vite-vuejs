<template>
    <div class="login-page">
        <div class="formLogin">
            <p class="text-danger" v-if="error"> {{ error }}</p>
            <form @submit.prevent="login">
                <input type="email" placeholder="Enter your email" v-model="form.email">
                <br>
                <input type="password" placeholder="Enter your password" v-model="form.password">
                <br>
                <input type="submit" value="Login" class="submit">
            </form>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default {
    name: 'Login',
    data() {
        return {
            form: ref({
                email: '',
                password: '',
            }),
            error: ref(''),
            router: useRouter(),
        }
    },
    methods: {
        login() {
            axios.post('/api/login', this.form)
                .then(({ data }) => {
                    console.log('data')
                    console.log(data.message)
                    if (data.success) {
                        localStorage.setItem('token', data.data.token);
                        this.router.push('/');
                    } else {
                        this.error = data.message;
                    }
                });
        }
    },
}
</script>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Fira sans', 'sans-serif';
    font-size: 16px;
}

input {
    background: rgba(228, 232, 243, 0.8);
    background-position: 0.5em 0.6em;
    border: none;
    color: rgba(80, 80, 80, 1);
    padding: 0 0 0 4rem;
    margin: 0 0 1em 0;
    width: 20em;
    height: 2.8em;
    outline: none;
    transition: background-color 0.4s;
}

input:hover {
    background-color: rgba(255, 255, 255, 255);
}

input:focus {
    background-color: rgba(255, 255, 255, 255);
}
</style>
