<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php
if ( isset($subtitle) ) echo $subtitle." | 度假网";
else echo "度假网"; ?>
</title>
<link rel="icon" href="/asset/favicon.ico?v=6" type="image/x-icon" />
<link rel="stylesheet" href="/asset/base.css" />
<?php
if ( $bodyId == 'signup' || $bodyId == 'login' )
	echo "<link rel='stylesheet' href='/asset/account.css'>";
if ( isset( $css ) )
{
	if ( is_array( $css ) )
	{
		foreach ( $css as $tmp )
		{
			echo "<link rel='stylesheet' href='{$tmp}'></script>";
		}
	}
	else
	{
		echo "<link rel='stylesheet' href='{$css}'></script>";
	}
}
?>
<script type="text/javascript" src="/asset/jquery-1.8.3.js"></script>
<?php 
if ( isset( $js ) )
{
	if ( is_array( $js ) )
	{
		foreach ( $js as $tmp )
		{
			echo "<script type='text/javascript' src='{$tmp}'></script>";
		}
	}
	else
	{
		echo "<script type='text/javascript' src='{$js}'></script>";
	}
}
?>
</head>
<body id="<?php echo $bodyId; ?>">
	<div id="doc">
		<div id="hdw">
			<div id="hd">
				<div id="site-top" class="cf">
					<h1>
						<a href="http://127.0.0.1/"><img src="/asset/image/logo.png?v=1"
							width="108" height="66" title="度假" alt="度假"> </a>
					</h1>
					<div class="city-info">
						<h2>
							<a href="http://127.0.0.1/">北京</a>
						</h2>
						<a href="http://127.0.0.1/" class="change-city">[切换城市]</a>
					</div>
					<div class="site-info">
						<ul>
							<li><a class="subscribe" href="http://127.0.0.1/"><span
									class="pngfix"></span>邮件订阅</a>
							</li>
							<li><a class="fav" id="favorite" href="javascript:void(0);"><span
									class="pngfix"></span>加入收藏夹</a>
							</li>
							<li><a class="mobile" href="http://127.0.0.1/"><span
									class="pngfix"></span>下载手机版</a>
							</li>
							<li><a class="refer" href="http://127.0.0.1/" target="_blank">邀请好友</a>
							</li>
							<li class="last"><a href="http://127.0.0.1/">常见问题</a>
							</li>
						</ul>
					</div>
					<div class="search cf" id="yui_3_5_1_1_1353917801770_50">
						<form action="/s/" name="searchForm" method="get"
							id="yui_3_5_1_1_1353917801770_13">
							<input type="text" name="w" autocomplete="off" class="s-text"
								value="" x-webkit-speech="" placeholder="请输入"
								id="yui_3_5_1_1_1353917801770_49"> <input type="submit"
								class="s-submit" hidefocus="true" mttcode="Asearch.Bmaintop"
								value="搜索">
						</form>
					</div>
				</div>
				<div id="site-nav" class="site-nav">
					<div class="nav-wrapper cf">
						<ul class="nav">
							<li><a href="/home">我的家</a></li>
							<li><a href="/regular" class="hover">精选假期<span class="tip-new"></span>
							</a></li>
							<li><a href="/tehui">特惠酒店</a>
							</li>
							<li><a href="/tehui">特惠公寓</a>
							</li>
							<li><a href="/guolei">国内度假</a>
							</li>
							<li><a href="/haiwai">海外度假</a></li>
						</ul>
						<ul class="user-info">
							<?php if ( isset( $ticket ) ):?>
							<li class="name">欢迎您，<?php echo $ticket['mb']; ?>
							</li>
							<li class="login"><a href="/account/logout">退出</a>
							</li>
							<?php else: ?>

							<li class="login"><a href="/account/login">登录</a>
							</li>
							<li class="login"><a href="/account/signup">注册</a>
							</li>
							<?php endif;?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<?php if ( isset( $sysmsg) ): ?>
		<div class="sysmsgw" id="sysmsg-error">
			<div class="sysmsg">
				<p id="yui_3_5_1_1_1354352859176_48">
					<?php echo $sysmsg; ?>
				</p>
				<span class="close">关闭</span>
			</div>
		</div>
		<script type="text/javascript">
			$( function() {
				var divError = $("#sysmsg-error");
				divError.find("span.close").click( function() {
					divError.slideUp('fast');
				} );
			} );
					
		</script>
		<?php endif; ?>
		<div id="bdw" class="bdw">
			<div id="bd" class="cf">
				<?php echo $content; ?>
				<?php if ( isset( $sidebar ) ) echo $sidebar; ?>
			</div>
		</div>
		<div id="ftw">
			<?php if ( isset( $trace ) )  var_dump( $trace ); ?>
			<div id="ft">
				<div class="ftbox">
					<h3>用户帮助</h3>
					<ul>
						<li><a href="#">常见问题</a></li>
						<li><a href="#">往期精选假期</a></li>
						<li><a href="#">邮箱白名单设置</a></li>
						<li><a href="#">开放API</a></li>
						<li><a href="#">反诈骗公告</a></li>
					</ul>
				</div>
				<div class="ftbox">
					<h3>获取更新</h3>
					<ul>
						<li><a href="#">邮件订阅</a></li>
						<li><a href="#">iPhone/Android</a></li>
						<li><a rel="nofollow" href="#" target="_blank">度假网QQ空间</a></li>
						<li><a rel="nofollow" href="#" target="_blank">度假网新浪微博</a></li>
						<li><a rel="nofollow" href="#" target="_blank">度假网腾讯微博</a></li>
						<li><a href="#" target="_blank">RSS订阅</a>
						</li>
					</ul>
				</div>
				<div class="ftbox">
					<h3>商务合作</h3>
					<ul>
						<li><a href="#" gaevent="InnerLink|Click|footer/seller">提供交换资源</a>
						</li>
						<li><a href="#">保证金缴纳说明</a></li>
						<li><a href="#">市场合作</a></li>
						<li><a href="#" target="_blank">度假联盟</a></li>
					</ul>
				</div>
				<div class="ftbox">
					<h3>公司信息</h3>
					<ul>
						<li><a href="#">关于度假网</a></li>
						<li><a href="#">度假网承诺</a></li>
						<li><a href="#">媒体报道</a></li>
						<li><a href="#" gaevent="InnerLink|Click|footer/job">加入我们</a></li>
						<li><a href="#">法律声明</a></li>
					</ul>
				</div>
				<div class="ftbox service">
					<i class="hotline"></i>
					<p class="desc">客服电话(免长途费)</p>
					<p class="num">400-660-5335</p>
					<p class="time">周一到周日8:00-22:00</p>
				</div>

				<div class="copyright">
					<p>
						©<span title="I:6; Q:1; S:1; C:2; F:0; T:26.92; H:e21">2012</span><a
							href="http://dujia.cn/">度假网</a> dujia.cn <a
							href="http://www.miibeian.gov.cn/" target="_blank">京ICP证XXXXX号</a>
						京公网安备XXXXXXXXXXX号
					</p>
				</div>

				<ul class="cert cf">
					<li class="record"><a title="备案信息" href="#" hidefocus="true"
						target="_blank">备案信息</a></li>
					<li class="alipay"><a title="支付宝特约商家">支付宝特约商家</a></li>
					<li class="tenpay"><a href="#" title="财付通诚信商家" hidefocus="true"
						target="_blank">财付通诚信商家</a></li>
					<li class="knet"><a href="#" target="_blank" title="可信网站认证">可信网站</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

</body>
</html>
