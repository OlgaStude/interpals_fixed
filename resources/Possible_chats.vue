<template>
    <div class="PP_container">
        <h1>Вы можете начать диалог:</h1>
        <div class="possible_people" v-for="user in users">
            <div class="person">
                <div>
                    <img :src="'/storage/profile_pics/'+user.pfp" alt="">
                    <p><a :href="$router.resolve({name: 'UserPage', params: { id: user.id }}).href">{{ user.name }} {{ user.surname }}</a></p>
                </div>
                <a class="bttn" :href="$router.resolve({name: 'Chat', params: { id: user.id }}).href">Написать</a>
            </div>
        </div>
    </div>
  </template>
  



  <script>
  export default {
    name: "P_chats",
    data() {
      return {
        users: null
      }
    },
    created() {
        this.$axios.get('http://127.0.0.1:8000/api/getusers').then(response => {
                this.users = response.data;
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
        min-height: calc(100vh - 77px);
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
            .person div a, .person div a:visited{
                color: black;
                text-decoration: none;
            }
            .person div a:hover{
                color: #0D890D;
            }
            .person img{
                width: 100px;
                height: 100px;
                border-radius: 50px;
            }
            .person .bttn{
                color: #0D890D;
                background-color: #fff;
                border: 2px solid black;
                border-radius: 16px;
                font-size: 32px;
                padding: 5px 90px;
                height: 57px;
                font-family: "jejugothic";
                box-sizing: border-box;
                cursor: pointer;
                padding-top: 10px;
                text-decoration: none;
            }
    .person .bttn:hover{
        border: 4px solid black;
        text-decoration: underline;
        padding-top: 5px;

    }
        


</style>