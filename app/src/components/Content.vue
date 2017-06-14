<template>
  <div class="content">
    <h1>{{a.title}}</h1>

      <div v-html="a.content" class="ccc"></div>
    <div class="line"></div>
    <!--<h1>{{$route.params.id}}</h1>-->
    <h3>这是评论</h3>
    <ul v-for="c in a.comments">
      <li style="border-bottom:1px solid red;width:400px;">&nbsp;&nbsp;&nbsp;&nbsp;{{c.body}} <br><span style="color: pink;margin-left: 190px">{{c.date}}</span></li>
    </ul>
    <div class="box">
    <el-input
      type="textarea"
      :rows="2"
      placeholder="请输入内容"
      v-model="textarea">
    </el-input>
    </div>
    <el-button type="success" class="okBtn" @click="comment">提交评论</el-button>
    <router-view></router-view>
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    name: 'content',
    data () {
      return {
          a:"",
        textarea:""
      }
    },
    created () {
        console.log(this.$route.params.id)
      axios({
        method: 'get',
        url: 'http://localhost/one/'+this.$route.params.id,
      }).then((res)=>{
        console.log(res.data[0]);
        //res.data[0]
        this.a=res.data[0];
      })
    },
    methods:{
        comment(){
            if(this.textarea==""){
                alert("1")
                return fasle;
            }
          axios.post("http://localhost/doComments", {
            id:this.$route.params.id,
            comments:this.textarea
          }).then(function (res) {
            console.log(res)
          }.bind(this))
            .catch(function (error) {
              console.log(error);
            });
        }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.content{
  width:89%;
  height: 930px;
  background: url("../../static/images/bg.jpg")no-repeat;
  background-size:100%;
}
  .box{
    width: 300px;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left: 30px;
  }
  h1{
    text-align: center;
  }
  .line{
    width: 80%;
    height: 1px;
    border-top: 5px solid #cccc77;
  }
h3{
  background: rgba(111,226,6,.1);
  width: 1128px;
  margin-top:10px ;
  margin-bottom: 10px;
  margin-left: 20px;
  padding: 10px;
  text-align: center;
}
  .ccc{
    border: 3px solid #9cb945;
    border-radius: 30px;
    padding: 10px;
    width: 500px;
    margin: auto;
    background: palevioletred;
  }
  .okBtn{
    margin-left: 30px;
  }
</style>
