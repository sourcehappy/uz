<?php
//<!-- header begin -->
//<!-- header end -->
	require('../common/global.inc.php');
	require './common/header.php';

	$gg = GG::getAll();
?>
<div id="clearboth"></div>
<div class="df_main">
	<!--��漰Ŀ¼��ʼ -->
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
		<!--��漰Ŀ¼���� -->
		<!-- �����Ŀ��ʼ -->
		<div id="clearboth"></div>
		<div class="tt"><h3>���</h3></div>
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
		<!-- �����Ŀ����-->
		<!-- �����·���Ŀ��ʼ -->
		<div id="clearboth"></div>
		<div class="tt"><h3>����</h3></div>
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
		
		<!-- �����·���Ŀ����-->
		<!-- ����Ӫ����Ŀ��ʼ -->
		<div id="clearboth"></div>
		<div class="tt"><h3>�Ժ�</h3></div>
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
		<!-- ����Ӫ����Ŀ����-->
		<!-- ĸӤ��Ʒ��Ŀ��ʼ -->
		<div id="clearboth"></div>
		<div class="tt"><p>�ú�</p></div>
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
		<!-- ĸӤ��Ʒ��Ŀ����-->
		<!-- ������Ŀ��ʼ -->
		<div id="clearboth"></div>
		<div class="tt"><p>�����</p></div>
			<div class="class_bb baobei">
				<ul>
					<?php for($i = 1; $i < 9; $i++){?>
					<li><a href="#"><img src="/assets/images/yaoyao.gif" /></a>
						<div class="xiaol">
							<div class="jiage"><span>��200</span>
							</div>
							<div class="xl"><span>������111111��</span></div>
						</div>
						<p>faafdafa</p>
						<div class="b_line">
							<div class="like_b">
<!-- �����type��ѡ��ϲ�������ͣ���ѡ��2,3,4��2��ʾ��Ʒϲ����������Ʒ����ҳ�µ�ϲ�������ͨ����4��ʾ����ϲ����3��ʾ��ҳϲ��
�����key��typeΪ2ʱkey��itemid��typeΪ4ʱ��shopid��typeΪwebpageʱ�ǰϲ��ҳ������ӵ�ַ
skinType����ʽ������1,2��ѡ��1Ϊ��ɫ�桢2Ϊ��ɫ�� text��Ĭ���İ� -->
							<div data-like='{text:"ϲ��",skinType:2,type:2,key:"<?=$i?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pinglun"><a href="#">����</a>
							</div>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		<!-- ������Ŀ����-->
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