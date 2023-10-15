<template>
    <div class="container">
        <form action="" enctype="multipart/form-data">
            <input type="text" id="name" v-model="name" placeholder="name">
            <strong>{{ errors.name }}</strong>
            <input type="text" id="surname" v-model="surname" placeholder="surname">
            <strong>{{ errors.surname }}</strong>
            <input type="email" id="email" v-model="email" placeholder="email">
            <strong>{{ errors.email }}</strong>
            <input type="password" id="password" v-model="password" placeholder="password">
            <strong>{{ errors.password[0] }}</strong>
            <input type="password" id="password_confirmation" v-model="password_confirmation" placeholder="password_confirmation">
            <strong>{{ errors.password[1] }}</strong>
            <input type="file" id="pfp" ref="pfp">
            <strong>{{ errors.pfp }}</strong>
            <p>Язык, который я хочу учить</p>
            <select @change="onChangeLang_s" name="" id="lang_s">
                <option>Выберите язык</option>
                <option v-for="lang of langs" :value="lang.nang_name">{{ lang.lang_name }}</option>
            </select>
            {{ errors.lang_s }}
            <p>Язык, на котором я могу говорить</p>
            <select @change="onChangeLang_t" name="" id="lang_s">
                <option>Выберите язык</option>
                <option v-for="lang of langs" :value="lang.nang_name">{{ lang.lang_name }}</option>
            </select>
            {{ errors.lang_t }}
            <button type="submit" @click="register">Register</button>
        </form>
    </div>
</template>


<script>

    export default{
        name: 'Registration',
        data(){
            return{
                name: '',
                surname: '',
                email: '',
                password: '',
                password_confirmation: '',
                errors: {
                    name: null,
                    surname: null,
                    email: null,
                    password: [],
                    password_confirmation: null,
                    pfp: null,
                    lang_s: null,
                    lang_t: null,
                },
                langs: {},
                lang_s: '',
                lang_t: ''
            }    
        }, created(){
            this.$axios.get('api/langs').then(response => {
                this.langs = response.data;
            })
        }, methods: {
            register(e){
                e.preventDefault();
                this.errors = {
                    name: null,
                    surname: null,
                    email: null,
                    password: [],
                    password_confirmation: null,
                    pfp: null,
                    lang_s: null,
                    lang_t: null,
                };
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/register', {
                        name: this.name,
                        surname: this.surname,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation,
                        pfp: this.$refs.pfp.files[0],
                        lang_s: this.lang_s,
                        lang_t: this.lang_t,
                    }, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                    }).then(response => {
                        console.log()
                        if(response.data.status == 200){
                            window.location.href = '/user/' + response.data.user_id
                        } else {
                            this.error = response.data.message
                        }
                    }).catch(err => {
                        if(err.response.data.errors.email){
                            this.errors.email = err.response.data.errors.email[0]
                        }
                        if(err.response.data.errors.password){
                            this.errors.password = err.response.data.errors.password
                        }
                        if(err.response.data.errors.name){
                            this.errors.name = err.response.data.errors.name[0]
                        }
                        if(err.response.data.errors.surname){
                            this.errors.surname = err.response.data.errors.surname[0]
                        }
                        if(err.response.data.errors.pfp){
                            this.errors.pfp = err.response.data.errors.pfp[0]
                        }
                        if(err.response.data.errors.lang_s){
                            this.errors.lang_s = err.response.data.errors.lang_s[0]
                        }
                        if(err.response.data.errors.lang_t){
                            this.errors.lang_t = err.response.data.errors.lang_t[0]
                        }
                    });
                })
            },
            onChangeLang_s(e){
                this.lang_s = e.target.value;
            },
            onChangeLang_t(e){
                this.lang_t = e.target.value;
            }
        },
        beforeRouteEnter(to, from, next) {
    if (window.Laravel.isLogged) {
      return next("user/" + window.Laravel.user.id);
    }
    next();
  },
        
    }

</script>