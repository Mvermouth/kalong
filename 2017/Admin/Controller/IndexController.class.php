<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       session(array());
        if(session('name') && session('name')=='vip' ){
            $this->display();
        }else{
            exit('sb');
        }
    }
//    function __destruct() {
//        parent::__construct();
//        session('name',null);
//    }
}