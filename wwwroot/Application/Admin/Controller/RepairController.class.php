<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 10:36
 */

namespace Admin\Controller;




use Think\Page;

class RepairController extends AdminController
{
    public function index(){

        $list = M('repair');
        //加载分页类
        import('ORG.Util.Page');
        $count=$list->count();
        $page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数

        $show       = $page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $list->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();


        $this->assign('list', $list);
        $this->assign('page', $show);

        $this->meta_title = '报修管理';
        $this->display();
    }

    public function detail($id=0){
        if($id){

            $info=M('repair')->where('id='.$id)->find();
            $this->assign('info', $info);

            $this->display();
        }


    }

}