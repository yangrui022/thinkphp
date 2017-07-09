<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Wechat\Controller;
use OT\DataDictionary;
use function PHPSTORM_META\elementType;
use Think\Model;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends WechatController {

	//系统首页
    public function index(){


                 
        $this->display();
    }


    public function zushou(){

        $sale=M('sale');

        $list=$sale->where('status=1 AND type=1')->select();
        $list1=$sale->where('status=1 AND type=2')->select();

        $this->assign('list',$list);
        $this->assign('list1',$list1);
        $this->meta_title = '小区租售';
        $this->display();
    }

    public function zushoudetail($id=0){
        //获取发布者
        if($id){

            $info = M('sale')->find($id);

            $this->assign('info',$info);
            $this->meta_title = '租售详细';
            $this->display();
        }else{


        }

    }
    public function my(){
        if(!is_login()){

          return  $this->error('你还没有登录',U('User/login'));
        }
        $user=M('ucenter_member');

       $user_i= session('user_auth')['username'];

        $info=$user->find(['username='.$user_i]);


        $this->assign('info',$info);
        $this->display();
    }
    //小区通知
    public function notice(){

        $page=0;
        $pagesize=2;
        $notice=M('document');

        $list=$notice->where('status=1 AND category_id=2')->limit($page,$pagesize)->select();
        $this->assign('list',$list);
        $p=I('get.p');
        if($p) {

            $list = $notice->where('status=1 AND category_id=2')->limit(($p - 1) * $pagesize, $pagesize)->select();
            foreach ($list as &$lt){
                $picture=M('picture');
                $path_info= $picture->where('id='.$lt['cover_id'])->find();

                $path= $path_info['path'];
                $lt['cover_id']=$path;

            }
//

            if ($list) {
                $data = [
                    'status' => 1,
                    'data' => $list,
                ];
            } else {
                $data = ['status' => 0];

            }

            $this->ajaxReturn($data);
            $this->assign('list', $list);

        }
        $this->display();
//        $notice=M('document');
//
//
//        $list=$notice->where('status=1 AND category_id=2')->select();
//        $this->assign('list',$list);
//        $this->meta_title = '小区通知';
//        $this->display();
    }

    public function noticedetail($id=0){

        if($id){

            $infos=M('document');
            $info=$infos->find($id);
//            dump($infos->view);exit;
           $infos->view+=1;
//           var_dump($view);exit;
           $infos->where('id='.$id)->save();


            $doc_info=M('document_article')->find($id);


            $this->assign('info',$info);
            $this->assign('doc_info',$doc_info);
            $this->meta_title = '通知详情';
            $this->display();
        }else{


        }

    }

}