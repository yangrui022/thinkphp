<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 9:16
 */

namespace Wechat\Controller;


class RepairController  extends WechatController
{
    public function addrepair()
    {


        if (!is_login()) {

            return $this->error('你还没有登录', U('User/login'));
        }
        if (IS_POST) {
            $repair = M('repair');
            $data = $repair->create();
            $repair->repair_no = 'RE_' . rand(10000, 99999) . date('FD');
            $repair->status = 1;
            $repair->create_time=time();
            $repair->uid= session('user_auth')['uid'];
            if ($data) {

                $id = $repair->add();
                if ($id) {
                    $this->success('提交报修成功', U('index/my'));

                } else {
                    $this->error('提交报修失败');
                }
            } else {
                $this->error($repair->getError());
            }
        } else {
            $this->meta_title = '提交报修';
            $this->display();
        }
    }

    public function myrepair(){
        $page=0;
        $pagesize=1;
        $repair=M('repair');
        $uid= session('user_auth')['uid'];
        $list=$repair->where('uid='.$uid)->limit($page,$pagesize)->select();

        $this->assign('list',$list);
        $p=I('get.p');

        if($p) {

            $list = $repair->where('uid=' . $uid)->limit(($p - 1) * $pagesize, $pagesize)->select();

            if ($list) {
                $data = [
                    'status' => 1,
                    'data' => $list,

                ];
            } else {
                $data = ['status' => 0,

                ];


            }

            $this->ajaxReturn($data);
            $this->assign('list', $list);
        }
        $this->display();
    }

    public function detail($id=0){
        if($id){
            $info=M('repair')->where('id='.$id)->find();
            $this->assign('info',$info);
            $this->display();
        }

    }
}