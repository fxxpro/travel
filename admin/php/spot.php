<?php
/*
 * @Author: your name
 * @Date: 2021-05-18 23:32:48
 * @LastEditTime: 2021-05-19 13:42:39
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \travel\admin\php\food.php
 */
include('../../static/php/conn.php');
$che=mysqli_query($conn,"select * from spot");
$data=mysqli_fetch_all($che,MYSQLI_ASSOC);
echo  json_encode($data);


?>