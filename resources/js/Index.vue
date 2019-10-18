<template>
    <div class="col-md-8 col-md-offset-2">
        <!-- index -->
        <h1>indexpage</h1>
        <p>
            <router-link :to="{ name: 'create' }">記事作成</router-link>
        </p>
    </div>
</template>
<script>
    export default {
        data() {
            return {

            }
        },
        mounted() {

        }
    }
</script>
