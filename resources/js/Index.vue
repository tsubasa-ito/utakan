<template>
    <div class="col-md-11 container">
        <div class="blog-card" v-for="(song, index) in songs" :key="index">
            <div class="meta" style="display: flex; justify-content: center; align-items: center;">
                <div >
                    <img class="photo" alt="ジャケット写真" :src="song.artwork_url100">
                </div>
                <ul class="details">
                    <li class="l-detail"><a :href="song.trackViewUrl" target="_blank">{{ song.track_name }}</a></li>
                    <li class="l-detail"><a :href="song.artistViewUrl" target="_blank">{{ song.artist_name }}</a></li>
                    <li class="l-detail"><a :href="song.collectionViewUrl" target="_blank">{{ song.collectionName }}</a></li>
                    <li class="l-audio"><audio :src="song.previewUrl" controls></audio></li> <!--SP のみ-->
                </ul>
            </div>
            <div class="description">
                <blockquote>{{ song.kasi }}</blockquote>
                <p class="line">{{ song.comment }}</p>
                <div class="setting">
                    <audio class="r-audio" :src="song.previewUrl" controls></audio> <!--PC のみ-->
                    <mu-menu cover placement="bottom-end" @click="open = !open">
                        <mu-button icon color="#cddc39">
                          <mu-icon value="more_horiz"></mu-icon>
                        </mu-button>
                        <mu-list slot="content">
                          <mu-list-item button>
                              <!-- routerlinkでEditページへ -->
                            <mu-list-item-title>Edit</mu-list-item-title>
                          </mu-list-item>
                          <mu-list-item button>
                              <!-- どこにも飛ばさず、そのまま削除（なんかポップアップしても良いかも） -->
                            <mu-list-item-title>Delete</mu-list-item-title>
                          </mu-list-item>
                        </mu-list>
                    </mu-menu>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                open: false,
                songs: [
                    {
                        track_id: '',
                        track_name: '',
                        artist_name: '',
                        artwork_url100: '',
                        artistViewUrl: '',
                        collectionName: '',
                        collectionViewUrl: '',
                        trackViewUrl: '',
                        previewUrl: '',
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
$color_white: #fff;
$color_prime: #cddc39;
$color_grey: #e2e2e2;
$color_grey_dark: #a2a2a2;


// PC・SP共通のCSS
.blog-card {
  display: flex;
  flex-direction: column;
  margin: 1rem auto;
  box-shadow: 0 3px 7px -1px rgba(#000, .1);
  margin-bottom: 1.6%;
  background: $color_white;
  line-height: 1.4;
  font-family: sans-serif;
  border-radius: 5px;
  overflow: hidden;
  z-index: 0;
  a {
    color: inherit;
    &:hover {
      color: $color_prime;
    }
  }
  &:hover {
    .photo {
      transform: scale(1.3) rotate(3deg);
    }
  }
  .meta {
    position: relative;
    z-index: 0;
    height: 200px;
  }
  .photo {
    width: 150px;
    height: 150px;
    background-size: cover;
    background-position: center;
    transition: transform .2s;
  }
  .details,
  .details ul {
    margin: auto;
    padding: 0;
    list-style: none;
  }

  .details {
    position: absolute;
    top: 0;
    bottom: 0;
    left: -100%;
    margin: auto;
    transition: left .2s;
    background: rgba(#000, .6);
    color: $color_white;
    padding: 10px;
    width: 100%;
    font-size: .9rem;
    a {
      text-decoration: dotted underline
    }
    ul li {
      display: inline-block;
    }
    li {
        margin-bottom: 10px;
    }
  }
  .description {
    padding: 1rem;
    background: $color_white;
    position: relative;
    z-index: 1;

    blockquote {
    position: relative;
    padding: 10px 15px 10px 60px;
    box-sizing: border-box;
    font-style: italic;
    background: #f5f5f5;
    color: #777777;
    border-left: 4px solid $color_prime;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.14);
    }
    blockquote:before{
    display: inline-block;
    position: absolute;
    left: 0;
    content: "“";
    font-family: sans-serif;
    color: $color_prime;
    font-size: 50px;
    line-height: 1;
    }
    blockquote p {
    padding: 0;
    margin: 7px 0;
    line-height: 1.7;
    }
    blockquote cite {
    display: block;
    text-align: right;
    color: #888888;
    font-size: 0.9em;
    }
    .user-name {
      font-family: Poppins, sans-serif;
      font-weight: 300;
      color: $color_grey_dark;
    }
  }
  p {
    margin: 1rem 0 0;
  }
  .line {
      margin-top: 1.2rem;
  }
  &:hover {
    .details {
      left: 0%;
    }
  }
.l-detail{
    display: flex;
    justify-content: center;
    align-items: center;
}


  @media (min-width: 640px) {
    flex-direction: row;
    max-width: 700px;
    .meta {
      flex-basis: 30%;
      height: auto;
    }
    .description {
      flex-basis: 60%;
      &:before {
        transform: skewX(-3deg);
        content: "";
        background: #fff;
        width: 30px;
        position: absolute;
        left: -10px;
        top: 0;
        bottom: 0;
        z-index: -1;
      }
    }
    &.alt {
      flex-direction: row-reverse;
      .description {
        &:before {
          left: inherit;
          right: -10px;
          transform: skew(3deg)
        }
      }
      .details {
        padding-left: 25px;
      }
    }
    .setting {
        display: flex;
        margin-top: 1rem;
    }
    .r-audio {
        margin-right: 1rem;
    }
    .l-audio {
            display: none;
    }
  }

  @media (max-width: 768px) { //maxが768pxのとき→SP版
    .r-audio {
        display: none;
    }
    .l-audio {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .details {
        background: rgba(#000, .6);
    }
    .mu-menu {
        display: block;
        text-align: right;
    }
  }
}
</style>
