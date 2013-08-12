<div class="admin_background">

<?php
require './common/header.php';
$id = intval($_GET['id']);
$p = intval($_GET['p']);
$act = trim($_GET['act']);

$p = $p > 0 ? $p : 1;
$db = DB::instance();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//��Ʒ���
	$data = array();
	$flag = false;
	$id = intval($_POST['prod_id']);
	$data['title'] = trim($_POST['title']);
	$data['memo'] = trim($_POST['memo']);
	$data['price'] = is_numeric($_POST['price']) ? $_POST['price'] : 0;
	$data['item_id'] = is_numeric($_POST['item_id']) ? $_POST['item_id'] : 0;
	$data['main_img'] = trim($_POST['main_img']);
	$data['wangwang'] = trim($_POST['wangwang']);
	$data['order'] = intval($_POST['order']);
	$data['class_id'] = intval($_POST['class_id']);
	$data['click_url'] = trim($_POST['click_url']);

	if ( ! $data['title']) {
		$msg = '����������⡣';
		//break;
		$flag = true;
	}
	if ( ! $data['price']) {
		$msg = '��������۸�';
		$flag = true;
		//break;
	}
	if ( ! $data['memo']) {
		$msg = '����������ܡ�';
		$flag = true;
	}
	if ( ! $data['main_img']) {
		$msg = '����������ͼ��';
		$flag = true;
	}
	if ( ! $data['item_id']) {
		$msg = '����������Ч�ı���ID��';
		$flag = true;
	}
	// 			$db->setDebug();
	if(!$flag){
		if ($id) {
			$ret = $db->update('vg_product', $data, 'prod_id='.$id);
		}else{
			$data['feature'] = '';
			$data['status'] = 1;
			$ret = $db->insert('vg_product', $data);
		}
		if ($ret !== false) {
			$msg = '����ɹ���';
		}else{
			$msg = '����ʧ�ܡ�';
		}
	}
	
}else{
	if ($act == 'del') {
		$ret = $db->delete('vg_product', 'prod_id='.$id);
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
		$sql = 'select * from vg_product order by prod_id desc';
		$rec = true;
		$list = getPageData($sql, $p, $rec);
		
		$data = array();
		if ($act == 'edit') {
			$data = $db->getOne('select * from vg_product where prod_id='.$id);
		}
		$sqls = 'select class_id,name,parent_class_id from vg_class order by class_id';
		$options = array();
		$options = $db->getAll($sqls);
?>
   <!--�����Ʒ���޸���Ʒ-->
  <form id="form1" name="form1" method="post" action="/admin/item.php">
  <input type="hidden" name="prod_id" id="prod_id" value="<?=$data['prod_id']?>" />
    <div>
    <p>���´�(<b style="color: red">*</b>)��Ϊ������</p>
      <table width="100%" border="1">
        <tr>
          <td width="20%" bgcolor="#eeeeee">����ID:(<b style="color: red">*���� ������</b>)</td>
          <td width="78%">
            <input type="text" name="item_id" id="item_id" size="100" value="<?=$data['item_id']?>" />
            </td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">��������(<b style="color: red">*</b>)��</td>
          <td><input type="text" name="title" id="title" size="100" value="<?=$data['title']?>"/></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">��������(<b style="color: red">*</b>)��</td>
          <td>
          <div class="kg_editorContainer"   data-config='{"width" : "800px" , "height": "250px" }'>
    <textarea name='memo' class="ks-editor-textarea" tabindex="0" style="width:733px;height: 400px;">            
<?=htmlentities($data['memo'])?>
    </textarea>    
</div></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">�����۸�(<b style="color: red">*</b>)��</td>
          <td><input type="text" name="price" id="price" size="100" value="<?=$data['price']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">������ͼ(<b style="color: red">*</b>)</td>
          <td><input type="text" name="main_img" id="main_img" size="100" value="<?=$data['main_img']?>" /></td>
        </tr>
         <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>)</td>
          <td><input type="text" name="wangwang" id="wangwang" size="100" value="<?=$data['wangwang']?>" /></td>
        </tr>
         <tr>
          <td bgcolor="#eeeeee">����</td>
          <td><input type="text" name="order" id="order" size="100" value="<?=$data['order']?>" /></td>
        </tr>
         <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>)</td>
          <td><input type="text" name="class_id" id="class_id" size="100" value="<?=$data['class_id']?>" />
          <select>
          <?php foreach ($options as $op) {
          if($op['parent_class_id'] != 0){ ?>
          <option value="<?=$op['class_id']?>">..<?=$op['class_id']?>:<?=$op['name']?></option>
          <?php } else {?>
           <option value="<?=$op['class_id']?>"><?=$op['class_id']?>:<?=$op['name']?></option>
          <?php }}?>
          </select></td>
        </tr>
                 <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>)</td>
          <td><input type="text" name="click_url" id="click_url" size="100" value="<?=$data['click_url']?>" /></td>
        </tr>
        <tr>
          <td height="25" colspan="5" align="center" bgcolor="#cccccc"><input type="submit" name="button" id="button" size="100" value="�ύ" />
          </td>
        </tr>
      </table>
    </div>
  </form>
  <br />
  <br />
  <br/>
  <a href="/admin/item.php">��Ҫ���</a>
  <!--�����б�-->
  <div>
    <table width="100%" border="2">
      <tr align="center">
        <td width="5%" bgcolor="#cccccc">id</td>
        <td width="5%" bgcolor="#cccccc">����id</td>
        <td width="20%" bgcolor="#cccccc">��������</td>
        <td width="10%" bgcolor="#cccccc">����</td>
        <td width="15%" bgcolor="#cccccc" >����ͼƬ</td>
        <td width="10%" bgcolor="#cccccc">�����۸�</td>
        <td width="5%" bgcolor="#cccccc">����</td>
       <td width="10%" bgcolor="#cccccc">����</td>
        <td width="10%" bgcolor="#cccccc">����</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['prod_id']?></td>
        <td><a href="http://item.taobao.com/item.htm?id=<?=$row['item_id']?>"><?=$row['item_id']?></a></td>
        <td><?=$row['title']?></td>
        <td><?=$row['wangwang']?></td>
        <td><img src="<?=$row['main_img']?>_100x100.jpg" /></td>
        <td><?=$row['price']?></td>
        <td><?=$row['order']?></td>
        <td><?=$row['class_id']?></td>
        <td><a href="/admin/item.php?act=edit&id=<?=$row['prod_id']?>">�޸�</a> <a href="/admin/item.php?act=del&id=<?=$row['prod_id']?>">ɾ��</a></td>
      </tr>
<?php 
	}
?>
    </table>
<?php 
	printPageInfo('/admin/item.php', $p, $rec);
?>
  </div>
 </div>

</div>
