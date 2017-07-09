<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

  <!-- Bootstrap -->
  <link href="/Public/wechat/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/Public/wechat/css/style.css" rel="stylesheet">

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
        <p class="navbar-text"><a href="/Index/index.html" class="navbar-link">首</a></p>
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

  <div class="container-fluid">
    <form class="login-form" action="<?php echo U('User/register');?>" method="post">
      <h2 class="form-signin-heading">用户注册</h2>
      <p>
        <label for="inputUsername" class="sr-only">用户名</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="用户名" required autofocus>
      </p>
      <p>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>
      </p>
      <p>
        <label for="inputrePassword" class="sr-only">确认密码</label>
        <input type="password" name="repassword" id="inputrePassword" class="form-control" placeholder="确认密码" required>
      </p>
      <p>
        <label for="inputEmail" class="sr-only">邮箱</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="邮箱" required>
      </p>
      <p>
        <label for="inputCaptcha" class="sr-only">验证码</label>
        <input type="text" name="verify" id="inputCaptcha" class="form-control" placeholder="请输入验证码" required>
      </p>
      <div class="controls" style="margin-bottom: 20px;">
        <img class="verifyimg reloadverify" alt="点击切换" onclick="this.src='/wechat.php?s=/User/verify.html'" src="<?php echo U('verify');?>" style="cursor:pointer;height: 40px;">
      </div>
      <p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
      </p>
    </form>
    <p class="text-right"><a href="/User/login.html">已有账号，直接登录</a></p>
  </div>


  <!-- /主体 -->

  <!-- 底部 -->

  <!-- 底部
  ================================================== -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/Public/wechat/jquery-1.11.2.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/Public/wechat/bootstrap/js/bootstrap.min.js"></script>

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
<script type="text/javascript">
    (function(){
        var tab_tit  = document.getElementById('think_page_trace_tab_tit').getElementsByTagName('span');
        var tab_cont = document.getElementById('think_page_trace_tab_cont').getElementsByTagName('div');
        var open     = document.getElementById('think_page_trace_open');
        var close    = document.getElementById('think_page_trace_close').childNodes[0];
        var trace    = document.getElementById('think_page_trace_tab');
        var cookie   = document.cookie.match(/thinkphp_show_page_trace=(\d\|\d)/);
        var history  = (cookie && typeof cookie[1] != 'undefined' && cookie[1].split('|')) || [0,0];
        open.onclick = function(){
            trace.style.display = 'block';
            this.style.display = 'none';
            close.parentNode.style.display = 'block';
            history[0] = 1;
            document.cookie = 'thinkphp_show_page_trace='+history.join('|')
        }
        close.onclick = function(){
            trace.style.display = 'none';
            this.parentNode.style.display = 'none';
            open.style.display = 'block';
            history[0] = 0;
            document.cookie = 'thinkphp_show_page_trace='+history.join('|')
        }
        for(var i = 0; i < tab_tit.length; i++){
            tab_tit[i].onclick = (function(i){
                return function(){
                    for(var j = 0; j < tab_cont.length; j++){
                        tab_cont[j].style.display = 'none';
                        tab_tit[j].style.color = '#999';
                    }
                    tab_cont[i].style.display = 'block';
                    tab_tit[i].style.color = '#000';
                    history[1] = i;
                    document.cookie = 'thinkphp_show_page_trace='+history.join('|')
                }
            })(i)
        }
        parseInt(history[0]) && open.click();
        (tab_tit[history[1]] || tab_tit[0]).click();
    })();
</script>