<template>
  <div class="user">
    <h1>i am user</h1>
    <h1>{{$route.params.id}}</h1>
    <router-view></router-view>
  </div>
</template>

<script>
  export default {
    name: 'user',
    data () {
      return {

      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
