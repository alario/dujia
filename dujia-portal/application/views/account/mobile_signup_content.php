<div id="content">
	<div class="mainbox">
		<div class="head-section cf">
			<ul>
				<li><a class="email-trigger" href="/account/signup"><i></i><span></span>邮箱注册</a>
				</li>
				<li class="current"><a class="mobile-trigger"
					href="/account/mobile_signup"><i></i><span></span>手机注册</a></li>
			</ul>
			<span class="login-guide">已有账号？<a href="/account/login">登录 »</a>
			</span>
		</div>

		<form id="mobile-signup-form" action="/account/mobile_signup_submit"
			method="post" class="common-form">
			<div class="field-group field-group-type" id="d_signup_mobile">
				<label for="signup_mobile">手机号</label> <input type="text"
					name="signup_mobile" id="signup_mobile" class=" f-text"
					autocomplete="off" value=""> <span class="inline-tip" style="display: none">用于登录和找回密码，不会公开</span>
				<p class="verify-mobile">
					<input type="button" class="verify-btn" value="免费获取短信验证码"> <span
						class="verify-tip" id="yui_3_5_1_2_1354253427102_11"></span>
				</p>
			</div>
			<div class="field-group field-group-type" id="d_signup_verify_code">
				<label for="signup_verify_code">短信验证码</label> <input type="text"
					name="signup_verify_code" id="signup_verify_code" class="f-text"
					autocomplete="off" value="" /> <span class="inline-tip"
					style="display: none"></span>
			</div>
			<div class="field-group field-group-type" id="d_signup_password">
				<label for="signup_password">创建密码</label> <input type="password"
					name="signup_password" id="signup_password" class="f-text"
					autocomplete="off"><span class="inline-tip" style="display: none"></span>
			</div>
			<div class="field-group field-group-type"
				id="d_signup_password_confirm">
				<label for="signup_password_confirm">确认密码</label> <input
					type="password" name="signup_password_confirm"
					id="signup_password_confirm" class="f-text" autocomplete="off"> <span
					class="inline-tip" style="display: none"></span>
			</div>
			<div class="field-group operate">
				<input type="submit" class="form-button" name="commit"
					value="同意以下协议并注册"> <br> <a tabindex="-1" href="/about/terms"
					target="_blank" class="terms">《用户协议》</a> <input type="hidden"
					name="cityid" value="1">
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
<!--

$( function() {
	var the_form = $('#mobile-signup-form');
	var inputs = the_form.find("div").find("input");
	inputs.filter('#signup_mobile').data( 'prompt', '用于登录和找回密码，不会公开' );
	inputs.filter('#signup_mobile').data( 'error', '请输入正确的11位手机号码' );
	inputs.filter('#signup_mobile').data( 'remoting', '检查中...' );
	inputs.filter('#signup_mobile').data( 'validation', function() {
		var obj = inputs.filter('#signup_mobile');
		if ( /^1[3|4|5|8][0-9]\d{8}$/.test( obj.val() ) )
		{
			return 'remoting';
		}
		else
			return 'error';
	} );
	

	
	inputs.focus( function() {
		var obj = this;
		$(obj).parent("div").attr('class', 'field-group field-group-type');
		var prompt = $(obj).data('prompt');
		if ( typeof( prompt ) == 'undefined' || prompt == '' )
		{
			$(obj).parent("div").find('.inline-tip').css('display', 'none');
		}
		else
		{
			$(obj).parent("div").find('.inline-tip').css('display', '');
			$(obj).parent("div").find('.inline-tip').text( prompt );
		}
	} );
	inputs.blur( function() {
		var obj = this;
		var validation = $(obj).data("validation");
		var result = validation();
		if ( result == 'error' )
		{
			$(obj).parent("div").attr('class', 'field-group field-group-error');
			$(obj).parent("div").find('.inline-tip').css('display', '');
			$(obj).parent("div").find('.inline-tip').text( $(obj).data('error') );
		}
		else if ( result == 'remoting' )
		{
			$(obj).parent("div").attr('class', 'field-group field-group-type');
			$(obj).parent("div").find('.inline-tip').css('display', '');
			$(obj).parent("div").find('.inline-tip').text('检查中...');
		}
		else if ( result == "success" )
		{
			$(obj).parent("div").attr('class', 'field-group field-group-ok');
			$(obj).parent("div").find('.inline-tip').css('display', '');
			$(obj).parent("div").find('.inline-tip').text('');
		}
	} );

	/*
	var d_signup_mobile = the_form.find("#d_signup_mobile");
	d_signup_mobile.find("input").focus( function( obj ) {
		d_signup_mobile.attr('class', 'field-group field-group-type');
		d_signup_mobile.find("span").text('用于登录和找回密码，不会公开');
	} );
	d_signup_mobile.find("input").blur( function( obj ){
		
	} );
	
	var d_signup_verify_code = the_form.find("#d_signup_verify_code");
	var d_signup_password = the_form.find("#d_signup_password");
	var signup_password_confirm = the_form.find("#signup_password_confirm");
	*/	
} );
//-->
</script>
