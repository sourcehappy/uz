<div class="admin_background">

<?php
require './common/header.php';
$id = intval ( $_GET ['id'] );
$p = intval ( $_GET ['p'] );
$act = trim ( $_GET ['act'] );

$p = $p > 0 ? $p : 1;

$db = DB::instance ();

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	
	$data = array ();
	$flag = false;
	$id = intval($_POST['artpr_id']);
	$data ['name'] = trim($_POST['name']);
	if (! $data ['name']) {
		$msg = '必须输入类型名称!';
		$flag = true;
		// break;
	}
	if (! $flag) {
		if ($id) {
				$ret = $db->update ( 'vg_art_property', $data, 'artpr_id=' . $id );

		} else {
			$ret = $db->insert ( 'vg_art_property', $data );
		}
		if ($ret !== false) {
			$msg = '保存成功。';
		} else {
			$msg = '保存失败。';
		}
		$flag = false;
	}
} else {
	if ($act == 'del') {
		$ret = $db->delete ( 'vg_art_property', 'artpr_id=' . $id );
		if (! $msg) {
			if ($ret !== false) {
				$msg = '删除成功。';
			} else {
				$msg = '保存失败。';
			}
		}
	}
}
?>
<div class="admin_container">
<?php
if ($msg) {
	echo '<font color="red">' . $msg . '</font><br />';
}
$sql = 'select artpr_id,name from vg_art_property order by artpr_id desc';
$rec = true;
$list = getPageData ( $sql, $p, $rec );

$data = array ();
if ($act == 'edit') {
	$data = $db->getOne ( 'select * from vg_art_property where artpr_id=' . $id );
}
?>
 <form id="form1" name="form1" method="post" action="/admin/arttag.php">
		<!--  <input type="text" name="artpr_id" id="artpr_id" value="<?=$data['artpr_id']?>" /> -->
		<div>
			<table width="100%" border="1">
				<tr>
					<td width="26%">id(<b style="color: red">不用填</b>):
					</td>
					<td width="72%"><input type="text" name="artpr_id" id="artpr_id"
						size="100" readonly="readonly" value="<?=$data['artpr_id']?>" /></td>
				</tr>
				<tr>
					<td>类型名称：</td>
					<td><input type="text" name="name" id="name" size="100"
						value="<?=$data['name']?>" /></td>
				</tr>
				<tr>
					<td height="25" colspan="5" align="center" bgcolor="#eeeeee"><input
						type="submit" name="button" id="button" value="提交" size="20" /></td>
				</tr>
			</table>
		</div>
	</form>
	<br /> <br /> <br />
	<!--分类 列表-->
	<div>
		<table width="100%" border="1">
			<tr align="center">
				<td width="30%" bgcolor="#CCCCCC">id</td>
				<td width="50%" bgcolor="#CCCCCC">类型名称</td>
				<td width="20%" bgcolor="#CCCCCC">操作</td>
			</tr>
<?php
foreach ( $list as $row ) {
	?>
      <tr align="center">
				<td><?=$row['artpr_id']?></td>
				<td><?=$row['name']?></td>
				<td><a href="/admin/arttag.php?act=edit&id=<?=$row['artpr_id']?>">修改</a>
					<a href="/admin/arttag.php?act=del&id=<?=$row['artpr_id']?>">删除</a></td>
			</tr>
<?php
}
?>
    </table>
	</div>
</div>
</div>