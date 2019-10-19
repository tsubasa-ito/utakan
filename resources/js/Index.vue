<template>
    <div class="col-md-8 col-md-offset-2">
        <!-- index -->
        <h1>indexpage</h1>
        <p>
            <router-link :to="{ name: 'create' }">記事作成</router-link>
        </p>
        <div v-for="card in cards" :key="card.id" class="col-md-8">
            <div class="m-card mb-3">
                <div class="card-img-flame">
                    <img class="card-img" src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png">
                    <div class="m-card-title">
                        <div class="card-music-name">card-img-music-name</div>
                        <div class="card-artist-name">card-img-artist-name</div>
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
                            <div class="avatar-date">avatara-date</div>
                        </div>
                    </div>
                </div>
                <div class="m-card-text">
                    散落在指尖的阳光，我试着轻轻抓住光影的踪迹，它却在眉宇间投下一片淡淡的阴影。
                    调皮的阳光掀动了四月的心帘，温暖如约的歌声渐起。
                    似乎在诉说着，我也可以在漆黑的角落里，找到阴影背后的阳光，
                    找到阳光与阴影奏出和谐的旋律。我要用一颗敏感赤诚的心迎接每一缕滑过指尖的阳光！
                </div>
                <div class="m-card-actions">
                    <mu-button flat>Action 1</mu-button>
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
                currentDate: new Date(),
                cards: [
                    {
                        title: "タイトル1",
                        name: "ユーザー名1",
                    },
                    {
                        title: "タイトル2",
                        name: "ユーザー名2",
                    },
                ]
            }
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
</style>
