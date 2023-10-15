<template>
    <div class="container_user">
        <form action="" v-if="form_is_on">
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
        </div>
    </div>
</template>


<script>

    export default{
        name: 'UserPage',
        data(){
            return{
                isLogged: false,
                user: null,
                owner_id: window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
                user_id: window.Laravel.user.id,
                form_is_on: false,
                form_text: '',
                form_lang: '',
                errors: {
                    text: null,
                    lang: null
                },
                posts: null
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