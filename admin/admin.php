<div class="admin_background">

<?php
require './common/header.php';

$id = intval($_GET['id']);
$p = intval($_GET['p']);
$t = trim($_GET['t']);
$act = trim($_GET['act']);
$t = $t ? $t : 'item';

$p = $p > 0 ? $p : 1;

$db = DB::instance();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$data = array();
			$flag = false;
			$id = intval($_POST['class_id']);
			$data['parent_class_id'] = intval($_POST['parent_class_id']);
			$data['name'] = trim($_POST['name']);
			$data['order'] = intval($_POST['order']);
			$data['img'] = trim($_POST['img']);
			if ( ! $data['name']) {
				$msg = '必须输入名称。';
				$flag = true;
			}
// 			if(! $data['parent_class_id'])
// 			{
// 				$msg = '必须输入父类ID。';
// 				$flag = true;
// 			}
			// 			$db->setDebug();
			if(!$flag)
			{
				if ($id) {
					$ret = $db->update('vg_class', $data, 'class_id='.$id);
				}else{
// 					$data['parent_class_id'] = 0;
					$data['memo'] = '';
					$ret = $db->insert('vg_class', $data);
				}
				if ($ret !== false) {
					$msg = '保存成功。';
				}else{
					$msg = '保存失败。';
				}
			}
			
}else{
	if ($act == 'del') {

				if ($db->getValue('select count(*) as rc from vg_class where parent_class_id='.$id) > 0) {
					$msg = '该分类是其它分类的父分类，不能删除！';
				}else{
					$ret = $db->delete('vg_class', 'class_id='.$id);
				}
				if ( ! $msg) {
					if ($ret !== false) {
						$msg = '删除成功。';
					}else{
						$msg = '保存失败。';
					}
				}
		}
		
	}
?>
 <div class="admin_container">
<?php 
		if ($msg) echo '<font color="red">'.$msg.'</font><br /><br />';
		$sql = 'select * from vg_class order by class_id desc';
		$rec = true;
		$list = getPageData($sql, $p, $rec);
		
		$data = array();
		if ($act == 'edit') {
			$data = $db->getOne('select * from vg_class where class_id='.$id);
		}
		$sqls = 'select class_id,name from vg_class where parent_class_id = 0 order by class_id';
		$options = array();
		$options = $db->getAll($sqls);
				
?>
<!--添加商品分类和修改分类-->
  <form id="form1" name="form1" method="post" action="/admin/admin.php">
  <!--  <input type="hidden" name="class_id" id="class_id" value="<?=$data['class_id']?>" /> -->
    <div>
        <p>以下带(<b style="color: red">*</b>)号为必填项</p>
      <table width="700" border="1">
       <tr>
          <td width="150" bgcolor="#eeeeee">id(不用填)：</td>
          <td width="550"><input type="text" name="class_id" id="class_id" readonly="readonly" ="<?=$data['class_id']?>" /></td>
        </tr>
      <tr>
          <td bgcolor="#eeeeee">父类id(<b style="color: red">*</b>)-0表示无父类：</td>
          <td ><input type="text" name="parent_class_id" id="parent_class_id" size ="30" value="<?=$data['parent_class_id']?>" />
         <select>
          <?php foreach ($options as $op)
          {
          	?>
          	<option value="<?=$op['class_id']?>"><?=$op['class_id']?>:<?=$op['name']?></option>
			<?php }?>
         </select><span style="color:red">一级目录才显示</span>
          </td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">分类名称(<b style="color: red">*</b>)：</td>
          <td><input type="text" name="name" id="name" size ="30" value="<?=$data['name']?>" /></td>

        </tr>
        <tr>
          <td bgcolor="#eeeeee">分类图片：</td>
          <td><input type="text" name="img" id="img" size ="30" value="<?=$data['img']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">分类排序：</td>
          <td><input type="text" name="order" id="order" size ="30" value="<?=$data['order']?>" /></td>
        </tr>
        <tr>
          <td height="25" colspan="10" align="center" bgcolor="#cccccc"><input type="submit" name="button" id="button" size ="30" value="提交" />
          </td>
        </tr>
      </table>
    </div>
  </form>
  <br /><br /><br />
  <!--分类 列表-->
  <div>
    <table width="100%" border="1">
      <tr align="center">
        <td width="10%">id</td>
        <td width="%8">父类id</td>
        <td width="28%">分类标题</td>
        <td width="26%">分类图片</td>
        <td width="9%">排序</td>
        <td width="10%">操作</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['class_id']?></td>
        <td><?=$row['parent_class_id']?></td>
        <td><?=$row['name']?></td>
        <td><img src="<?=$row['img']?>_100x100.jpg" /></td>
        <td><?=$row['order']?></td>
        <td><a href="/admin/admin.php?act=edit&id=<?=$row['class_id']?>">修改</a> <a href="/admin/admin.php?act=del&id=<?=$row['class_id']?>">删除</a></td>
      </tr>
<?php 
	}
?>
    </table>
<?php 
	printPageInfo('/admin/admin.php', $p, $rec);
?>
  </div>
  
 
 </div>
</div>