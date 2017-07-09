<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/9
 * Time: 19:10
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Page;

class ActiveController  extends AdminController
{

    public function index(){
        $list = M('active');
        //加载分页类
        import('ORG.Util.Page');
        $count=$list->where('status=1')->count();
        $page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数

        $show       = $page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $list->where('status=1')->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();


        $this->assign('list', $list);
        $this->assign('page', $show);

        $this->meta_title = '活动管理';
        $this->display();
    }
}