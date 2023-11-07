<template>
    <div class="page content">
        <section class="banner">
            <h1><span class="green_txt">Inter</span>Pals</h1>
            <p>Онлайн сервис языкового обмена</p>
            <a :href="$router.resolve({name: 'Registration'}).href">Начни уже сейчас!</a>
            <img class="banner_bg_img" src="storage/imgs/main_map.png" alt="">
        </section>
        <section class="explanation">
            <h1>Что же такое <span class="green_txt">Inter</span>Pals?</h1>
            <p class="p_1">Полноценное изучение инстранного языка невозможно без общения.</p>
            <p class="p_2">Но где найти хорошего собеседника, не имея возможности путешествовать <br>за границу?</p>
            <p class="p_3"><span class="green_txt">Inter</span>Pals предоставляет вам возможность находить собеседников по всему миру.</p>
            <p class="p_4">Ведиде диалог и помогайте друг другу в изучении языков.</p>
            <p class="p_5">Выберите язык, который вы хотите изучать.</p>
            <p class="p_6">Затем выберите язык, с которым вы сможете помочь другим людям.</p>
            <p class="p_7">Общайтесь, тренеруйте языковые навыки, исправлюйте ошибки друг друга, давайте советы!</p>
            <img src="storage/imgs/exp_bg.png" class="explanation_bg" alt="">
        </section>
        <section class="find_people">
            <h1>Сотни комбинаций языков по свей планете</h1>
            <div id="fp_container">
                <div>
                    <div>
                    <img src="storage/imgs/user_main.png" alt="">
                        <div>
                            <p class="fp_title">Maria</p>
                            <p class="fp_p">Изучает:</p>
                            <p class="fp_underline fp_p">Русский</p>
                            <p class="fp_p">Обучает:</p>
                            <p class="fp_underline fp_p">Испанский</p>
                        </div>
                    </div>

                </div>
                <div>
                    <div>
                    <img src="storage/imgs/user_main.png" alt="">
                        <div>
                            <p class="fp_title">Maria</p>
                            <p class="fp_p">Изучает:</p>
                            <p class="fp_underline fp_p">Русский</p>
                            <p class="fp_p">Обучает:</p>
                            <p class="fp_underline fp_p">Испанский</p>
                        </div>
                    </div>

                </div>
                <div>
                    <div>
                    <img src="storage/imgs/user_main.png" alt="">
                        <div>
                            <p class="fp_title">Maria</p>
                            <p class="fp_p">Изучает:</p>
                            <p class="fp_underline fp_p">Русский</p>
                            <p class="fp_p">Обучает:</p>
                            <p class="fp_underline fp_p">Испанский</p>
                        </div>
                    </div>

                </div>
                <div>
                    <div>
                    <img src="storage/imgs/user_main.png" alt="">
                        <div>
                            <p class="fp_title">Maria</p>
                            <p class="fp_p">Изучает:</p>
                            <p class="fp_underline fp_p">Русский</p>
                            <p class="fp_p">Обучает:</p>
                            <p class="fp_underline fp_p">Испанский</p>
                        </div>
                    </div>

                </div>
                <div>
                    <div>
                    <img src="storage/imgs/user_main.png" alt="">
                        <div>
                            <p class="fp_title">Maria</p>
                            <p class="fp_p">Изучает:</p>
                            <p class="fp_underline fp_p">Русский</p>
                            <p class="fp_p">Обучает:</p>
                            <p class="fp_underline fp_p">Испанский</p>
                        </div>
                    </div>

                </div>
                <div>
                    <div>
                    <img src="storage/imgs/user_main.png" alt="">
                        <div>
                            <p class="fp_title">Maria</p>
                            <p class="fp_p">Изучает:</p>
                            <p class="fp_underline fp_p">Русский</p>
                            <p class="fp_p">Обучает:</p>
                            <p class="fp_underline fp_p">Испанский</p>
                        </div>
                    </div>

                </div>
                
            </div>
        </section>
        <section class="people_love_us">
            <h1>Люди нас любят!</h1>
            <div class="plu_container">
                <div>
                    <p class="plu_tittle">Максим</p>
                    <p class="plu_text">Обожаю этот сайт!Он очень удобный и мне удалось сильно прокачать свой уровень английского всего за пару недель. Мне всегда говорили: общение - ключ к обучению, но где его найти? Теперь я знаю где!</p>
                    <img src="storage/imgs/stars.png" alt="">
                </div>
                <div>
                    <p class="plu_tittle">Максим</p>
                    <p class="plu_text">Обожаю этот сайт!Он очень удобный и мне удалось сильно прокачать свой уровень английского всего за пару недель. Мне всегда говорили: общение - ключ к обучению, но где его найти? Теперь я знаю где!</p>
                    <img src="storage/imgs/stars.png" alt="">
                </div>
                <div>
                    <p class="plu_tittle">Максим</p>
                    <p class="plu_text">Обожаю этот сайт!Он очень удобный и мне удалось сильно прокачать свой уровень английского всего за пару недель. Мне всегда говорили: общение - ключ к обучению, но где его найти? Теперь я знаю где!</p>
                    <img src="storage/imgs/stars.png" alt="">
                </div>
                <div>
                    <p class="plu_tittle">Максим</p>
                    <p class="plu_text">Обожаю этот сайт!Он очень удобный и мне удалось сильно прокачать свой уровень английского всего за пару недель. Мне всегда говорили: общение - ключ к обучению, но где его найти? Теперь я знаю где!</p>
                    <img src="storage/imgs/stars.png" alt="">
                </div>
            </div>
        </section>
    </div>
