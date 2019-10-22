<template>
    <div>
        <p>{{ albums }}</p>
    </div>
</template>
<script>
export default {
  data: () => ({
    albums: [],
  }),
  created(){
        // const vm = this
        // axios.get(`http://www.uta-net.com/search/?Keyword=${this.$route.params.keyword}`)
        //     .then((response) => {
        //     console.log(response.data.results)
        //     vm.albums = response.data.results
        // });
        const vm = this
        axios.get(`http://api.musixmatch.com/ws/1.1/track.search?q_artist=justin%20bieber&apikey=ff85a9e764fab54af3ab72c3210745f1`)
            .then((response) => {
            console.log(response.data.results)
            vm.albums = response.data.results
        });
  }
};
</script>
