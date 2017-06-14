<template>
  <div class="s">
    <h1>i am s</h1>
    <div class="mesbox">
      <ul v-for="c in ca">
        <li>{{c.title}}</li>
      </ul>
    </div>
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
            ca:""
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
            console.log(this.$route.params.num)
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
  .mesbox{
    width: 100px;
    height: 100px;
    border:1px solid red;
    background: red;
  }
</style>
