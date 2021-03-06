<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>注册</title>
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
  <style>
    /* .met-member{ background-color:;}  修改*/
    /* .login_index{ background-color:;  }  修改*/
  </style>
  <body>
    <div class="container met-head">
      <div class="row">
        <div class="col-xs-6 col-sm-6 logo">
          <ul class="list-none">
            <li>
              <a href="#" class="met-logo"
                ><img src="./static/image/1506052119.png"
              /></a>
            </li>

            <li>会员注册</li>
          </ul>
        </div>

        <div class="col-xs-6 col-sm-6 user-info">
          <ol class="breadcrumb pull-right">
            <li><a href="index.php" title="返回首页">返回首页</a></li>
          </ol>
        </div>
      </div>
    </div>

    <div class="register_index met-member">
      <div class="container">
        <form
          class="form-register met-form"
          method="post"
          action="./static/php/register.php"
        >
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input
                type="text"
                name="username"
                id="username"
                required
                class="form-control"
                placeholder="会员名"
                data-bv-remote="true"
                data-bv-remote-url=""
                data-bv-remote-message="用户名已存在"
                data-bv-notempty="true"
                data-bv-notempty-message="此项不能为空"
                data-bv-stringlength="true"
                data-bv-stringlength-min="2"
                data-bv-stringlength-max="30"
                data-bv-stringlength-message="用户名必须在2-30个字符之间"
              />
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"
                ><i class="fa fa-unlock-alt"></i
              ></span>
              <input
                type="password"
                id="password"
                name="password"
                required
                class="form-control password"
                placeholder="密码"
                data-bv-notempty="true"
                data-bv-notempty-message="此项不能为空"
                data-bv-identical="true"
                data-bv-identical-field="confirmpassword"
                data-bv-identical-message="两次密码输入不一致"
                data-bv-stringlength="true"
                data-bv-stringlength-min="6"
                data-bv-stringlength-max="30"
                data-bv-stringlength-message="密码必须在6-30个字符之间"
              />
            </div>
          </div>

          <div class="form-group pwd">
            <div class="input-group">
              <span class="input-group-addon"
                ><i class="fa fa-unlock-alt"></i
              ></span>
              <input
                type="password"
                name="pwd"
                id="pwd"
                required
                data-password="password"
                class="form-control"
                placeholder="重复密码"
                data-bv-identical="true"
                data-bv-identical-field="password"
                data-bv-identical-message="两次密码输入不一致"
                data-bv-notempty-message="此项不能为空"
              />
            </div>
          </div>

          <div class="row login_code">
            <div class="col-xs-8">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"
                    ><i class="fa fa-shield"></i
                  ></span>
                  <input
                    type="text"
                    name="code"
                    required
                    class="form-control"
                    placeholder="验证码"
                    data-bv-notempty="true"
                    data-bv-notempty-message="此项不能为空"
                  />
                </div>
              </div>
            </div>
            <div class="col-xs-4 login_code_img">
              <img
                src="./static/image/entrance.jpg"
                class="img-responsive"
                id="getcode"
                title="看不清？点击更换验证码"
                align="absmiddle"
              />
            </div>
          </div>
         <script>

           
    
         </script>
          <!-- <div class="form-group met-more text-muted">
            <hr />
            <span>更多资料</span>
          </div> -->

          <!-- <div class="form-group met-form-choice">
            <div class="row">
              <div class="met-form-file-title col-md-3">公司名称</div>
              <div class="col-md-9">
                <input
                  type="text"
                  name="info_100"
                  class="form-control"
                  value=""
                  placeholder="公司名称"
                />
              </div>
            </div>
          </div> -->

          <!-- <div class="form-group met-form-choice">
            <div class="row">
              <div class="met-form-file-title col-md-3">公司传真</div>
              <div class="col-md-9">
                <input
                  type="text"
                  name="info_103"
                  class="form-control"
                  value=""
                  placeholder="公司传真"
                />
              </div>
            </div>
          </div> -->

          <!-- <div class="form-group met-form-choice">
            <div class="row">
              <div class="met-form-file-title col-md-3">公司联系地址</div>
              <div class="col-md-9">
                <input
                  type="text"
                  name="info_106"
                  class="form-control"
                  value=""
                  placeholder="公司联系地址"
                />
              </div>
            </div>
          </div> -->

          <!-- <div class="form-group met-form-choice">
            <div class="row">
              <div class="met-form-file-title col-md-3">公司邮政编码</div>
              <div class="col-md-9">
                <input
                  type="text"
                  name="info_109"
                  class="form-control"
                  value=""
                  placeholder="公司邮政编码"
                />
              </div>
            </div>
          </div> -->

          <!-- <div class="form-group met-form-choice">
            <div class="row">
              <div class="met-form-file-title col-md-3">公司网址</div>
              <div class="col-md-9">
                <input
                  type="text"
                  name="info_112"
                  class="form-control"
                  value=""
                  placeholder="公司网址"
                />
              </div>
            </div>
          </div> -->

          <button
            class="btn btn-lg btn-primary btn-block"
            type="submit"
            id="btn"
            name="submit"
          >
            立即注册
          </button>
          <div class="login_link"><a href="login.php">已有账号？</a></div>
        </form>
      </div>
    </div>

    <footer class="container met-footer">
      <p>商洛旅游信息网站</p>
    </footer>
    <script src="./static/js/seajs.js"></script>
    <script>
      var pub = '',
        tem = '',
        page_type = 'register';
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
