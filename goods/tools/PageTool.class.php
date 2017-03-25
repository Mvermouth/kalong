<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/24
 * Time: 16:16
 * 分页 三个变量2个公式
 * 总条目为total，每页条数为perpage，总页数 total/perpage向上取整seil
 * 第perapage显示 第几条信息
 */
defined('ACC')||exit('no acc');
class PageTool{
    protected $total=0; //总条数
    protected $perpage=10; //每页几个
    protected $page=7;  //当前页
    public function __construct($total,$perpage=false,$page=false){
        $this->total=$total;
        if($perpage){
            $this->perpage=$perpage;
        }
        if($page){
            $this->page=$page;
        }
    }
    public function show(){
        //首先得到总页数
        $cnt=ceil($this->total/$this->perpage);
        $url=$_SERVER['REQUEST_URI'];
       //print_r($url);
        $parse=parse_url($url);
        print_r($parse);
        if(isset($parse['query'])) {
            parse_str($parse['query'], $param);
        }
        echo "<hr/>";
        print_r($param);
        //确保没有page单元，就是保留page意外的参数
        unset($param['page']);
        echo "<hr/>";
        print_r($param);
        echo "<hr/>";

        print_r($param);
        $url=$parse['path']."?";
        if(!empty($param)){
            $param=http_build_query($param);
            $url=$url.$param."&";
        }
        echo $url;
        //页面导航
        //计算页码
        $nav=array();
        echo "<hr/>";
        $nav[0]="<span class='page_now'>" .$this->page.'</span>';
        echo "<hr/>";
        echo $cnt;
        echo "<hr/>";
        for($left=$this->page-1,$right=$this->page+1;($left>1 || $right < $cnt) && count($nav) < 5;){
            if($left>=1){
                array_unshift($nav,'<a href="'.$url.'page='.$left.'"'.'>'.$left.'</a>');
                $left-=1;
            }
            if($right <= $cnt){
                array_push($nav,'<a href="'.$url.'page='.$right.'"'.'>'.$right.'</a>');
                $right+=1;
            }
            echo "<hr/>nav";
            echo count($nav);
        }
        echo "<hr/>";
        echo $left;
        echo "<hr/>";
        echo $right;
        echo "<hr/>";
        echo count($nav);
        echo "<hr/>";
        return implode('-',$nav);
    }

}
$page=isset($_GET['page']) ? $_GET['page'] : 1;
$p=new PageTool(100,10,$page);
echo $p->show();
