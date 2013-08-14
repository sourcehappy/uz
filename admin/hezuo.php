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
			$id = intval($_POST['shop_id']);
			$data['title'] = trim($_POST['title']);
			$data['sort'] = intval($_POST['sort']);
			$data['img_path'] = trim($_POST['img_path']);
			$data['url'] = trim($_POST['url']);
			$data['memo'] = $_POST['memo'];
			$data['commission'] = floatval($_POST['commission']);
			$data['nick'] = trim($_POST['nick']);
			$data['class_id'] = intval($_POST['select']);
			if ( ! $data['title']) {
				$msg = '必须输入标题。';
				$flag = true;
			}
			if ( ! $data['url']) {
				$msg = '必须输入链接。';
				$flag = true;
			}
			if ( ! $data['img_path']) {
				$msg = '必须输入图片路径。';
				$flag = true;
			}
			if ( ! $data['nick']) {
				$msg = '必须输入掌柜呢称。';
				$flag = true;
			}
			if(!$flag)
			{
				if ($id) {
					$ret = $db->update('df_shop', $data, 'shop_id='.$id);
				}else{
// 					$data['parent_class_id'] = 0;
					$data['up_time'] = new MySQLCode ( 'now()' );
					$ret = $db->insert('df_shop', $data);
				}
				if ($ret !== false) {
					$msg = '保存成功。';
				}else{
					$msg = '保存失败。';
				}
			}
			
}else{
	if ($act == 'del') {

					$ret = $db->delete('df_shop', 'shop_id='.$id);
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
		$sql = 'select * from df_shop order by shop_id desc';
		$rec = true;
		$list = getPageData($sql, $p, $rec);
		
		$data = array();
		if ($act == 'edit') {
			$data = $db->getOne('select * from df_shop where shop_id='.$id);
		}	
		$sqls = 'select class_id,name from vg_class where parent_class_id = 0 order by class_id';
		$options = array();
		$options = $db->getAll($sqls);
?>
<!--添加商品分类和修改分类-->
  <form id="form1" name="form1" method="post" action="/admin/hezuo.php">
  <input type="hidden" name="shop_id" id="shop_id" value="<?=$data['shop_id']?>" />
    <div>
        <p>以下带(<b style="color: red">*</b>)号为必填项</p>
      <table width="700" border="1">    
      <tr>
          <td bgcolor="#eeeeee">标题(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="title" id="title" size ="30" value="<?=$data['title']?>" />
          </td>
        </tr>
          <tr>
          <td bgcolor="#eeeeee">掌柜呢称(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="nick" id="nick" size ="30" value="<?=$data['nick']?>" />
          </td>
        </tr>
              <tr>
          <td bgcolor="#eeeeee">描述(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="memo" id="memo" size ="30" value="<?=$data['memo']?>" />
          </td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">店铺链接(<b style="color: red">*</b>)：</td>
          <td><input type="text" name="url" id="url" size ="30" value="<?=$data['url']?>" /></td>

        </tr>
        <tr>
          <td bgcolor="#eeeeee">图片路径(<b style="color: red">*</b>)：</td>
          <td><input type="text" name="img_path" id="img_path" size ="30" value="<?=$data['img_path']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">排序：</td>
          <td><input type="text" name="sort" id="sort" size ="30" value="<?=$data['sort']?>" /></td>
        </tr>
              <tr>
          <td bgcolor="#eeeeee">类别id(<b style="color: red">*</b>)</td>
          <td ><!--  <input type="text" name="class_id" id="class_id" size ="30" value="<?=$data['class_id']?>" /> -->
          <select name="select">
          <?php foreach ($options as $op) {?>
          <option value="<?=$op['class_id']?>"><?=$op['name']?></option>
          <?php }?>
          </select>
          </td>
        </tr>
              <tr>
          <td bgcolor="#eeeeee">佣金比率(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="commission" id="commission" size ="30" value="<?=$data['commission']?>" />
          </td>
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
        <td width="3%">id</td>
        <td width="18%">标题</td>
        <td width="8%">掌柜呢称</td>
        <td width="20%">图片</td>
        <td width="20%">链接</td>
        <td width="3%">排序</td>
        <td width="3%">类别id</td>
        <td width="10%">操作</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
 		<td><?=$row['shop_id']?></td>
        <td><?=$row['title']?></td>
        <td><?=$row['nick']?></td>
        <td><img src="<?=$row['img_path']?>" width="100px"/></td>
         <td><?=$row['url']?></td>
        <td><?=$row['sort']?></td>
        <td><?=$row['class_id']?>
        <td><a href="/admin/hezuo.php?act=edit&id=<?=$row['shop_id']?>">修改</a> <a href="/admin/hezuo.php?act=del&id=<?=$row['shop_id']?>">删除</a></td>
      </tr>
<?php 
	}
?>
    </table>
<?php 
	printPageInfo('/admin/yl.php', $p, $rec);
?>
  </div>
  
 
 </div>
</div>