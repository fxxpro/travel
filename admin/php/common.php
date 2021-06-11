<?php


//文件上传
function upload($file)
{
    if(empty($file)){
        return ['code'=>401,'msg'=>'没有文件被上传'];
    }
    if($file['error'] === 0 || $file['error'] === '0' ){
        //文件上传成功
        $tmp = pathinfo($file['name']);
        $new_fname = $tmp['filename'].'_'.rand(1000000,9999999).'.'.$tmp['extension'];
        $path="../../../static/admin/images/".date('Ymd');
        if(!file_exists($path)){
            mkdir("../../../static/admin/images/".date('Ymd'),0777,true);
        }
        $new_path=$path.'/'.$new_fname;
        if(file_exists($new_path)){
            return ['code'=>200,'msg'=>'已存在','filename'=>$new_path]; 
        }
        if(!move_uploaded_file($file['tmp_name'],$new_path)){
            return ['code'=>400,'msg'=>'上传（移动）失败'];
        }else{
            return ['code'=>200,'msg'=>'上传成功','filename'=>$new_path];
        }
    } 
    return array('status'=>$status, 'info'=>$info);
}
//防止非法登录页面
function checkLogin(){
    sessionStart();
    $userInfo=$_SESSION['userInfo']??'';
    if(!$userInfo||$userInfo['type']=='0'){
        echo '<script>alert("请先登录");  </script>';
        header("refresh:0;url=../login.php");
        exit();
    }
}

function sessionStart(){
    session_start();
}






?>