<?php  

include('./static/php/conn.php');
$che=mysqli_query($conn,"select * from spot");
$spotInfo=mysqli_fetch_all($che,MYSQLI_ASSOC);

$che1=mysqli_query($conn,"select * from strategy");
$strategyInfo=mysqli_fetch_all($che1,MYSQLI_ASSOC);

$che2=mysqli_query($conn,"select * from spot limit 0,3");
$info=mysqli_fetch_all($che2,MYSQLI_ASSOC);



?>
<!DOCTYPE html>
<html>

<head>
    <title>商洛市旅游信息网站</title>
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
                            <a href="index.php" title="首页">首页</a>
                        </li>

                        <li class="nav-li navs margin-left-">
                            <a href="jiudian.php" title="附近酒店">附近酒店</a>
                        </li>

                        <li class="nav-li margin-left-">
                            <a href="meishi.php" title="特色美食">特色美食</a>
                        </li>
                        <li class="nav-li margin-left-">
                            <a href="yinpin.php" title="甜点饮品">甜点饮品</a>
                        </li>

                        <li class="nav-li margin-left-">
                            <a href="gonglue.php" title="旅游攻略">旅游攻略</a>
                        </li>

                        <li class="nav-li margin-left-">
                            <a href="gaikuang.php" title="商洛概况">商洛概况</a>
                        </li>
                    </ul>
                </div>

             
            </div>
        </div>
    </nav>

    <section>
        <div class="width-box">
            <div class="banner-box transform-box">
                <div class="met-banner banner-ny-h" data-height="">
                    <div class="slick-slide">
                        <img class="cover-image" data-size="1170_100" src="./static/images/1.jpg" srcset="" sizes="(max-width: 767px) 767px" alt="" />
                    </div>

                    <div class="slick-slide">
                        <img class="cover-image" data-size="1170_100" data-lazy="./static/images/20.jpg" srcset="" sizes="(max-width: 767px) 767px" alt="" />
                    </div>
                    <div class="slick-slide">
                        <img class="cover-image" data-size="1170_100" data-lazy="./static/images/46.jpg" srcset="" sizes="(max-width: 767px) 767px" alt="" />
                    </div>
                    <div class="slick-slide">
                        <img class="cover-image" data-size="1170_100" data-lazy="./static/images/47.jpg" srcset="" sizes="(max-width: 767px) 767px" alt="" />
                    </div>
                    <div class="slick-slide">
                        <img class="cover-image" data-size="1170_100" data-lazy="./static/images/48.jpg" srcset="" sizes="(max-width: 767px) 767px" alt="" />
                    </div>
                    <div class="slick-slide">
                        <img class="cover-image" data-size="1170_100" data-lazy="./static/images/49.jpg" srcset="" sizes="(max-width: 767px) 767px" alt="" />
                    </div>
                    <div class="slick-slide">
                        <img class="cover-image" data-size="1170_100" data-lazy="./static/images/50.jpg" srcset="" sizes="(max-width: 767px) 767px" alt="" />
                    </div>
                    <div class="slick-slide">
                        <img class="cover-image" data-size="1170_100" data-lazy="./static/images/51.jpg" srcset="" sizes="(max-width: 767px) 767px" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main">
        <div class="width-box">
            <div class="price-box">
                <div class="price-nav transform-box">
                    <ol class="price-ul">
                        <li class="price-li active"><a title="跟团游">热门推荐</a></li>

                        <li class="price-li"><a title="一日游">一日游</a></li>

                        <li class="price-li"><a title="二日游">二日游</a></li>

                        <li class="price-li"><a title="三日游">三日游</a></li>

                        <li class="price-li"><a title="四日游">四日游</a></li>

                        <li class="price-li"><a title="五日游">五日游</a></li>

                        <li class="price-li"><a title="六日游">六日游</a></li>

                        <li class="price-li"><a title="七日游">七日游</a></li>
                    </ol>
                </div>
                <div class="price-cut">
                    <ul class="active">
                        <?php foreach($spotInfo as $k=>$v){?>
                        <li>
                            <a href="./product.php?type=spot&id=<?php echo $v['id'];?>" target="_blank">
                                <img class="lazyloadx" data-original="<?php echo $v['upload'];?>"  />
                                <span><?php echo $v['name'];?></span>
                                <font><?php echo $v['price'];?> 元</font>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                    
                    <ul>
              <li>
                <a
                  href="javascript:;"
                  title="漫川古镇"
                  target="_self"
                >
                  <img
                    class="lazyloadx"
                    data-original="./static/images/45.jpg"
                    alt="漫川古镇"
                  />
                  <span>漫川古镇</span>
                  <font>暂无价格</font>
                </a>
              </li>
            </ul>

            <ul>
              <li>
                <a
                  href="javascript:;"
                  title="金丝大峡谷"
                  target="_self"
                >
                  <img
                    class="lazyloadx"
                    data-original="./static/images/4.jpg"
                    alt="金丝大峡谷"
                  />
                  <span>金丝大峡谷</span>
                  <font>95.00元</font>
                </a>
              </li>
            </ul>

            <ul>
              <li>
                <a
                  href="javascript:;"
                  title="木王山森林公园"
                  target="_self"
                >
                  <img
                    class="lazyloadx"
                    data-original="./static/images/6.jpg"
                    alt="木王山森林公园"
                  />
                  <span>木王山森林公园</span>
                  <font>70.00元</font>
                </a>
              </li>

              <li>
                <a
                  href="javascript:;"
                  title="老君山"
                  target="_self"
                >
                  <img
                    class="lazyloadx"
                    data-original="./static/images/7.jpg"
                    alt="老君山"
                  />
                  <span>老君山</span>
                  <font>95.00元</font>
                </a>
              </li>
            </ul>

            <ul>
              <li>
                <a
                  href="javascript:;"
                  title="商洛凤凰古镇"
                  target="_self"
                >
                  <img
                    class="lazyloadx"
                    data-original="./static/images/25.jpg"
                    alt="商洛凤凰古镇"
                  />
                  <span>商洛凤凰古镇</span>
                  <font>暂无价格</font>
                </a>
              </li>
            </ul>

            <ul>
              <li>
                <a
                  href="javascript:;"
                  title="山阳天竺山"
                  target="_self"
                >
                  <img
                    class="lazyloadx"
                    data-original="./static/images/14.jpg"
                    alt="山阳天竺山"
                  />
                  <span>山阳天竺山</span>
                  <font>70.00元</font>
                </a>
              </li>
            </ul>

            <ul>
              <li>
                <a
                  href="javascript:;"
                  title="商洛柞水溶洞"
                  target="_self"
                >
                  <img
                    class="lazyloadx"
                    data-original="./static/images/18.jpg"
                    alt="商洛柞水溶洞"
                  />
                  <span>商洛柞水溶洞</span>
                  <font>90.00元</font>
                </a>
              </li>
            </ul>

            <ul>
              <li>
                <a
                  href="javascript:;"
                  title="塔云山"
                  target="_self"
                >
                  <img
                    class="lazyloadx"
                    data-original="./static/images/21.jpg"
                    alt="塔云山"
                  />
                  <span>塔云山</span>
                  <font>暂无价格</font>
                </a>
              </li>
            </ul>


                </div>
            </div>
        </div>

        <div class="width-box">
            <div class="advert-box">
                <a href="http://www.baidu.com" title="旅游景点旅行社网站" target="_blank">
                    <img class="lazyloads" data-size="1170_120" data-original="./static/images/30.jpg" alt="旅游景点旅行社网站" />
                </a>
            </div>
        </div>

        <div class="width-box">
            <div class="main-left">
                <div class="notice-box">
                    <h3>商洛市<em>旅游热线</em>&nbsp;——<em>18888888888</em></h3>
                    <p>
                        成立9年以来，组织和接待了来自世界各国、各地区的游客100万人次，积累了丰富的旅游接待经验，着<em>“宾客至上，信誉第一”</em>的服务宗旨，严格规范的管理制度，高质量的服务，赢得中外游客的广泛赞誉。
                    </p>
                </div>

                <div class="card-list">
                          
                  <?php foreach($strategyInfo as $keys=>$param){?>
                    <div class="card-li">
                        <div class="card-description">
                            <a class="card-title" href="./productGongLue.php?type=strategy&id=<?php echo $param['id'];?>" title="塔云山景区" target="_blank">
                                <h3><?php echo $param['name']?></h3>
                            </a>
                            <img class="card-image lazyloadx" data-original="<?php echo $param['upload'];?>" />
                            <p>
                               <?php echo $param['content'];?>
                            </p>
                        </div>
                        <div class="card-operation">
                            <div class="card-author">
                                <!-- <img class="lazyloadx" data-original="./static/image/user.jpg" /> -->
                                <font></font>
                            </div>
                            <div class="card-time">发布于 <?php echo date('Y-m-d H:i:s',$param['ctime']);?></div>
                            <div class="card-geek">
                                <font class="eye"></font>
                                <font class="share">&nbsp;
                                    <span>
                      <a
                        class="weibo"
                        target="_blank"
                        href="http://service.weibo.com/share/share.php?title=2021商洛商洛旅游攻略实用版&url=http%3A%2F%2Fbreeze%2Fmuban%2FM1156012%2F359%2Fstrategy%2Fshownews.php%3Flang%3Dcn%26id%3D54&pic=http%3A%2F%2Fbreeze%2Fupload%2F202109%2F1506334085.jpg"
                      ></a>
                      <a
                        class="weixin"
                        data-href="http://breeze/muban/M1156012/359/strategy/shownews.php?lang=cn&id=54"
                      ></a>
                      <a
                        class="qzone"
                        target="_blank"
                        href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?summary=2021商洛 旅游攻略实用版&url=http%3A%2F%2Fbreeze%2Fmuban%2FM1156012%2F359%2Fstrategy%2Fshownews.php%3Flang%3Dcn%26id%3D54&pics=http%3A%2F%2Fbreeze%2Fupload%2F202109%2F1506334085.jpg"
                      ></a>
                    </span>
                                </font>
                            </div>
                        </div>
                    </div>
                          <?php }?>
                </div>
            </div>
            <div class="main-right">
                <div class="editor-button">
                    <a href="javascript:;" title="电话咨询" target="_self">
                        <img class="lazyloads" data-size="19_17" data-original="./static/image/geek_5.png" /> 电话咨询
                    </a>
                </div>

                <div class="card-tags">
                    <h4>热搜标签</h4>
                    <ul>
                        <li>
                            <a href="javascript:;" title="商於古道棣花文化旅游景区" >商於古道棣花文化旅游景区</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="王柏栋故居"
                  >王柏栋故居</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="金丝峡景区"
                  >金丝峡景区</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="山阳天竺山森林公园"
                  >山阳天竺山森林公园</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="牛背梁"
                  >牛背梁</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="丹江漂流"
                  >丹江漂流</a
                >
              </li>
            </ul>
          </div>

          <div class="card-active">
            <h4>推荐景点</h4>
            <ul>
                    <?php foreach ($info as $k3=>$v3){?>
                        <li>
                            <a href="./product.php?type=spot&id=<?php echo $v3['id'];?>" title="月亮洞一日游" >
                                <img class="lazyloads" data-original="<?php echo $v3['upload'];?>" />
                                <span><?php echo $v3['name'];?></span>
                            </a>
                        </li>
                        <?php }?>

                    </ul>
                </div>

                <div class="card-hots">
                    <h4>热门排行</h4>
                    <ul>
                        <li>
                            <a href="javascript:;" title="2021商洛旅游攻略实用版" >2021商洛旅游攻略实用版</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="金丝峡国家森林公园"
                  >金丝峡国家森林公园</a
                >
              </li>
              <li>
                <a
                href="javascript:;"
                  title="凤冠山自然风景区"
                  >凤冠山自然风景区</a
                >
              </li>

              <li>
                <a
                href="javascript:;"
                  title="木王山国家森林公园"
                  >木王山国家森林公园</a
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
                    Powered&nbsp;by&nbsp;<a href="http://www.slxy.cn/" target="_blank" title="商洛学院">slxy</a
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