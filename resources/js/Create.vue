<template>
    <div class="col-md-11 container">
        <div>
            <div class="blog-card" >
                <div class="meta">
                    <div>
                        <img class="photo" :src="song.artworkUrl100" alt="ジャケット写真">
                    </div>
                    <ul class="details">
                        <li class="l-audio"><audio :src="song.previewUrl" controls></audio></li> <!--SP のみ-->
                    </ul>
                </div>
                <div class="description" style="position: relative;">
                    <h1 class="trackName"><a :href="song.trackViewUrl" target="_blank">{{ song.trackName }}</a></h1>
                    <h2 class="artistName"><a :href="song.artistViewUrl" target="_blank">{{ song.artistName }}</a></h2>
                    <p><a :href="song.collectionViewUrl" target="_blank">{{ song.collectionName }}</a></p>

                    <div class="m-card-text">
                        <mu-text-field v-model="song.kasi" placeholder="心動いたフレーズを記入。" multi-line :rows="6"></mu-text-field>
                        <mu-text-field v-model="song.comment" placeholder="コメントをしてください。" multi-line :rows="6"></mu-text-field>
                    </div>
                    <audio class="r-audio" :src="song.previewUrl" controls></audio> <!--PC のみ-->
                    <div class="m-card-actions">
                    <mu-button @click="addSong()" color="#cddc39" style="position: absolute; right: 30px; bottom: 30px;">
                        投稿する
                    </mu-button>
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
                song:{
                    artistName: '',
                    artistViewUrl: '',
                    collectionName: '',
                    collectionViewUrl: '',
                    artworkUrl100: '',
                    trackName: '',
                    trackId: '',
                    trackViewUrl: '',
                    previewUrl: '',
                    kasi: '',
                    comment: '',
                },
            }
        },
        created() {
            axios.get(`https://itunes.apple.com/search?term=${this.$route.params.trackId}&media=music&country=jp&lang=ja_jp`)
                .then((response) => {
                    this.song.artistName = response.data.results[0].artistName
                    this.song.artistViewUrl = response.data.results[0].artistViewUrl
                    this.song.collectionName = response.data.results[0].collectionName
                    this.song.collectionViewUrl = response.data.results[0].collectionViewUrl
                    this.song.artworkUrl100 = response.data.results[0].artworkUrl100
                    this.song.trackName = response.data.results[0].trackName
                    this.song.trackId = response.data.results[0].trackId
                    this.song.trackViewUrl = response.data.results[0].trackViewUrl
                    this.song.previewUrl = response.data.results[0].previewUrl
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
$color_white: #fff;
$color_prime: #cddc39;
$color_grey: #e2e2e2;
$color_grey_dark: #a2a2a2;

.search {
    margin-top:0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
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
      text-decoration: dotted underline
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
    display: flex;
    justify-content: center;
    align-items: center;
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
    color: $color_white;
    padding: 10px;
    width: 100%;
    font-size: .9rem;
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
  }
  h2 {
    position: relative;
    margin: 1rem 0 0;
  }
  .artistName {
      margin-top: 1.2rem;
      font-size: 1.5rem;
  }
  p {
      margin-top: 1rem;
  }
  .artistName:before {
        content: "";
        position: absolute;
        height: 3px;
        background: $color_prime;
        width: 50%;
        top: -0.75rem;
        border-radius: 3px;
  }
  &:hover {
    .details {
      left: 0%;
    }
  }

  @media (min-width: 640px) { //640px〜 →PC版
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
    .l-audio {
        display: none;
    }
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
}

</style>
