<?php
/*
 * @Author: your name
 * @Date: 2021-05-18 13:52:55
 * @LastEditTime: 2021-05-18 23:32:32
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \travel\admin\php\hotel\hotel.php
 */
   
include('../../static/php/conn.php');
$che=mysqli_query($conn,"select * from hotel");
$data=mysqli_fetch_all($che,MYSQLI_ASSOC);
foreach ($data as $k=>$v){
   $data[$k]['ctime']=date('Y-m-d H:i:s',$v['ctime']);
}
echo  json_encode($data);
   
  
?>