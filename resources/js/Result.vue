<template>
    <div class="col-md-11 container">
        <div class="search">
            <mu-text-field v-model="keyword" placeholder="曲名・歌手名などを入力" required></mu-text-field>
            <mu-button fab small color="primary">
                <mu-icon value="search"></mu-icon>
            </mu-button>
        </div>
        <div v-for="(result, index) in results" :key="index">
            <div v-if="result.trackId > 0" class="blog-card" >
                <div class="meta">
                    <div>
                        <img class="photo" :src="result.artworkUrl100" alt="ジャケット写真">
                    </div>
                    <ul class="details">
                        <li class="l-audio"><audio class="tsubasa" :src="result.previewUrl" controls></audio></li> <!--SP のみ-->
                    </ul>
                </div>
                <div class="description" style="position: relative;">
                    <h1 class="trackName"><a :href="result.trackViewUrl" target="_blank">{{ result.trackName }}</a></h1>
                    <h2 class="artistName"><a :href="result.artistViewUrl" target="_blank">{{ result.artistName }}</a></h2>
                    <p><a :href="result.collectionViewUrl" target="_blank">{{ result.collectionName }}</a></p>
                    <audio class="r-audio" :src="result.previewUrl" controls></audio> <!--PC のみ-->
                    <mu-button @click="select(index)" fab color="#cddc39" style="position: absolute; right: 30px; bottom: 30px;">
                        <mu-icon value="add"></mu-icon>
                    </mu-button>
                </div>
            </div>
            <div v-else></div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            keyword: '',
            axionsTime: undefined,
            results:[
                {
                    artistName: '',
                    artistViewUrl: '',
                    collectionName: '',
                    collectionViewUrl: '',
                    artworkUrl100: '',
                    trackName: '',
                    trackId: '',
                    trackViewUrl: '',
                    previewUrl: '',
                }
            ],
        }
    },
    methods: {
        select(index){
            console.log(this.results[index].trackId);
            clearInterval(this.axionsTime)
            this.$router.push(`/create/${this.results[index].trackId}`)
        },
    },
    created() {
        this.axionsTime = setInterval(
            function () {
                axios.get(`https://itunes.apple.com/search?term=${this.keyword}&media=music&country=jp&lang=ja_jp`)
                .then(function (response) {
                  this.results = response.data.results
                    console.log(this.keyword)
                }.bind(this))
            }.bind(this), 4000
        );
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
//   .trackName {
//       font-size:
//   }
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
        width: 20%;
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
