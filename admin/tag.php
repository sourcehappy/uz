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
			$id = intval($_POST['tag_id']);
			$data['name'] = trim($_POST['name']);
			$data['order'] = intval($_POST['order']);
			$data['click_num'] = intval($_POST['click_num']);
			if ( ! $data['name']) {
				$msg = '�����������ơ�';
				$flag = true;
			}
			if(!$flag)
			{
				if ($id) {
					$ret = $db->update('vg_tag', $data, 'tag_id='.$id);
				}else{
					$data['tagpr_id'] = 0;
					$data['img'] = 0;
					$data['memo'] = 0;
// 					$data['parent_class_id'] = 0;
					$data['memo'] = '';
					$ret = $db->insert('vg_tag', $data);
				}
				if ($ret !== false) {
					$msg = '����ɹ���';
				}else{
					$msg = '����ʧ�ܡ�';
				}
			}
			
}else{
	if ($act == 'del') {

				$ret = $db->delete('vg_tag', 'tag_id='.$id);
				if ( ! $msg) {
					if ($ret !== false) {
						$msg = 'ɾ���ɹ���';
					}else{
						$msg = 'ɾ��ʧ�ܡ�';
					}
				}
		}
		
	}
?>
 <div class="admin_container">
<?php 
		if ($msg) echo '<font color="red">'.$msg.'</font><br /><br />';
		$sql = 'select * from vg_tag order by tag_id desc';
		$rec = true;
		$list = getPageData($sql, $p, $rec);
		
		$data = array();
		if ($act == 'edit') {
			$data = $db->getOne('select * from vg_tag where tag_id='.$id);
		}
				
?>
<!--�����Ʒ������޸ķ���-->
  <form id="form1" name="form1" method="post" action="/admin/tag.php">
  <input type="hidden" name="tag_id" id="tag_id" value="<?=$data['tag_id']?>" /> 
    <div>
        <p>���´�(<b style="color: red">*</b>)��Ϊ������</p>
      <table width="700" border="1">
      
      <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="name" id="name" size ="30" value="<?=$data['name']?>" />
          </td>
        </tr>    
        <tr>
          <td bgcolor="#eeeeee">����</td>
          <td><input type="text" name="order" id="order" size ="30" value="<?=$data['order']?>" /></td>
        </tr>
         <tr>
          <td bgcolor="#eeeeee">�������</td>
          <td><input type="text" name="click_num" id="click_num" size ="30" value="<?=$data['click_num']?>" /></td>
        </tr>
        <tr>
          <td height="25" colspan="10" align="center" bgcolor="#cccccc"><input type="submit" name="button" id="button" size ="30" value="�ύ" />
          </td>
        </tr>
      </table>
    </div>
  </form>
  <br /><br /><br />
  <!--���� �б�-->
  <div>
    <table width="100%" border="1">
      <tr align="center">
        <td width="10%">tag_id</td>
        <td width="%8">����</td>
        <td width="28%">�����</td>
        <td width="9%">����</td>
        <td width="10%">����</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['tag_id']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['click_num']?></td>
        <td><?=$row['order']?></td>
        <td><a href="/admin/tag.php?act=edit&id=<?=$row['tag_id']?>">�޸�</a> <a href="/admin/tag.php?act=del&id=<?=$row['tag_id']?>">ɾ��</a></td>
      </tr>
<?php 
	}
?>
    </table>
<?php 
	printPageInfo('/admin/tag.php', $p, $rec);
?>
  </div>
  
 
 </div>
</div>