import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
//import {api} from "../api/api"
Vue.use(Vuex);

export default new Vuex.Store({
  state:{
    article:[]
  },
  mutations:{
    //add: (state)=> state.count++,
    GETALL:(state, articleInfo)=>{
        state.article=articleInfo
    }
  },
  actions:{
    getAll({commit},api){
        commit('GETALL',api);
    }
    // getAll (commit) {
    //   axios({
    //     method: 'get',
    //     url: 'http://localhost/all',
    //   }).then(function (res) {
    //     commit('GETALL',res);
    //   })
    // }
  },
  getters:{
    filterRiji: function (state) {
      let article = state.article.filter((item)=>{
        if(item.style=="1"){
          return item;
        }
      });
      return article;
    },
    filterThink:function (state) {
      let article = state.article.filter((item)=>{
        if(item.style=="2"){
          return item;
        }
      });
      return article;
    },
    filterCourse:function (state) {
      let article = state.article.filter((item)=>{
        if(item.style=="3"){
          return item;
        }
      });
      return article;
    },
    filterMe:function (state) {
      let article = state.article.filter((item)=>{
        if(item.style=="4"){
          return item;
        }
      });
      return article;
    }
  }
})
