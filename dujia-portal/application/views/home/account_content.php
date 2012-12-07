<div id="content" class="settings-box settings-form-wrapper">

	<?php if (isset($dashboard)) echo $dashboard; ?>
	<div class="mainbox mine" id="yui_3_5_1_1_1354892750929_47">

		<form id="settings-form" method="post" action="/home/account"
			class="common-form" autocomplete="off">
			<div class="field-group f-display" id="yui_3_5_1_1_1354892750929_46">
				<label id="yui_3_5_1_1_1354892750929_45">手机号</label>

				<?php if( isset( $mobile) ): ?>
				<span class="text"><?php echo $mobile; ?> </span><a
					class="settings-mobile-rebind inline-link"
					href="javascript:void(0)">更换号码</a>
				<?php else: ?>
				<span class="text">尚未绑定任何手机号</span><a
					class="settings-mobile-rebind inline-link"
					href="javascript:void(0)">立即绑定</a>
				<?php endif; ?>
			</div>
			<div class="field-group f-display">
				<label>邮箱</label>
				<?php
				if( isset( $email ) )
					echo "<span class='text'>".$email."</span>";
				else
					echo "<span class='text'>尚未绑定邮箱</span><a class='settings-mobile-rebind inline-link' href='javascript:void(0)'>立即绑定</a>";
				?>

			</div>
			<div class="field-group f-display">
				<label>用户名</label> <span class="text">alario</span> <a
					id="settings-username-reset" class="inline-link"
					href="javascript:void(0)">修改</a>
			</div>
			<div class="field-group f-display f-password">
				<label>密码</label> <a id="settings-password-reset"
					class="inline-link" href="javascript:void(0)">修改</a>
			</div>
		</form>
	</div>
</div>
