<?php
require('../common/global.inc.php');
 require './common/header.php';
 
 define('PER_PAGE_RECORD', 20);//ÿҳ������
 $pno = intval($_GET['pno']);//ҳ��
 $recCount = intval($_GET['rec']);//������
 $pno = $pno > 0 ? $pno : 1;
 
 $tagId = intval($_GET['tid']);
 $delTagId = intval($_GET['deltid']);
 $tagIds = trim($_GET['tids']);
 
 $classId = intval($_GET['aid']);//����ID
 
 $order = intval($_GET['order']);//����
 $classId = $classId ? $classId : 0;
 $order = $order ? $order : 1;
 
 $url = '/list.php?cid=' . $classId;
 $wanhao = array();
 
 // if($classId[''])
 $rec = true;
 if($classId==0){
 	$wanhao = Product::getList($rec, 0);
 }
 else{
 	$wanhao = Product::getListByClassId($rec,$classId, 0,20);
 }
 
 	//����tag_id��ƴ��
 if ($tagIds) {
 	$tagIds = explode(',', $tagIds);
 }else{
 	$tagIds = array();
 }
 //��Ҫ���ӵ�tag_id
 if ($tagId > 0) {
 	Tag::addClickNum($tagId);
 	if (array_search($tagId, $tagIds) === false) {
 		$tagIds[] = $tagId;
 	}
 	foreach ($tagIds as $k => $v) {
 		if (! $v) {
 			unset($tagIds[$k]);
 		}else{
 			$tagIds[$k] = intval($v);
 		}
 	}
 }
 //��Ҫɾ����tag_id
 if ($delTagId > 0) {
 	$k = array_search($delTagId, $tagIds);
 	if ($k !== false) {
 		unset($tagIds[$k]);
 	}
 }
 //�������URL����ȡ�����е�TAG�������
 $selectTagList = array();
 if ($tagIds) {
 	$tids = implode(',', $tagIds);
 	$url .= '&tids='.urlencode($tids);
 	$selectTagList = Tag::getList($tids);
 }
 
 
 
 //��ǩ�б�
 $tagList = Tag::getListByClass($classId);
 
 $rec = true;
 if ($pno == 1) {
 	$rec = $recCount > 0 ? false : true;
 }
 $prodList = Product::getListByClassOrTag($rec, ($pno - 1) * PER_PAGE_RECORD, PER_PAGE_RECORD, $classId, $tagIds, $order);
 if ( ! is_bool($rec)) $recCount = $rec;
 $jumpURL = $url.'&rec='.$recCount.'&pno=';
 $pageCount = intval($recCount / PER_PAGE_RECORD) + ($recCount % PER_PAGE_RECORD > 0 ? 1 : 0);
 // echo $recCount.'-'.$pageCount;
 
 $className = $classId ? ClassData::getName($classId) : '';
 
 
 //���·�������
 ClassData::addClickNum($classId);
 
 
 
?>
<div id="clearboth"></div>
<div class="artl_main">
	<div class="biaoqian">
	<div class="tt">���ű�ǩ</div>
	<ul>
	<li>����ȹ</li>
	<li>����ս��</li>
	<li>ss2</li>
	</ul>
	</div>
	<!-- ��ǩ���� -->
	<!-- �����type��ѡ��ϲ�������ͣ���ѡ��2,3,4��2��ʾ��Ʒϲ����������Ʒ����ҳ�µ�ϲ�������ͨ����
	4��ʾ����ϲ����3��ʾ��ҳϲ��
	�����key��typeΪ2ʱkey��itemid��typeΪ4ʱ��shopid��typeΪwebpageʱ�ǰϲ��ҳ������ӵ�ַ
	skinType����ʽ������1,2��ѡ��1Ϊ��ɫ�桢2Ϊ��ɫ�� text��Ĭ���İ� -->
	<div id="clearboth"></div>
	<div class="art_con">
		<ul>
			<li><h3>���±���</h3>
				<p>����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff����sadfffffffffffffffffffffffffffffffffffff
				ffffffffffffffffffffffffffffffffffffffffffffffff</p>
				<img src="/assets/test.jpg" ></img>
				<div class="bo_line">
							<div class="like_bo">
							<div data-like='{text:"ϲ��",skinType:1,type:2,key:"<?=$i=11211?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pl_bo"><a href="#">����</a>
							</div>
					</div>
			</li>
			<li><h3>���±���</h3>
				<p>����</p>
				<img src="/assets/test.jpg" ></img>
				<div class="bo_line">
							<div class="like_bo">
							<div data-like='{text:"ϲ��",skinType:2,type:2,key:"<?=$i=11111?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pl_bo"><a href="#">����</a>
							</div>
					</div>
			</li>
			<li><h3>���±���</h3>
				<p>����</p>
				<img src="/assets/test.jpg" ></img>
				<div class="bo_line">
							<div class="like_bo">
							<div data-like='{text:"ϲ��",skinType:2,type:2,key:"<?=$i=11111?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pl_bo"><a href="#">����</a>
							</div>
					</div>
			</li>
			<li><h3>���±���</h3>
				<p>����</p>
				<img src="/assets/test.jpg" ></img>
				<div class="bo_line">
							<div class="like_bo">
							<div data-like='{text:"ϲ��",skinType:2,type:2,key:"<?=$i=11111?>",client_id:68}'
								class="sns-widget">ϲ��</div>
							</div>
							<div class="pl_bo"><a href="#">����</a>
							</div>
					</div>
			</li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<div id="clearboth"></div>
	<div class="page_d"><p>sss</p></div>
</div>

<?php 
	require './common/footer.php';
?>
