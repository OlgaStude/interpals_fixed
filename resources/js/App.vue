<template>
    <div class="container">
        <div class="nav-bar nav-bar-logged" v-if="isLogged">
            <a class="router logo" :href="$router.resolve({name: 'Dashboard'}).href"><img :src="'/storage/imgs/logo.png'" alt=""><span><span class="green_txt">Inter</span>Pals</span></a>
            <div id="nav_right_logged">
                <a class="lower" :href="$router.resolve({name: 'UserPage', params: { id: user_id }}).href"><img :src="'/storage/imgs/bell_icon.png'" alt=""></a>
                <a :href="$router.resolve({name: 'UserPage', params: { id: user_id }}).href"><img :src="'/storage/imgs/people_icon.png'" alt=""></a>
                <a :href="$router.resolve({name: 'Chat'}).href"><img :src="'/storage/imgs/speach_bubble_icon.png'" alt=""></a>
                <a :href="$router.resolve({name: 'UserPage', params: { id: user_id }}).href"><img :src="'/storage/imgs/user_pfp.png'" alt=""></a>
            </div>
            <!-- <a href="#" @click="logout">logout</a> -->
        </div>
        <div class="nav-bar" v-else>
            <router-link class="router logo" to="/"><img :src="'/storage/imgs/logo.png'" alt=""><span><span class="green_txt">Inter</span>Pals</span></router-link>
            <div id="nav_right">
                <router-link class="router" to="/login">Войти</router-link>
                <router-link class="router" to="/registration"><span class="green_txt">Присоедениться</span></router-link>
            </div>
        </div>
        <router-view></router-view>
        <div class="footer">
            <div class="fooer_container">
                <div>
                    <p>О нас</p>
                    <p>Часто задаваемые вопросы</p>
                    <p>Обратная связь</p>
                </div>
                <div>
                    <img class="footer_img_1" src="/storage/imgs/youtube_icon.png" alt="">
                    <img class="footer_img_2" src="/storage/imgs/telegram_icon.png" alt="">
                </div>
            </div>
            <p>© 2023 InterPals - <span class="diff_font">Онлайн сервис языкового обмена</span></p>
        </div>
    </div>
</template>

<style>

    @font-face {
        font-family: "jejugothic";
        src: url('storage/fonts/JejuGothic-Regular.ttf');
    }
    @font-face {
        font-family: "jejuM";
        src: url('storage/fonts/JejuMyeongjo-Regular.ttf');
    }
    body{
        padding: 0px;
        margin: 0px;
    }
        .nav-bar{
            display: flex;
            justify-content: space-between;
            padding: 48px 110px;
        }
        .nav-bar-logged{
            box-shadow: -8px 0px 12px 1px rgba(11, 14, 11, 0.41);
            box-sizing: border-box;
            height: 188px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #fff;
        }
            .router:visited, .router{
                color: black;
                text-decoration: none;
                font-size: 30px;
            }
                .green_txt{
                    color: #0D890D;
                }
                
                .logo{
                    display: flex;
                    align-items: center;
                    font-family: 'jejugothic';
                }
                    .logo>span{
                        padding-top: 10px;
                    }
            #nav_right .router{
                margin-left: 54px;
            }
            #nav_right_logged{
                display: flex;
                align-items: center;
            }
            #nav_right_logged a{
                margin-left: 54px;
                display: block;
            }
            .lower{
                margin-top: 5px;
            }
            #nav_right .router:hover{
                text-decoration: underline;
                text-underline-offset: 5px;
            }
            #nav_right .green_txt:hover{
                color: #0D890D;
                text-decoration: underline;
            }

    .footer{
        width: 100%;
        height: 325px;
        background-color: black;
        color: white;
        font-family: "jejugothic";
    }
        .fooer_container{
            display: flex;
            justify-content: space-between;
            padding: 67px 120px;
            font-size: 30px;
        }
        .fooer_container div{
            display: flex;
            column-gap: 81px;
        }
            .footer_img_1{
                width: 77px;
                height: 77px;
            }
            .footer_img_2{
                width: 67px;
                height: 67px;
                margin-top: 5px;
            }
        .footer>p{
            font-size: 24px;
            margin-left: 120px;
            margin-bottom: 51px;
        }
        .diff_font{
            font-family: 'jejuM';
        }

</style>

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

