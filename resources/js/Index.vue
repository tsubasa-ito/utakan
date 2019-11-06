<template>
    <div class="col-md-11">
        <!-- index -->
        <h1>indexpage</h1>
        <div class="d-flex flex-wrap">
            <div v-for="(song, index) in songs" :key="index" class="pr-3">
                <div class="m-card mb-3">
                    <div class="card-img-flame">
                        <img class="card-img" :src="song.artwork_url100">
                        <div class="m-card-title">
                            <div class="card-music-name">{{ song.track_name }}</div>
                            <div class="card-artist-name">{{ song.artist_name }}</div>
                        </div>
                    </div>
                    <div class="m-card-text">
                        <blockquote>
                            <p>{{ song.kasi }}</p>
                        </blockquote>
                    </div>
                    <div class="m-header">
                        <div class="avatar pt-0">
                            <div class="avatar-img-flame">
                                <div class="avatar-img">
                                    <img class="card-img" src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png">
                                </div>
                            </div>
                            <div class="avatar-content">
                                <div class="avatar-name">song.user_name</div>
                                <div class="avatar-date">{{ song.updated_at }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="m-card-text">
                        {{ song.comment }}
                    </div>
                    <div class="m-card-actions">
                        <mu-button flat>Action 1</mu-button>
                        <mu-button flat>Action 2</mu-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                songs: [
                    {
                        track_id: '',
                        track_name: '',
                        artist_name: '',
                        artwork_url100: '',
                        kasi: '',
                        comment: '',
                        updated_at: '',
                    }
                ],
            }
        },
        created() {
            const uri = '/api/songs';
            this.axios.get(uri).then(response => {
               this.songs = response.data.data;
               console.log(response.data.data);
           });
       },
        mounted() {

            }
    }
</script>
<style lang="scss" scoped>
@import "resources/sass/app.scss";
    .select {
        width: 100%;
    }

    .time {
      font-size: 13px;
      color: #999;
    }
    .bottom {
      margin-top: 13px;
      line-height: 12px;
    }
    .button {
      padding: 0;
      float: right;
    }
    .image {
      width: 100%;
      display: block;
    }
    .clearfix:before,
    .clearfix:after {
        display: table;
        content: "";
    }
    .clearfix:after {
        clear: both
    }


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
        padding: 16px;
        background-color: rgba(0,0,0,.54);
    }
    .card-music-name {
        font-size: 24px;
        color: hsla(0,0%,100%,.87);
        line-height: 36px;
    }
    .card-artist-name {
        color: hsla(0,0%,100%,.54);
        font-size: 14px;
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


    .flex-wrapper {
      width: 100%;
      height: 56px;
      margin-top: 8px;
    }
    .flex-demo {
      width: 200px;
      height: 32px;
      background-color: #e0e0e0;
      text-align: center;
      line-height: 32px;
      margin-left: 8px;
    }
    .flex-wrapper:first-child {
      margin-top: 0;
    }
    .flex-demo:first-child {
      margin-left: 0;
    }
    blockquote {
        position: relative;
        padding: 10px 15px 10px 50px;
        box-sizing: border-box;
        font-style: italic;
        border: solid 2px #464646;
        color: #464646;
        border-radius: 0.5em;
    }

    blockquote:before{
        display: inline-block;
        position: absolute;
        top: 10px;
        left: 0;
        content: "“";
        font-family: sans-serif;
        color: rgba(68, 108, 207, 0.5);
        font-size: 75px;
        line-height: 1;
    }

    blockquote p {
        padding: 0;
        margin: 10px 0;
        line-height: 1.7;
    }

    blockquote cite {
        display: block;
        text-align: right;
        color: #888888;
        font-size: 0.8em;
    }
</style>
