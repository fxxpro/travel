<?php
/*
 * @Author: your name
 * @Date: 2021-05-18 23:32:48
 * @LastEditTime: 2021-05-19 10:21:16
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \travel\admin\php\food.php
 */
include('../../static/php/conn.php');
$che=mysqli_query($conn,"select * from food");
$data=mysqli_fetch_all($che,MYSQLI_ASSOC);
foreach ($data as $k=>$v){
    $data[$k]['classify']=$v['classify']==1?'特色美食':'甜点饮品';
}
echo  json_encode($data);


?>