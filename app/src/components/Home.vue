<template>
  <div class="home">
    <el-row :gutter="2">

    <h1>Vermouth</h1>
      <el-col  :lg="12">
    <div class="wenzhang">
      <h3 style="text-align: center">{{newEst.title}}</h3>
      <div class="con"><div v-html="newEst.content"></div></div>
    </div>
      </el-col>
        <el-col  :lg="11">
    <div class="zuiin wow pulse">
      <el-table
        :data="lastEst"
        style="width: 100%;">
        <el-table-column
          prop="title"
          label="标题"
          width="540">
        </el-table-column>
        <el-table-column label="操作">
          <template scope="scope">
            <el-button
              size="small"
              @click="handleEdit(scope.$index, scope.row)">

                查看

              </el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
    <div class="box">
      <h3>评论:</h3>
      <!--<el-input-->
        <!--type="textarea"-->
        <!--:rows="2"-->
        <!--placeholder="请输入评论"-->
        <!--v-model="textarea">-->
      <!--</el-input>-->
      <textarea id="" cols="50" rows="10" class="fuck" v-model="textarea"  placeholder="请输入评论"></textarea>
      <el-button type="success" class="okBtn" @click="comment">提交评论</el-button>
    </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import axios from "axios";
  window.onload = function () {
    var config = {
      vx: 4,
      vy: 4,
      height: 2,
      width: 2,
      count: 150,
      color: "0, 0, 0",
      stroke: "0,0,0",
      dist: 6000,
      e_dist: 20000,
      max_conn: 30
    }
    CanvasParticle(config);
  }
  export default {
    name: 'home',
    data () {
      return {
        lastEst: "",
        newEst: "",
        textarea:""
      }
    },
    created(){
      axios({
        method: 'get',
        url: 'http://localhost/last',
      }).then((res) => {
        console.log(res);
        this.newEst = res.data.f,
          this.lastEst = res.data.r.splice(0,3)
      })
    },
    methods:{
      handleEdit(index,row){
          console.log(row)
          window.location.href="http://localhost:8080/#/article/"+row._id
      },
      comment(){
        if(this.textarea==""){
          this.open4();
          return fasle;
        }
        axios.post("http://localhost/doComments", {
          id:this.newEst._id,
          comments:this.textarea
        }).then(function (res) {
          this.textarea=""
          this.open();
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
      open4() {
        this.$notify({
          title: '警告',
          message: '不能为空！',
          type: 'warning'
        });
      },
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .home {
    width: 78%;
    height: 930px;
    /*padding:20px;*/
    /*background: url("../../static/images/bg.jpg")no-repeat;*/
    /*background-size:100%;*/
    background: rgba(0,0,0,.5);
  }
  .el-col{
    /*width: 100%;*/
  }

  .wenzhang {
    /*position: absolute;*/
    /*top: 50px;*/
    /*left: 300px;*/
    /*width: 550px;*/
    /*height: 500px;*/
    margin: 20px;
  }

  .con {
    margin: auto;
    border: 3px solid #ccc;
    border-radius: 30px;
    padding: 10px;
    margin-top:30px;
  }

  .zuiin {
    /*position: absolute;*/
    /*top: 250px;*/
    /*right: 160px;*/
    /*width: 750px;*/
    /*height: 500px;*/
  }
  .box{
    /*width: 400px;*/
    /*position: absolute;*/
    /*top: 500px;*/
    /*right: 160px;*/
  }
  .okBtn{
    margin-top:20px;
  }
  .fuck{
    background: rgba(0,0,0,.5);
    color: white;
    border-radius: 3px;
    border: 3px solid red;
  }
</style>
