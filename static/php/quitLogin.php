<?php
/*
 * @Author: your name
 * @Date: 2021-05-17 17:13:53
 * @LastEditTime: 2021-05-17 17:18:15
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \travel\static\php\quitLogin.php
 */

session_start();
unset($_SESSION['userInfo']);
echo '<script>alert("退出成功!");</script>';
header("refresh:0;url=../../../index.php");

?>