<template>
  <div id="app">
    <el-row :gutter="8">
    <el-col :span="5" class="nav">
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
      <!--<el-col :span="15" class="nav">-->
      <transition name="fade-out">
        <router-view class="v"></router-view>
      </transition>
      <!--</el-col>-->
    <!--</transition>-->
    </el-row>
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
body{
  overflow-y:hidden;
  overflow-x:hidden;
}
  li {
    list-style: none;
  }

  #app {
    width: 100%;
    height: 100%;
    background: rgba(7,17,27,1);
  }
  .el-menu--dark{
    background: rgba(7,17,27,0.95);
  }
  .nav {
    height: 1030px;
    /*width: 20%;*/
  }

  .el-menu-vertical-demo{
    height: 100%;
  }
  .v{
    /*width: 78%;*/
    float: left;

  }
  /*.fade-enter-active, .fade-leave-active {*/
    /*transition: opacity 1s*/
  /*}*/
  /*.fade-enter, .fade-leave-to !* .fade-leave-active in <2.1.8 *! {*/
    /*opacity: 0*/
  /*}*/
  .fade-out-enter-active, .fade-out-leave-active {
    transition: all .5s
  }
  .fade-out-enter {
    opacity: 0;
    transform: translateY(400px);
  }
  .fade-out-leave-active{
    opacity: 0;
    transform: translateY(-400px);
  }
</style>
