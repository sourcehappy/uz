<?php
//<!-- header begin -->
//<!-- header end -->
	require('../common/global.inc.php');
	require './common/header.php';

	$gg = GG::getAll();
	$classList = ClassData::getList(0);
	$wanhao = Product::getListByOrder('�Ժ�');
	$chihao = Product::getListByOrder('�Ժ�');
	$chuanhao = Product::getListByOrder('����');
	$yonghao = Product::getListByOrder('�Ժ�');
	$mmhao = Product::getListByOrder('�Ժ�');
	
?>
<div id="clearboth"></div>
<div class="df_main">
	<!--��漰Ŀ¼��ʼ -->
	<div class="ad_con">
		<div style="position: relative; left:0px; top:0px;width:950px">
			<div class="banner">
	        <div class="banner_bg" style="opacity: 0.3;"></div>
	        <ul class="list"></ul>
	        <div class="banner_list"> 
	        	<?php foreach ($gg as $ggrow){?>
					<a href="<?=$ggrow['gg_url']?>" target="_blank"><img src="<?=$ggrow['gg_pic']?>" width="950px" height="350px" alt="<?=$ggrow['gg_title']?>" /></a>
					
					<?php }?>
			</div>
      		</div>
		</div>
		<!--  
		<div class="left_con">
		<div class="intag">
		
			<?php foreach ($classList as $row) {?>
			<ul>
			<li class="intag0"><?php echo $row['name'];?></li>
			<?php 
			$clist = ClassData::getList($row['class_id']);
			foreach ($clist as $row) {
				echo '<li><a href="/front/list.php?cid='.$row['class_id'].'" target="_blank">'.$row['name'].'</a></li>';
			}
			?>
			</ul><?php }?>	
		</div>
		</div>
		<div class="right_con">
		</div>
		-->
		</div>		
		<!--��漰Ŀ¼���� -->
		
		<!-- ��Ʒ��Ŀ��ʼ -->
		<?php foreach ($classList as $parent) {?>
		<div id="clearboth"></div>
		<div class="tt">
		<ul class="intags">
		<?php 
			$clist = ClassData::getList($parent['class_id']);
			echo '<li class="intag0"><a href="/front/list.php?cid='.$parent['class_id'].'" target="_blank">'.$parent['name'].'</a></li>';
			foreach ($clist as $row ){
				echo '<li class="intag"><a href="/front/list.php?cid='.$row['class_id'].'" target="_blank">'.$row['name'].'</a></li>';
			}
		?>
		</ul>
		</div>
		
			<div class="class_bb baobei">
				<ul>
					<?php  $wanhao = Product::getListByOrder($parent['name']);
					foreach ($wanhao as $wan){?>
					<li><a href="/front/item.php?tid=<?=$wan['prod_id']?>"><img src="<?=$wan['main_img']?>" /></a>
						<div class="xiaol">
							<div class="jiage"><span>��<?=$wan['price']?>RMB</span>
							</div>
						</div>
						<p><?=$wan['title']?></p>
						<div class="b_line">
							<div class="like_b">
							<div data-like='{text:"ϲ��",skinType:2,type:2,key:"<?=$wan['item_id']?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pinglun"><a href="/front/item.php?tid=<?=$wan['prod_id']?>#pl">����</a></div>
					</div></li>
					<?php }?>
				</ul>
			</div>
		<!-- ��Ʒ��Ŀ����-->
		<?php }?>
		
		
		<!-- ��������Begin -->
		<div id="clearboth"></div>
		
		<div class="youlian">
		<h3>�������</h3>
			<ul>
			<?php $links = YouLian::getAllLink(); foreach ($links as $row) {?>
				<li><a href="<?=$row['url'] ?>"><img src="<?=$row['img_path']?>" alt="<?=$row['title']?>" /></a></li>
			<?php }?>
			</ul>
		</div>
		<!-- ��������End -->
		
</div>
<script src="/assets/javascripts/switch.js"></script>
<?php 
	require './common/footer.php';	
?>