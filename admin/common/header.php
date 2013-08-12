

  <div class="admin_left">
  <ul>
  <li><a href="/admin/admin.php">宝贝分类</a> </li>
  <li> <a href="/admin/item.php">宝贝管理</a> </li>
  <li><a href="/admin/artical.php">文章管理</a></li>
  <li> <a href="/admin/arttag.php">文章分类管理</a> </li>
   <li> <a href="/admin/caiji.php">商品采集</a> </li>
  <li> <a href="/admin/baoming.php">报名管理</a></li>
  <li><a href="/admin/gg.php">广告管理</a></li>
  <li><a href="/admin/tag.php">标签管理</a></li>
  <li><a href="/admin/yl.php">友链管理</a></li>
  <li><a href="/admin/hezuo.php">合作商家管理</a></li>
  </ul>
 </div>

  
<?php

include '../../common/global.inc.php';
define('PER_PAGE_COUNT', 20);

function getPageData($sql, $pno, &$rec) {
	global $db;
	if ($rec === true) {
		$rec = $db->getValue('select count(*) as rc from ('.$sql.') as t');
	}
	$sql = $sql.' limit '.(($pno - 1) * PER_PAGE_COUNT).','.PER_PAGE_COUNT;
	//echo $sql;
	return $db->getAll($sql);
}

function printPageInfo($url, $pno, $rec) {
	$pc = intval($rec / PER_PAGE_COUNT);
	$pc += $rec % PER_PAGE_COUNT == 0 ? 0 : 1;
	if ($pno > 1) {
		echo '<a href="'.$url.'?p='.($pno-1).'">上一页</a>';
	}
	if ($pc > $pno) {
		echo '<a href="'.$url.'?p='.($pno+1).'">下一页</a>';
	}
	echo ' 当前第 '.$pno.' 页，共 '.$pc.' 页('.$rec.'条)';
	
}

// $msg = 'test';
?>