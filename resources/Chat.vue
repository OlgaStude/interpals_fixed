<template>
    <div class="chat_container">
        <h1>Диалог с {{ penpal.name }} {{ penpal.surname }}:</h1>
        <div class="dialog">
        <div v-for="chat_message in messages" v-if="messages.length != 0">
            <div v-if="chat_message.is_received_message" class="other_user">
                <img :src="'/storage/profile_pics/'+chat_message.messager_pfp" alt="">
                <div class="text">
                    <div class="upper_line">
                        <p class="name">{{ chat_message.messager_name }} {{ chat_message.messager_surname }}</p>
                        <p class="date">{{ chat_message.time }}</p>
                    </div>
                    <p class="lower_line">
                        {{ chat_message.text }}
                    </p>
                </div>
            </div>
            <div v-else class="this_user">
                <img class="user_pfp_chat" :src="'/storage/profile_pics/'+chat_message.messager_pfp" alt="">
                <div class="text">
                    <div class="upper_line">
                        <p class="name">{{ chat_message.messager_name }} {{ chat_message.messager_surname }}</p>
                        <p class="date">{{ chat_message.time }}</p>
                    </div>
                    <p class="lower_line">
                        {{ chat_message.text }}
                    </p>
                </div>
            </div>
        </div>
        <div class="empty" v-else>
            <p>Вы ещё не начали переписку</p>
        </div>
        </div>
    </div>
    <div class="buttom_form">
        <textarea v-model="chat_message" placeholder="Ваше сообщение здесь" name="" id="" cols="30" rows="10"></textarea>
        <p class="message_err">{{ errors.message }}</p>
        <button  @click="send_message">Отправить</button>
    </div>
  </template>
  



  <script>
  import axios from "axios"
  export default {
    name: "Chat",
    data() {
      return {
        'user_pfp': window.Laravel.user.pfp,
        penpal_id: window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
        chat_message: '',
        errors: {
            message: null
        },
        messages: null,
        penpal: null,
        invalid_user: false
      }
    },
    created() {
        console.log(this.penpal_id)
        this.$axios.get("http://127.0.0.1:8000/api/getmessages/"+this.penpal_id)
            .then((response) => {
                this.messages = response.data.data
            })
        this.$axios.get('http://127.0.0.1:8000/api/user/'+this.penpal_id).then(response => {
            this.penpal = response.data;
            console.log(response.data)
        })
        setInterval(()=>{
            this.$axios.get("http://127.0.0.1:8000/api/getmessages/"+this.penpal_id)
            .then((response) => {
                if(this.messages != response.data.data){
                    this.messages = response.data.data
                }
            })
        }, 5000)
    },
    methods: {
          send_message() {
            this.errors = {
                message: null
            }
            this.$axios.post("http://127.0.0.1:8000/api/sendmessage", {
              message: this.chat_message,
              receiver_id: this.penpal_id,
            })
            .then((response) => {
                this.chat_message = ''
                this.$axios.get("http://127.0.0.1:8000/api/getmessages/"+this.penpal_id)
            .then((response) => {
                this.messages = response.data.data
                console.log(response.data)
            })
            })
            .catch((err) => {
              console.log(err);
              if (err.response.data.errors.message) {
                this.errors.message = err.response.data.errors.message[0];
              }
            });
        },
        
    },
    beforeRouteEnter(to, from, next) {
        if(!window.Laravel.user){
            return next("/");
        }
        if(window.Laravel.user.id == window.location.href.substring(window.location.href.lastIndexOf('/') + 1)){
            return next("user/" + window.Laravel.user.id);
        }
        axios.get('http://127.0.0.1:8000/api/user/'+window.location.href.substring(window.location.href.lastIndexOf('/') + 1)).then(response => {
            console.log("!!")
            if (response.data == 'no_user_found' ) {
                return next("user/" + window.Laravel.user.id);
            }
            next();
        })
    
  },
  };
  </script>

<style>
@font-face {
  font-family: "jejugothic";
  src: url('storage/fonts/JejuGothic-Regular.ttf');
}

.empty{
    font-size: 30px;
    margin-top: 100px;
    margin-left: 10px;
}

    .chat_container{
        margin-top: 188px;
        font-family: "jejugothic";
        padding: 60px 115px;
        min-height: calc(100vh - 377px);
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
                width: 100px;
                border-radius: 50px;
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

    .buttom_form{
        height: 184px;
        border-top: 2px solid black;
        padding: 34px 170px;
        box-sizing: border-box;
        display: flex;
        column-gap: 70px;
        position: relative;
            font-family: "jejugothic";
    }
        .buttom_form textarea{
            height: 80px;
            width: 887px;
            padding: 10px 23px;
            box-sizing: border-box;
        }
        .buttom_form button{
            height: 80px;
            width: 406px;
            box-sizing: border-box;
            color: #0D890D;
            font-family: "jejugothic";
            font-size: 32px;
            background-color: #fff;
            border: 2px solid black;
            border-radius: 16px;
            margin-top: 20px;
            cursor: pointer;
        }
        .buttom_form button:hover{
            border: 4px solid black;
            text-decoration: underline;
        }
        .message_err{
            position: absolute;
            bottom: 0;
            left: 310px;
            font-size: 20px;
            color: #E24A6F;
        }


</style>