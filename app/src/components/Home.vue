<template>
  <div class="home" id="home">
    <canvas id="canvas" class="canvas"></canvas>
    <el-row :gutter="2" style="zIndex:2 ">

    <h1>Vermouth</h1>
      <el-col  :lg="12">
    <div class="wenzhang">
      <h3 style="text-align: center;color:white">{{newEst.title}}</h3>
      <div class="con" style="color:white"><div v-html="newEst.content"></div></div>
    </div>
      </el-col>
        <el-col  :lg="11">
    <!--<div class="zuiin">-->
      <!--<el-table-->
        <!--:data="lastEst"-->
        <!--style="width: 100%;">-->
        <!--<el-table-column-->
          <!--prop="title"-->
          <!--label="标题"-->
          <!--width="540">-->
        <!--</el-table-column>-->
        <!--<el-table-column label="操作">-->
          <!--<template scope="scope">-->
            <!--<el-button-->
              <!--size="small"-->
              <!--@click="handleEdit(scope.$index, scope.row)">-->

                <!--查看-->

              <!--</el-button>-->
          <!--</template>-->
        <!--</el-table-column>-->
      <!--</el-table>-->
    <!--</div>-->
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
//  window.onload = function () {
//    var config = {
//      vx: 4,
//      vy: 4,
//      height: 2,
//      width: 2,
//      count: 150,
//      color: "0, 0, 0",
//      stroke: "0,0,0",
//      dist: 6000,
//      e_dist: 20000,
//      max_conn: 30
//    }
//    CanvasParticle(config);
//  }
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
    },
    mounted(){
      var canvas = document.querySelector('canvas'),
        ctx = canvas.getContext('2d')
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      ctx.lineWidth = .3;
      ctx.strokeStyle = (new Color(150)).style;

      // var mousePosition = {
      // 	x: 30 * canvas.width / 100,
      // 	y: 30 * canvas.height / 100
      // };
      var mousePosition = {
        x:  canvas.width - 100,
        y:  canvas.height - 60
      };

      var dots = {
        nb: 250,
        distance: 100,
        d_radius: 150,
        array: []
      };

      function colorValue(min) {
        return Math.floor(Math.random() * 255 + min);
      }

      function createColorStyle(r,g,b) {
        return 'rgba(' + r + ',' + g + ',' + b + ', 0.8)';
      }

      function mixComponents(comp1, weight1, comp2, weight2) {
        return (comp1 * weight1 + comp2 * weight2) / (weight1 + weight2);
      }

      function averageColorStyles(dot1, dot2) {
        var color1 = dot1.color,
          color2 = dot2.color;

        var r = mixComponents(color1.r, dot1.radius, color2.r, dot2.radius),
          g = mixComponents(color1.g, dot1.radius, color2.g, dot2.radius),
          b = mixComponents(color1.b, dot1.radius, color2.b, dot2.radius);
        return createColorStyle(Math.floor(r), Math.floor(g), Math.floor(b));
      }

      function Color(min) {
        min = min || 0;
        this.r = colorValue(min);
        this.g = colorValue(min);
        this.b = colorValue(min);
        this.style = createColorStyle(this.r, this.g, this.b);
      }

      function Dot(){
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;

        this.vx = -.5 + Math.random();
        this.vy = -.5 + Math.random();

        this.radius = Math.random() * 2;

        this.color = new Color();
      }

      Dot.prototype = {
        draw: function(){
          ctx.beginPath();
          ctx.fillStyle = this.color.style;
          ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
          ctx.fill();
        }
      };

      function createDots(){
        for(var i = 0; i < dots.nb; i++){
          dots.array.push(new Dot());
        }
      }

      function moveDots() {
        for(var i = 0; i < dots.nb; i++){

          var dot = dots.array[i];

          if(dot.y < 0 || dot.y > canvas.height){
            dot.vx = dot.vx;
            dot.vy = - dot.vy;
          }
          else if(dot.x < 0 || dot.x > canvas.width){
            dot.vx = - dot.vx;
            dot.vy = dot.vy;
          }
          dot.x += dot.vx;
          dot.y += dot.vy;
        }
      }

      function connectDots() {
        for(var i = 0; i < dots.nb; i++){
          for(var j = 0; j < dots.nb; j++){
            var i_dot = dots.array[i];
            var j_dot = dots.array[j];

            if((i_dot.x - j_dot.x) < dots.distance && (i_dot.y - j_dot.y) < dots.distance && (i_dot.x - j_dot.x) > - dots.distance && (i_dot.y - j_dot.y) > - dots.distance){
              if((i_dot.x - mousePosition.x) < dots.d_radius && (i_dot.y - mousePosition.y) < dots.d_radius && (i_dot.x - mousePosition.x) > - dots.d_radius && (i_dot.y - mousePosition.y) > - dots.d_radius){
                ctx.beginPath();
                ctx.strokeStyle = averageColorStyles(i_dot, j_dot);
                ctx.moveTo(i_dot.x, i_dot.y);
                ctx.lineTo(j_dot.x, j_dot.y);
                ctx.stroke();
                ctx.closePath();
              }
            }
          }
        }
      }

      function drawDots() {
        for(var i = 0; i < dots.nb; i++){
          var dot = dots.array[i];
          dot.draw();
        }
      }

      function animateDots() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        moveDots();
        connectDots();
        drawDots();

        requestAnimationFrame(animateDots);
      }

      //----------------------跟着鼠标动--------------------
      document.getElementById('home').addEventListener('mousemove', function(e){
        //console.log(e.pageX-300)
        mousePosition.x = (e.pageX-320);
        mousePosition.y = e.pageY;
      });

      document.getElementById('home').addEventListener('mouseleave', function(e){
        mousePosition.x = canvas.width / 2;
        mousePosition.y = canvas.height / 2;
      });
      //----------------------跟着鼠标动--------------------

      createDots();
      requestAnimationFrame(animateDots);
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
    /*background: rgba(0,0,0,.5);*/
    position: relative;
    background: rgba(7,17,27,0.95);
  }
  h1{
    color: white;
    margin: 20px;
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
    /*margin-top:20px;*/
  }
  .fuck{
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border-radius: 3px;
    border: 3px solid #ccc;
    transition: all .5s;
  }
  textarea:focus{
    background: rgba(255, 255, 255, .4);
    border: 3px solid #afa900;
  }
  .canvas{
    /*position: absolute;*/
    /*top: 0;*/
    /*left: 0;*/
    position: fixed;
    z-index: 1;
  }
  .el-button--success{
    background-color: #113812;
    border-color: white;
  }
</style>
