<?php?>
<!-- 宝宝衣服栏目开始 -->
<div id="clearboth"></div>
<div class="tt"><h3>穿好</h3></div>
<div class="class_bb baobei">
		<ul>
		<?php foreach ($chuanhao as $chuan){?>
					<li><a href="/front/item.php?tid=<?=$chuan['prod_id']?>"><img src="<?=$chuan['main_img']?>" /></a>
						<div class="xiaol">
							<div class="jiage"><span>￥<?=$chuan['price']?>RMB</span>
							</div>
						</div>
						<p><?=$chuan['title']?></p>
						<div class="b_line">
							<div class="like_b">
							<div data-like='{text:"喜欢",skinType:2,type:2,key:"<?=$chuan['item_id']?>",client_id:68}'
								class="sns-widget">喜欢</div>
							</div>
							<div class="pinglun"><a href="/front/item.php?tid=<?=$chuan['prod_id']?>#pl">评论</a></div>
					</div></li>
					<?php }?>
				</ul>
			</div>
		
		<!-- 宝贝衣服栏目结束-->
		<!-- 宝宝营养栏目开始 -->
		<div id="clearboth"></div>
		<div class="tt"><h3>吃好</h3></div>
			<div class="class_bb baobei">
								<ul>
					<?php foreach ($chihao as $chi){?>
					<li><a href="/front/item.php?tid=<?=$chi['prod_id']?>"><img src="<?=$chi['main_img']?>" /></a>
						<div class="xiaol">
							<div class="jiage"><span>￥<?=$chi['price']?>RMB</span>
							</div>
						</div>
						<p><?=$chi['title']?></p>
						<div class="b_line">
							<div class="like_b">
							<div data-like='{text:"喜欢",skinType:2,type:2,key:"<?=$chi['item_id']?>",client_id:68}'
								class="sns-widget">喜欢</div>
							</div>
							<div class="pinglun"><a href="/front/item.php?tid=<?=$chi['prod_id']?>#pl">评论</a></div>
					</div></li>
					<?php }?>
				</ul>
			</div>
		<!-- 宝贝营养栏目结束-->
		<!-- 母婴用品栏目开始 -->
		<div id="clearboth"></div>
		<div class="tt"><p>用好</p></div>
			<div class="class_bb baobei">
								<ul>
					<?php foreach ($yonghao as $yong){?>
					<li><a href="/front/item.php?tid=<?=$yong['prod_id']?>"><img src="<?=$yong['main_img']?>" /></a>
						<div class="xiaol">
							<div class="jiage"><span>￥<?=$yong['price']?>RMB</span>
							</div>
						</div>
						<p><?=$yong['title']?></p>
						<div class="b_line">
							<div class="like_b">
							<div data-like='{text:"喜欢",skinType:2,type:2,key:"<?=$yong['item_id']?>",client_id:68}'
								class="sns-widget">喜欢</div>
							</div>
							<div class="pinglun"><a href="/front/item.php?tid=<?=$yong['prod_id']?>#pl">评论</a></div>
					</div></li>
					<?php }?>
				</ul>
			</div>
		<!-- 母婴用品栏目结束-->
		<!-- 妈咪栏目开始 -->
<!-- 【必填】type：选择喜欢的类型，可选项2,3,4：2表示商品喜欢（将与商品详情页下的喜欢数组打通）、4表示店铺喜欢、3表示网页喜欢
【必填】key：type为2时key填itemid，type为4时填shopid，type为webpage时填当前喜欢页面的链接地址
skinType：样式的类型1,2可选：1为橙色版、2为蓝色版 text：默认文案 -->
		<div id="clearboth"></div>
		<div class="tt"><p>妈咪好</p></div>
			<div class="class_bb baobei">
							<ul>
					<?php foreach ($mmhao as $mm){?>
					<li><a href="/front/item.php?tid=<?=$mm['prod_id']?>"><img src="<?=$mm['main_img']?>" /></a>
						<div class="xiaol">
							<div class="jiage"><span>￥<?=$mm['price']?>RMB</span>
							</div>
						</div>
						<p><?=$mm['title']?></p>
						<div class="b_line">
							<div class="like_b">
							<div data-like='{text:"喜欢",skinType:2,type:2,key:"<?=$mm['item_id']?>",client_id:68}'
								class="sns-widget">喜欢</div>
							</div>
							<div class="pinglun"><a href="/front/item.php?tid=<?=$mm['prod_id']?>#pl">评论</a></div>
					</div></li>
					<?php }?>
				</ul>
			</div>
		<!-- 妈咪栏目结束-->