<template>
    <div class="login_container">
      <h1>Войти</h1>

      <form action="" enctype="multipart/form-data">
        
        <input type="email" id="email" v-model="email" placeholder="email" />
        <strong>{{ errors.email }}</strong>
        <input
          type="password"
          id="password"
          v-model="password"
          placeholder="password"
        />
        <strong>{{ errors.password }}</strong>
        <strong>{{ errors.unmatched }}</strong>
        <button type="submit" @click="login">Войти</button>
        <p class="to_login">Ещё не с нами? <router-link class="to_login" to="/registration">Зарегистрируйтесь</router-link>!</p>
        </form>
      <img src="storage/imgs/map_simple.png" alt="">
    </div>
  </template>
  
<style>
@font-face {
  font-family: "jejugothic";
  src: url('storage/fonts/JejuGothic-Regular.ttf');
}

.login_container{
      position: relative;
      height: 1220px;
      font-family: "jejugothic";
  }

  .login_container>*{
    position: absolute;
}
.login_container h1{
    font-size: 65px;
    left: 854px;
    top: 100px;
}
.login_container>form{
    position: absolute;
    z-index: 1;
    width: 580px;
    left: 670px;
    top: 230px;
    margin-top: 60px;
}
    .login_container>form input{
        width: 100%;
        height: 43px;
        font-size: 32px;
        padding-left: 13px;
        border: 0;
        border-bottom: 2px solid black;
        background-color: rgb(240, 248, 255, 0);
        margin-top: 38px;
        margin-bottom: 4px;
    }
.login_container>img{
    position: absolute;
    z-index: 0;
}
.login_container>form p{
  font-size: 24px;
  margin-top: 32px;
  margin-left: -30px;
}

form strong{
  padding-left: 10px;
  padding-top: 20px;
  box-sizing: border-box;
  color: #E24A6F;
  font-size: 24px;
}
form button{
  padding-bottom: 50px;
  box-sizing: border-box;
}
form button:hover{
    border: 4px solid black;
    text-decoration: underline;
}

</style>


  <script>
  export default {
    name: "Home",
    data() {
      return {
        email: "",
        password: "",
        errors: {
          email: null,
          password: null,
          unmatched: null,
        },
      };
    },
    created() {},
    methods: {
      login(e) {
        e.preventDefault();
        this.errors = {
          email: null,
          password: null,
          unmatched: null,
        };
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
          this.$axios
            .post("api/login", {
              email: this.email,
              password: this.password,
            })
            .then((response) => {
              console.log(response.data);
              if (response.data.status == 422) {
                this.errors.unmatched = response.data.message;
              } else if (response.data.status == 200) {
                window.location.href = '/user/' + response.data.user_id;
              } else {
                this.error = response.data.message;
              }
            })
            .catch((err) => {
              console.log(err);
              if (err.response.data.errors.email) {
                this.errors.email = err.response.data.errors.email[0];
              }
              if (err.response.data.errors.password) {
                this.errors.password = err.response.data.errors.password[0];
              }
            });
        });
      },
    },
    beforeRouteEnter(to, from, next) {
    if (window.Laravel.isLogged) {
      return next("/dashboard");
    }
    next();
  },
  };
  </script>