<?php
/**
 * Created by PhpStorm.
 * User: ln0713
 * Date: 2017/7/6
 * Time: 14:22
 */

namespace Admin\Controller;


use Think\Page;

class SaleController extends AdminController
{
    public function index(){

        $list = M('Sale');
        //加载分页类
        import('ORG.Util.Page');
        $count=$list->where('status=1')->count();
        $page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数

        $show       = $page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $list->where('status=1')->order('add_time')->limit($page->firstRow.','.$page->listRows)->select();


        $this->assign('list', $list);
        $this->assign('page', $show);

        $this->meta_title = '租售管理';
        $this->display();
    }

    //添加
    public function add(){

        if(IS_POST){

            $Sale = D('Sale');
            $data = $Sale->create();

           $Sale->name =session('user_auth')['username'];


            if($data){

                $id = $Sale->add();

                if($id){
                    $this->success('新增成功', U('index'));
                    //记录行为
                    action_log('update_sale', 'sale', $id, UID);
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Sale->getError());
            }
        } else {
            $this->meta_title = '新增出租';
            $this->display();
        }
    }

    //删除
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('Sale')->where($map)->delete()){
            //记录行为
            action_log('update_sale', 'sale', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

    //修改
    public function edit($id = 0){
        if(IS_POST){
            $sale = D('Sale');
            $data = $sale->create();

            $sale->name =session('user_auth')['username'];

            if($data){
//                $id = $sale->add();
                if($sale->save()){
                    //记录行为
                    action_log('update_sale', 'sale', $data['id'], UID);
                    $this->success('编辑成功', U('index'));

                } else {
                    $this->error('编辑失败');
                }

            } else {
                $this->error($sale->getError());
            }
        } else {
            $info = array();

            /* 获取数据 */
            $info = M('Sale')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }

//            $pid = I('get.pid', 0);
//            //获取父导航
//            if(!empty($pid)){
//                $parent = M('Sale')->where(array('id'=>$pid))->field('name')->find();
//                $this->assign('parent', $parent);
//            }
//
//            $this->assign('pid', $pid);
//            dump($info);exit;
            $this->assign('info', $info);
            $this->meta_title = '编辑租售';
            $this->display();
        }
    }


}