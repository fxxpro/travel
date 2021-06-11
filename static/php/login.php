<?php
/*
 * @Author: your name
 * @Date: 2021-05-17 10:21:17
 * @LastEditTime: 2021-05-17 20:53:00
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \travel\static\php\login.php
 */

    include('conn.php');
    
    if(!isset($_POST['submit'])){
        exit('非法访问');
    }

    $username=$_POST['login_username'];
    $pwd=$_POST['login_pwd'];
    $che=mysqli_query($conn,"select username,type,id from register where username='$username' and password='$pwd' limit 0,1 ");
    $result=mysqli_fetch_array($che);
    if($result){
        //存cookie
         
        $_SESSION['userInfo']=$result;
        echo '<script>alert("登录成功!");</script>';
        header("refresh:0;url=../../../index.php");
        exit();
    }else{
        echo '<script>alert("账号不存在或密码错误!");</script>';
        header("refresh:0;url=../../login.php");
    }
   
?>
