<?php
include('./static/php/conn.php');
$che=mysqli_query($conn,"select * from hotel");
$hotelInfo=mysqli_fetch_all($che,MYSQLI_ASSOC);

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>附近酒店</title>
    <meta name="renderer" content="webkit">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="applicable-device" content="pc,mobile">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="generator" content="" data-variable="https://breeze.cn/muban/M1156012/359/,cn,103,,3,M1156012" />
    <meta name="description" content="" />
    <meta name="keywords" content="旅游景点|境内旅游" />
    <link rel='stylesheet' href='./static/css/style.css?2017070701901'>
</head>

<body>
    <!--[if lte IE 8]>
	<div class="text-center padding-top-50 padding-bottom-50 bg-blue-grey-100">
	<p class="browserupgrade font-size-18">你正在使用一个<strong>过时</strong>的浏览器。请<a href="http://browsehappy.com/" target="_blank">升级您的浏览器</a>，以提高您的体验。</p>
	</div>
<![endif]-->
    <div class="load-box"></div>
    <header>
        <div class="head-box">
            <div class="width-box">
                <div class="logo-box">
                    <a href="" title="旅游景点旅行社网站">

                        <img src="./static/image/1506052119.png" alt="旅游景点旅行社网站">

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
    <nav>
        <div class="nav-box">
            <div class="width-box">
                <div class="nav-cut">
                    <ul class="nav-ul">

                        <li class="nav-li "><a href="index.php" title="旅游景点旅行社网站">首页</a></li>



                        <li class="nav-li  navs margin-left-"><a href="jiudian.php" title="酒店">附近酒店</a></li>

                        <li class="nav-li   margin-left-"><a href="meishi.php" title="景点">特色美食</a></li>
                        <li class="nav-li   margin-left-"><a href="yinpin.php" title="景点">甜点饮品</a></li>

                        <li class="nav-li   margin-left-"><a href="gonglue.php" title="攻略">旅游攻略</a></li>

                        <li class="nav-li   margin-left-"> <a href="gaikuang.php" title="交通">商洛概况</a></li>

                    </ul>
                </div>

                <!-- <div class="search-cut">
        <div class="search-button"></div>
        <div class="search-box">

		  <form method="get" action="gonglue.html">
			<input type="hidden" name="search" value="search">
			<input type="hidden" name="lang" value="cn">
			<input type="hidden" name="class1" value="103">
			<input type="text" placeholder="请输入搜索关键词！" name="content" value="">
			<button type="submit"></button>
		  </form>

        </div>
      </div> -->
            </div>
        </div>
    </nav>

    <section>
        <div class="width-box">
            <div class="banner-box transform-box">
                <div class="met-banner banner-ny-h" data-height=''>

                    <div class="slick-slide">

                        <img class="cover-image" data-size="1170_100" src="./static/image/1506069811.jpg" srcset='' sizes="(max-width: 767px) 767px" alt="">

                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="main">
        <div class="width-box">

            <div class="column-box ">
                <div class="column-nav transform-box">
                    <ol class="column-ul">

                        <li class="column-li active">
                            <a href="javascript:;" title="跟团游">热门推荐</a>
                        </li>



                    </ol>
                </div>

            </div>

            <div class="met-product animsition type-1">
                <div class="container">
                    <ul class="blocks-2 blocks-sm-2 blocks-md-3 blocks-xlg-3  met-page-ajax met-grid" id="met-grid" data-scale='0.66666666666667'>
                        <?php foreach($hotelInfo as $k=>$v){?>
                        <li class=" shown">
                            <div class="widget widget-shadow">
                                <figure class="widget-header cover">
                                    <a href="./product.php?type=hotel&id=<?php echo $v['id'];?>"  target='_blank'>
                                        <img class="cover-image" src=<?php echo $v['upload'];?>  style='height:200px;'>
                                    </a>
                                </figure>
                                <h4 class="widget-title">
                                    <a href="./product.php?type=hotel&id=<?php echo $v['id'];?>"  target='_blank'><?php echo $v['name']?></a>
                                    <p class='margin-bottom-0 margin-top-0 red-600'><?php echo $v['price']?>元起</p>
                                </h4>
                            </div>
                        </li>
                        <?php }?>
                    </ul>


                    <div class="hidden-xs">
                        <div class='met_pager'>
                            <span class='PreSpan'><</span><a href=../gent/ class='Ahover'>1</a><span class='NextSpan'>></span>
                            <span class='PageText'>转至第</span>
                            <input type='text' id='metPageT' data-pageurl='product.php?lang=cn&class1=103&page=||1' value='1' />
                            <input type='button' id='metPageB' value='页' />
                        </div>
                    </div>
                    <div class="met-page-ajax-body visible-xs-block invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                        <button type="button" class="btn btn-default btn-block btn-squared ladda-button" id="met-page-btn" data-style="slide-left" data-url="/muban/M1156012/359/gent/?lang=cn&class1=103&class2=0&class3=0&mbpagelist=1" data-page="1"><i class="icon wb-chevron-down margin-right-5" aria-hidden="true"></i>更多产品</button>
                    </div>

                </div>
            </div>

        </div>
    </section>
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
                    <div class="foot-lang">

                    </div>
                    <div class="powered_by_metinfo">Powered&nbsp;by&nbsp;<a href="http://www.slxy.cn/" target="_blank" title="商洛学院">slxy</a></div>
                </div>
            </div>
        </div>
    </footer>

    <button type="button" class="btn btn-icon btn-primary btn-squared met-scroll-top hide"><i class="icon wb-chevron-up" aria-hidden="true"></i></button>




    <script src="./static/js/style.js"></script>


</body>

</html>