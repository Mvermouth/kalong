<template>
  <div class="content">

    <el-row style="zIndex:555;">
      <el-col  :xs="24" :lg="15">
    <h1 style="color:white;margin-top: 20px;">{{a.title}}</h1>

      <div v-html="a.content" class="ccc" ></div>
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
      </el-col>
    </el-row>
    <canvas id="canvas" class="canvas"></canvas>
    <!--<router-view></router-view>-->
    <div class="city"></div>
    <div class="moon"></div>
  </div>
</template>

<script>
  import Stars from '../../static/js/Star'
  import Moon from '../../static/js/Moon'
  import Meteor   from '../../static/js/Meteor'
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
    },
    mounted() {
      let canvas = document.getElementById('canvas'),
        ctx = canvas.getContext('2d'),
        width = window.innerWidth,
        height = window.innerHeight,
        //实例化月亮和星星。流星是随机时间生成，所以只初始化数组
        moon = new Moon(ctx, width, height),
        stars = new Stars(ctx, width, height, 200),
        meteors = [],
        count = 0

      canvas.width = width;
      canvas.height = height;

      const meteorGenerator = ()=> {
        //x位置偏移，以免经过月亮
        let x = Math.random() * width + 800
        meteors.push(new Meteor(ctx, x, height))

        //每隔随机时间，生成新流星
        setTimeout(()=> {
          meteorGenerator()

        }, Math.random() * 2000)
      }

      const frame = ()=>{
        count++
        count % 10 == 0 && stars.blink()
        moon.draw()
        stars.draw()

        meteors.forEach((meteor, index, arr)=> {
          //如果流星离开视野之内，销毁流星实例，回收内存
          if (meteor.flow()) {
            meteor.draw()
          } else {
            arr.splice(index, 1)
          }
        })
        requestAnimationFrame(frame)
      }
      meteorGenerator()
      frame()
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.content{
  width:78%;
  height: 930px;
  /*background: url("../../static/images/bg.jpg")no-repeat;*/
  /*background-size:100%;*/
  background: rgba(255, 255, 255, 0);
}
.el-row{
  background: rgba(255, 255, 255, 0);
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
.city {
  width: 100%;
  height: 260px;
  position: fixed;
  bottom: 0px;
  z-index: 3;
  background: url('../../static/images/city.png') no-repeat;
  background-size: cover;
}
.moon {
  width: 100px;
  height: 100px;
  position: absolute;
  left: 100px;
  top: 100px;
  background: url('../../static/images/moon.png') no-repeat;
  background-size: cover;
  z-index: 2;
}
  .canvas{
    position: absolute;
    top: 0;
    left: 20%;
  }
</style>
