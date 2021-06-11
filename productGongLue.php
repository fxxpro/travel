<?php
  if(isset($_GET['id'])){
	include('./static/php/conn.php');
    $id=$_GET['id'];
    $type=$_GET['type'];
    $che=mysqli_query($conn,"select * from $type where id='$id'");
    $info=mysqli_fetch_array($che);

	$che1=mysqli_query($conn,"select register.username,comment.content,comment.ctime  from comment left join register on register.id=comment.user_id where con_id='$id' and comment.type='$type'");
    $commentInfo=mysqli_fetch_all($che1,MYSQLI_ASSOC);
  }  
  if(isset($_POST['submit'])){
    include('./static/php/conn.php');
     
    $userInfo=$_SESSION['userInfo']??'';
    if(!$userInfo){
        echo '<script>alert("请先登录!");</script>';
        header("refresh:0;url=./login.php");
        exit();
    }
     $content=$_POST['content'];
     $con_id=$_POST['con_id'];
     $type=$_POST['type'];
     $user_id=$userInfo['id'];
     $time=time();
     
     $sql="INSERT INTO comment (user_id,content,con_id,type,ctime) values ('$user_id','$content','$con_id','$type','$time')";
     $res=mysqli_query($conn,$sql);
     if($res){
         header("refresh:0;url=./productGongLue.php?id=$con_id&type=$type");
         exit();
      }
  }


?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>详情页</title>
    <meta name="keywords" content="首页" />
	<meta name="description" content="首页" />
	<link rel="stylesheet" href="./static/css/style.css" />   
    <link rel="stylesheet" type="text/css" href="./static/css/normalize.css" />
    <script type="text/javascript" src="./static/js/jquery-1.9.1.min.js"></script>
    <script src="./static/js/common.js" type="text/javascript" charset="utf-8"></script>

    <link href="./static/css/main.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
        $(document).ready(function() {
            var showproduct = {
                "boxid": "showbox",
                "sumid": "showsum",
                "boxw": 400, //宽度,该版本中请把宽高填写成一样
                "boxh": 400, //高度,该版本中请把宽高填写成一样
                "sumw": 60, //列表每个宽度,该版本中请把宽高填写成一样
                "sumh": 60, //列表每个高度,该版本中请把宽高填写成一样
                "sumi": 7, //列表间隔
                "sums": 5, //列表显示个数
                "sumsel": "sel",
                "sumborder": 1, //列表边框，没有边框填写0，边框在css中修改
                "lastid": "showlast",
                "nextid": "shownext"
            }; //参数定义	  
            $.ljsGlasses.pcGlasses(showproduct); //方法调用，务必在加载完后执行
        });
    </script>
</head>

