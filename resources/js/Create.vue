<template>
    <div class="col-md-8 col-md-offset-2">
        <!-- create -->
        <h1>createpage</h1>
        <div class="col-md-8">
            <div class="m-card mb-3">
                <div class="card-img-flame">
                    <img class="card-img" :src="song.artworkUrl100" alt="songimage">
                    <div class="m-card-title">
                        <div class="card-music-name">{{song.trackName}}</div>
                        <div class="card-artist-name">{{ song.artistName }}</div>
                    </div>
                </div>
                <div class="m-header">
                    <div class="avatar">
                        <div class="avatar-img-flame">
                            <div class="avatar-img">
                                <img class="card-img" src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png">
                            </div>
                        </div>
                        <div class="avatar-content">
                            <div class="avatar-name">avatar-name</div>
                            <div class="avatar-date">avatar-date</div>
                        </div>
                    </div>
                </div>
                <div class="m-card-text">
                        <mu-text-field v-model="song.kasi" placeholder="心動いた歌詞を記入。" multi-line :rows="3" :rows-max="6"></mu-text-field>
                        <mu-text-field v-model="song.comment" placeholder="コメントをしてください。" multi-line :rows="3" :rows-max="6"></mu-text-field>
                </div>
                <div class="m-card-actions">
                    <mu-button flat @click="addSong">Action 1</mu-button>
                    <mu-button flat>Action 2</mu-button>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                song:{
                    artistName: '',
                    artworkUrl100: '',
                    trackName: '',
                    trackId: '',
                    kasi: '',
                    comment: '',
                },
            }
        },
        created() {
            axios.get(`https://itunes.apple.com/search?term=${this.$route.params.trackId}&media=music&country=jp&lang=ja_jp`)
                .then((response) => {
                    this.song.artistName = response.data.results[0].artistName
                    this.song.artworkUrl100 = response.data.results[0].artworkUrl100
                    this.song.trackName = response.data.results[0].trackName
                    this.song.trackId = response.data.results[0].trackId
                    console.log(this.song);
                });
        },
        methods: {
            addSong(){
               console.log(this.song.trackId);
               const uri = `/api/create/` + this.song.trackId;
               this.axios.post(uri, this.song)
                .then((response) => {
                   this.$router.push({name: 'songs'});
               });
            },
        },
    }
</script>
<style lang="scss" scoped>
@import "resources/sass/app.scss";
    .m-card {
        width: 100%;
        max-width: 375px;
        margin: 0 auto;
        background-color: #fff;
        position: relative;
        border-radius: 2px;
        box-shadow: 0 2px 1px -1px rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 1px 3px 0 rgba(0,0,0,.12);
    }
    .m-header {
        padding: 16px;
        padding-bottom: 0;
        font-weight: 500;
        position: relative;
        white-space: nowrap;
    }
    .avatar {
        display: flex;
        padding: 16px;
        padding-bottom: 0;
        font-weight: 500;
        position: relative;
        white-space: nowrap;
    }
    .avatar-img-flame {
        width: 40px;
        height: 40px;
        font-size: 20px;
        margin-right: 16px;
    }
    .avatar-img {
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
    }
    .avatar-content{
        display: inline-block;
        vertical-align: top;
        white-space: normal;
        padding-right: 90px;
    }
    .avatar-name {
        font-size: 15px;
        color: rgba(0,0,0,.87);
    }
    .avatar-date {
        font-size: 14px;
        color: rgba(0,0,0,.57);
    }
    .card-img-flame {
        position: relative;
    }
    .card-img {
        width: 100%;
        max-width: 100%;
        min-width: 100%;
        display: block;
    }
    .m-card-title {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 12px;
        background-color: rgba(0,0,0,.54);
    }
    .card-music-name {
        font-size: 20px;
        color: hsla(0,0%,100%,.87);
        line-height: 30px;
    }
    .card-artist-name {
        font-size: 14px;
        color: hsla(0,0%,100%,.54);
    }
    .m-card-text {
        padding: 20px;
        font-size: 14px;
        color: rgba(0,0,0,.87);
    }
    .m-card-actions {
        padding: 8px;
        padding-top: 0;
        position: relative;
    }
</style>
