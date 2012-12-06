<div id="content">
	<div class="mainbox">
		<div class="head-section cf">
			<ul>
				<li class="current"><a class="email-trigger " href="/account/signup"><i></i><span></span>邮箱注册</a>
				</li>
				<li><a class="mobile-trigger" href="/account/mobile_signup"><i></i><span></span>手机注册</a>
				</li>
			</ul>
			<span class="login-guide">已有账号？<a href="/account/login">登录 »</a>
			</span>
		</div>

		<form id="signup-form" action="/account/signup_submit" method="post"
			class="common-form">
			<div class="field-group field-group-type"
				id="yui_3_5_1_2_1354250635802_44">
				<label for="signup-email-address">邮箱</label> <input type="text"
					name="email" id="signup-email-address" class="f-text"
					autocomplete="off" value=""> <span class="inline-tip">用于登录和找回密码，不会公开</span>
			</div>
			<div class="field-group" id="yui_3_5_1_2_1354250635802_46">
				<label for="signup-username">用户名</label> <input type="text"
					name="username" id="signup-username" class="f-text"
					autocomplete="off" value=""> <span class="inline-tip"
					style="display: none"></span>
			</div>
			<div class="field-group" id="yui_3_5_1_2_1354250635802_48">
				<label for="signup-password">创建密码</label> <input type="password"
					name="password" id="signup-password" class="f-text"
					autocomplete="off"> <span class="inline-tip" style="display: none"></span>
			</div>
			<div class="field-group" id="yui_3_5_1_2_1354250635802_50">
				<label for="signup-password-confirm">确认密码</label> <input
					type="password" name="password2" id="signup-password-confirm"
					class="f-text" autocomplete="off"> <span class="inline-tip"
					style="display: none"></span>
			</div>
			<div class="field-group">
				<input type="checkbox" value="1" name="subscribe" id="subscribe"
					class="f-check" checked="checked" autocomplete="off"> <label
					class="normal" for="subscribe">订阅每日最新信息，可随时退订</label>
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
			<div class="field-group operate">
				<input type="submit" class="form-button" name="commit"
					value="同意以下协议并注册"> <br> <a tabindex="-1" href="/about/terms"
					target="_blank" class="terms">《用户协议》</a>
			</div>
		</form>
	</div>
</div>
<script
	type="text/javascript" src="/asset/helper/account_signup_validation.js"></script>
<script type="text/javascript">
<!--


$( function() {

	$('#signup_captcha_img_change').click( function() {
		var ran = Math.random();
		$('#signup_captcha_img').attr('src', '/java/captcha?' + ran );
	} );
	
	var the_form = $('#signup-form');
	var inputs = the_form.find("div").find("input").filter(".f-text");
	inputs.filter('#signup-email-address').data( 'prompt', '用于登录和找回密码，不会公开' );
	inputs.filter('#signup-email-address').data( 'error', '请填写邮箱地址' );
	inputs.filter('#signup-email-address').data( 'remoting', '检查中...' );
	inputs.filter('#signup-email-address').data( 'validation', function() {
		var obj = inputs.filter('#signup-email-address');
		if ( obj.val().length == 0 )
			return 'error';
		if ( /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/.test( obj.val() ) )
		{
			var remoting = {
					url: "/account/signup_check/email",
					type: "POST",
					data: { value: obj.val() },
					error: function( x, error ) {
						show_error( obj, '网站维护中，暂时不能注册' );
					},
					success: function( data ) {
						if ( data == '0' )
							show_success( obj );
						else
							show_error( obj, '该邮箱已注册，<a href="/account/login">直接登录</a>' );
					} 
			};
			$.ajax( remoting );
			return 'remoting';
		}
		else
			return '邮箱格式错误，请重新输入';
	} );

	function getStringWidth(str) {
	    var width = len = str.length;
	    for(var i=0; i < len; i++) {
	        if(str.charCodeAt(i) >= 255) {
	            width++;
	        }
	    }
	    return width;
	}

	inputs.filter("#signup-username").data( 'prompt', '4-16字符，一个汉字算两个字符。可使用字母、数字、汉字和下划线，且不能全为数字' );
	inputs.filter('#signup-username').data( 'error', '请填写用户名' );
	inputs.filter('#signup-username').data( 'remoting', '检查中...' );
	inputs.filter('#signup-username').data( 'validation', function() {
		var obj = inputs.filter('#signup-username');
		if ( obj.val() == '' )
			return 'error';
		if ( ! ( /^[\w\u3400-\u9FFF]+$/.test( obj.val() ) ) )
		{
			return '用户名只能使用字母、数字、汉字和下划线';
		}
		
		var len = getStringWidth( obj.val() );
		if ( len < 4 )
			return '用户名太短，至少4个字符';
		else if ( len > 16 )
			return '用户名太长，最多16个字符';
		else if ( /^\d+$/.test( obj.val() ) )
			return '用户名不能全为数字';
		
		
		var remoting = {
				url: "/account/signup_check/name",
				type: "POST",
				data: { value: obj.val() },
				error: function( x, error ) {
					show_error( obj, '网站维护中，暂时不能注册' );
				},
				success: function( data ) {
					if ( data == '0' )
						show_success( obj );
					else
						show_error( obj, '该用户名已被占用，另取一个用户名吧' );
				}
			};
		
		$.ajax( remoting );
		return 'remoting';
	} );

	inputs.filter("#signup-password-confirm").data( 'prompt', '请再次输入密码' );
	inputs.filter('#signup-password-confirm').data( 'error', '请再次输入密码' );
	inputs.filter('#signup-password-confirm').data( 'remoting', '检查中...' );
	inputs.filter('#signup-password-confirm').data( 'validation', function() {
		var obj = inputs.filter('#signup-password-confirm');
		if ( obj.val().length == 0 )
			return 'error';
		else if ( obj.val() == inputs.filter( '#signup-password' ).val() )
		{
			return 'success';
		}
		else return '两次输入的密码不一致，请重新输入';
	} );


	inputs.filter("#signup-password").data( 'prompt', '6-32字符，可使用字母、数字及符号的任意组合' );
	inputs.filter('#signup-password').data( 'error', '请填写密码' );
	inputs.filter('#signup-password').data( 'remoting', '检查中...' );
	inputs.filter('#signup-password').data( 'validation', function() {
		var obj = inputs.filter('#signup-password');
		if ( obj.val().length == 0 )
			return 'error';
		else if ( obj.val().length < 6 )
			return '密码太短，至少6个字符';
		else if ( obj.val().length > 32 )
			return '密码太长，最多32个字符';
		else if ( /^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,32}$/.test( obj.val() ) )
			return 'success';
		else
			 return 'error';
	} );

	inputs.filter('#signup-password').data( 'trigger-validation', inputs.filter('#signup-password-confirm')[0] );

	register_validation( the_form, inputs );

} );
//-->
</script>

