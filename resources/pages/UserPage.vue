<template>
    <div class="container_user">
        <!-- <form action="" v-if="form_is_on">
            <select @change="onChangeLang" name="" id="" >
                <option>Выберите язык</option>
                <option :value="user.lang_s">{{ user.lang_s }}</option>
                <option :value="user.lang_t">{{ user.lang_t }}</option>
            </select>
            <strong>{{ errors.lang }}</strong>
            <textarea name="text" id="text" v-model="form_text" cols="30" rows="10"></textarea>
            <strong>{{ errors.text }}</strong>
            <button type="submit" @click="create_post">
                Создать пост
            </button>
            <button @click="close_form">
                отмена
            </button>
        </form>
        <p>Это страница: {{ user.name }} {{ user.surname }}
        {{ user.name }} изучает {{ user.lang_s }}
        и может помочь вам с {{ user.lang_t }}</p>
        <button v-if="user.id != user_id">
            Начать переписку
        </button>
        <button v-if="user.id == user_id" @click="open_form">
            Создать пост
        </button>
        <div id="posts">
            <div class="" v-for="post in posts" :key="post">
                <div v-if="!filter_is_on || filter_lang == post.lang" class="wrapper">
                    <p>{{ post.text }}</p>
                    <a :href="$router.resolve({name: 'UserPage', params: { id: post.users_id }}).href"><p><a href=""></a>{{ post.name }} {{ post.surname }}</p></a>

                </div>
                
            </div>
        </div> -->
        <div class="user_info_container">
            <div class="user_info">
                <img :src="'/storage/profile_pics/' + user.pfp" alt="">
                <div>
                    <p class="title">{{ user.name }} {{ user.surname }}</p>
                    <p class="text">Изучает: {{ user.lang_s }}</p>
                    <p class="text">Говорит: {{ user.lang_t }}</p>
                </div>
            </div>
            <button v-if="user.id != user_id">
                Начать переписку
            </button>
            <button v-if="user.id == user_id" @click="open_form">
                Создать пост
            </button>
        </div>
        <p class="posts_tittle">Посты пользователя:</p>
        <div class="posts">
            <div class="post">
                <div class="post_body">
                    <img :src="'/storage/profile_pics/' + user.pfp" alt="">
                    <div>
                        <p class="upper_line">{{ user.name }} {{ user.surname }}<span>20.01.2023</span></p>
                        <p class="lower_line">Hello! I wanna learn a couple of lenguges but first i wanted to polish my english skills, so i’m here</p>
                    </div>
                </div>
                <div class="leave_comment">
                    <textarea v-if="write_comment" name="" id="" cols="30" rows="10"></textarea>
                    <button @click="write_comment_f()">Прокомметировать</button>
                </div>
                <div class="comments">
                    <div class="comment">
                        <div class="comment_text">
                            <img class="comment_user_pfp" src="/storage/imgs/user_pfp_comment.png" alt="">
                            <div>
                                <p class="upper_line">John Hyppe</p>
                                <p class="lower_line">Languages* Good luck!</p>
                            </div>
                        </div>
                        <div class="rate">
                            <img src="/storage/imgs/Like.png" alt="">
                            <img class="dislike" src="/storage/imgs/Disike.png" alt="">
                        </div>
                    </div>
                    <div class="comment">
                        <div class="comment_text">
                            <img class="comment_user_pfp" src="/storage/imgs/user_pfp_comment.png" alt="">
                            <div>
                                <p class="upper_line">John Hyppe</p>
                                <p class="lower_line">Languages* Good luck!</p>
                            </div>
                        </div>
                        <div class="rate">
                            <img src="/storage/imgs/Like.png" alt="">
                            <img class="dislike" src="/storage/imgs/Disike.png" alt="">
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="posts">
            <div class="post">
                <div class="post_body">
                    <img :src="'/storage/profile_pics/' + user.pfp" alt="">
                    <div>
                        <p class="upper_line">{{ user.name }} {{ user.surname }}<span>20.01.2023</span></p>
                        <p class="lower_line">Hello! I wanna learn a couple of lenguges but first i wanted to polish my english skills, so i’m here</p>
                    </div>
                </div>
                <div class="leave_comment">
                    <textarea v-if="write_comment" name="" id="" cols="30" rows="10"></textarea>
                    <button @click="write_comment_f()">Прокомметировать</button>
                </div>
                <div class="comments">
                    <div class="comment">
                        <div class="comment_text">
                            <img class="comment_user_pfp" src="/storage/imgs/user_pfp_comment.png" alt="">
                            <div>
                                <p class="upper_line">John Hyppe</p>
                                <p class="lower_line">Languages* Good luck!</p>
                            </div>
                        </div>
                        <div class="rate">
                            <img src="/storage/imgs/Like.png" alt="">
                            <img class="dislike" src="/storage/imgs/Disike.png" alt="">
                        </div>
                    </div>
                    <div class="comment">
                        <div class="comment_text">
                            <img class="comment_user_pfp" src="/storage/imgs/user_pfp_comment.png" alt="">
                            <div>
                                <p class="upper_line">John Hyppe</p>
                                <p class="lower_line">Languages* Good luck!</p>
                            </div>
                        </div>
                        <div class="rate">
                            <img src="/storage/imgs/Like.png" alt="">
                            <img class="dislike" src="/storage/imgs/Disike.png" alt="">
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</template>

