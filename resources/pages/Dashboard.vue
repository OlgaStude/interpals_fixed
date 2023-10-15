<template>
    <div class="row">
         <select @change="onChangeLang" name="" id="" >
                <option value="no_filter">Любой из ваших языков</option>
                <option :value="user.lang_s">только {{ user.lang_s }}</option>
                <option :value="user.lang_t">только {{ user.lang_t }}</option>
            </select>
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
        name: 'Home',
        data(){
            return {
                posts: {},
                user: window.Laravel.user,
                filter_is_on: false,
                filter_lang: null
            }
        }, created(){
            this.$axios.get('http://127.0.0.1:8000/api/posts').then(response => {
                this.posts = response.data;
            })
        }, methods: {
            onChangeLang(e) {
                if (e.target.value == 'no_filter') {
                    this.filter_lang = null;
                    this.filter_is_on = false;
                } else {
                    this.filter_lang = e.target.value;
                    this.filter_is_on = true;
                    
                }
            }
        }
    }

</script>