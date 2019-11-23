<template>
    <div class="container">
        <h4>music search</h4>
        <input type="text" v-model="keyword" label="検索のフォーム" required>
        <mu-button fab color="red" @click="search">
            <mu-icon value="edit"></mu-icon>
        </mu-button>
    </div>
</template>
<script>
export default {
  data: () => ({
    keyword: ''
  }),
  methods: {
    search(){
      this.$router.push(`/result/${this.keyword}`)
    }
  }
};
</script>
