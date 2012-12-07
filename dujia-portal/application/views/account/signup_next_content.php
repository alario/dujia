<div id="content">
	<div class="mainbox" id="yui_3_5_1_1_1354772391788_45">
		<h2 id="yui_3_5_1_1_1354772391788_46">下一步：请验证您的邮箱</h2>
		<div class="notice-content" id="yui_3_5_1_1_1354772391788_48">
			<p>
				我们发送了一封验证邮件到 <strong><?php echo $email; ?> </strong>，请到您的邮箱收信，并点击其中的链接验证您的邮箱。
			</p>

			<?php if ( isset($go) ): ?>
			<a class="link-button" href="<?php echo $go; ?>" target="_blank"
				id="yui_3_5_1_1_1354772391788_47">去邮箱验证</a>
			<?php endif; ?>
		</div>
		<div class="help-tip">
			<h3>收不到邮件？</h3>
			<ul>
				<li>• 请检查你的垃圾箱或广告箱，邮件有可能被误认为垃圾或广告邮件；<span class="choose-mail-text">或选择</span><a
					href="javascript:;" class="normal-button" id="repeat-verify-mail"
					data-email="<?php echo $email;?>">重发验证邮件</a> <span></span>
				</li>
				<li>• 用 <?php echo $email; ?> 向 hi@mail.dujia.cn
					发送一封任意内容的邮件，几分钟后即可直接登录。
				</li>
				<li>• <a target="_blank" href="/help/email/163">了解如何把的邮件列为白名单</a>
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