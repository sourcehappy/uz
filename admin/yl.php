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
			$id = intval($_POST['link_id']);
			$data['title'] = trim($_POST['title']);
			$data['sort'] = intval($_POST['sort']);
			$data['img_path'] = trim($_POST['img_path']);
			$data['url'] = trim($_POST['url']);
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
			if(!$flag)
			{
				if ($id) {
					$ret = $db->update('df_link', $data, 'link_id='.$id);
				}else{
// 					$data['parent_class_id'] = 0;
					$data['up_time'] = new MySQLCode ( 'now()' );
					$ret = $db->insert('df_link', $data);
				}
				if ($ret !== false) {
					$msg = '保存成功。';
				}else{
					$msg = '保存失败。';
				}
			}
			
}else{
	if ($act == 'del') {

					$ret = $db->delete('df_link', 'link_id='.$id);
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
		$sql = 'select * from df_link order by link_id desc';
		$rec = true;
		$list = getPageData($sql, $p, $rec);
		
		$data = array();
		if ($act == 'edit') {
			$data = $db->getOne('select * from df_link where link_id='.$id);
		}				
?>
<!--添加商品分类和修改分类-->
  <form id="form1" name="form1" method="post" action="/admin/yl.php">
  <input type="hidden" name="class_id" id="class_id" value="<?=$data['link_id']?>" />
    <div>
        <p>以下带(<b style="color: red">*</b>)号为必填项</p>
      <table width="700" border="1">    
      <tr>
          <td bgcolor="#eeeeee">标题(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="title" id="title" size ="30" value="<?=$data['title']?>" />
          </td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">链接(<b style="color: red">*</b>)：</td>
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
        <td width="28%">标题</td>
        <td width="26%">图片</td>
        <td width="20%">链接</td>
        <td width="5%">排序</td>
        <td width="10%">操作</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
 		<td><?=$row['link_id']?></td>
        <td><?=$row['title']?></td>
        <td><img src="<?=$row['img_path']?>" width="100px"/></td>
         <td><?=$row['url']?></td>
        <td><?=$row['sort']?></td>
        <td><a href="/admin/yl.php?act=edit&id=<?=$row['link_id']?>">修改</a> <a href="/admin/yl.php?act=del&id=<?=$row['link_id']?>">删除</a></td>
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