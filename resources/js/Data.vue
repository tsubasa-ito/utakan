<template>
    <div>
    <p v-for="tracklist in track_list" :key="tracklist.id">{{ tracklist.track.track_name }}</p>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                track_list: [
                    {
                        track: {
                            track_name:''
                        }
                    }
                ]
            }
        },
        created() {
           const uri = '/api/data';
           this.axios.get(uri).then(response => {
               this.track_list = response.data.data.message.body.track_list;
               console.log(response.data.data.message.body.track_list);
           });
        },
        methods: {
        },
    }
</script>
