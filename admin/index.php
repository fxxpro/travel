<?php

include('./php/common.php');
checkLogin();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>后台管理</title>
    <style>
        * {
            margin: 0 auto;
            padding: 0;
            border: 0;
        }
    </style>
</head>
<frameset rows="82,*,31" cols="*" frameborder="no" border="0" framespacing="0">
    <frame src="./top1.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
    <frameset cols="187,*" frameborder="no" border="0" framespacing="0">
        <frame src="./left1.php" />
        <frameset rows="32,*" frameborder="no" border="0" framespacing="0">
            <frame src="./tab.html" scrolling="no" />
            <frame src="./pages/hotel/basic.php" name="right" scrolling=" auto" />
        </frameset>

        <frame src="UntitledFrame-6">
    </frameset>
    <frame src="./footer.html" frameborder="no" border="0" framespacing="0" />

    <noframes>

        <body>
            <style>
                .copyrights {
                    text-indent: -9999px;
                    height: 0;
                    line-height: 0;
                    font-size: 0;
                    overflow: hidden;
                }
            </style>
            <div class="copyrights" id="links20210126">
                Collect from <a href="http://www.cssmoban.com/" title="��վģ��">ģ��֮��</a>
                <a href="http://cooco.net.cn/" title="�����">�����</a>
            </div>
        </body>
    </noframes>

</html>