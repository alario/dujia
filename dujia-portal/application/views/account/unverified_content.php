<div id="content">
	<div class="mainbox unverified-box" id="yui_3_5_1_1_1354775606483_46">
		<h2 id="yui_3_5_1_1_1354775606483_45">您的邮箱未验证</h2>
		<div class="notice">
			<p>
				您的用户名 <strong><?php echo $name; ?> </strong> 已经成功注册，但是您的邮箱 <span
					class="label"><?php echo $mail; ?> </span> 还未验证。
			</p>
			<p class="extra">
				（为了您的邮箱安全，邮箱名称中间部分以<strong>*</strong>代替）
			</p>
			<?php if ( isset( $go ) ): ?>
			<a class="link-button verify" href="<?php echo $go; ?>"
				target="_blank">去邮箱验证</a>
			<?php endif; ?>
		</div>
		<div class="help-tip">
			<h3>收不到邮件？</h3>
			<ul>
				<li>• 请检查你的垃圾箱或广告箱，邮件有可能被误认为垃圾或广告邮件；<span class="choose-mail-text">或选择</span><a
					href="javascript:;" class="normal-button" id="repeat-verify-mail">重发验证邮件</a>
					<span style="color: green;"></span>
				</li>
				<li>• 用 <?php echo $mail; ?> 向 hi@mail.dujia.cn
					发送一封任意内容的邮件，几分钟后即可直接登录。
				</li>
				<li>• <a target="_blank" href="/help/email/163">了解如何把度假网的邮件列为白名单</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
$( function() {
	$("#repeat-verify-mail").click( function() {
		var remoting = {
				url: "/account/mailcode_once_more/<?php echo $uid; ?>",
				type: "GET",
				// data: { value: obj.val() },
				error: function( x, error ) {
					$("#repeat-verify-mail").next('span').text('发送失败。').css('color', 'red' );
				},
				success: function( data ) {
					if ( data == 'OK' )
						$("#repeat-verify-mail").next('span').text('发送成功。').css('color', 'green');
					else
						$("#repeat-verify-mail").next('span').text('发送失败。').css('color', 'red');
				} 
		};
		$("#repeat-verify-mail").next('span').text('发送中...').css('color', 'green');
		$.ajax( remoting );
	} );
} );
</script>
