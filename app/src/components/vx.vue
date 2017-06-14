<template>
  <div class="vx">
    <p>{{act}}</p>
    <p>{{act2}}</p>
    <!--<p>{{cao}}</p>-->
    <!--<ul v-for="c in cao">-->
      <!--<li>{{c.title}}</li>-->
    <!--</ul>-->
    <!--<p>{{apii}}</p>-->
    <!--<p>{{xixi}}</p>    -->
    <button @click="one">日记</button>
    <button @click="two">感悟</button>
    <button @click="three">历程</button>
    <button @click="four">自己</button>

    <router-link to="vx/style/1">日记</router-link>
    <router-link to="vx/style/2">感悟</router-link>
    <router-link to="vx/style/3">历程</router-link>
    <router-link to="vx/style/4">自己</router-link>
    <br>
    <router-link to="1">日记</router-link>
    <router-link to="2">感悟</router-link>
    <router-link to="3">历程</router-link>
    <router-link to="4">自己</router-link>
      <router-view class="s"></router-view>
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
        cao:""
      }
    },
    computed: {
      act(){

//         axios.get(api.getall)
//         .then(function (res) {
//           console.log(res.data)
//           this.$store.dispatch('getAll' ,res.data);
//           return store.state.article
//         }.bind(this))
//         .catch(function (error) {
//           console.log(error);
//         });


         //return this.$store.getAll(api);
//       this.$store.dispatch('getAll' , api);
//       return store.state.article
//        this.$store.dispatch('getAll');
//        return store.state.article


        //console.log(api)
      },
      act2(){
//        this.$store.dispatch('getAll',api2);
//        return store.state.article
      }
    },
    methods:{
        one(){
          this.cao=this.$store.getters.filterRiji;
        },
        two(){
          this.cao=this.$store.getters.filterThink;
        },
        three(){
          this.cao=this.$store.getters.filterCourse;
        },
        four(){
          this.cao=this.$store.getters.filterMe;
        },
        all(){
          axios.get(api3.getAll)
            .then(function (res) {
              this.$store.dispatch('getAll' , res.data);
              this.cao=store.state.article
            }.bind(this))
            .catch(function (error) {
              console.log(error);
            });
      }
    },
    created:function(){
        console.log(api3)
//      axios.get(api3.getAll)
//        .then(function (res) {
//          this.$store.dispatch('getAll' , res.data);
//          this.cao=store.state.article
//        }.bind(this))
//        .catch(function (error) {
//          console.log(error);
//        });
      this.all();

    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
  /*.fade-enter-active, .fade-leave-active {*/
  /*transition: opacity 1s*/
  /*}*/
  /*.fade-enter, .fade-leave-to !* .fade-leave-active in <2.1.8 *! {*/
  /*opacity: 0*/
  /*}*/
</style>
