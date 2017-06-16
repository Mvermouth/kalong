<template>
  <div class="login">
    <el-row :gutter="0">
      <el-col  :lg="24">
    <h1>Login</h1>
    <!--<div v-if="l">-->
      <!--<input type="text" name="name" id="name" v-model="name">-->
      <!--<input type="password" name="password" id="password" v-model="pass">-->
    <!--</div>-->
    <!--<div v-else>-->
      <!--<p>{{status}}</p>-->
    <!--</div>-->
    <!--<div class="log">-->
      <!--<div style="margin: 20px;"></div>-->
      <!--<el-form :label-position="labelPosition" label-width="80px" :model="formLabelAlign">-->
        <!--<el-form-item label="名称">-->
          <!--<el-input v-model="formLabelAlign.name"></el-input>-->
        <!--</el-form-item>-->
        <!--<el-form-item label="密码">-->
          <!--<el-input v-model="formLabelAlign.pass" type="password"></el-input>-->
        <!--</el-form-item>-->
      <!--</el-form>-->
      <!--<el-button type="success" class="okBtn" @click="login">我写完拉</el-button>-->
      <!--&lt;!&ndash;<button class="ok" @click="login">ok</button>&ndash;&gt;-->
    <!--</div>-->
        <div class="login-box">
          <div class="logo"></div>
          <div class="ipunt-wrap">
            <label for="ID" class="icon-id"></label>
            <input type="text" id="ID" placeholder="账号" >
          </div>
          <div class="ipunt-wrap">
            <label for="password" class="icon-password"></label>
            <input type="password" id="password" placeholder="密码" >
          </div>
          <div class="d">
            <p><a href="#">
              LOGIN
            </a></p>
          </div>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import axios from "axios";
  export default {
    name: 'login',
    data () {
      return {
        name: "",
        pass: "",
        status: "请登录",
        l:true,
        labelPosition: 'right',
        formLabelAlign: {
          name: '',
          pass: '',
        }
      }
    },
    methods: {
      login(){
        axios.post("http://localhost/dologin", {
          usename: this.formLabelAlign.name,
          password: this.formLabelAlign.pass
        }).then(function (res) {
            console.log(res)
          if(res.data.status=="1"){
                this.open()
            window.location.href="http://localhost:8080/#/write2"
            //document.cookie=res.data.ses;
          }
//          this.status = response.data == "1" ? "登陆成功" : "no";
//          this.l=false;
          //document.cookie = this.status=="ok" ? "ok":"";
          document.cookie="name="+123;
        }.bind(this))
          .catch(function (error) {
            console.log(error);
          });
      },
      tes(){
        axios.post("http://localhost/status", {

        }).then(function (res) {
          console.log(res.data)
        }.bind(this)) .catch(function (error) {

        });
      },
      open() {
        const h = this.$createElement;

        this.$notify({
          title: '标题名称',
          message: h('p', { style: 'color: teal'}, '成功啦！')
        });
      },
    },
    mounted: function(){
        console.log("i am mmmm")
      console.log(document.cookie)
      console.log(document.cookie ? "zhen":"jia")
//        this.status=document.cookie=="ok"?"已经登陆":"请登录"
//        this.l=document.cookie=="ok" ? false : true
//        console.log(this.status)
//        console.log(this.l)
      axios.post("http://localhost/status", {

      }).then(function (res) {
        console.log(res.data)
      }.bind(this)) .catch(function (error) {

        });
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .login{
    width:79%;
    height: 1030px;
    background: url("../../static/images/bg1.jpg")no-repeat;
    overflow: hidden;
    /*background: rgba(7,17,27,0.95);*/
    /*background-size:100%;*/
  }
  .log{
    width: 400px;
    margin: 300px auto;
  }
  .okBtn{
    margin-left: 45px;
  }
  #login {
    height: 100%;
    overflow: hidden;
    position: relative;
  }
  .login-box {
    width: 600px;
    padding: 50px;
    margin: 40px auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    z-index: 100001;
  }
  .login-box .logo{
    width: 270px;
    height: 108px;
    margin-bottom: 20px;
    /*background: url('../assets/images/logo.png') no-repeat;*/
    background-size: cover;
  }
  .ipunt-wrap label{
    display: inline-block;
    width: 25px;
    height: 25px;
    vertical-align: middle;
    margin-right: 10px;
    background-size: cover;
  }
  .ipunt-wrap input{
    border: none;
    outline: none;
    background: none;
    border-bottom: 1px solid #fff;
    margin-top: 30px;
    width: 200px;
    height: 30px;
    line-height: 30px;
    /* text-align: center; */
    color: #fff;
    font-size: 14px;
    padding: 0 5px;
    /*	box-shadow:0px 0px 0px red;*/
  }
  @font-face {
    font-family: 'Iceland';
    font-style: normal;
    font-weight: 400;
    src: local('Iceland'), local('Iceland-Regular'), url(http://themes.googleusercontent.com/static/fonts/iceland/v3/F6LYTZLHrG9BNYXRjU7RSw.woff) format('woff');
  }

  .d p{
    text-align:center;
    font-size:7em;
    margin:20px 0 20px 0;
  }

  .d a{
    text-decoration:none;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
  }

  .d p:nth-child(1) a{
    font-size:0.7em;
    color:#228DFF;
    font-family:Iceland;
    margin-left: 44px;
  }
  .d p:nth-child(1) a:hover{
    -webkit-animation: neon2 1.5s ease-in-out infinite alternate;
    -moz-animation: neon2 1.5s ease-in-out infinite alternate;
    animation: neon2 1.5s ease-in-out infinite alternate;
  }
  @-webkit-keyframes neon2 {
    from {
      text-shadow: 0 0 10px #fff,
      0 0 20px  #fff,
      0 0 30px  #fff,
      0 0 40px  #228DFF,
      0 0 70px  #228DFF,
      0 0 80px  #228DFF,
      0 0 100px #228DFF,
      0 0 150px #228DFF;
    }
    to {
      text-shadow: 0 0 5px #fff,
      0 0 10px #fff,
      0 0 15px #fff,
      0 0 20px #228DFF,
      0 0 35px #228DFF,
      0 0 40px #228DFF,
      0 0 50px #228DFF,
      0 0 75px #228DFF;
    }
  }
  .d p a:hover{
    color:#ffffff;
  }
</style>
