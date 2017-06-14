<template>
  <div class="write">
    <h1>i am write</h1>
    <input type="text" name="title" class="title">
    <quill-editor class="quill" ref="myQuillEditor" v-model="message"></quill-editor>
    <p class="mes">{{message}}</p>
    <button @click="test">ok</button>
    <button @click="test2">ok2</button>
  </div>
</template>

<script>
  import axios from "axios";
  export default{
    name: 'write',
    data () {
      return {
        message:""
      }
    },
    methods:{
        test:()=>{
            console.log(this.$on);
            let c=document.querySelector(".mes").innerText;
            let t=document.querySelector(".title").value;
            console.log((c));
            //console.log(document.querySelector(".quill"));
//          axios.post('http://localhost/doWrite', {
//              title: t,
//              content: c,
//            })
//            .then(function (response) {
//              console.log(response);
//            })
//            .catch(function (error) {
//              console.log(error);
//            });
        },
      test2(){
            console.log("i am 2");
        console.log(this.message);
      }
    },
    mounted (){

    },
    created (){//只生肖一次
        //console.log(this.$on);
    },
    updated (){//监听
      //console.log(this.$data);
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .quill{
    width: 300px;
    height: 300px;
    float: left;
  }
</style>
