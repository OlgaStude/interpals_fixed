<template>
    <div class="form_to_add" v-if="form_is_on">
        <div>
            <div class="inside">
                <textarea  name="text"  id="text" v-model="form_text" cols="30" rows="10"></textarea>
                <strong>{{ errors.text }}</strong>
                <div>
                    <select @change="onChangeLanginform" name="" id="">
                        <option>Выберите язык</option>
                        <option :value="user.lang_s">{{ user.lang_s }}</option>
                        <option :value="user.lang_t">{{ user.lang_t }}</option>
                    </select>
                    <strong>{{ errors.lang }}</strong>
                    <button  @click="create_post">Создать пост</button>
                </div>
            </div>
            <img @click="close_form" src="/storage/imgs/close_btn.png" alt="">
        </div>
    </div>
    <div class="dashboard_content">
        <div class="lang_filter">
            <div>
                <p>Показывать в летне посты...</p>
                <select @change="onChangeLang" name="" id="" >
                    <option value="no_filter">на всех моих языках</option>
                    <option :value="user.lang_s">только {{ user.lang_s }}</option>
                    <option :value="user.lang_t">только {{ user.lang_t }}</option>
                </select>
            </div>
            <button @click="open_form">
                Создать пост
            </button>
        </div>
        <div class="posts">
            <div v-for="post in posts" :key="post">
            <div class="post" v-if="!filter_is_on || filter_lang == post.lang">
                <div class="post_body">
                    <a :href="$router.resolve({name: 'UserPage', params: { id: post.user_id }}).href"><img :src="'/storage/profile_pics/' + post.pfp" alt=""></a>
                    <div>
                        <p class="upper_line"><a :href="$router.resolve({name: 'UserPage', params: { id: post.user_id }}).href">{{ user.name }} {{ user.surname }}</a><span>20.01.2023</span></p>
                        <p class="lower_line">{{ post.text }}</p>
                    </div>
                </div>
                <div class="leave_comment">
                    <textarea v-if="write_comment"  ref="comment_text" name="" id="" cols="30" rows="10"></textarea>
                    <button v-if="write_comment" @click="create_comment(post.id)">Прокомметировать</button>
                    <button v-if="!write_comment" @click="write_comment_f()">Прокомметировать</button>
                </div>
                <div class="comments">
                    <div class="comment" v-for="commnet in post.comments" :key="commnet">
                        <div class="comment_text">
                            <img class="comment_user_pfp" src="/storage/imgs/user_pfp_comment.png" alt="">
                            <div>
                                <p class="upper_line"><a :href="$router.resolve({name: 'UserPage', params: { id: commnet.user_id }}).href">{{ commnet.user_name }} {{ commnet.user_surname }}</a></p>
                                <p class="lower_line">{{ commnet.text }}</p>
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
    </div>
</template>


<style>

.make_green{
    background-color: greenyellow;
}
@font-face {
    font-family: "jejugothic";
    src: url('storage/fonts/JejuGothic-Regular.ttf');
}
.dashboard_content{
    margin-top: 188px;
    font-family: "jejugothic";
}
.form_to_add{
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgb(0, 0, 0, 0.2);
            margin-left: -0px;
            margin-top: -190px;
            z-index: 100;
        }
        .form_to_add>div{
            width: 1098px;
            height: 604px;
            box-sizing: border-box;
            padding: 72px 73px;
            background-color: #fff;
            border-radius: 16px;
            margin: auto;
            margin-top: 200px;
            position: relative;
        }
        .form_to_add>div>img{
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .form_to_add>div textarea{
            width: 954px;
            height: 384px;
            margin: 0;
            margin-left: -15px;
            margin-bottom: 31px;
        }
        .form_to_add .inside div{
            display: flex;
            justify-content: space-between;
        }
        .form_to_add>div select{
            width: 518px;
            height: 57px;
            box-sizing: border-box;
            font-size: 32px;
            background-color: #fff;
            margin-left: -15px;
        }
        .form_to_add>div button{
            width: 345px;
            height: 57px;
            box-sizing: border-box;
            font-size: 32px;
            color: #0D890D;
            background-color: #fff;
            border: 2px solid black;
            border-radius: 16px;
            margin-right: -15px;
        }
    .lang_filter{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 60px 115px;
    }
        option{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: black;
        }
        .lang_filter>div{
            display: flex;
            justify-content: space-between;
            align-items: center;
            column-gap: 6px;
            width: 1072px;
        }
        .lang_filter>div p{
            font-size: 32px;
        }
        .lang_filter>div select{
            font-size: 32px;
            width: 580px;
            font-family: "jejugothic";
            color: #0D890D;
        }
        .lang_filter button{
            color: #0D890D;
            background-color: #fff;
            border: 2px solid black;
            border-radius: 16px;
            font-size: 32px;
            padding: 5px 70px;
            height: 57px;
            font-family: "jejugothic";
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
        name: 'Home',
        data(){
            return {
                posts: {},
                user: window.Laravel.user,
                filter_is_on: false,
                filter_lang: null,
                comment_text: null,
                write_comment: false,
                form_is_on: false,
                form_text: '',
                form_lang: '',
                errors: {
                    text: null,
                    lang: null
                },
            }
        }, created(){
            this.$axios.get('http://127.0.0.1:8000/api/posts').then(response => {
                this.posts = response.data.data;
                console.log(response.data.data)
            })
    }, methods: {
            open_form(){
                this.form_is_on = true
            },
            close_form(){
                this.form_is_on = false
            },
            write_comment_f(){
                this.write_comment = true;
            },
            onChangeLang(e) {
                if (e.target.value == 'no_filter') {
                    this.filter_lang = null;
                    this.filter_is_on = false;
                } else {
                    this.filter_lang = e.target.value;
                    this.filter_is_on = true;
                    
                }
            },
            onChangeLanginform(e){
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
                    this.$axios.get('http://127.0.0.1:8000/api/posts/').then(response => {
                        this.posts = null;
                        this.posts = response.data.data;
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
            },
            create_comment(post_id) {
                this.$axios.post('http://127.0.0.1:8000/api/makecomment',
                    {
                        post_id: post_id,
                        text: this.comment_text,
                    }
                ).then(response => {
                this.$axios.get('http://127.0.0.1:8000/api/posts').then(response => {
                    this.posts = response.data.data;
                    this.write_comment = false;

                })
            })
            }
        }
    }

</script>

<style>
    .comment{
        padding-left: 30px;
    }
</style>