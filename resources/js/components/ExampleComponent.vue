<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                        <p>{{albums}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            albums: [],
        }),
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            // const axios_obj = axios.create({
            // headers: {
            //     'ContentType': 'application/json',
            //     'X-Requested-With': 'XMLHttpRequest'
            // },
            // responseType: 'json'
            // });

            // axios_obj.get(`http://api.musixmatch.com/ws/1.1/track.search?q_artist=justin%20bieber&apikey=ff85a9e764fab54af3ab72c3210745f1`)
            //     .then(response_get => {
            //     console.log(response_get.data);
            // });

            const vm = this
            axios.get(`http://127.0.0.1:8000/http://api.musixmatch.com/ws/1.1/track.search?q_artist=justin%20bieber&apikey=ff85a9e764fab54af3ab72c3210745f1`)
                .then((response) => {
                console.log(response.data)
                vm.albums = response.data
            });
        }
    }
</script>
