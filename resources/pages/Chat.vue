<template>
    <div class="chat_container">
        <h1>Диалог с Лена Ленова:</h1>
        <div class="dialog">
            <div class="other_user">
                <img src="/storage/imgs/user_pfp_comment.png" alt="">
                <div class="text">
                    <div class="upper_line">
                        <p class="name">Лена Ленова</p>
                        <p class="date">20.07.2023</p>
                    </div>
                    <p class="lower_line">
                        Hello! I wanna learn a couple of lenguges but first i wanted to polish my english skills, so i’m here
                    </p>
                </div>
            </div>
            <div class="this_user">
                <img class="user_pfp_chat" :src="'/storage/profile_pics/'+user_pfp" alt="">
                <div class="text">
                    <div class="upper_line">
                        <p class="name">Лена Ленова</p>
                        <p class="date">20.07.2023</p>
                    </div>
                    <p class="lower_line">
                        Hello! I wanna learn a couple of lenguges but first i wanted to polish my english skills, so i’m here
                    </p>
                </div>
            </div>
            <div class="other_user">
                <img src="/storage/imgs/user_pfp_comment.png" alt="">
                <div class="text">
                    <div class="upper_line">
                        <p class="name">Лена Ленова</p>
                        <p class="date">20.07.2023</p>
                    </div>
                    <p class="lower_line">
                        Hello! I wanna learn a couple of lenguges but first i wanted to polish my english skills, so i’m here
                    </p>
                </div>
            </div>
            <div class="other_user">
                <img src="/storage/imgs/user_pfp_comment.png" alt="">
                <div class="text">
                    <div class="upper_line">
                        <p class="name">Лена Ленова</p>
                        <p class="date">20.07.2023</p>
                    </div>
                    <p class="lower_line">
                        Hello! I wanna learn a couple of lenguges but first i wanted to polish my english skills, so i’m here
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="buttom_form">
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <button></button>
    </div>
  </template>
  
<style>
@font-face {
  font-family: "jejugothic";
  src: url('storage/fonts/JejuGothic-Regular.ttf');
}

    .chat_container{
        margin-top: 188px;
        font-family: "jejugothic";
        padding: 60px 115px;
        min-height: fit-content;
    }
        .chat_container h1{
            font-size: 48px;
        }
        .other_user{
            width: 746px;
            background-color: #A6E1A6;
            border-radius: 16px;
            margin-left: 177px;
            padding: 21px 35px;
            display: flex;
            column-gap: 25px;
            margin-bottom: 87px;
        }
            .other_user img{
                height: 100px;
            }
            .other_user .upper_line{
                display: flex;
                align-items: center;
                margin-top: 20px;
                column-gap: 77px;
            }
                .other_user .name{
                    font-size: 28px;
                }
                .other_user .date{
                    font-size: 14px;
                    margin-top: 20px;
                }
            .other_user .lower_line{
                font-size: 22px;
                margin-top: 20px;
            }

            .this_user{
                width: 746px;
                background-color: #fff;
                border: 2px solid black;
                border-radius: 16px;
                margin-left: 755px;
                padding: 21px 35px;
                display: flex;
                column-gap: 25px;
                margin-bottom: 87px;
                
            }
                .this_user img{
                    height: 100px;
                }
                .user_pfp_chat{
                    width: 100px;
                    border-radius: 130px;
                }
                .this_user .upper_line{
                    display: flex;
                    align-items: center;
                    margin-top: 20px;
                    column-gap: 77px;
                }
                    .this_user .name{
                        font-size: 28px;
                    }
                    .this_user .date{
                        font-size: 14px;
                        margin-top: 20px;
                    }
                .this_user .lower_line{
                    font-size: 22px;
                    margin-top: 20px;
                }


</style>


  <script>
  export default {
    name: "Chat",
    data() {
      return {
        'user_pfp': window.Laravel.user.pfp
      }
    },
    created() {},
    methods: {
    }
  };
  </script>