<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <!-- Bootstrap -->
    <link href="/Public/Wechat/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Wechat/css/style.css" rel="stylesheet">

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


    <title>微信物业管理系统</title>

</head>
<body>
<div class="main">
    <!-- 头部 -->
    <div class="container-fluid">
        <div id="top-alert" class="fixed alert alert-error bg-danger" style="display: none;margin-top: 10%;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
    </div>


    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/Index/index.html" class="navbar-link">首页</a></p>
            </div><div class="col-xs-3">
            <p class="navbar-text"><a href="/Service/listIndex.html" class="navbar-link">服务</a></p>
        </div><div class="col-xs-3">
            <p class="navbar-text"><a href="/Find/all.html" class="navbar-link">发现</a></p>
        </div><div class="col-xs-3">
            <p class="navbar-text"><a href="/Center/index.html" class="navbar-link">我的</a></p>
        </div>	</div>
    </nav>
    <!--导航结束-->

    <!-- /头部 -->

    <!-- 主体 -->

    <div class="container-fluid" style="margin-top: 5%;">
        <form action="<?php echo U('addrepair');?>" method="post">
            <div class="form-group">
                <label>您的姓名(必填):</label>
                <input type="text" name="username" class="form-control" placeholder="您的姓名" required autofocus/>
            </div>
            <div class="form-group">
                <label>您的电话(必填):</label>
                <input type="tel" name="tel" class="form-control" placeholder="您的电话" required/>
            </div>
            <div class="form-group">
                <label>您的地址(必填):</label>
                <input type="text" name="address" class="form-control" placeholder="您的地址" required/>
            </div>
            <div class="form-group">
                <label>标题(必填):</label>
                <input type="text" name="title" placeholder="标题" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>内容(详细描述需要报修的内容):</label>
                <textarea name="content" type="text" class="form-control"></textarea>
            </div>
            <!--<div class="form-group">-->
            <!--<div><a href="#"><span class="glyphicon glyphicon-plus onlineUpImg"></span></a></div>-->
            <!--<label>图片(最多上传5张,可不上传):</label>-->
            <!--</div>-->
            <p>
                <label for="inputCaptcha" class="sr-only">验证码</label>
                <input type="text" name="verify" id="inputCaptcha" class="form-control" placeholder="请输入验证码" required>
            </p>
            <div class="controls" style="margin-bottom: 20px;">
                <img class="verifyimg reloadverify" alt="点击切换" onclick="this.src='/Wechat.php?s=/User/verify.html'" src="<?php echo U('User/verify');?>" style="cursor:pointer;height: 40px;">
            </div>
            <div class="form-group">
                <button class="btn btn-primary onlineBtn">确认提交</button>
            </div>
        </form>
    </div>


    <!-- /主体 -->

    <!-- 底部 -->

    <!-- 底部
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/Public/Wechat/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/Public/Wechat/bootstrap/js/bootstrap.min.js"></script>

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
    <!-- 用于加载js代码 -->
    <!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
    <div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->

    </div>

    <!-- /底部 -->
</div>
</body>
</html>