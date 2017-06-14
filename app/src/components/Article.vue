<template>
  <div class="article">
    <h1>i am article</h1>
    <div class="zuiin">
    <el-table
      :data="titles"
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
    <el-pagination class="pagina"
      small
      layout="prev, pager, next"
      :total="page"
      page-size="3"
      @current-change="currentChange">
    </el-pagination>
    <router-view></router-view>
  </div>
</template>
<script>
  import axios from 'axios';


  export default {
    name: 'article',
    data () {
      return {
        titles: "",
        page:""
      }
    },
    created () {
      axios({
        method: 'post',
        url: 'http://localhost/page/0',
      }).then((res) => {
        //console.log(res.data);
        this.titles = res.data;
      })
      axios({
        method: 'get',
        url: 'http://localhost/allNum',
      }).then((res) => {
        console.log(res.data);
        this.page=res.data
      })
    },
    methods:{
      currentChange(currentPage){
          console.log(typeof currentPage)
          axios({
            method: 'post',
            url: 'http://localhost/page/'+(currentPage-1),
          }).then((res) => {
            //console.log(res.data);
            this.titles = res.data;
          })
      },
      handleEdit(index,row){
        console.log(row)
        window.location.href="http://localhost:8080/#/article/"+row._id
      },
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .article{
    position: relative;
    width:89%;
    height: 930px;
    background: url("../../static/images/bg.jpg")no-repeat;
    background-size:100%;
  }
  li {
    cursor: pointer;
    width: 200px;
  }
  .pagina{
    position: absolute;
    top: 300px;
    left: 500px;
  }
  .list{
    position: absolute;
    top: 50px;
    left:320px;
  }
  .zuiin {
    position: absolute;
    top: 250px;
    right: 160px;
    width: 750px;
    height: 500px;
  }
</style>
