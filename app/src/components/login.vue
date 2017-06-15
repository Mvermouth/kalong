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
    <div class="log">
      <div style="margin: 20px;"></div>
      <el-form :label-position="labelPosition" label-width="80px" :model="formLabelAlign">
        <el-form-item label="名称">
          <el-input v-model="formLabelAlign.name"></el-input>
        </el-form-item>
        <el-form-item label="密码">
          <el-input v-model="formLabelAlign.pass" type="password"></el-input>
        </el-form-item>
      </el-form>
      <el-button type="success" class="okBtn" @click="login">我写完拉</el-button>
      <!--<button class="ok" @click="login">ok</button>-->
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
    width:78%;
    height: 930px;
    background: url("../../static/images/bg.jpg")no-repeat;
    overflow: hidden;
    /*background-size:100%;*/
  }
  .log{
    width: 400px;
    margin: 300px auto;
  }
  .okBtn{
    margin-left: 45px;
  }
</style>
