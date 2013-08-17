<?php
require('../common/global.inc.php');
require './common/header.php';
$tid = intval($_GET['tid']);
$p = intval($_GET['p']);
$act = trim($_GET['act']);
$tid = $tid>0 ? $tid:1;

$item = Product::get($tid); // 获得商品信息

?>
<div id="clearboth"></div>
<div class="item_main">

	<!-- 左边begin -->
	<div class="item_left">
		<div class="item_text"><img src="<?php echo $item['main_img']?>" alt="<?php echo $item['title'];?>" /><br/><?=$item['memo']?></div>
		<div class="item_pl" id="pl">
			<div class="sns-widget"
				data-comment='{
				"isAutoHeight":true,
   					"param":{
    				"target_key":"<?php echo $item['item_id'];?>",
        			"type_id":"1100035",
        			"rec_user_id":"<?php echo $item['item_id'];?>",
        			"view":"detail_list",
        			"title":"<?php echo $item['title'];?>",
       				 "moreurl":"http://doufuwang.uz.taobao.com/item.php?tid=<?=$item['prod_id']?>" },
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
   			key:"<?=$item['item_id']?>",
    		client_id:68
			}'
		class="sns-widget">喜欢</div></div>
		<div class="item_share">
			<div
			data-sharebtn='{
			skinType:1,
			type:"webpage",
			key:"http://doufuwang.uz.taobao.com/item.php?tid=<?=$item['prod_id']?>",
			comment:"我刚刚在U站【豆腐网】里发现一个很不错的东东，你也来看看！",
			pic:"<?php echo $item['main_img'];?>",
			client_id:68,
			title:"【豆腐网U站】<?php echo $item['title']?>",
			isShowFriend:false
			}'
			class="sns-widget">分享</div></div>

			</div>
			<div class="item_title">
				<p><?=$item['title']?></p>
			</div>
			<div class="item_sail">
				<span>￥:<?=$item['price']?>元</span>
				<div class="link_to"><a href="<?=$item['click_url']?>"><img src="/assets/images/pay1.jpg" alt="去购买" /></a></div>
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