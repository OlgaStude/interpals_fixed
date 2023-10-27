<template>
    <div class="PP_container">
        <h1>Вы можете начать диалог:</h1>
        <div class="possible_people">
            <div class="person">
                <div>
                    <img src="/storage/imgs/user_pfp_comment.png" alt="">
                    <p>Лена Ленова</p>
                </div>
                <button>Написать</button>
            </div>
        </div>
        <div class="possible_people">
            <div class="person">
                <div>
                    <img src="/storage/imgs/user_pfp_comment.png" alt="">
                    <p>Лена Ленова</p>
                </div>
                <button>Написать</button>
            </div>
        </div>
    </div>
  </template>
  
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
            .person button{
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


  <script>
  export default {
    name: "PP",
    data() {
      return {
      }
    },
    created() {},
    methods: {
    }
  };
  </script>