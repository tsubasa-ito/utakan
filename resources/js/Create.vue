<template>
    <div class="col-md-8 col-md-offset-2">
        <!-- create -->
        <h1>createpage</h1>
        <mu-container>
            <mu-form ref="form" :model="form" class="mu-demo-form" @submit.prevent="addSong">
                <mu-form-item label="UserId" help-text="help text" prop="user_id" :rules="MusicnameRules">
                  <mu-text-field v-model="form.user_id" prop="user_id"></mu-text-field>
                </mu-form-item>
                <mu-form-item label="image" help-text="help text" prop="image" :rules="MusicnameRules">
                  <mu-text-field v-model="form.image" prop="image"></mu-text-field>
                </mu-form-item>
                <mu-form-item label="歌手名" help-text="help text" prop="artist_name" :rules="MusicnameRules">
                  <mu-text-field v-model="form.artist_name" prop="artist_name"></mu-text-field>
                </mu-form-item>
                <mu-form-item label="曲名" help-text="help text" prop="song_name" :rules="MusicnameRules">
                  <mu-text-field v-model="form.song_name" prop="song_name"></mu-text-field>
                </mu-form-item>
                <mu-form-item label="コメント" help-text="help text" prop="comment" :rules="MusicnameRules">
                  <mu-text-field v-model="form.comment" prop="comment"></mu-text-field>
                </mu-form-item>
                <div class="form-group">
                   <button class="btn btn-primary">Submit</button>
                </div>
            </mu-form>
        </mu-container>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                songs: [
                    {
                        artist: '',
                        musicimg: '',
                    }
                ],
                MusicnameRules: [
                    { validate: (val) => !!val, message: '入力してください'},
                    { validate: (val) => val.length >= 1, message: 'Username length greater than 1'}
                ],
                form: {
                    user_id: '',
                    image: '',
                    artist_name: '',
                    song_name: '',
                    comment: '',
                }
            }
        },
        methods: {
            submit () {
                this.$refs.form.validate().then((result) => {
                  console.log('form valid: ', result)
                });
            },
            clear () {
                this.$refs.form.clear();
                this.validateForm = {
                  musicname: '',
                };
            },
            addSong(){
               console.log(this.form);
               const uri = '/api/song/create';
               this.axios.post(uri, this.form)
                .then((response) => {
                   this.$router.push({name: 'songs'});
               });
            },
        },
    }
</script>
