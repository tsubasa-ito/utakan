<template>
    <div class="col-md-11">
        <div>
            <p>検索キーワード：『 {{ this.$route.params.keyword }} 』</p>
        </div>
        <div class="d-flex flex-wrap">
            <div v-for="(result, index) in results" :key="index" class="pr-3">
                <div class="m-card mb-3">
                    <div class="card-img-flame">
                        <img class="card-img" :src="result.artworkUrl100">
                        <div class="m-card-title">
                            <div class="card-music-name">{{ result.trackName }}</div>
                            <div class="card-artist-name">{{ result.artistName }}</div>
                        </div>
                    </div>
                    <div class="m-card-actions">
                        <mu-button flat @click="select(index)">CREATE</mu-button>
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
                results:[
                    {
                        artistName: '',
                        collectionName: '',
                        artworkUrl100: '',
                        trackName: '',
                        trackId: '',
                    }
                ],
            }
        },
        created() {
            axios.get(`https://itunes.apple.com/search?term=${this.$route.params.keyword}&media=music&country=jp&lang=ja_jp`)
                .then((response) => {
                    console.log(response.data.results)
                    this.results = response.data.results
                });
        },
        methods: {
            select(index){
                console.log(this.results[index].trackId);
                this.$router.push(`/create/${this.results[index].trackId}`)
            }
        },
    }
</script>
<style lang="scss" scoped>
    .m-card {
        width: 100%;
        max-width: 375px;
        margin: 0 auto;
        background-color: #fff;
        position: relative;
        border-radius: 2px;
        box-shadow: 0 2px 1px -1px rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 1px 3px 0 rgba(0,0,0,.12);
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
    .m-card-actions {
        padding: 8px;
        padding-top: 0;
        position: relative;
    }
</style>
