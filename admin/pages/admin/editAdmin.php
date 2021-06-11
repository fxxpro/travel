<?php
   include('../../../static/php/conn.php');
  
  //查询单条详情渲染页面
  if(isset($_GET['id'])){
         $id=$_GET['id'];
         $che=mysqli_query($conn,"select * from register where id ='$id'");
         $info=mysqli_fetch_array($che);
  }
    if(isset($_POST['submit'])){
        //接收值
        $admin_name=$_POST['admin_name'];
        $phone=$_POST['phone'];
        $id=$_POST['id'];
        $che=mysqli_query($conn,"select * from register where id <> '$id' and username ='$admin_name'");
        if(mysqli_fetch_array($che)){
            echo '<script>alert("管理员名称已存在");   var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); </script>';
            exit();
        }
    $time=time();
    $sql="update register set  username='$admin_name',phone='$phone',utime='$time' where id='$id'";
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
    <title>管理员信息</title>
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
    <h1 class="h1_style"><i class="i_h1"></i>管理员信息</h1>
    <div class="div_left">

        <form id="form_demo" method="post" action="./editAdmin.php" enctype="multipart/form-data" class="form_b">
        <input type="hidden" name="id" value="<?php echo $info['id'];?>">

        <p class="form_p"><label class="form_label">管理员名称：</label><input type="text" name="admin_name" value="<?php echo $info['username'];?>" class="form_input " minlength="2" required><i class="i_start"></i> </p>
            <p class="form_p"><label class="form_label">管理员手机号：</label><input type="text" name="phone" value="<?php echo $info['phone'];?>" class="form_input" minlength="2" required><i class="i_start"></i> </p>
            <p class="but_p"><input type="submit" value="修改" name="submit" class="but_save" /><input type="button" value="取消" class="but_close" id="close"> </p>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    </form>

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