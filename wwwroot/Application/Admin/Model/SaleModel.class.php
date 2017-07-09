<?php
/**
 * Created by PhpStorm.
 * User: ln0713
 * Date: 2017/7/6
 * Time: 14:14
 */

namespace Admin\Model;


use Think\Model;

class SaleModel extends Model
{
    protected $_validate = array(
        array('title', 'require', '标题不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
//        array('prcie', 'require', '价格不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('tel', '/^[1][3,4,5,8,7]\d{9}$/', '电话号码不正确', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),

    );


    protected $_auto = array(
        array('add_time', NOW_TIME, self::MODEL_INSERT),

        array('status', '1', self::MODEL_INSERT),


    );


}