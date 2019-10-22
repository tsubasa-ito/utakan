<template>
    <div>
        <p>{{ keyword }}</p>
        <p>{{ result }}</p>
        <el-input
            placeholder="Type something"
            v-model="keyword">
            <i slot="prefix" class="el-input__icon el-icon-search"></i>
        </el-input>
        <el-button @click="search" type="primary" icon="el-icon-search">Search</el-button>
    </div>
</template>
<script>
    export default {
        data() {
            return {
              keyword: '',
              result: '',
            }
        },
        methods: {
            search() {
                // 検索を実行する
                this.$router.push(`/songs/${this.keyword}`);
           }
        }
    }
</script>
