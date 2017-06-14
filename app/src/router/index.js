import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Article from '@/components/Article'
import User from '@/components/User'
import UseDetail from '@/components/UseDetail'
import Content from '@/components/Content'
import Write from '@/components/Write'
import Write2 from '@/components/Write2'
import Login from "@/components/Login"
import vx from "@/components/vx"
import Ele from "@/components/Ele"
import Style from "@/components/style"
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },{
      path: '/art/all',
      component: Article,
    },{
      path: '/article/:id',
      name: 'Content',
      component: Content,
    },{
      path: '/user',
      name: 'User',
      component: User,
    },{
      path: '/user/:id',
      name: 'User',
      component: User,
      children:[{
        path:"detail",
        component: UseDetail
      }]
    },{
      path: '/write',
      name: 'Write',
      component: Write,
    },{
      path:"/write2",
      component:Write2
    },{
      path:"/login",
      component:Login
    },{
      path:"/vx",
      component:vx,
      children:[{
        path:"style/:num",
        component: Style
      }]
    },{
      path:"/ele",
      component:Ele
    }
  ]
})
