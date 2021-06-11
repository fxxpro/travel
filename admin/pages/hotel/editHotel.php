<?php 
 include('../../../static/php/conn.php');
 include('../../../admin/php/common.php');

//查询单条详情渲染页面
if(isset($_GET['id'])){
       $id=$_GET['id'];
       $che=mysqli_query($conn,"select * from hotel where id ='$id' limit 0,1");
       $hotelInfo=mysqli_fetch_array($che);
       $hotelInfo['type']=explode(',',$hotelInfo['type']);

       $che=mysqli_query($conn,"select * from starred");
       $starredInfo= mysqli_fetch_all($che,MYSQLI_ASSOC);
}
//修改
if(isset($_POST['submit'])){
    //接收值
    $hotel_name=$_POST['hotel_name'];
    $starred_id=$_POST['starred_id'];
    $type=implode(',',$_POST['type']);
    $id=$_POST['id'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $setup_time=$_POST['setup_time'];
    $content=$_POST['content'];
    $filename=$_POST['filename'];
    $price=$_POST['price'];
   
    $che=mysqli_query($conn,"select * from hotel where id<>'$id' and name='$hotel_name'");
    if(mysqli_fetch_array($che)){
        echo '<script>alert("酒店名称已存在");  var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
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
    $sql="update hotel set price='$price',name='$hotel_name',setup_time='$setup_time',starred_id='$starred_id',type='$type',phone='$phone',address='$address',content='$content',upload='$filename',utime='$time' where id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo '<script>alert("修改成功");  parent.location.reload(); var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
         parent.layer.close(index);   </script>';
        exit();
    }else{
        echo '<script>alert("修改失败,请重新添加！"); var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
        parent.layer.close(index); </script>';
        exit();
    }
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:th="http://www.thymeleaf.org">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>修改酒店信息</title>
        <link href="../../../static/css/main.css" rel="stylesheet" type="text/css" />
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
        <h1 class="h1_style"><i class="i_h1"></i>酒店信息</h1>
        <div class="div_left">
            <form id="form_demo" action="./editHotel.php" method="post"  class="form_b"  enctype="multipart/form-data" >
            <input type="hidden" name="id" value="<?php echo $hotelInfo['id'];?>">
            <input type="hidden" name="filename" value="<?php echo $hotelInfo['upload'];?>">
                <p class="form_p"><label class="form_label">酒店名称：</label><input type="text"  class="form_input" name="hotel_name" minlength="2"  required value=<?php echo  $hotelInfo['name'];?>><i class="i_start"></i> </p>
                <p class="form_p"><label class="form_label">酒店价格：</label><input type="text" class="form_input" name="price" minlength="2" required value=<?php echo  $hotelInfo['price'];?>><i class="i_start"></i> </p>
                <p class="form_p"><label class="form_label">星级：</label>
                <select class="form_select"  name="starred_id" style="padding-left: 1%;">
                <?php foreach ($starredInfo as $k=>$v) {?>
                    <option value="<?php echo $v['id'] ?>" <?php echo  $v['id']==$hotelInfo['starred_id']? 'selected':'' ?> ><?php echo $v['starred']?></option>
                <?php }?>
            </select>
                </p>
                <p class="form_p"><label class="form_label">建立时间：</label><input name="setup_time" value="<?php echo $hotelInfo['setup_time']?>" class="form_date" id="demo" /></p>
                <p class="form_p"><label class="form_label">类型：</label>
                    <input type="checkbox" name="type[]"  value="1" <?php echo in_array(1,$hotelInfo['type'])?  'checked' :'';   ?> class="form_check" checked="checked" /><a class="form_a">星级酒店</a>
                    <input type="checkbox" name="type[]" value="2" <?php  echo in_array(2,$hotelInfo['type'])? 'checked':'';   ?> class="form_check" /><a class="form_a">快捷酒店</a>
                    <input type="checkbox" name="type[]" value="3" <?php echo in_array(3,$hotelInfo['type'])? 'checked' :'';   ?> class="form_check" /><a class="form_a">商务酒店</a>
                    <input type="checkbox" name="type[]" value="4" <?php echo in_array(4,$hotelInfo['type'])? 'checked' :'';   ?> class="form_check" /><a class="form_a">其他</a>
                </p>
                <p class="form_p"><label class="form_label">联系电话：</label><input type="text" name="phone" class="form_input " minlength="2" required value=<?php echo  $hotelInfo['phone'];?>><i class="i_start"></i></p>
                <p class="form_p"><label class="form_label">详细地址：</label><input type="text" name="address" class="form_input " minlength="2" required value=<?php echo  $hotelInfo['address'];?>><i class="i_start"></i></p>
                <p class="form_p"><label class="form_label a_area">备注：</label><textarea name="content"  class="text_area1"><?php echo  $hotelInfo['content'];?></textarea></p>
          
            <div class="clear"></div>
        </div>
        <div class="div_right">
            <p class="p_padd">
            <input type="file" id="file"  value="<?php  echo $hotelInfo['upload']; ?>" name="upload" class="filepath" onchange="changepic(this)" accept="image/jpg,image/jpeg,image/png,image/PNG" >
            <img  onclick="F_Open_dialog()" id="img3" src="<?php echo $hotelInfo['upload']?>"/>
           </p>
            <!-- <p class="p_padd"><input type="button" class="but_upload"  value="点击上传图片" /></p> -->
            <p class="p_text1">上传图片格式为：jpg,png,tif,pneg,tiff格式。</p>
        </div>
        <div class="clear"></div>
        <!-- <form id="form_demo1" class="form_b"> -->
            <p class="but_p"><input type="submit" name="submit" value="修改" id="submit" class="but_save"  /><input type="button" value="取消" class="but_close" id="close"> </p>
        <!-- </form>
     -->
     </form>
        <script src="../../../static/js/jquery.js"></script>
        <script src="../../../static/js/laydate.js"></script>
        <script src="../../../static/admin/jquery/jquery.validate.min.js" charset="utf-8"></script>
        <script src="../../../static/admin/jquery/messages_zh.js" charset="utf-8"></script>
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
           $(document).on('click','#close',function(){
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index);
           })
        </script>
    </body>

    </html>