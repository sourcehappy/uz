<?php?>
<!-- �����·���Ŀ��ʼ -->
<div id="clearboth"></div>
<div class="tt"><h3>����</h3></div>
<div class="class_bb baobei">
		<ul>
		<?php foreach ($chuanhao as $chuan){?>
					<li><a href="/front/item.php?tid=<?=$chuan['prod_id']?>"><img src="<?=$chuan['main_img']?>" /></a>
						<div class="xiaol">
							<div class="jiage"><span>��<?=$chuan['price']?>RMB</span>
							</div>
						</div>
						<p><?=$chuan['title']?></p>
						<div class="b_line">
							<div class="like_b">
							<div data-like='{text:"ϲ��",skinType:2,type:2,key:"<?=$chuan['item_id']?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pinglun"><a href="/front/item.php?tid=<?=$chuan['prod_id']?>#pl">����</a></div>
					</div></li>
					<?php }?>
				</ul>
			</div>
		
		<!-- �����·���Ŀ����-->
		<!-- ����Ӫ����Ŀ��ʼ -->
		<div id="clearboth"></div>
		<div class="tt"><h3>�Ժ�</h3></div>
			<div class="class_bb baobei">
								<ul>
					<?php foreach ($chihao as $chi){?>
					<li><a href="/front/item.php?tid=<?=$chi['prod_id']?>"><img src="<?=$chi['main_img']?>" /></a>
						<div class="xiaol">
							<div class="jiage"><span>��<?=$chi['price']?>RMB</span>
							</div>
						</div>
						<p><?=$chi['title']?></p>
						<div class="b_line">
							<div class="like_b">
							<div data-like='{text:"ϲ��",skinType:2,type:2,key:"<?=$chi['item_id']?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pinglun"><a href="/front/item.php?tid=<?=$chi['prod_id']?>#pl">����</a></div>
					</div></li>
					<?php }?>
				</ul>
			</div>
		<!-- ����Ӫ����Ŀ����-->
		<!-- ĸӤ��Ʒ��Ŀ��ʼ -->
		<div id="clearboth"></div>
		<div class="tt"><p>�ú�</p></div>
			<div class="class_bb baobei">
								<ul>
					<?php foreach ($yonghao as $yong){?>
					<li><a href="/front/item.php?tid=<?=$yong['prod_id']?>"><img src="<?=$yong['main_img']?>" /></a>
						<div class="xiaol">
							<div class="jiage"><span>��<?=$yong['price']?>RMB</span>
							</div>
						</div>
						<p><?=$yong['title']?></p>
						<div class="b_line">
							<div class="like_b">
							<div data-like='{text:"ϲ��",skinType:2,type:2,key:"<?=$yong['item_id']?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pinglun"><a href="/front/item.php?tid=<?=$yong['prod_id']?>#pl">����</a></div>
					</div></li>
					<?php }?>
				</ul>
			</div>
		<!-- ĸӤ��Ʒ��Ŀ����-->
		<!-- ������Ŀ��ʼ -->
<!-- �����type��ѡ��ϲ�������ͣ���ѡ��2,3,4��2��ʾ��Ʒϲ����������Ʒ����ҳ�µ�ϲ�������ͨ����4��ʾ����ϲ����3��ʾ��ҳϲ��
�����key��typeΪ2ʱkey��itemid��typeΪ4ʱ��shopid��typeΪwebpageʱ�ǰϲ��ҳ������ӵ�ַ
skinType����ʽ������1,2��ѡ��1Ϊ��ɫ�桢2Ϊ��ɫ�� text��Ĭ���İ� -->
		<div id="clearboth"></div>
		<div class="tt"><p>�����</p></div>
			<div class="class_bb baobei">
							<ul>
					<?php foreach ($mmhao as $mm){?>
					<li><a href="/front/item.php?tid=<?=$mm['prod_id']?>"><img src="<?=$mm['main_img']?>" /></a>
						<div class="xiaol">
							<div class="jiage"><span>��<?=$mm['price']?>RMB</span>
							</div>
						</div>
						<p><?=$mm['title']?></p>
						<div class="b_line">
							<div class="like_b">
							<div data-like='{text:"ϲ��",skinType:2,type:2,key:"<?=$mm['item_id']?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pinglun"><a href="/front/item.php?tid=<?=$mm['prod_id']?>#pl">����</a></div>
					</div></li>
					<?php }?>
				</ul>
			</div>
		<!-- ������Ŀ����-->