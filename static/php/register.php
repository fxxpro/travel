<?php
/*
 * @Author: your name
 * @Date: 2021-05-17 10:21:17
 * @LastEditTime: 2021-05-20 12:34:24
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \travel\static\php\register.php
 */
include('conn.php');
if(!isset($_POST['submit'])){
    exit('非法访问');
}
if($_POST['code']!=="7KAG"){
    echo '<script>alert("验证码错误");</script>';
    header("refresh:0;url=../../../register.php"); 
    exit();
}

$username=$_POST['username'];
$password=$_POST['password'];
$pwd=$_POST['pwd'];

if(strlen($password)<6){
    echo '<script>alert("错误:密码不能低于6位");</script>';
    header("refresh:0;url=../../../register.php"); 
    exit();
}
if($password==$pwd){
    $che=mysqli_query($conn,"select username from register where username ='$username' limit 0,1");
    if(mysqli_fetch_array($che)){
        echo '<script>alert("用户名已存在!")</script>';
        header("refresh:0;url=../../register.php");
        exit();
    }
$sql= mysqli_query($conn,"INSERT INTO register(username,password,pwd) values ('$username','$password','$pwd')");
$res=mysqli_query($conn,$sql);
if(!$res){
    echo '<script>alert("注册成功!");</script>';
    header("refresh:0;url=../../login.php");
}else{
    echo '<script>alert("对不起!注册失败");</script>';
    header("refresh:0;url=../../../register.php");
    exit();
}
}else{
    echo '<script>alert("两次密码不一致");</script>';
    header("refresh:0;url=../../register.php");
    exit();
}



?>