<style>

@font-face {
    font-family: "jejugothic";
    src: url('storage/fonts/JejuGothic-Regular.ttf');
}
.container_user{
    margin-top: 188px;
    font-family: "jejugothic";
}
    .user_info_container{
        display: flex;
        justify-content: space-between;
        padding: 60px 115px;
    }
        .user_info{
            display: flex;
            column-gap: 36px;
        }
            .user_info img{
                width: 218px;
                height: 218px;
                border-radius: 130px;
            }
            .user_info .title{
                font-size: 40px;
                margin-bottom: 52px;
                margin-top: 62px;
                line-height: 0;
            }
            .user_info .text{
                font-size: 28px;
                margin-bottom: 35px;
                line-height: 0;
            }
        .user_info_container button{
            color: #0D890D;
            background-color: #fff;
            border: 2px solid black;
            border-radius: 16px;
            font-size: 32px;
            padding: 5px 90px;
            height: 57px;
            font-family: "jejugothic";
            box-sizing: border-box;
            margin-top: 30px;
        }
.posts_tittle{
    font-size: 48px;
    margin-left: 115px;
}

    .post{
        padding-left: 115px;
    }
        .post_body{
            display: flex;
            column-gap: 32px;
        }
            .post_body img{
                height: 100px;
                width: 100px;
                border-radius: 50px;
                margin-top: 10px;
            }
            .upper_line{
                font-size: 40px;
                line-height: 0;
            }
                .upper_line span{
                    color: #9F9F9F;
                    font-size: 28px;
                    margin-left: 50px;
                }
            .lower_line{
                font-size: 32px;
                margin-top: 60px;
            }
        .leave_comment{
            display: flex;
            align-items: end;
        }
        .post button{
            color: #0D890D;
            background-color: #fff;
            border: 2px solid black;
            border-radius: 16px;
            font-size: 32px;
            padding: 5px 40px;
            height: 57px;
            font-family: "jejugothic";
            margin-top: 30px;
            margin-left: 130px;
        }
        textarea{
            width: 800px;
            height: 147px;
            border: 2px solid black;
            border-radius: 16px;
            margin-left: 130px;
            font-size: 32px;
            padding: 10px;
            margin-top: 20px;
        }
            .comments{
                margin-left: 110px;
                margin-right: 115px;
                margin-top: 70px;
            }
                .comment{
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 74px;
                }
                    .comment_text{
                        display: flex;
                        column-gap: 23px;
                    }
                    .comment_user_pfp{
                        height: 75px;
                        width: 75px;
                    }
                    .rate{
                        display: flex;
                    }
                        .rate img{
                            width: 94px;
                            height: 70px;
                        }
                        .dislike{
                            margin-top: 15px;
                        }
                        


</style>

<script>

    export default{
        name: 'UserPage',
        data(){
            return{
                isLogged: false,
                user: {
                    name: '',
                    surname: '',
                    lang_s: '',
                    lang_t: '',
                    id: 0,
                },
                owner_id: window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
                user_id: window.Laravel.user.id,
                form_is_on: false,
                form_text: '',
                form_lang: '',
                errors: {
                    text: null,
                    lang: null
                },
                posts: null,
                write_comment: false
            }
        }, created(){
            if(window.Laravel.isLogged){
                this.isLogged = true
            }
            this.$axios.get('http://127.0.0.1:8000/api/user/'+this.owner_id).then(response => {
                this.user = response.data;
            })
            this.$axios.get('http://127.0.0.1:8000/api/posts/'+this.owner_id).then(response => {
                this.posts = response.data;
            })
            this.owner_id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1)
        }, methods: {
            write_comment_f(){
                this.write_comment = true;
            },
            open_form(){
                this.form_is_on = true
            },
            close_form(){
                this.form_is_on = false
            },
            onChangeLang(e){
                this.form_lang = e.target.value;
            },
            create_post(e){
                e.preventDefault();
                this.errors = {
                    text: null,
                    lang: null
                }
                this.$axios.post('http://127.0.0.1:8000/api/makepost', {
                    lang: this.form_lang,
                    text: this.form_text
                }).then(response => {
                    this.form_text = ''
                    this.close_form();
                    this.$axios.get('http://127.0.0.1:8000/api/posts/'+this.owner_id).then(response => {
                        this.posts = null;
                        this.posts = response.data;
                    })
                }).catch(err => {
                        console.log(err.response.data)
                    if (err.response.data.errors.text) {
                        this.errors.text = err.response.data.errors.text[0];
                    }
                    if (err.response.data.errors.lang) {
                        this.errors.lang = err.response.data.errors.lang[0];
                    }
                })
            }
        }
    }

</script>