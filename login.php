<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>登录</title>
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
      name="viewport"
    />
    <meta
      name="generator"
      content=""
      data-variable="https://breeze.cn/muban/M1156012/359/|cn||||M1156012"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./static/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="./static/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="./static/css/lo.css" />
  </head>
  <style></style>
  <body>
    <div class="container met-head">
      <div class="row">
        <div class="col-xs-6 col-sm-6 logo">
          <ul class="list-none">
            <li>
              <a href="" class="met-logo"
                ><img src="./static/image/1506052119.png"
              /></a>
            </li>

            <li>会员登录</li>
          </ul>
        </div>

        <div class="col-xs-6 col-sm-6 user-info">
          <ol class="breadcrumb pull-right">
            <li><a href="index.php" title="返回首页">返回首页</a></li>
          </ol>
        </div>
      </div>
    </div>
    <div class="login_index met-member">
      <div class="container">
        <form method="post" action="./static/php/login.php">
          <input type="hidden" name="gourl" value="" />
          <div class="form-group">
            <input
              id="login_username"
              type="text"
              name="login_username"
              required
              class="form-control"
              placeholder="用户名/邮箱/手机"
              data-bv-notempty="true"
              data-bv-notempty-message="此项不能为空"
            />
          </div>
          <div class="form-group">
            <input
              id="login_pwd"
              type="password"
              name="login_pwd"
              required
              class="form-control"
              placeholder="密码"
              data-bv-notempty="true"
              data-bv-notempty-message="此项不能为空"
            />
          </div>

          <!-- <div class="login_link"><a href="">忘记密码？</a></div> -->
          <button
            class="btn btn-lg btn-primary btn-block"
            type="submit"
            name="submit"
          >
            登录
          </button>

          <a class="btn btn-lg btn-info btn-block" href="register.php"
            >没有账号？现在去注册</a
          >
        </form>
      </div>
    </div>

    <footer class="container met-footer">
      <p>商洛旅游信息网站</p>
    </footer>
    <script src="./static/js/seajs.js"></script>
    <script>
      var pub = './',
        tem = './',
        page_type = 'login';
      seajs.config({
        paths: {
          pub: pub.substring(0, pub.length - 1),
          tem: tem.substring(0, tem.length - 1),
        },
        alias: {
          jquery: 'jquery_seajs.js',
        },
      });
      //seajs.use("tem/js/own"); //载入入口模块
    </script>
    <!-- <script src="./static/js/login.js"></script> -->
  </body>
</html>
