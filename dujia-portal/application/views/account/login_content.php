<div id="content" class="pg-login">
	<div class="mainbox">
		<h2>
			登录<span>尚未注册？<a href="/account/signup"
				gaevent="InnerLink|Click|content/signup/text">免费注册 »</a>
			</span>
		</h2>
		<div class="signup-section">

			<form id="login_form" action="/account/login_submit" method="post"
				class="common-form">
				<div class="field-group" id="yui_3_5_1_2_1354597332669_28">
					<label for="login_account">账号</label> <input type="text"
						id="login_account" class="f-text" name="account"
						value="<?php if ( isset( $account ) ) echo $account; ?>"> <span
						id="login_account_tip" class="inline-tip" style="display: none;">请输入正确的邮箱、手机号或用户名</span>
					<p class="account-tip">您可用绑定手机号、用户名、邮箱登录</p>
				</div>
				<div class="field-group" id="yui_3_5_1_2_1354597332669_30">
					<label for="login_password">密码</label> <input type="password"
						id="login_password" class="f-text" name="password"> <a
						tabindex="-1" href="/account/resetreq" class="inline-link">忘记密码？</a><span
						id="login_password_tip" class="inline-tip" style="display: none;">请输入密码</span>
				</div>
				<div class="field-group captcha" id="yui_3_5_1_2_1354597332669_32">
					<label for="captcha">验证码</label> <input type="text" id="captcha"
						class="f-text" name="captcha" autocomplete="off"> <img
						id="signup_captcha_img" height="30px" width="60px"
						class="signup-captcha-img" src="/java/captcha"> <a tabindex="-1"
						class="captcha-refresh inline-link" href="javascript:void(0)"
						id="signup_captcha_img_change">看不清楚？换一张</a><span id="captcha_tip"
						class="inline-tip" style="display: none;">请输入验证码</span>
				</div>

				<div class="field-group auto-login">
					<input type="checkbox" value="1" checked="" name="remember"
						id="autologin" class="f-check"> <label class="normal"
						for="autologin">下次自动登录</label>
				</div>
				<div class="field-group">
					<input type="submit" class="form-button" name="commit" value="登录">
				</div>
			</form>
		</div>
		<div class="oauth-section">
			<div class="switch-area">
				<span>尚未注册？</span> <a href="/account/signup" class="normal-button"
					gaevent="InnerLink|Click|content/signup/button">免费注册 »</a>
			</div>
			<h3>用合作网站账号登录</h3>

			<ul id="open-auth" class="open-auth cf">
				<li><a class="qq" gaevent="OutLink|Click|content/login/qq"
					href="/account/connect/tencent" target="_blank"
					data-mtevent="{&quot;ca&quot;:&quot;InnerLink&quot;,&quot;ac&quot;:&quot;Click&quot;,&quot;la&quot;:&quot;account\/login\/oauth\/qq&quot;}">QQ</a>
				</li>
				<li><a class="alipay" gaevent="OutLink|Click|content/login/alipay"
					href="https://mapi.alipay.com/gateway.do?_input_charset=utf-8&amp;partner=2088201962473581&amp;return_url=http%3A%2F%2Fwww.meituan.com%2Faccount%2Fcallback%2Falipay&amp;service=alipay.auth.authorize&amp;target_service=user.auth.quick.login&amp;sign_type=MD5&amp;sign=5574c4142ec46b80dc4b2c773f9add87"
					target="_blank"
					data-mtevent="{&quot;ca&quot;:&quot;InnerLink&quot;,&quot;ac&quot;:&quot;Click&quot;,&quot;la&quot;:&quot;account\/login\/oauth\/aplipay&quot;}">支付宝</a>
				</li>
				<li><a class="sina" gaevent="OutLink|Click|content/login/sina"
					href="/account/connect/sina" target="_blank"
					data-mtevent="{&quot;ca&quot;:&quot;InnerLink&quot;,&quot;ac&quot;:&quot;Click&quot;,&quot;la&quot;:&quot;account\/login\/oauth\/sina&quot;}">新浪微博</a>
				</li>
				<li><a class="baidu" gaevent="OutLink|Click|content/login/baidu"
					href="/account/connect/baidu" target="_blank"
					data-mtevent="{&quot;ca&quot;:&quot;InnerLink&quot;,&quot;ac&quot;:&quot;Click&quot;,&quot;la&quot;:&quot;account\/login\/oauth\/baidu&quot;}">百度</a>
				</li>
				<li><a class="qihu360" gaevent="OutLink|Click|content/login/360"
					href="/account/connect/tuan360" target="_blank"
					data-mtevent="{&quot;ca&quot;:&quot;InnerLink&quot;,&quot;ac&quot;:&quot;Click&quot;,&quot;la&quot;:&quot;account\/login\/oauth\/360&quot;}">360</a>
				</li>
				<li><a class="kaixin"
					gaevent="OutLink|Click|content/login/kaixin001"
					href="/account/connect/kaixin" target="_blank"
					data-mtevent="{&quot;ca&quot;:&quot;InnerLink&quot;,&quot;ac&quot;:&quot;Click&quot;,&quot;la&quot;:&quot;account\/login\/oauth\/kaixin&quot;}">开心网</a>
				</li>
				<li><a class="tuan800" gaevent="OutLink|Click|content/login/tuan800"
					href="/account/connect/tuan800" target="_blank"
					data-mtevent="{&quot;ca&quot;:&quot;InnerLink&quot;,&quot;ac&quot;:&quot;Click&quot;,&quot;la&quot;:&quot;account\/login\/oauth\/tuan800&quot;}">团800</a>
				</li>
				<li><a class="cmpay" gaevent="OutLink|Click|content/login/cmpay"
					href="
