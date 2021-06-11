<?php
/*
 * @Author: your name
 * @Date: 2021-05-19 21:36:14
 * @LastEditTime: 2021-05-19 21:37:35
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \travel\admin\php\admin.php
 */
include('../../static/php/conn.php');
$che=mysqli_query($conn,"select * from register where type=1");
$data=mysqli_fetch_all($che,MYSQLI_ASSOC);
foreach ($data as $k=>$v){
    $data[$k]['ctime']=date('Y-m-d H:i:s',$v['ctime']);
}
echo  json_encode($data);

?>
