<?php 
include('./static/php/conn.php');
$che=mysqli_query($conn,"select * from strategy");
$data=mysqli_fetch_all($che,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>旅游攻略</title>
    <meta name="renderer" content="webkit" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="applicable-device" content="pc,mobile" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <meta name="description" content="" />
    <meta name="keywords" content="旅游景点|境内旅游" />
    <link rel="stylesheet" href="./static/css/style.css" />
  </head>
  <body>
  
    <div class="load-box"></div>
    <header>
      <div class="head-box">
        <div class="width-box">
          <div class="logo-box">
            <a href="" title="旅游景点旅行社网站">
              <img
                src="./static/image/1506052119.png"
                alt="旅游景点旅行社网站"
              />

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

              <li class="nav-li active navs margin-left-">
                <!-- <a href="you.html" title="跟团游">跟团游</a> -->
              </li>

              <!-- <li class="nav-li navs margin-left-">
                <a href="you.html" title="自助游">自助游旅</a>
              </li> -->

              <li class="nav-li navs margin-left-">
                <!-- <a href="you.html" title="自驾游">自驾游</a> -->
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

          <!-- <div class="search-cut">
            <div class="search-button"></div>
            <div class="search-box">
              <form method="get" action="gonglue.html">
                <input type="hidden" name="lang" value="cn" />

                <input type="hidden" name="class1" value="10001" />

                <input
                  type="text"
                  placeholder="请输入搜索关键词！"
                  name="searchword"
                  value=""
                />
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
          <div class="met-banner banner-ny-h" data-height="">
            <div class="slick-slide">
              <img
                class="cover-image"
                data-size="1170_100"
                src="./static/yp/12.jpg"
                srcset=""
                sizes="(max-width: 767px) 767px"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="main">
      <div class="width-box">
        <div class="main-left">
          <div class="card-list">
           <div class="met-page-ajax" data-scale="0.5">
              <?php foreach ($data as $k=>$v){?>
              <div class="card-li">
                <div class="card-description">
                  <a
                    class="card-title"
                    href="./productGonglue.php?type=strategy&id=<?php echo $v['id'];?>"
                    target="_blank"
                    ><h3><?php echo $v['name'];?></h3></a
                  >
                  <img
                    class="card-image lazyloadx"
                    data-original="<?php echo $v['upload'];?>"
                  />
                  <p>
                 <?php echo $v['content'];?>
                  </p>
                </div>
                <div class="card-operation">
                  <div class="card-author">
                   
                  </div>
                  <div class="card-time">发布于 <?php echo date('Y-m-d H:i',$v['ctime']);?></div>
                  <div class="card-geek">
                    <font class="eye"></font>
                    <font class="share"
                      >&nbsp;
                      <span>
                        <a
                          class="weibo"
                          target="_blank"
                          href="http://service.weibo.com/share/share.php?title=山阳天竺山森林公园攻略&url=http%3A%2F%2Fshow.metinfo.cn%2Fmuban%2FM1156012%2F359%2Fstrategy%2Fshownews.php%3Flang%3Dcn%26id%3D57&pic=http%3A%2F%2Fshow.metinfo.cn%2Fupload%2F201709%2F1506335872.jpg"
                        ></a>
                        <a
                          class="weixin"
                          data-href="http://show.metinfo.cn/muban/M1156012/359/strategy/shownews.php?lang=cn&id=57"
                        ></a>
                        <a
                          class="qzone"
                          target="_blank"
                          href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?summary=山阳天竺山森林公园攻略&url=http%3A%2F%2Fshow.metinfo.cn%2Fmuban%2FM1156012%2F359%2Fstrategy%2Fshownews.php%3Flang%3Dcn%26id%3D57&pics=http%3A%2F%2Fshow.metinfo.cn%2Fupload%2F201709%2F1506335872.jpg"
                        ></a>
                      </span>
                    </font>
                  </div>
                </div>
              </div>
              <?php }?>
            </div>

            <div class="hidden-xs">
              <div class="card-page" data-pages="1">
                <p>
                  <a>&lt;</a>

                  <a class="active">1</a>

                  <a>&gt;</a>
                </p>
              </div>
            </div>
            <div
              class="met-page-ajax-body visible-xs-block invisible"
              data-plugin="appear"
              data-animate="slide-bottom"
              data-repeat="false"
            >
              <button
                type="button"
                class="btn btn-default btn-block btn-squared ladda-button"
                id="met-page-btn"
                data-style="slide-left"
                data-url="/muban/M1156012/359/strategy/?lang=cn&class1=108&class2=0&class3=0&mbpagelist=1"
                data-page="1"
              >
                <i
                  class="icon wb-chevron-down margin-right-5"
                  aria-hidden="true"
                ></i
                >加载更多
              </button>
            </div>
          </div>
        </div>
        <div class="main-right">
          <div class="card-tags">
            <h4>热搜标签</h4>
            <ul>
              <li>
                <a
                 href="javascript:;"
                  title="秦岭九龙潭风景区"
                  >秦岭九龙潭风景区</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="秦岭终南山景区"
                  >秦岭终南山景区</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="漫川关"
                  >漫川关</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="仙娥湖"
                  >仙娥湖</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="丹凤花庙"
                  >丹凤花庙</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="凤凰镇"
                  >凤凰镇</a
                >
              </li>
            </ul>
          </div>

          <div class="card-active">
            <h4>自助游攻略</h4>
            <ul>
              <?php foreach($data as $k1=>$value1){?>
              <li>
                <a
                href="./productGongLue.php?type=strategy&id=<?php echo $value1['id'];?>"
                >
                  <img
                    class="lazyloads"
                    data-original="<?php echo $value1['upload'];?>"
                  />
                  <span><?php echo $value1['name'];?></span>
                </a>
              </li>
              <?php }?>
            </ul>
          </div>

          <div class="card-hots">
            <h4>为您推荐</h4>
            <ul>
              <li>
                <a
                href="javascript:;"
                  title="金丝峡景区旅游攻略实用版"
                  >金丝峡景区旅游攻略实用版</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="山阳天竺山森林公园攻略"
                  >山阳天竺山森林公园攻略</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="秦岭江山景区攻略"
                  >秦岭江山景区攻略</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="天蓬山寨景区攻略"
                  >天蓬山寨景区攻略</a
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

            <p>商洛旅游信息网站</p>
          </div>
          <div class="foot-right">
            <div class="foot-lang"></div>
            <div class="powered_by_metinfo">
              Powered&nbsp;by&nbsp;<a
                href="http://www.slxy.cn/"
                target="_blank"
                title="企业网站管理系统"
                >slxy</a
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
