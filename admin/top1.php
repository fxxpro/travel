<?php

include('./php/common.php');
sessionStart();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
<link href="../static/css/all.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="top">
<div class="top_logo"><img src="../static/admin/image/logo1.png"/> </div>
<div class="top_right">
<ul >
<li><i class=" i_all i_user"></i> <a href="#">你好！<?php   $userInfo=$_SESSION['userInfo'] ?? ''; if($userInfo){ echo $userInfo['username'];} ?></a></li>
<!-- <li><i class="  i_msg"></i><a href="#">消息</a><span class="circle">6</span></li> -->
<!-- <li><i class="  i_pass"></i><a href="#">修改密码</a> -->
</li>
<li><i class=" i_all  i_cance"></i><a href="../index.php" target="_blank">前台首页</a></li>
</ul>
</div>
</div>
</body>
</html>
