<?php
/*
 * @Author: your name
 * @Date: 2021-05-18 23:32:48
 * @LastEditTime: 2021-05-19 21:19:47
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \travel\admin\php\food.php
 */
include('../../static/php/conn.php');
$che=mysqli_query($conn,"select  username,comment.ctime,comment.content,comment.id  from comment left join register on comment.user_id=register.id");
$data=mysqli_fetch_all($che,MYSQLI_ASSOC);
foreach ($data as $k=>$v){
    $data[$k]['ctime']=date('Y-m-d H:i:s',$v['ctime']);
}
echo  json_encode($data);


?>