</template>


<script>

    export default{
        name: 'Home',
        data(){
            return[

            ]
        }, created(){

        }, methods: {
            
        }
    }

</script>

<style>
    @font-face {
        font-family: "jejugothic";
        src: url('storage/fonts/JejuGothic-Regular.ttf');
    }
    @font-face {
        font-family: "jejuM";
        src: url('storage/fonts/JejuMyeongjo-Regular.ttf');
    }
    .banner{
        height: 974px;
        position: relative;
        color: black;
    }
        .banner>*{
            position: absolute;
        }
        .banner_bg_img{
            z-index: 0;
            top: 100px;
        }
        .banner h1{
            font-family: 'jejugothic';
            font-size: 128px;
            left: 418px;
            top: 20px;
        }
            .green_txt{
                color: #0D890D;
            }
        .banner p{
            font-family: 'jejuM';
            font-size: 90px;
            width: 660px;
            left: 345px;
            top: 160px;
        }
        .banner a, .banner a:visited{
            padding: 17px 42px;
            border: 4px solid black;
            border-radius: 16px;
            color: #0D890D;
            text-decoration: none;
            font-family: 'jejugothic';
            font-size: 44px;
            left: 626px;
            bottom: 310px;
            z-index: 1;
        } 
            .banner a:hover{
                border: 6px solid black;
                text-decoration: underline;
            }


    .explanation{
        position: relative;
        font-family: 'jejugothic';
        height: 2156px;
    }
        .explanation>*{
            position: absolute;
        }
        .explanation img{
            top: 220px;
        }
        .explanation h1{
            font-size: 65px;
            left: 764px;
            top: 120px;
        }
        .explanation p{
            font-size: 36px;
        }
            .p_1{
                width: 835px;
                left: 412px;
                top: 300px;
            }
            .p_2{
                width: 875px;
                left: 170px;
                top: 470px;
            }
            .p_3{
                width: 455px;
                left: 270px;
                top: 670px;
            }
            .p_4{
                width: 602px;
                left: 422px;
                top: 900px;
            }
            .p_5{
                width: 876px;
                right: 69px;
                top: 1300px;
            }
            .p_6{
                width: 859px;
                right: 60px;
                top: 1450px;
            }
            .p_7{
                width: 825px;
                right: 131px;
                top: 1660px;
            }


    
    .find_people>h1{
        font-family: 'jejugothic';
        font-size: 65px;
        margin-left: 234px;
        margin-bottom: 90px;
    }
        #fp_container{
            display: flex;
            flex-wrap: wrap;
            column-gap: 109px;
            padding-left: 118px;
        }
            #fp_container>div{
                width: 487px;
                height: 278px;
                background-color: #E24A6F;
                border-radius: 17px;
                padding: 11px 9px;
                box-sizing: border-box;
                margin-bottom: 94px;
            }
            #fp_container>div>div{
                width: 466px;
                height: 260px;
                background-color: #fff;
                border-radius: 17px;
                display: flex;
                justify-content: space-between;
                font-family: 'jejuM';
                font-size: 24px;
                line-height: 0;
                text-align: right;
            }
                #fp_container>div>div img{
                    height: 174px;
                    width: 174px;
                    margin-top: 43px;
                    margin-left: 31px;
                }
                .fp_title{
                    font-family: 'jejugothic';
                    font-size: 40px;
                    margin-right: 51px;
                    margin-top: 63px;
                }
                .fp_p{
                    margin-top: 35px;
                    margin-right: 51px;
                }
                    .fp_underline{
                        text-decoration: underline;
                    }



    
    .plu_container{
        display: flex;
        column-gap: 224px;
        flex-wrap: wrap;
        padding: 30px 260px;
    }
        .people_love_us h1{
            font-family: 'jejugothic';
            font-size: 65px;
            margin-left: 679px;
            margin-top: 100px;
        }
        .people_love_us>div>div{
            width: 558px;
            text-align: center;
            margin-bottom: 110px;
        }
            .plu_tittle{
                font-family: 'jejugothic';
                font-size: 40px;
                margin-bottom: 0;
            }
            .plu_text{
                font-family: 'jejuM';
                font-size: 24px;
                line-height: 30px;
            }
            .people_love_us>div img{
                margin-top: -30px;
            }


</style>