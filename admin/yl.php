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
				$msg = '����������⡣';
				$flag = true;
			}
			if ( ! $data['url']) {
				$msg = '�����������ӡ�';
				$flag = true;
			}
			if ( ! $data['img_path']) {
				$msg = '��������ͼƬ·����';
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
					$msg = '����ɹ���';
				}else{
					$msg = '����ʧ�ܡ�';
				}
			}
			
}else{
	if ($act == 'del') {

					$ret = $db->delete('df_link', 'link_id='.$id);
				if ( ! $msg) {
					if ($ret !== false) {
						$msg = 'ɾ���ɹ���';
					}else{
						$msg = '����ʧ�ܡ�';
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
<!--�����Ʒ������޸ķ���-->
  <form id="form1" name="form1" method="post" action="/admin/yl.php">
  <input type="hidden" name="class_id" id="class_id" value="<?=$data['link_id']?>" />
    <div>
        <p>���´�(<b style="color: red">*</b>)��Ϊ������</p>
      <table width="700" border="1">    
      <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="title" id="title" size ="30" value="<?=$data['title']?>" />
          </td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>)��</td>
          <td><input type="text" name="url" id="url" size ="30" value="<?=$data['url']?>" /></td>

        </tr>
        <tr>
          <td bgcolor="#eeeeee">ͼƬ·��(<b style="color: red">*</b>)��</td>
          <td><input type="text" name="img_path" id="img_path" size ="30" value="<?=$data['img_path']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">����</td>
          <td><input type="text" name="sort" id="sort" size ="30" value="<?=$data['sort']?>" /></td>
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
        <td width="10%">id</td>
        <td width="28%">����</td>
        <td width="26%">ͼƬ</td>
        <td width="20%">����</td>
        <td width="5%">����</td>
        <td width="10%">����</td>
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
        <td><a href="/admin/yl.php?act=edit&id=<?=$row['link_id']?>">�޸�</a> <a href="/admin/yl.php?act=del&id=<?=$row['link_id']?>">ɾ��</a></td>
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