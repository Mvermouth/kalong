<template>
  <div class="vx">
    <el-row>
      <el-col>
        <el-menu theme="dark" :default-active="activeIndex" class="el-menu-demo" mode="horizontal"
                 @select="handleSelect" router="true">
          <el-menu-item index="/vx/style/1">日记</el-menu-item>
          <el-menu-item index="/vx/style/2">感悟</el-menu-item>
          <el-menu-item index="/vx/style/3">历程</el-menu-item>
          <el-menu-item index="/vx/style/4">自己</el-menu-item>
          <el-menu-item index="/vx">所有</el-menu-item>
        </el-menu>
        <p></p>
      </el-col>
    </el-row>
    <div v-if="show">
    <el-row>
      <!--<el-col :lg="4">1</el-col>-->
      <el-col :offset="9" :lg="3">
        <div v-for="t in titles">
          <div class="line">
            <router-link :to="'/article/'+t._id">{{t.title}}</router-link>
          </div>
        </div>
        <el-pagination class="pagina"
                       small
                       layout="prev, pager, next"
                       :total="page"
                       page-size="3"
                       @current-change="currentChange">
        </el-pagination>
      </el-col>
    </el-row>
    </div>
    <div v-else>
    <transition name="fade">
      <router-view class="s"></router-view>
    </transition>
    </div>
  </div>
</template>

<script>
  //import {api} from "../api/api";
  import {api2} from "../api/api2";
  import api3 from "../api/api3";
  import store from "../store/index.js";
  import axios from "axios";
  export default {
    name: 'vx',
    data () {
      return {
        //apii:api.art
        //xixi:api
        titles: "",
        activeIndex: '1',
        page:"",
        show:true
      }
    },
    computed: {
      act(){

      },
      act2(){

      }
    },
    methods: {
      one(){
        this.cao = this.$store.getters.filterRiji;
      },
      two(){
        this.cao = this.$store.getters.filterThink;
      },
      three(){
        this.cao = this.$store.getters.filterCourse;
      },
      four(){
        this.cao = this.$store.getters.filterMe;
      },
      all(){
        axios.get(api3.getAll)
          .then(function (res) {
            this.$store.dispatch('getAll', res.data);
            this.cao = store.state.article
          }.bind(this))
          .catch(function (error) {
            console.log(error);
          });
      },
      handleSelect(key, keyPath) {
          //console.log(key);
        if(key=="/vx/style/1" ||key=="/vx/style/2" ||key=="/vx/style/3" ||key=="/vx/style/4"){
            this.show=false
        }else{
            this.show=true
        }
      },
      currentChange(currentPage){
        console.log(typeof currentPage)
        axios({
          method: 'post',
          url: 'http://localhost/page/'+(currentPage-1),
        }).then((res) => {
          //console.log(res.data);
          this.titles = res.data;
        })
      }
    },
    created: function () {
      console.log(api3)
      axios({
        method: 'post',
        url: 'http://localhost/page/0',
      }).then((res) => {
        console.log(res.data);
        this.titles = res.data;
      })
      axios({
        method: 'get',
        url: 'http://localhost/allNum',
      }).then((res) => {
        console.log(res.data);
        this.page=res.data
      })
      //this.show=true
    },
    watch: {

    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  .fade-enter-active, .fade-leave-active {
    transition: opacity 1s
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */
  {
    opacity: 0
  }

  .vx {
    width: 79%;
    height: 1030px;
    background: url("../../static/images/bg3.jpg")no-repeat;
    background-position: bottom;
    overflow: hidden;
  }
  .slide-left-enter, .slide-right-leave-active {
    opacity: 0;
    -webkit-transform: translate(30px, 0);
    transform: translate(30px, 0);
  }
  .slide-left-leave-active, .slide-right-enter {
    opacity: 0;
    -webkit-transform: translate(-30px, 0);
    transform: translate(-30px, 0);
  }
  a{
    text-decoration: none;
    transition: all 1s;
    color: #7c7b7b;
  }
  .line{
    border-bottom: 2px solid white;
    width: 230px;
    padding-bottom: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top:20px;
  }
  .t{

  }
  a:hover{
    color: white;
    transition: all 1s;
  }
  .el-row{
    /*margin-top: 60px;*/
  }
  .pagina{
    position: absolute;
    top: 300px;
    /*left: 500px;*/
  }
</style>
