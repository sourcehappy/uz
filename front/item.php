<?php
require './common/header.php';

?>
<div id="clearboth"></div>
<div class="item_main">

	<!-- 左边begin -->
	<div class="item_left">
		<div class="item_text">宝贝，十大放大阿凡达</div>
		<div class="item_pl">
			<div class="sns-widget"
				data-comment='{
				"isAutoHeight":true,
   					"param":{
    				"target_key":"<?php echo '121211'?>",
        			"type_id":"1100035",
        			"rec_user_id":"<?=1121211212?>",
        			"view":"detail_list",
        			"title":"<?php echo '活动';?>",
       				 "moreurl":"http://doufuwang.uz.taobao.com/item?p=<?=4343?>" },
    				"paramList":{"view":"list_trunPage"}}'></div>
		</div>

	</div>
	<!-- 左边End -->
	<!-- 右侧beginS -->
	<div class="item_right">
		<div class="item_s">
			<!-- 喜欢和分享 -->
			<div class="item_top">
				<div class="item_like">
					<div
						data-like='{
    		text:"喜欢",
    		skinType:2,
   			type:3,
   			key:"",
    		client_id:68
			}'
						class="sns-widget">喜欢</div>
				</div>
				<div class="item_share">
					<div
						data-sharebtn='{
			skinType:1,
			type:"item",
			key:"<?php echo '12121'?>",
			comment:"",
			pic:"",
			client_id:68,
			isShowFriend:true
			}'
						class="sns-widget">分享</div>
				</div>

			</div>
			<div class="item_title">
				<p>宝贝标题...........................</p>
			</div>
			<div class="item_sail">
				<span>￥:<?='12121'?>元</span>
				<div class="link_to"><a href="#"><img src="/assets/images/sail_bg.gif" alt="去购买" /></a></div>
			</div>
		</div>
		<div id="clearboth"></div>	
		<h3 style="color:#666666;margin:10px 0 0 0;">有<?php echo '20'?>人喜欢该宝贝</h3>
		<div class="like_user">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<div id="clearboth"></div>
		<h3 style="color:#666666;margin:10px 0 0 0;">喜欢该宝贝的人还喜欢</h3>
		<div class="relative_item">
		<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
		</ul>	
		</div>
	</div>
	<!-- 右侧End -->
</div>
<?php require './common/footer.php';?>