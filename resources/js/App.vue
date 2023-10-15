<template>
    <div class="container">
        <div class="nav-bar" v-if="isLogged">
            <a :href="$router.resolve({name: 'Dashboard'}).href">Dashboard</a>
            <a :href="$router.resolve({name: 'UserPage', params: { id: user_id }}).href">User page</a>
            <a href="#" @click="logout">logout</a>
        </div>
        <div class="nav-bar" v-else>
            <router-link to="/">Home page</router-link>
            <router-link to="/login">Log in</router-link>
            <router-link to="/registration">Register</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>

    export default{
        name: 'App',
        data(){
            return{
                isLogged: false,
                user_id: null
            }
        },
        created(){
            if(window.Laravel.isLogged){
                this.isLogged = true,
                this.user_id = window.Laravel.user.id
            }
        }, methods: {
            logout (e) {
              e.preventDefault();
              this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('http://127.0.0.1:8000/api/logout').then(response => {
                    if(response.data.status == 200){
                        window.location.href = '/';
                    } else {
                        console.log(response)
                    }
                }).catch(error => {
                    console.error(error)
                })
              });  
            },
            changeUserid() {
                
            }

        },
    }

</script>