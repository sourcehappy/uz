
<div class="admin_background">


<?php
require './common/header.php';
$id = intval($_GET['id']);
$p = intval($_GET['p']);
$act = trim($_GET['act']);

$p = $p > 0 ? $p : 1;

$db = DB::instance();
$sql ='select count(*) from vg_art_property';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$data = array();
			$flag = false;
			$id = intval($_POST['gg_id']);
			$data['gg_type'] = intval($_POST['gg_type']);
			$data['gg_url'] = trim($_POST['gg_url']);
			$data['gg_pic'] = trim($_POST['gg_pic']);
			$data['gg_title'] = trim($_POST['gg_title']);
			$data['sort'] = intval($_POST['sort']);

			if ( ! $data['gg_url']) {
				$msg = '�������������ӡ�';
				$flag =true;
			}
			else if ( ! $data['gg_pic']) {
				$msg = '��������ͼƬ��ַ��';
				$flag =true;
			}
			else if ( ! $data['gg_title']) {
				$msg = '����������⡣';
				$flag =true;
			}
			if(!$flag)
			{
				if ($id) {
					$ret = $db->update('df_gg', $data, 'id='.$id);
				}else{
// 					$data['gg_id'] = 0;
// 					$data['up_time'] = 0;
					$data['up_time'] = new MySQLCode('now()');
					$ret = $db->insert('df_gg', $data);
				}
				if ($ret !== false) {
					$msg = '����ɹ���';
					$flag = false;
				}else {
					$msg = '����ʧ�ܡ�';
				}
				$flag = false;
			}
			
}else{
	if ($act == 'del') {
		
			$ret = $db->delete('df_gg', 'gg_id='.$id);
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
 	
 $sql = 'select gg_id,gg_type,gg_url,gg_pic,gg_title,sort from df_gg order by gg_id desc';
 $rec = true;
 $list = getPageData($sql, $p, $rec);
 
 $data = array();
 if ($act == 'edit') {
 	$data = $db->getOne('select * from df_gg where id='.$id);
 }
 
 $artpr_names = array();
 $sql = 'select * from df_gg order by gg_id';
 $artpr_names = $db->getAll($sql);
 ?>
 
 <!--�������-->
  <!--����-->
  <form id="form1" name="form1" method="post" action="/admin/gg.php">
  <input type="hidden" name="gg_id" id="gg_id" value="<?=$data['gg_id']?>" />
    <div>
    <p>���´�(<b style="color: red">*</b>)��Ϊ������</p>
      <table width="100%" border="1" >
        <tr>
          <td width="16%" bgcolor="#eeeeee">�������:</td>
          <td width="82%"><input type="text" name="gg_type" id="gg_type"  size="100" value="<?=$data['gg_type']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">�������(<b style="color: red">*</b>)</td>
          <td><input type="text" name="gg_url" id="gg_url"  size="100" value="<?=$data['gg_url']?>" />
         </td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">ͼƬ��ַ(<b style="color: red">*</b>)</td>
          <td><input type="text" name="gg_pic" id="gg_pic"  size="100" value="<?=$data['gg_pic']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>)��</td>
          <td><input type="text" name="gg_title" id="gg_title"  size="100" value="<?=$data['gg_title']?>" /></td>
        </tr>
           <tr>
          <td bgcolor="#eeeeee">����:</td>
          <td ><input type="text" name="sort" id="sort"  size="100" value="<?=$data['sort']?>" /></td>
        </tr>
        <tr>
          <td height="25" colspan="5" align="center"><input type="submit" name="button" id="button" value="�ύ" size="20"/></td>
        </tr>
      </table>
    </div>
  </form>
  <br /><br /><br />
   <!--���� �б�-->
  <div>
    <table width="100%" border="1">
      <tr align="center">
        <td width="5%">id</td>
        <td width="5%">GG����</td>
        <td width="20%">GG����</td>
        <td width="20%">����</td>
        <td width="5%">����</td>
        <td width="20%">ͼƬ</td>
        <td width="10%">����</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['gg_id']?></td>
        <td><?=$row['gg_type']?></td>
        <td><?=$row['gg_url']?></td>
        <td><?=$row['gg_title']?></td>
        <td><?=$row['sort']?></td>
        <td><img src="<?=$row['gg_pic']?>" width="100px"/></td>
        <td><a href="/admin/gg.php?act=edit&id=<?=$row['gg_id']?>">�޸�</a> <a href="/admin/gg.php?act=del&id=<?=$row['gg_id']?>">ɾ��</a></td>
      </tr>
<?php 
	}
?>
    </table>
  </div>
 
 </div>
</div>