<body>
	<!-- 头部 -->
   <header>
        <div class="head-box">
            <div class="width-box">
                <div class="logo-box">
                    <a href="" title="旅游景点旅行社网站">
                        <img src="./static/image/1506052119.png" alt="旅游景点旅行社网站" />

                        <h2>商洛</h2>

                        <h4>旅游信息网</h4>
                    </a>
                </div>
                <div class="login-box">
                    <?php    $userInfo=$_SESSION['userInfo'] ?? '';  if($userInfo){?>
                        <a href="javascript:;">欢迎<?php echo $userInfo['username'];?>登陆</a>
                        <a href="./static/php/quitLogin.php">退出登陆</a>
                    <?php  if($userInfo['type']==0){ ?>
                            <a href="changeUser.php">修改密码</a>
                    <?php } ?>
                    <?php if(!empty($userInfo['type'])&$userInfo['type']==1||$userInfo['type']==2) {?>
                        <a href="admin/index.php" target="_blank">去后台</a>
                    <?php }?>
                    <?php }else{ ?>
                    <a href="login.php">登录</a>
                    <a href="register.php">注册</a>
                    <?php }?>
                </div>
            </div>
        </div>
   </header>
   <!-- 导航栏 -->
    <nav>
        <div class="nav-box">
            <div class="width-box">
                <div class="nav-cut">
                    <ul class="nav-ul">
                        <li class="nav-li">
                            <a href="index.php" title="旅游景点旅行社网站">返回上一级</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="showall">
        <!--left -->
        <div class="showbot">
            <div id="showbox">
                <img src="<?php echo $info['upload'];?>" width="400" height="400" />
            </div>
            <!--展示图片盒子-->
            <div id="showsum">
                <!--展示图片里边-->
            </div>
            <p class="showpage">
                <a href="javascript:void(0);" id="showlast">
                    < </a>
                        <a href="javascript:void(0);" id="shownext"> > </a>
            </p>
        </div>
        <!--conet -->
        <div class="tb-property">
            <div class="tr-nobdr">
                <h3><?php echo $info['name']?></h3>
            </div>
            <div class="txt">
                <span class="nowprice">￥<a href=""><?php echo $info['price'];?></a></span>
            </div>
            <div class="txt">
                <span class="guT">路线：</span>
                <span class="ori_prd"><?php echo $info['route'];?></span>
            </div>
            <div class="txt">
                <span class="guT">介绍：</span>
                <span class="ori_prd"><?php echo $info['content'];?></span>
            </div>
        </div>
        <!--right -->
    </div>
    <div class="gdetail">
        <div class="dp_wrap_title">
            评论
        </div>
     <div class="tabe_div">
         <form action="./productGongLue.php" method="post">
         <input type="hidden" name="con_id" value="<?php echo $_GET['id'];?>">
         <input type="hidden" name="type" value="<?php echo $_GET['type'];?>">
        <p align="center" class="p_line text_ient"><a class="find_a"></a><input type="text" name="content" class="form_input text_ient" style="width:40%" placeholder="请输入评论内容"/>
        <input type="submit" value="评论" name="submit" class="but_find"/><p>
        </p>
        </form>
     </div>
	</div>
	<div  class="gdetail">
     <div class="dp_wrap_title">
            评论列表：
        </div>
	       <table  class="jud_list" style="width:100%; margin-top:30px;border:2px solid #eaeaea;"  cellspacing="0" cellpadding="0">
					<?php foreach($commentInfo as $k=>$value){?>	
		              <tr valign="top" style="border-bottom: 1px solid #eaeaea;">
                            <td width="100"><?php echo $value['username'];?></td>
                            <td width="200">
                            <span>
                                评论时间：<?php echo date('Y-m-d H:i',$value['ctime']);?></span>
                            </td>
                            <td>
                            <span style="color:red;" >
							<?php echo $value['content']; ?>
                            </span>
                            </td>
						 </tr>
					  <?php }?>
          </table>
	</div>
	
	
	
    
    
	<!-- 底部 -->
	<footer>
      <div class="foot-box">
        <div class="width-box">
          <div class="foot-left">
            <div class="met-links">
              <ol class="breadcrumb">
                <li>友情链接 :</li>

                <li>
                  <a href="https://www.qunar.com/" title="" target="_blank">
                    去哪儿网
                  </a>
                        </li>

                        <li>
                            <a href="https://hotels.ctrip.com/" title="" target="_blank">
                    携程旅行
                  </a>
                        </li>

                        <li>
                            <a href="https://www.tuniu.com/" title="" target="_blank">
                    途牛旅游网
                  </a>
                        </li>

                        <li>
                            <a href="http://www.cntour.cn/" title="" target="_blank">
                    中国旅游网
                  </a>
                        </li>
                        </ol>
                </div>

                <p>商洛旅游信息网站</p>
            </div>
            <div class="foot-right">
                <div class="foot-lang"></div>
                <div class="powered_by_metinfo">
                    Powered&nbsp;by&nbsp;<a href="http://www.slxy.cn/" target="_blank" title="商洛学院">slxy</a
              >&nbsp;
            </div>
          </div>
        </div>
      </div>
    </footer>



</body>

</html>

