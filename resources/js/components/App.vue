<template>
    <div class="text-center">
        <h1 class="text-4xl font-bold text-center">My SPA</h1>
        <div v-if="token">
            <button class="inline-block bg-pink-500 text-white font-bold text-center py-2 px-6 mx-auto mt-4" @click="getUserInfo">Get My Info</button>
            <h3 class="text-2xl text-center mt-4" v-if="user">Welcome, <span class="font-semibold">{{ user.name }}</span>!</h3>
        </div>
        <div v-else>
            <a href="/auth/redirect" class="inline-block bg-blue-500 text-white font-bold text-center py-2 px-6 mx-auto mt-4">Sign in with Twitter</a>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            token: null,
            user: null
        }
    },
    mounted() {
        let urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('token')) {
            this.token = urlParams.get('token');
        }
    },
    methods: {
        getUserInfo() {
            return axios.get('/me', {
                headers: {
                    Authorization: `Bearer ${this.token}`
                }
            })
                .then((response) => {
                    this.user = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    }
}
</script>