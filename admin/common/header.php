

  <div class="admin_left">
  <ul>
  <li><a href="/admin/admin.php">��������</a> </li>
  <li> <a href="/admin/item.php">��������</a> </li>
  <li><a href="/admin/artical.php">���¹���</a></li>
  <li> <a href="/admin/arttag.php">���·������</a> </li>
   <li> <a href="/admin/caiji.php">��Ʒ�ɼ�</a> </li>
  <li> <a href="/admin/baoming.php">��������</a></li>
  <li><a href="/admin/gg.php">������</a></li>
  <li><a href="/admin/tag.php">��ǩ����</a></li>
  <li><a href="/admin/yl.php">��������</a></li>
  <li><a href="/admin/hezuo.php">�����̼ҹ���</a></li>
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
		echo '<a href="'.$url.'?p='.($pno-1).'">��һҳ</a>';
	}
	if ($pc > $pno) {
		echo '<a href="'.$url.'?p='.($pno+1).'">��һҳ</a>';
	}
	echo ' ��ǰ�� '.$pno.' ҳ���� '.$pc.' ҳ('.$rec.'��)';
	
}

// $msg = 'test';
?>