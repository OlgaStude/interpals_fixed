<template>
    <div class="PP_container">
        <h1>Ваши диалоги:</h1>
        <div class="possible_people" v-for="user in users">
            <div v-if="user != null" class="person">
                <div>
                    <img :src="'/storage/profile_pics/'+user.pfp" alt="">
                    <p><a :href="$router.resolve({name: 'UserPage', params: { id: user.id }}).href">{{ user.name }} {{ user.surname }}</a></p>
                </div>
                <a class="btn" :href="$router.resolve({name: 'Chat', params: { id: user.id }}).href">Написать</a>
            </div>
        </div>
    </div>
  </template>
  



  <script>
  export default {
    name: "E_chats",
    data() {
      return {
        users: null
      }
    },
    created() {
        this.$axios.get('http://127.0.0.1:8000/api/getexistantchats').then(response => {
            this.users = response.data.data;
        })
    },
    methods: {
    },beforeRouteEnter(to, from, next) {
        if(!window.Laravel.user){
            return next("/");
        }
        next();
    }
  };
  </script>

<style>
@font-face {
  font-family: "jejugothic";
  src: url('storage/fonts/JejuGothic-Regular.ttf');
}

    .PP_container{
        margin-top: 188px;
        font-family: "jejugothic";
        padding: 60px 115px;
        min-height: fit-content;
        min-height: 500px;
    }
    .PP_container h1{
        font-size: 48px;
    }
        .person{
            display: flex;
            justify-content: space-between;
                align-items: center;
        }
            .person>div{
                display: flex;
                align-items: center;
                column-gap: 33px;
                font-size: 40px;
            }
            .person img{
                width: 100px;
                height: 100px;
            }
            .person .btn{
                color: #0D890D;
                width: 308px;
                height: 60px;
                box-sizing: border-box;
                padding: 5px 74px;
                font-size: 32px;
                background-color: #fff;
                border: 2px solid black;
                border-radius: 16px;
            }
        


</style>