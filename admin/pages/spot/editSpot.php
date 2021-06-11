<?php
 include('../../../static/php/conn.php');
  //查询单条详情渲染页面
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $che=mysqli_query($conn,"select * from spot where id ='$id'");
    $spotInfo=mysqli_fetch_array($che);
}


 if(isset($_POST['submit'])){
     
     include('../../../admin/php/common.php');
     //接收值

      //接收值
      $spot_name=$_POST['spot_name'];
      $address=$_POST['address'];
      $content=$_POST['content'];
      $price=$_POST['price'];
     $id=$_POST['id'];
     $filename=$_POST['filename'];
     $che=mysqli_query($conn,"select * from spot where id<>'$id' and name='$spot_name'");
     if(mysqli_fetch_array($che)){
         echo '<script>alert("景点名称已存在");  var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
         parent.layer.close(index);  window.opener.location.reload();  </script>';
         exit();
     }
      //上传文件
      $upload=$_FILES['upload'];
      if($upload['name']<>""){
          $res=upload($_FILES['upload']);
          if($res['code']!==200){
              $msg=$res['msg'];
              echo '<script>alert("$msg");  var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
              parent.layer.close(index);  </script>';
              exit();
         }
        $filename=$res['filename'];
     }
     $time=time();
     $sql="update spot set name='$spot_name',address='$address',content='$content',price='$price',upload='$filename',utime='$time' where id='$id'";
     $res=mysqli_query($conn,$sql);
     if($res){
         echo '<script>alert("修改成功"); parent.location.reload(); var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
          parent.layer.close(index); </script>';
         exit();
     }else{
         echo '<script>alert("修改失败,请重新添加！");   var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
         parent.layer.close(index); </script>';
         exit();
     }
 }
?>


<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:th="http://www.thymeleaf.org">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加攻略</title>
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
<h1 class="h1_style"><i class="i_h1"></i>景点信息</h1>
<div class="div_left">

    <form id="form_demo"  action="./editSpot.php"  enctype="multipart/form-data" method="post" class="form_b">
            <input type="hidden" name="id" value="<?php echo $spotInfo['id'];?>">
            <input type="hidden" name="filename" value="<?php echo $spotInfo['upload'];?>">
            <p class="form_p"><label class="form_label">景点名称：</label><input type="text" value="<?php echo $spotInfo['name'];?>" name="spot_name" class="form_input " minlength="2"  required ><i class="i_start"></i> </p>
        <p class="form_p"><label class="form_label">门票价格：</label><input type="text" name="price" value="<?php echo $spotInfo['price'];?>" class="form_input " minlength="2"  required ><i class="i_start"></i> </p>
        <p class="form_p"><label class="form_label">地址：</label><input type="text" value="<?php echo $spotInfo['address'];?>" name="address" class="form_input " minlength="2"  required ><i class="i_start"></i> </p>
        <p class="form_p"><label class="form_label a_area">介绍：</label><textarea name="content" class="text_area1" ><?php echo $spotInfo['content'];?></textarea></p>
    <div class="clear"></div>
</div>
<div class="div_right">
    <p class="p_padd">
    <input type="file" id="file"  name="upload" class="filepath" onchange="changepic(this)" accept="image/jpg,image/jpeg,image/png,image/PNG" >
    <img  onclick="F_Open_dialog()" id="img3" src="<?php echo $spotInfo['upload'];?>"/>
    </p>
    <p class="p_text1">上传图片格式为：jpg,png,tif,pneg,tiff格式。</p>
</div>
<div class="clear"></div>    
    <p class="but_p"><input type="submit" name="submit" value="修改" class="but_save"/><input type="button" value="取消" class="but_close" id="close"> </p>
</form>

<script>
    !function () {
        laydate.skin('danlan'); //
        laydate({ elem: '#demo' });
        laydate({ elem: '#demo1' }); //
    } ();
</script>
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

