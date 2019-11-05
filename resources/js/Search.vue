<template>
    <div>
        <h4>music search</h4>
        <input type="text" v-model="keyword" label="検索のフォーム" required>
        <button @click="search">検索する</button>
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
