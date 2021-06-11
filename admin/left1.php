<?php
include('./php/common.php');
sessionStart();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>

    <script language="JavaScript" src="../static/js/jquery.js"></script>

    <script type="text/javascript">
        $(function() {
            //导航切换
            $(".menuson .header").click(function() {
                var $parent = $(this).parent();
                $(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();

                $parent.addClass("active");
                if (!!$(this).next('.sub-menus').size()) {
                    if ($parent.hasClass("open")) {
                        $parent.removeClass("open").find('.sub-menus').hide();
                    } else {
                        $parent.addClass("open").find('.sub-menus').show();
                    }
                }
            });

            // 三级菜单点击
            $('.sub-menus li').click(function(e) {
                $(".sub-menus li.active").removeClass("active")
                $(this).addClass("active");
            });

            $('.title').click(function() {
                var $ul = $(this).next('ul');
                $('dd').find('.menuson').slideUp();
                if ($ul.is(':visible')) {
                    $(this).next('.menuson').slideUp();
                } else {
                    $(this).next('.menuson').slideDown();
                }
            });
        })
    </script>



    <link href="../static/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="background:#f0f9fd; overflow:hidden">


    <dl class="leftmenu">
        <!--旅游-->
        <dd>
            <div class="title"><span><img src=""  /></span><a href="./pages/hotel/basic.php" target="right">酒店管理</a><i class="down_i"></i>
            </div>
        </dd>
        <dd>
            <div class="title"><span><img src="" /></span><a href="./pages/strategy/basic.php" target="right">攻略管理</a><i></i> <i class="down_i"></i>
            </div>
        </dd>
        <dd>
            <div class="title"><span><img src="" /></span><a href="./pages/spot/basic.php" target="right">景点管理</a><i class="down_i"></i>
            </div>
        </dd>
        <dd>
            <div class="title"><span><img src="" /></span><a href="./pages/food/basic.php" target="right">餐饮管理</a><i class="down_i"></i>
            </div>
        </dd>
        <dd>
            <div class="title"><span><img src="" /></span><a href="./pages/survey/basic.php" target="right">概况管理</a><i class="down_i"></i>
            </div>
        </dd>
        <dd>
            <div class="title"><span><img src="" /></span><a href="./pages/comment/basic.php" target="right">评论管理</a><i class="down_i"></i>
            </div>
        </dd>
        <?php   $userInfo=$_SESSION['userInfo'] ?? '';    if($userInfo['type']=="2"){ ?>
        <dd>
            <div class="title"><span><img src="" /></span><a href="./pages/admin/basic.php" target="right">管理员管理</a><i class="down_i"></i>
            </div>
        </dd>
        <?php }?>
        <!-- <dd>
            <div class="title"><span><img src="../static/admin/image/l26.png" /></span>店铺管理<i class="down_i"></i>
            </div>
            <ul class="menuson">
                <li><cite></cite><a href="./pages/store/basic.html" target="right">基本信息</a><i></i></li>
                <li><cite></cite><a href="./pages/store/goodsManage.html" target="right">商品管理</a><i></i></li>
                <li><cite></cite><a href="./pages/store/tradingSearch.html" target="right">交易情况</a><i></i></li>
                <li><cite></cite><a href="./pages/store/complaintsSearch.html" target="right">投诉情况</a><i></i></li>
            </ul>
        </dd>
        <dd>
            <div class="title"><span><img src="../static/admin/image/l07.png" /></span>门票管理<i class="down_i"></i>
            </div>
            <ul class="menuson">
                <li><cite></cite><a href="./pages/tickets/tradingSearch.html" target="right">交易情况</a><i></i></li>
            </ul>
        </dd> -->
    </dl>
    <div></div>
</body>

</html>