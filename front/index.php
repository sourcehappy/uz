<?php
//<!-- header begin -->
//<!-- header end -->
	require('../common/global.inc.php');
	require './common/header.php';

	$gg = GG::getAll();
?>
<div id="clearboth"></div>
<div class="df_main">
	<!--广告及目录开始 -->
	<div class="ad_con">
		<div class="left_con">
		
		</div>
		<div class="right_con">
			<div style="position: relative; left:0px; top:0px;width:635px">
			<div class="banner">
	        <div class="banner_bg" style="opacity: 0.3;"></div>
	        <ul class="list"></ul>
	        <div class="banner_list"> 
	        	<?php foreach ($gg as $ggrow){?>
					<a href="<?=$ggrow['gg_url']?>"><img src="<?=$ggrow['gg_pic']?>" width="633px" height="350px" alt="<?=$ggrow['gg_title']?>" /></a>
					<?php }?>
		</div>
      </div>
			</div>
			
		
			</div>
		</div>
		<!--广告及目录结束 -->
		<!-- 玩具栏目开始 -->
		<div id="clearboth"></div>
		<div class="tt"><h3>玩好</h3></div>
			<div class="class_bb baobei">
				<ul>
					<?php for($i = 1; $i < 9; $i++){?>
					<li><img src="/assets/images/yaoyao.gif" />
						<p>faafdafa</p>
						<div class="b_line">
							<div class="like_b">
							</div>
							<div class="pinglun">
							</div>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		<!-- 玩具栏目结束-->
		<!-- 宝宝衣服栏目开始 -->
		<div id="clearboth"></div>
		<div class="tt"><h3>穿好</h3></div>
			<div class="class_bb baobei">
				<ul>
					<?php for($i = 1; $i < 9; $i++){?>
					<li><img src="/assets/images/yaoyao.gif" />
						<p>faafdafa</p>
						<div class="b_line">
							<div class="like_b">
							</div>
							<div class="pinglun">
							</div>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		
		<!-- 宝贝衣服栏目结束-->
		<!-- 宝宝营养栏目开始 -->
		<div id="clearboth"></div>
		<div class="tt"><h3>吃好</h3></div>
			<div class="class_bb baobei">
				<ul>
					<?php for($i = 1; $i < 9; $i++){?>
					<li><img src="/assets/images/yaoyao.gif" />
						<p>faafdafa</p>
						<div class="b_line">
							<div class="like_b">
							</div>
							<div class="pinglun">
							</div>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		<!-- 宝贝营养栏目结束-->
		<!-- 母婴用品栏目开始 -->
		<div id="clearboth"></div>
		<div class="tt"><p>用好</p></div>
			<div class="class_bb baobei">
				<ul>
					<?php for($i = 1; $i < 9; $i++){?>
					<li><img src="/assets/images/yaoyao.gif" />
						<p>faafdafa</p>
						<div class="b_line">
							<div class="like_b">
							</div>
							<div class="pinglun">
							</div>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		<!-- 母婴用品栏目结束-->
		<!-- 妈咪栏目开始 -->
		<div id="clearboth"></div>
		<div class="tt"><p>妈咪好</p></div>
			<div class="class_bb baobei">
				<ul>
					<?php for($i = 1; $i < 9; $i++){?>
					<li><a href="#"><img src="/assets/images/yaoyao.gif" /></a>
						<div class="xiaol">
							<div class="jiage"><span>￥200</span>
							</div>
							<div class="xl"><span>月销量111111件</span></div>
						</div>
						<p>faafdafa</p>
						<div class="b_line">
							<div class="like_b">
<!-- 【必填】type：选择喜欢的类型，可选项2,3,4：2表示商品喜欢（将与商品详情页下的喜欢数组打通）、4表示店铺喜欢、3表示网页喜欢
【必填】key：type为2时key填itemid，type为4时填shopid，type为webpage时填当前喜欢页面的链接地址
skinType：样式的类型1,2可选：1为橙色版、2为蓝色版 text：默认文案 -->
							<div data-like='{text:"喜欢",skinType:2,type:2,key:"<?=$i?>",client_id:68}'
								class="sns-widget">喜欢</div>
							</div>
							<div class="pinglun"><a href="#">评论</a>
							</div>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		<!-- 妈咪栏目结束-->
		<!-- 友情链接Begin -->
		<div id="clearboth"></div>
		
		<div class="youlian">
		<h3>合作伙伴</h3>
			<ul>
			<?php $links = YouLian::getAllLink(); foreach ($links as $row) {?>
				<li><a href="<?=$row['url'] ?>"><img src="<?=$row['img_path']?>" alt="<?=$row['title']?>" /></a></li>
			<?php }?>
			</ul>
		</div>
		<!-- 友情链接End -->
		
</div>
<script src="/assets/javascripts/switch.js"></script>
<?php 
	require './common/footer.php';	
?>