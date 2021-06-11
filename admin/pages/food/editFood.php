<?php
   include('../../../static/php/conn.php');
   include('../../../admin/php/common.php');
  
  //查询单条详情渲染页面
  if(isset($_GET['id'])){
         $id=$_GET['id'];
         $che=mysqli_query($conn,"select * from food where id ='$id'");
         $foodlInfo=mysqli_fetch_array($che);
  }
    if(isset($_POST['submit'])){
        //接收值
        $food_name=$_POST['food_name'];
        $restaurant_name=$_POST['restaurant_name'];
        $phone=$_POST['phone'];
        $id=$_POST['id'];
        $setup_time=$_POST['setup_time'];
        $address=$_POST['address'];
        $content=$_POST['content'];
        $filename=$_POST['filename'];
        $price=$_POST['price'];
        $classify=$_POST['classify'];
        $che=mysqli_query($conn,"select * from food where id <> '$id' and name ='$food_name'");
        if(mysqli_fetch_array($che)){
            echo '<script>alert("美食名称已存在");   var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); </script>';
            exit();
        }
          //上传文件
       $upload=$_FILES['upload'];
       if($upload['name']<>""){
         $res=upload($_FILES['upload']);
         if($res['code']!==200){
             $msg=$res['msg'];
             echo '<script>alert("$msg");   var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
             parent.layer.close(index);  </script>';
             exit();
        }
       $filename=$res['filename'];
    }
    $time=time();
    $sql="update food set  classify='$classify',price='$price',name='$food_name',setup_time='$setup_time',restaurant_name='$restaurant_name',phone='$phone',address='$address',content='$content',upload='$filename',utime='$time' where id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo '<script>alert("修改成功");  parent.location.reload(); var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); </script>';
        exit();
    }else{
        echo '<script>alert("修改失败,请重新添加！");  var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
        parent.layer.close(index); </script>';
        exit();
    }
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:th="http://www.thymeleaf.org">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="../../../static/css/main.css" rel="stylesheet" type="text/css" />
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
    <h1 class="h1_style"><i class="i_h1"></i>美食信息</h1>
    <div class="div_left">

        <form id="form_demo" method="post" action="./editFood.php" enctype="multipart/form-data" class="form_b">
        <input type="hidden" name="id" value="<?php echo $foodlInfo['id'];?>">
            <input type="hidden" name="filename" value="<?php echo $foodlInfo['upload'];?>">
            <p class="form_p"><label class="form_label">商品名称：</label><input type="text" value="<?php echo $foodlInfo['name'];?>" name="food_name" class="form_input " minlength="2" required><i class="i_start"></i> </p>
            <p class="form_p"><label class="form_label">餐厅名称：</label><input type="text" value="<?php echo $foodlInfo['restaurant_name'];?>" name="restaurant_name" class="form_input " minlength="2" required><i class="i_start"></i> </p>
            <p class="form_p"><label class="form_label">分类：</label>
             特色美食<input type="radio"  name="classify" <?php echo $foodlInfo['classify']==1?'checked':'' ?> value="1" checked class="form_radio"  >
             甜点饮品<input type="radio"  name="classify" <?php echo  $foodlInfo['classify']==2?'checked':'' ?> value="2" class="form_radio" ><i class="i_start"></i> 
             </p>
            <p class="form_p"><label class="form_label">商品价格：</label><input type="text" value="<?php echo $foodlInfo['price'];?>" name="price" class="form_input " minlength="2" required><i class="i_start"></i> </p>
            <p class="form_p"><label class="form_label">联系电话：</label><input type="text" value="<?php echo $foodlInfo['phone'];?>"  name="phone" class="form_input " minlength="2" required><i class="i_start"></i></p>
            <p class="form_p"><label class="form_label">详细地址：</label><input type="text" value="<?php echo $foodlInfo['address'];?>" name="address" class="form_input " minlength="2" required><i class="i_start"></i></p>
            <p class="form_p"><label class="form_label">建立时间：</label><input class="form_date" value="<?php echo $foodlInfo['setup_time'];?>" name="setup_time" id="demo" /></p>
            <p class="form_p"><label class="form_label a_area">备注：</label><textarea name="content" class="text_area1"><?php echo $foodlInfo['content'];?></textarea></p>
        <div class="clear"></div>
    </div>
    <div class="div_right">
        <p class="p_padd">
        <input type="file" id="file"  name="upload" class="filepath" onchange="changepic(this)" accept="image/jpg,image/jpeg,image/png,image/PNG" >
        <img  onclick="F_Open_dialog()" id="img3" src="<?php echo $foodlInfo['upload'];?>"/>
        </p>
        <p class="p_text1">上传图片格式为：jpg,png,tif,pneg,tiff格式。</p>
    </div>
    <div class="clear"></div>
        <p class="but_p"><input type="submit" value="修改" name="submit" class="but_save" /><input type="button" value="取消" class="but_close" id="close"> </p>
    </form>

    <script>
            ! function() {
                laydate.skin('danlan'); 
                laydate({
                    elem: '#demo'
                });
                laydate({
                    elem: '#demo1'
                }); 
            }();
    </script>
    <script>
        $().ready(function() {
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