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
			if ( ! $data['nick']) {
				$msg = '���������ƹ��سơ�';
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
					$msg = '����ɹ���';
				}else{
					$msg = '����ʧ�ܡ�';
				}
			}
			
}else{
	if ($act == 'del') {

					$ret = $db->delete('df_shop', 'shop_id='.$id);
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
<!--�����Ʒ������޸ķ���-->
  <form id="form1" name="form1" method="post" action="/admin/hezuo.php">
  <input type="hidden" name="shop_id" id="shop_id" value="<?=$data['shop_id']?>" />
    <div>
        <p>���´�(<b style="color: red">*</b>)��Ϊ������</p>
      <table width="700" border="1">    
      <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="title" id="title" size ="30" value="<?=$data['title']?>" />
          </td>
        </tr>
          <tr>
          <td bgcolor="#eeeeee">�ƹ��س�(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="nick" id="nick" size ="30" value="<?=$data['nick']?>" />
          </td>
        </tr>
              <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="memo" id="memo" size ="30" value="<?=$data['memo']?>" />
          </td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">��������(<b style="color: red">*</b>)��</td>
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
          <td bgcolor="#eeeeee">���id(<b style="color: red">*</b>)</td>
          <td ><!--  <input type="text" name="class_id" id="class_id" size ="30" value="<?=$data['class_id']?>" /> -->
          <select name="select">
          <?php foreach ($options as $op) {?>
          <option value="<?=$op['class_id']?>"><?=$op['name']?></option>
          <?php }?>
          </select>
          </td>
        </tr>
              <tr>
          <td bgcolor="#eeeeee">Ӷ�����(<b style="color: red">*</b>)</td>
          <td ><input type="text" name="commission" id="commission" size ="30" value="<?=$data['commission']?>" />
          </td>
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
        <td width="3%">id</td>
        <td width="18%">����</td>
        <td width="8%">�ƹ��س�</td>
        <td width="20%">ͼƬ</td>
        <td width="20%">����</td>
        <td width="3%">����</td>
        <td width="3%">���id</td>
        <td width="10%">����</td>
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
        <td><a href="/admin/hezuo.php?act=edit&id=<?=$row['shop_id']?>">�޸�</a> <a href="/admin/hezuo.php?act=del&id=<?=$row['shop_id']?>">ɾ��</a></td>
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