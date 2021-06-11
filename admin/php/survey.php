<?php
/*
 * @Author: your name
 * @Date: 2021-05-19 10:56:52
 * @LastEditTime: 2021-05-19 12:17:13
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \travel\admin\php\strategy.php
 */
include('../../static/php/conn.php');
$che=mysqli_query($conn,"select * from survey");
$data=mysqli_fetch_all($che,MYSQLI_ASSOC);
foreach ($data as $k=>$v){
    $data[$k]['ctime']=date('Y-m-d H:i',$v['ctime']);
}
echo  json_encode($data);


?>