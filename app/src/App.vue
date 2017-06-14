<template>
  <div id="app">
    <el-col :span="4" class="nav">
      <el-menu default-active="2" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose" theme="dark" router="true">
        <el-menu-item index="/">Home</el-menu-item>
        <el-menu-item index="/art/all">Article</el-menu-item>
        <el-menu-item index="/user">User</el-menu-item>
        <el-menu-item index="/write">Write</el-menu-item>
        <el-menu-item index="/write2">Write2</el-menu-item>
        <el-menu-item index="/vx">vx</el-menu-item>
        <el-menu-item index="/login">Login</el-menu-item>
        <el-menu-item index="/ele">ele</el-menu-item>
      </el-menu>
    </el-col>
    <!--<transition name="fade">-->
      <router-view class="v"></router-view>
    <!--</transition>-->
  </div>
</template>


<script>
  export default {
    name: 'app',
    methods: {
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      }
    }
  };
</script>

<style>
  * {
    padding: 0;
    margin: 0;
  }

  li {
    list-style: none;
  }

  #app {
    width: 1920px;
    height: 100%;
  }

  .nav {
    height: 930px;
    width: 10%;
  }

  .el-menu-vertical-demo{
    height: 100%;
  }
  .v{
    float: left;

  }
  /*.fade-enter-active, .fade-leave-active {*/
    /*transition: opacity 1s*/
  /*}*/
  /*.fade-enter, .fade-leave-to !* .fade-leave-active in <2.1.8 *! {*/
    /*opacity: 0*/
  /*}*/
</style>
