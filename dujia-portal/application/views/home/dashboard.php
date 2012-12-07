
<div class="dashboard">
	<ul>
		<li <?php if($current=='tianluncard') echo 'class="current"'; ?>><a
			gaevent="InnerLink|Click|/my/navBar/orders" href="/home/tianluncard/">我的天伦卡</a>
		</li>
		<li <?php if($current=='credit') echo 'class="current"'; ?>><a gaevent="InnerLink|Click|/my/navBar/collections"
			href="/home/credit/">度假网余额</a></li>
		<li <?php if($current=='rates') echo 'class="current"'; ?>><a
			gaevent="InnerLink|Click|/my/navBar/rates" href="/home/rates/">我的评价</a>
		</li>
		<li <?php if($current=='account') echo 'class="current"'; ?>><a gaevent="InnerLink|Click|/my/navBar/settings"
			href="/home/account/">账户设置</a></li>
	</ul>
</div>
