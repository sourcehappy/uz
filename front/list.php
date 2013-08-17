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
$classId = intval($_GET['cid']);//����ID

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
<div class="list_main">
	<div class="biaoqian">
	<div class="tt">���ű�ǩ</div>
	<ul>
	<li>����ȹ</li>
	<li>����ս��</li>
	<li>ss2</li>
	</ul>
	</div>
	
	<div class="list_container">
		<div class="baobei">
				<ul>
					<?php  foreach ($wanhao as $wan){?>
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
	</div>
	<div class="clearboth"></div>
	<div class="page_d"><?php include './common/page.php';?></div>

</div>
<?php require './common/footer.php';?>