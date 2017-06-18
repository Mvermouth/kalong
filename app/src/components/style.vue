<template>
  <div class="s">
    <!--<div class="mesbox">-->
      <!--<ul v-for="c in ca">-->
        <!--<li>{{c.title}}</li>-->
      <!--</ul>-->
    <!--</div>-->
    <el-row>
      <!--<el-col :lg="4">1</el-col>-->
      <el-col :offset="9" :lg="3">
        <div v-for="c in ca">
          <div class="line">
            <router-link :to="'/article/'+c._id">{{c.title}}</router-link>
          </div>
        </div>
      </el-col>
    </el-row>

  </div>
</template>
<script>
  import api3 from "../api/api3";
  import store from "../store/index.js";
  import axios from "axios";
  export default{
      name:"s",
      data () {
          return {
            ca:"",
            te:""
          }
      },
    created:function(){
      //console.log(this.$route.params.num)
      this.all()
      //this.ca=this.$store.getters.filterThink;
    },
    methods:{
      all(){
        axios.get(api3.getAll)
          .then(function (res) {
            this.$store.dispatch('getAll' , res.data);
            //console.log(this.$route.params.num)
            switch (this.$route.params.num){
              case "1":this.ca=this.$store.getters.filterRiji;
                break;
              case "2":this.ca=this.$store.getters.filterThink;
                break;
              case "3":this.ca=this.$store.getters.filterCourse;
                break;
              case "4":this.ca=this.$store.getters.filterMe;
                break;
            }
            //this.ca=store.state.article
            //this.ca=this.$store.getters.filterThink;
          }.bind(this))
          .catch(function (error) {
            console.log(error);
          });
      }
    },
    watch:{
      "$route": "all"
    }
  }
</script>
<style scoped>
  .s{
    /*display: flex;*/
    /*justify-content: center;*/
    /*align-items: center;*/
  }
  .mesbox{
    width: 100px;
    height: 100px;
    border:1px solid red;
    background: red;
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
    margin-top: 60px;
  }
</style>
