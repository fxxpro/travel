<?php
 include('../../../static/php/conn.php');
 if(isset($_POST['submit'])){
     
     include('../../../admin/php/common.php');
 
     //接收值
     $strategy_name=$_POST['strategy_name'];
     $path=$_POST['path'];
     $route=$_POST['route'];
     $content=$_POST['content'];
     $price=$_POST['price'];
     //上传文件
     $res=upload($_FILES['upload']);
     if($res['code']!==200){
         echo '<script>alert("没有上传文件，请重新添加！");  var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
         parent.layer.close(index); </script>';
         exit();
    }
     $filename=$res['filename'];
     $che=mysqli_query($conn,"select * from strategy where name ='$strategy_name' limit 0,1");
     if(mysqli_fetch_array($che)){
         echo '<script>alert("攻略名称已存在");  var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
         parent.layer.close(index); </script>';
         exit();
     }
     $time=time();
     $sql="INSERT INTO strategy (price,name,path,route,content,ctime,upload) values ('$price','$strategy_name','$path','$route','$content','$time','$filename')";
     $res=mysqli_query($conn,$sql);
     if($res){
         echo '<script>alert("添加成功");  parent.location.reload(); var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
          parent.layer.close(index); </script>';
         exit();
     }else{
         echo '<script>alert("添加失败,请重新添加！");  var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
         parent.layer.close(index); </script>';
         exit();
     }
 }
?>


<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:th="http://www.thymeleaf.org">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>攻略信息</title>
    <link href="../../../static/css/main.css" rel="stylesheet" type="text/css"/>
    <script src="../../../static/js/jquery.js"></script>
    <script src="../../../static/js/laydate.js"></script>
    <script src="../../../static/admin/jquery/jquery.validate.min.js" charset="utf-8"></script>
    <script src="../../../static/admin/jquery/messages_zh.js" charset="utf-8"></script>
</head>
    <style type="text/css">
            #imgPreview {
        width: 40%;
        height: 180px;
        margin: 10px auto 0px auto;
        border: 1px solid black;
        text-align: center;
        }
        #prompt3 {
        width: 100%;
        height: 180px;
        text-align: center;
        position: relative;
        }
        #imgSpan {
        position: absolute;
        top: 60px;
        left: 40px;
        }
        .filepath {
        width: 100%;
        height: 5%;
        opacity: 0;
        }
        #img3 {
        width: 75%;
        height: 45%;
        /* display: none; */
        }
    </style>
<body>
<h1 class="h1_style"><i class="i_h1"></i>攻略信息</h1>
<div class="div_left">

    <form id="form_demo"  action="./addStrategy.php"  enctype="multipart/form-data" method="post" class="form_b">
        <p class="form_p"><label class="form_label">攻略名称：</label><input type="text" name="strategy_name" class="form_input " minlength="2"  required ><i class="i_start"></i> </p>
        <p class="form_p"><label class="form_label">门票价格：</label><input type="text" name="price" class="form_input " minlength="2"  required ><i class="i_start"></i> </p>
        <p class="form_p"><label class="form_label a_area">路线：</label><textarea name="path" class="text_area1" ></textarea></p>
        <p class="form_p"><label class="form_label a_area">乘车线路：</label><textarea name="route" class="text_area1" ></textarea></p>
        <p class="form_p"><label class="form_label a_area">介绍：</label><textarea name="content" class="text_area1" ></textarea></p>
    <div class="clear"></div>
</div>
<div class="div_right">
    <p class="p_padd">
    <input type="file" id="file"  name="upload" class="filepath" onchange="changepic(this)" accept="image/jpg,image/jpeg,image/png,image/PNG" >
    <img  onclick="F_Open_dialog()" id="img3" src="../../../static/admin/image/ph_list.png"/>
    </p>
    <p class="p_text1">上传图片格式为：jpg,png,tif,pneg,tiff格式。</p>
</div>
<div class="clear"></div>    
    <p class="but_p"><input type="submit" name="submit" value="保存" class="but_save"/><input type="button" value="取消" class="but_close" id="close"> </p>
</form>

<script >
            $().ready(function () {
                $(".form_b").validate();
            });
            //点击图片
            function F_Open_dialog() { 
                document.getElementById("file").click();
            } 
            //内容改变
            function changepic() {
                $("#prompt3").css("display", "none");
                var reads = new FileReader();
                f = document.getElementById('file').files[0];
                reads.readAsDataURL(f);
                reads.onload = function(e) {
                document.getElementById('img3').src = this.result;
                $("#img3").css("display", "block");
                };
           }
           //取消按钮
           $(document).on('click','#close',function(){
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index);
           })
</script>
</body>
</html>
