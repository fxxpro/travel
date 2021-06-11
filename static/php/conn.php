<?php

session_start();

date_default_timezone_set("Asia/Shanghai");


$conn=@mysqli_connect("localhost","root","root","test");
if(!$conn){
    die("连接数据库失败:".mysqli_connect_error($conn));
}
// else{
//     echo '<script>alert("连接数据库成功!");</script>';
// }
mysqli_select_db($conn,"test");
mysqli_query($conn,"set names utf8");

?>