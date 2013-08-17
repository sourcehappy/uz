<?php
require('../common/global.inc.php');
 require './common/header.php';
 
 define('PER_PAGE_RECORD', 20);//每页的条数
 $pno = intval($_GET['pno']);//页码
 $recCount = intval($_GET['rec']);//总条数
 $pno = $pno > 0 ? $pno : 1;
 
 $tagId = intval($_GET['tid']);
 $delTagId = intval($_GET['deltid']);
 $tagIds = trim($_GET['tids']);
 
 $classId = intval($_GET['aid']);//分类ID
 
 $order = intval($_GET['order']);//排序
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
 
 	//关于tag_id的拼接
 if ($tagIds) {
 	$tagIds = explode(',', $tagIds);
 }else{
 	$tagIds = array();
 }
 //有要增加的tag_id
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
 //有要删除的tag_id
 if ($delTagId > 0) {
 	$k = array_search($delTagId, $tagIds);
 	if ($k !== false) {
 		unset($tagIds[$k]);
 	}
 }
 //最后整合URL，并取出造中的TAG相关数据
 $selectTagList = array();
 if ($tagIds) {
 	$tids = implode(',', $tagIds);
 	$url .= '&tids='.urlencode($tids);
 	$selectTagList = Tag::getList($tids);
 }
 
 
 
 //标签列表
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
 
 
 //更新分类点击数
 ClassData::addClickNum($classId);
 
 
 
?>
<div id="clearboth"></div>
<div class="artl_main">
	<div class="biaoqian">
	<div class="tt">热门标签</div>
	<ul>
	<li>连衣裙</li>
	<li>雷神战甲</li>
	<li>ss2</li>
	</ul>
	</div>
	<!-- 标签结束 -->
	<!-- 【必填】type：选择喜欢的类型，可选项2,3,4：2表示商品喜欢（将与商品详情页下的喜欢数组打通）、
	4表示店铺喜欢、3表示网页喜欢
	【必填】key：type为2时key填itemid，type为4时填shopid，type为webpage时填当前喜欢页面的链接地址
	skinType：样式的类型1,2可选：1为橙色版、2为蓝色版 text：默认文案 -->
	<div id="clearboth"></div>
	<div class="art_con">
		<ul>
			<li><h3>文章标题</h3>
				<p>内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff内容sadfffffffffffffffffffffffffffffffffffff
				ffffffffffffffffffffffffffffffffffffffffffffffff</p>
				<img src="/assets/test.jpg" ></img>
				<div class="bo_line">
							<div class="like_bo">
							<div data-like='{text:"喜欢",skinType:1,type:2,key:"<?=$i=11211?>",client_id:68}'
								class="sns-widget">喜欢</div>
							</div>
							<div class="pl_bo"><a href="#">评论</a>
							</div>
					</div>
			</li>
			<li><h3>文章标题</h3>
				<p>内容</p>
				<img src="/assets/test.jpg" ></img>
				<div class="bo_line">
							<div class="like_bo">
							<div data-like='{text:"喜欢",skinType:2,type:2,key:"<?=$i=11111?>",client_id:68}'
								class="sns-widget">喜欢</div>
							</div>
							<div class="pl_bo"><a href="#">评论</a>
							</div>
					</div>
			</li>
			<li><h3>文章标题</h3>
				<p>内容</p>
				<img src="/assets/test.jpg" ></img>
				<div class="bo_line">
							<div class="like_bo">
							<div data-like='{text:"喜欢",skinType:2,type:2,key:"<?=$i=11111?>",client_id:68}'
								class="sns-widget">喜欢</div>
							</div>
							<div class="pl_bo"><a href="#">评论</a>
							</div>
					</div>
			</li>
			<li><h3>文章标题</h3>
				<p>内容</p>
				<img src="/assets/test.jpg" ></img>
				<div class="bo_line">
							<div class="like_bo">
							<div data-like='{text:"喜欢",skinType:2,type:2,key:"<?=$i=11111?>",client_id:68}'
								class="sns-widget">喜欢</div>
							</div>
							<div class="pl_bo"><a href="#">评论</a>
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
