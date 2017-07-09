<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="Public/Wechat/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Public/Wechat/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid" id="content_list">
        <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row noticeList">
            <a href="<?php echo U('noticedetail?id='.$vo['id']);?>">
                <div class="col-xs-2">
                    <img class="noticeImg" src="<?php echo (get_cover($vo["cover_id"],'path')); ?>" />
                </div>
                <div class="col-xs-10">
                    <p class="title"><?php echo ($vo["title"]); ?></p>
                    <p class="intro"><?php echo ($vo["description"]); ?></p>
                    <p class="info">浏览: <?php echo ($vo["view"]); ?> <span class="pull-right"><?php echo date('Y-m-d',$vo['create_time']);?></span> </p>
                </div>
            </a>
        </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>


    </div>
    <div class="text-center">
        <button type="button" class="btn btn-info ajax-page">获取跟多~~~</button>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="Public/Wechat/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="Public/Wechat/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "/", //PATHINFO分割符
            "MODEL"  : ["2", "", "html"],
            "VAR"    : ["m", "c", "a"]
        }
    })();
</script>


<script type="application/javascript">
    var p = 1;
    var url = '/wechat.php?s=/Index/notice';
    var inner_url = '/wechat.php?s=/Index/noticedetail';
    $(function(){
        function getLocalTime(nS) {
            return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
        }
        $('.ajax-page').click(function () {
            if($(this).hasClass('ajax-page')){
                p = p+1;
                $.get(url+'/p/'+p,function(data){
                    console.debug(data);
                    if(data['status']==1){
                        list = data.data;
                        html = '';
                        for(index in list){
                            inner = list[index];

                            html += '<div class="row noticeList">\
                                            <a href="'+inner_url+'/id/'+inner['id']+'.html">\
                                                <div class="col-xs-2">\
                                                    <img class="img-rounded img-responsive" src="'+inner['cover_id']+'" />\
                                                </div>\
                                                <div class="col-xs-10">\
                                                    <p class="title">'+inner['title']+'</p>\
                                                    <p class="intro">'+inner['description']+'</p>\
                                                    <p class="info">浏览: '+inner['view']+' <span class="pull-right">'+getLocalTime(inner['create_time'])+'</span> </p>\
                                                </div>\
                                            </a>\
                                        </div>';
                        }
                        $('#content_list').append(html);
                    } else {
                        $('.ajax-page').html("没有跟多数据了！！").removeClass('ajax-page')
                    }
                })
            }
        });

    });
</script>
<!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->

</div>
</body>
</html>