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
					autocomplete="off"> <span class="inline-tip" style="display: none"></span>
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
	var inputs = the_form.find("div").find("input").filter(".f-text");
	inputs.filter('#signup_mobile').data( 'prompt', '用于登录和找回密码，不会公开' );
	inputs.filter('#signup_mobile').data( 'error', '请输入正确的11位手机号码' );
	inputs.filter('#signup_mobile').data( 'remoting', '检查中...' );
	inputs.filter('#signup_mobile').data( 'validation', function() {
		var obj = inputs.filter('#signup_mobile');
		if ( /^1[3|4|5|8][0-9]\d{8}$/.test( obj.val() ) )
		{
			var remoting = {
					url: "/account/mobile_signup_checkmobile/" + obj.val(),
					error: function( x, error ) {
						show_error( obj, '网站维护中，暂时不能注册' );
					},
					success: function( data ) {
						if ( data == '0' )
							show_success( obj );
						else
							show_error( obj, '该手机号已被绑定，<a href="/account/login">直接登录</a>' );
					} 
			};
			$.ajax( remoting );
			return 'remoting';
		}
		else
			return 'error';
	} );

	inputs.filter("#signup_verify_code").data( 'prompt', '请输入收到的手机验证码' );
	inputs.filter('#signup_verify_code').data( 'error', '请输入收到的手机验证码' );
	inputs.filter('#signup_verify_code').data( 'remoting', '检查中...' );
	inputs.filter('#signup_verify_code').data( 'validation', function() {
		var obj = inputs.filter('#signup_verify_code');
		if ( obj.val() != '' )
		{
			return 'success';
		}
		else
			return 'error';
	} );

	inputs.filter("#signup_password_confirm").data( 'prompt', '请再次输入密码' );
	inputs.filter('#signup_password_confirm').data( 'error', '请再次输入密码' );
	inputs.filter('#signup_password_confirm').data( 'remoting', '检查中...' );
	inputs.filter('#signup_password_confirm').data( 'validation', function() {
		var obj = inputs.filter('#signup_password_confirm');
		if ( obj.val().length == 0 )
			return 'error';
		else if ( obj.val() == inputs.filter( '#signup_password' ).val() )
		{
			return 'success';
		}
		else return '两次输入的密码不一致，请重新输入';
	} );


	inputs.filter("#signup_password").data( 'prompt', '6-32字符，可使用字母、数字及符号的任意组合' );
	inputs.filter('#signup_password').data( 'error', '请填写密码' );
	inputs.filter('#signup_password').data( 'remoting', '检查中...' );
	inputs.filter('#signup_password').data( 'validation', function() {
		var obj = inputs.filter('#signup_password');
		if ( /^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,22}$/.test( obj.val() ) )
		{
			return 'success';
		}
		else if ( obj.val().length == 0 )
			return 'error';
		else if ( obj.val().length < 6 )
			return '密码太短，至少6个字符';
		else if ( obj.val().length > 32 )
			return '密码太长，最多32个字符';
		else return 'error';
	} );

	inputs.filter('#signup_password').data( 'trigger-validation', inputs.filter('#signup_password_confirm')[0] );

	var input_prompt = function( obj ) {
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
		$(obj).data('validated', false);
	};

	var show_success = function( jobj ) {
		jobj.data("validated", true);
		var div = jobj.parent('div');
		div.attr('class', 'field-group field-group-ok');
		div.find('.inline-tip').css('display', '');
		div.find('.inline-tip').html('');
	};

	var show_error = function( jobj, msg ) {
		jobj.data("validated", false);
		var div = jobj.parent('div');
		div.attr('class', 'field-group field-group-error');
		div.find('.inline-tip').css('display', '');
		div.find('.inline-tip').html( msg );
	};

	var show_remoting = function( jobj, msg ) {
		jobj.data("validated", false);
		var div = jobj.parent('div');
		div.attr('class', 'field-group field-group-type');
		div.find('.inline-tip').css('display', '');
		div.find('.inline-tip').html( msg );
	
	}
		
	var input_validate = function( obj, method ) {

		if ( method == 'ontrigger' && 'none' == $(obj).parent("div").find('.inline-tip').css('display') )
			return true;
		if ( method == 'onsubmit' )
		{
			var validated = $(obj).data('validated');
			if ( typeof( validated ) != 'undefined' && validated )
				return true;
		}
		var validation = $(obj).data("validation");
		var result = validation();
		var ret = false;
		if ( result == 'error' )
		{
			show_error( $(obj), $(obj).data('error') );
		}
		else if ( result == 'remoting' )
		{
			show_remoting( $(obj), '检查中...' );
		}
		else if ( result == "success" )
		{
			show_success( $(obj) );
			ret = true;
		}
		else
		{
			show_error( $(obj), result );
		}
		if ( method == 'input' && typeof $(obj).data("trigger-validation") != 'undefined' )
		{
			input_validate( $(obj).data("trigger-validation"), 'ontrigger' );
		}
		return ret;
	};
	
	inputs.focus( function() { input_prompt( this ); } );
	inputs.blur( function() { input_validate( this, 'onblur' ); } );
	the_form.submit( function( e ) {
		var passed = true;
		inputs.each( function(){ passed &= input_validate( this, 'onsubmit' ); } );
		if ( !passed )
			e.preventDefault();
	} );
			
} );
//-->
</script>
