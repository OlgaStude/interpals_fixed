<template>
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
        
        <!-- <div id="posts">
            <div class="" v-for="post in posts" :key="post">
                <div v-if="!filter_is_on || filter_lang == post.lang" class="wrapper">
                    <p>{{ post.text }}</p>
                    <a :href="$router.resolve({name: 'UserPage', params: { id: post.user_id }}).href"><p><a href=""></a>{{ post.name }} {{ post.surname }}</p></a>
                    <textarea v-model="comment_text" name="" id="" cols="30" rows="10"></textarea>
                    <button @click="create_comment(post.id)">отправить</button>
                    <div class="comment" v-for="commnet in post.comments" :key="commnet">
                        <a :href="$router.resolve({name: 'UserPage', params: { id: commnet.user_id }}).href"><p><a href=""></a>{{ commnet.user_name }} {{ commnet.user_surname }}</p></a>
                        <p>{{ commnet.text }}</p>
                    </div>
            </div>
                
            </div>
        </div> -->
    </div>
</template>


<style>


@font-face {
    font-family: "jejugothic";
    src: url('storage/fonts/JejuGothic-Regular.ttf');
}
.dashboard_content{
    margin-top: 188px;
    font-family: "jejugothic";
}
    .lang_filter{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 60px 115px;
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
                write_comment: false
            }
        }, created(){
            this.$axios.get('http://127.0.0.1:8000/api/posts').then(response => {
                this.posts = response.data.data;
                console.log(response.data.data)
            })
        }, methods: {
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
            create_comment(post_id) {
                this.$axios.post('http://127.0.0.1:8000/api/makecomment',
                    {
                        post_id: post_id,
                        text: this.comment_text,
                    }
                ).then(response => {
                this.$axios.get('http://127.0.0.1:8000/api/posts').then(response => {
                    this.posts = response.data.data;
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