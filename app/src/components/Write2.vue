<template>
  <div class="w2">
    <el-row>
      <el-col  :lg="15">
    <h1>Write</h1>
    <div v-if="aa"> <div class="box">
      <el-input v-model="title" placeholder="请输入标题"></el-input>
      <el-select v-model="value4" clearable placeholder="请选择">
        <el-option
          v-for="item in options"
          :key="item.value"
          :label="item.label"
          :value="item.value">
        </el-option>
      </el-select>
    </div>
      <br>
      <div  class="wangEdito1r">
        <div id="editor" >

        </div>
        <br>

        <el-button type="success" class="okBtn" @click="getContent">我写完拉</el-button>
      </div></div>
    <div v-else><p>冒牌</p></div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import WangEditor from 'wangeditor'
  import axios from "axios"
//  var E = require('wangeditor')  // 使用 npm 安装
//  var E = require('/wangEditor.min.js')  // 使用下载的源码
  //  var editor = new WangEditor('div1');
  //  editor.create();
  console.log($)
  export default {
    name: 'w2',
    data () {
      return {
        ed: "",
        content: "",
        title: "",
        aa:"",
        options: [{
          value: '1',
          label: '日记'
        }, {
          value: '2',
          label: '感悟'
        }, {
          value: '3',
          label: '历程'
        }, {
          value: '4',
          label: '自己'
        }],
        value4: ''
      }
    },
    created(){
      console.log(document.cookie)
      this.aa=document.cookie == "name=123"? true:true
    },
    mounted(){
      var self = this;
      var editor = new WangEditor('#editor')
      editor.create()
//      var editor = new wangEditor('article');
//      editor.create();
//      console.log(document.cookie)
    },
    methods: {
      getContent(){
        var aaa = document.querySelector("#editor")
        console.log(aaa.innerHTML + this.title)
        axios.post('http://localhost/doWrite', {
          title: this.title,
          content:aaa.innerHTML,
          style:this.value4
        })
          .then(function (res) {
            console.log(res.data);
            if(res.data == "1"){
                console.log("okokok")
                console.log(this)
              this.open();
                //console.log(open)
            }
          }.bind(this))
          .catch(function (error) {
            console.log(error);
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
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .w2{
    width:78%;
    height: 930px;
    /*background: url("../../static/images/bg.jpg")no-repeat;*/
    /*background-size:100%;*/
  }
  .wangEdito1r {
    /*width: 60%;*/
    /*margin-left: 300px;*/
  }

  .box {
    width: 300px;
    margin-left: 60px;
  }
</style>
