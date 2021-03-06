<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/8
 * Time: 11:05
 */

namespace Wechat\Controller;


class ServiceController extends WechatController
{
    public function index(){
        $page=0;
        $pagesize=2;
        $service=M('document');

        $list=$service->where('status=1 AND category_id=39')->limit($page,$pagesize)->select();
        $this->assign('list',$list);
        $p=I('get.p');
        if($p) {

            $list = $service->where('status=1 AND category_id=39')->limit(($p - 1) * $pagesize, $pagesize)->select();
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
    }

    public function detail($id=0){
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
            $this->meta_title = '服务详情';
            $this->display();

        }

    }
}