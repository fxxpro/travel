<?php
include('./static/php/conn.php');
$che=mysqli_query($conn,"select * from survey limit 0,1");
$surveyInfo=mysqli_fetch_all($che,MYSQLI_ASSOC);


$che1=mysqli_query($conn,"select * from survey ");
$info=mysqli_fetch_all($che1,MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html>

<head>
    <title>商洛概况</title>
    <meta name="renderer" content="webkit" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="applicable-device" content="pc,mobile" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="" />
    <meta name="keywords" content="旅游景点|境内旅游" />
    <link rel="stylesheet" href="./static/css/style.css" />
</head>

<body>
    <!--[if lte IE 8]>
      <div
        class="text-center padding-top-50 padding-bottom-50 bg-blue-grey-100"
      >
        <p class="browserupgrade font-size-18">
          你正在使用一个<strong>过时</strong>的浏览器。请<a
            href="http://browsehappy.com/"
            target="_blank"
            >升级您的浏览器</a
          >，以提高您的体验。
        </p>
      </div>
    <![endif]-->
    <div class="load-box"></div>
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
    <nav>
        <div class="nav-box">
            <div class="width-box">
                <div class="nav-cut">
                    <ul class="nav-ul">
                        <li class="nav-li">
                            <a href="index.php" title="旅游景点旅行社网站">首页</a>
                        </li>


                        <li class="nav-li navs margin-left-">
                            <a href="jiudian.php" title="酒店">附近酒店</a>
                        </li>

                        <li class="nav-li margin-left-">
                            <a href="meishi.php" title="景点">特色美食</a>
                        </li>
                        <li class="nav-li margin-left-">
                            <a href="yinpin.php" title="景点">甜点饮品</a>
                        </li>

                        <li class="nav-li margin-left-">
                            <a href="gonglue.php" title="攻略">旅游攻略</a>
                        </li>

                        <li class="nav-li margin-left-">
                            <a href="gaikuang.php" title="交通">商洛概况</a>
                        </li>
                    </ul>
                </div>

                <div class="search-cut">
                    <div class="search-button"></div>
                    <div class="search-box">
                        <!-- <form method="get" action="gonglue.html">
                <input type="hidden" name="lang" value="cn" />

                <input type="hidden" name="class1" value="10001" />

                <input
                  type="text"
                  placeholder="请输入搜索关键词！"
                  name="searchword"
                  value=""
                />
                <button type="submit"></button>
              </form> -->
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="main">
        <div class="width-box">
            <div class="main-left">
                <div class="card-list">
                <?php foreach($surveyInfo as $k=>$v){ ?>
                    <div class="card-title"><?php echo $v['name']?></div>
                    <div class="card-operation">
                        <div class="card-author">
                            <img src="./static/image/user.jpg" />
                            <font>admin</font>
                        </div>
                        <div class="card-time">发布于 <?php echo date('Y-m-d H:i:s',$v['ctime']);?></div>
                        <div class="card-geek">
                            <font class="eye"></font>
                            <font class="share">&nbsp;
                                <span>
                    <a
                      class="weibo"
                      target="_blank"
                      href="http://service.weibo.com/share/share.php?title=中国 · 商洛&url=https%3A%2F%2Fshow.breeze.cn%3A443%2Fmuban%2FM1156012%2F359%2Fstrategy%2Fshownews.php%3Flang%3Dcn%26id%3D54"
                    ></a>
                    <a
                      class="weixin"
                      data-href="https://breeze.cn:443/muban/M1156012/359/strategy/shownews.php?lang=cn&id=54"
                    ></a>
                    <a
                      class="qzone"
                      target="_blank"
                      href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?summary=中国 · 商洛&url=https%3A%2F%2Fbreeze.cn%3A443%2Fmuban%2FM1156012%2F359%2Fstrategy%2Fshownews.php%3Flang%3Dcn%26id%3D54"
                    ></a>
                  </span>
                            </font>
                        </div>
                    </div>
                    <div class="met-editor lazyload clearfix">
                        <div>
                          <?php  $content=explode('</br>',$v['content']);  foreach ($content as $value){ ?>
                            <p style="text-indent: 2em">
                            <?php echo $value;?>  
                          </p>
                           <?php }?>
                            <div id="metinfo_additional"></div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="met-shownews-footer">
                      
                    </div>
                </div>
            
            </div>
            <div class="main-right">
                <div class="card-tags">
                    <h4>热搜标签</h4>
                    <ul>
              <li>
                <a href="javascript:;" title="洛南县">洛南县</a>
              </li>

              <li>
                <a href="javascript:;" title="丹凤县">丹凤县</a>
              </li>

              <li>
                <a href="javascript:;" title="商南县">商南县</a>
              </li>

              <li>
                <a href="javascript:;" title="山阳县">山阳县</a>
              </li>

              <li>
                <a  href="javascript:;" title="镇安县">镇安县</a>
              </li>

              <li>
                <a href="javascript:;" title="柞水县">柞水县</a>
              </li>
            </ul>
                </div>

                <div class="card-active">
                    <h4>主要县区</h4>
                    <ul>
                      <?php foreach ($info as $k2=>$v2){?>
                        <li>
                            <a href="javascript:;" title=" 商州区 ">
                                <img class="lazyloads" data-original="<?php echo $v2['upload'];?>" alt="商州区 " />
                                <span> <?php echo $v2['name'];?> </span>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </div>

                <div class="card-hots">
                    <h4>为您推荐</h4>
                    <ul>
                        <li>
                            <a href="javascript:;" title="中国 · 商洛" >中国 · 商洛</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="商州区"
                  >商州区</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title=" 洛南县"
                >
                  洛南县</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="丹凤县"
                >
                  丹凤县</a
                >
              </li>
            </ul>
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

                <p>商洛市旅游信息网站</p>
            </div>
            <div class="foot-right">
                <div class="foot-lang"></div>
                <div class="powered_by_metinfo">
                    Powered&nbsp;by&nbsp;<a href="http://www.slxy.cn/" target="_blank" title="企业网站管理系统">slxy</a
              >&nbsp;
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div class="weixin-box">
      <b><em>X</em>分享到微信朋友圈</b>
      <i></i>
      <p>打开微信，使用“扫一扫”，点击右上角“分享到朋友圈”。</p>
    </div>

    <button
      type="button"
      class="btn btn-icon btn-primary btn-squared met-scroll-top hide"
    >
      <i class="icon wb-chevron-up" aria-hidden="true"></i>
    </button>

    <script src="./static/js/style.js"></script>
  </body>
</html>