https://cmpay.10086.cn/club/gw.xhtml?SERVICE=user_authentication&amp;TARGET_URL=http://www.meituan.com&amp;PARTNER=888009953110444&amp;SIGN_TYPE=MD5&amp;SIGN_DATA=3d01948ab619904b56c7f910025e94d3&amp;CMPAY_NK="
					target="_blank"
					data-mtevent="{&quot;ca&quot;:&quot;InnerLink&quot;,&quot;ac&quot;:&quot;Click&quot;,&quot;la&quot;:&quot;account\/login\/oauth\/cmpay&quot;}">手机支付</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
$( function() {
	$('#signup_captcha_img_change').click( function() {
		var ran = Math.random();
		$('#signup_captcha_img').attr('src', '/java/captcha?' + ran );
	} );

	var jform = $('#login_form');
	var jaccount = jform.find('#login_account');
	var jpwd = jform.find('#login_password');
	var jcaptcha = jform.find('#captcha');

	jaccount.focus( function() {
		jaccount.parent('div').attr('class', 'field-group');
		jaccount.siblings('.inline-tip').css('display', 'none');
	} );
	jpwd.focus( function() {
		jpwd.parent('div').attr('class', 'field-group');
		jpwd.siblings('.inline-tip').css('display', 'none');
	} );
	jcaptcha.focus( function() {
		jcaptcha.parent('div').attr('class', 'field-group captcha');
		jcaptcha.siblings('.inline-tip').css('display', 'none');
	} );
	
	jform.submit( function( e ) {
		var passed = true;
		if ( jaccount.val().length == 0 )
		{
			passed = false;
			jaccount.parent('div').attr('class', 'field-group field-group-error');
			jaccount.siblings('.inline-tip').css('display', '');
		}
		if ( jpwd.val().length == 0 )
		{
			passed = false;
			jpwd.parent('div').attr('class', 'field-group field-group-error');
			jpwd.siblings('.inline-tip').css('display', '');
		} 
		if ( jcaptcha.val().length == 0 )
		{
			passed = false;
			jcaptcha.parent('div').attr('class', 'field-group captcha field-group-error');
			jcaptcha.siblings('.inline-tip').css('display', '');
		}
		if ( !passed )
			e.preventDefault();
	} );
} );

</script>
