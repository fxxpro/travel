<?php
  include('./static/php/conn.php');
  $data=$_SESSION['userInfo'];

if(isset($_POST['submit'])){
   
    $id=$_POST['id'];
    $newPassword=$_POST['new_password'];
    $oldPassword=$_POST['old_password'];
    $pwd=$_POST['pwd'];
    if(strlen($newPassword)<6){
        echo '<script>alert("错误:密码不能低于6位");</script>';
        header("refresh:0;url=../../../changeUser.php"); 
        exit();
    }
    if($newPassword==$pwd){
            $che=mysqli_query($conn,"select * from register where id='$id'");
            $data=mysqli_fetch_array($che);
            if($oldPassword!==$data['password']){
                echo '<script>alert("旧密码输入错误!");</script>';
                header("refresh:0;url=../../../changeUser.php"); 
                exit();
            }
            if($newPassword==$oldPassword){
                echo '<script>alert("新旧密码不能一致!");</script>';
                header("refresh:0;url=../../../changeUser.php"); 
                exit();
            }
            $sql="update register set password='$newPassword',pwd='$pwd' where id=$id";
            $res=mysqli_query($conn,$sql);
            if($res){
                 
                unset($_SESSION['userInfo']);
                echo '<script>alert("修改成功!");</script>';
                header("refresh:0;url=../../login.php");
                exit();
            }else{
                echo '<script>alert("对不起!修改失败");</script>';
                header("refresh:0;url=../../../changeUser.php");
                exit();
            }
      }else{
        echo '<script>alert("两次密码不一致");</script>';
        header("refresh:0;url=../../changeUser.php");
        exit();
     }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>修改密码</title>
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

            <li>会员修改密码</li>
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
          action="./changeUser.php"
        >
        <input type="hidden" name="id" value=<?php if($data){ echo $data['id'];}?>>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input
                type="text"
                name="username"
                id="username"
                required
                class="form-control"
                data-bv-remote="true"
                disabled
                data-bv-remote-url=""
                data-bv-notempty="true"
                data-bv-notempty-message="此项不能为空"
                data-bv-stringlength="true"
                data-bv-stringlength-min="2"
                data-bv-stringlength-max="30"
                data-bv-stringlength-message="用户名必须在2-30个字符之间"
                value="<?php    if($data){ echo $data['username'] ;}?>"
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
                name="old_password"
                required
                class="form-control password"
                placeholder="请输入旧密码"
                data-bv-notempty="true"
                data-bv-notempty-message="此项不能为空"
                data-bv-identical="true"
                data-bv-stringlength="true"
                data-bv-stringlength-min="6"
                data-bv-stringlength-max="30"
                data-bv-stringlength-message="密码必须在6-30个字符之间"
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
                name="new_password"
                required
                class="form-control password"
                placeholder="请输入新密码"
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

          <button
            class="btn btn-lg btn-primary btn-block"
            type="submit"
            id="btn"
            name="submit"
          >
            立即修改
          </button>
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
