<?php
/**
 * �����̨
 * 
 * @author Balsampear
 * @since 2013-4-24
 */
include '../common/global.inc.php';
define('PER_PAGE_COUNT', 20);

$id = intval($_GET['id']);
$p = intval($_GET['p']);
$t = trim($_GET['t']);
$act = trim($_GET['act']);
$t = $t ? $t : 'item';

$p = $p > 0 ? $p : 1;

$db = DB::instance();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	
	switch ($t) {
		case 'item':
			$data = array();
			$id = intval($_POST['prod_id']);
			$data['title'] = trim($_POST['title']);
			$data['memo'] = trim($_POST['memo']);
			$data['price'] = is_numeric($_POST['price']) ? $_POST['price'] : 0;
			$data['item_id'] = is_numeric($_POST['item_id']) ? $_POST['item_id'] : 0;
			$data['main_img'] = trim($_POST['main_img']);
			if ( ! $data['title']) {
				$msg = '����������⡣';
				break;
			}
			if ( ! $data['price']) {
				$msg = '��������۸�';
				break;
			}
			if ( ! $data['memo']) {
				$msg = '����������ܡ�';
				break;
			}
			if ( ! $data['main_img']) {
				$msg = '����������ͼ��';
				break;
			}
			if ( ! $data['item_id']) {
				$msg = '����������Ч�ı���ID��';
				break;
			}
// 			$db->setDebug();
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
			break;
		case 'class':
	
			$data = array();
			$id = intval($_POST['class_id']);
			$data['name'] = trim($_POST['name']);
			$data['order'] = intval($_POST['order']);
			$data['img'] = trim($_POST['img']);
			if ( ! $data['name']) {
				$msg = '�����������ơ�';
				break;
			}
			// 			$db->setDebug();
			if ($id) {
				$ret = $db->update('vg_class', $data, 'class_id='.$id);
			}else{
				$data['parent_class_id'] = 0;
				$data['memo'] = '';
				$ret = $db->insert('vg_class', $data);
			}
			if ($ret !== false) {
				$msg = '����ɹ���';
			}else{
				$msg = '����ʧ�ܡ�';
			}
			break;
		case 'art':
			$data = array();
			$id = intval($_POST['art_id']);
			$data['title'] = trim($_POST['title']);
			$data['text'] = trim($_POST['text']);
			$data['jump_url'] = trim($_POST['jump_url']);
			$data['main_img'] = trim($_POST['main_img']);
			if ( ! $data['title']) {
				$msg = '����������⡣';
				break;
			}
			if ( ! $data['text']) {
				$msg = '�����������ݡ�';
				break;
			}
			if ( ! $data['main_img']) {
				$msg = '����������ͼ��';
				break;
			}
			// 			$db->setDebug();
			if ($id) {
				$ret = $db->update('vg_article', $data, 'art_id='.$id);
			}else{
				$data['is_top'] = 0;
				$data['class_id'] = 0;
				$data['artpr_id'] = 0;
				$data['create_time'] = new MySQLCode('now()');
				$ret = $db->insert('vg_article', $data);
			}
			if ($ret !== false) {
				$msg = '����ɹ���';
			}else{
				$msg = '����ʧ�ܡ�';
			}
			break;
		case 'tag':
			$data = array();
			$id = intval($_POST['artpr_id']);
			$data['name'] = trim($_POST['name']);
			if(!$data['name'])
			{
				$msg = '����������������!';
				break;
			}
			if ($id) {
				$ret = $db->update('vg_art_property', $data, 'artpr_id='.$id);
			}else{
				$data['name'] = new MySQLCode('now()');
				$ret = $db->insert('vg_art_property', $data);
			}
			if ($ret !== false) {
				$msg = '����ɹ���';
			}else{
				$msg = '����ʧ�ܡ�';
			}
			break;
			break;
	}
}else{
	if ($act == 'del') {
		switch ($t) {
			case 'item':
				$ret = $db->delete('vg_product', 'prod_id='.$id);
				break;
			case 'class':
				if ($db->getValue('select count(*) as rc from vg_class where parent_class_id='.$id) > 0) {
					$msg = '�÷�������������ĸ����࣬����ɾ����';
				}else{
					$ret = $db->delete('vg_class', 'class_id='.$id);
				}
				break;
			case 'art':
				$ret = $db->delete('vg_article', 'art_id='.$id);
				break;
			case 'tag':
				$ret = $db->delete('vg_art_property', 'artpr_id='.$id);
				break;
		}
		if ( ! $msg) {
			if ($ret !== false) {
				$msg = 'ɾ���ɹ���';
			}else{
				$msg = '����ʧ�ܡ�';
			}
		}
	}
}

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
		echo '<a href="'.$url.'&p='.($pno-1).'">��һҳ</a>';
	}
	if ($pc > $pno) {
		echo '<a href="'.$url.'&p='.($pno+1).'">��һҳ</a>';
	}
	echo ' ��ǰ�� '.$pno.' ҳ���� '.$pc.' ҳ('.$rec.'��)';
	
}

// $msg = 'test';
?>
 <div style="width:960px; margin-left:auto; margin-right:auto;">
  <div><a href="/admin/index.php?t=item">��������</a> 
  <a href="/admin/index.php?t=class">�����������</a> 
  <a href="/admin/index.php?t=art">���¹���</a>
  <a href="/admin/index.php?t=tag">���·������</a> </div>
<br />
<?php 
if ($msg) echo '<font color="red">'.$msg.'</font><br /><br />';
switch ($t) {
	case 'item':
		$sql = 'select title,prod_id,item_id,price,main_img from vg_product order by prod_id desc';
		$rec = true;
		$list = getPageData($sql, $p, $rec);
		
		$data = array();
		if ($act == 'edit') {
			$data = $db->getOne('select * from vg_product where prod_id='.$id);
		}
?>
  <!--�����Ʒ���޸���Ʒ-->
  <form id="form1" name="form1" method="post" action="/admin/index.php?t=item">
  <input type="hidden" name="prod_id" id="prod_id" value="<?=$data['prod_id']?>" />
    <div>
      <table width="100%" border="2">
        <tr>
          <td width="26%">����ID:</td>
          <td width="32%">
            <input type="text" name="item_id" id="item_id" value="<?=$data['item_id']?>" />
            </td>
          <td width="42%">���� �����֣���ʽ�����޷�����</td>
        </tr>
        <tr>
          <td>�������⣺</td>
          <td><input type="text" name="title" id="title" value="<?=$data['title']?>" /></td>
          <td>����</td>
        </tr>
        <tr>
          <td>�������ܣ�</td>
          <td><TEXTAREA name="memo" id="memo" rows=10 cols=100><?=htmlentities($data['memo'])?></TEXTAREA></td>
          <td>����</td>
        </tr>
        <tr>
          <td>�����۸�</td>
          <td><input type="text" name="price" id="price" value="<?=$data['price']?>" /></td>
          <td>����</td>
        </tr>
        <tr>
          <td>������ͼ</td>
          <td><input type="text" name="main_img" id="main_img" value="<?=$data['main_img']?>" /></td>
          <td>ͼƬ��ַ</td>
        </tr>
        <tr>
          <td height="17" colspan="3"><input type="submit" name="button" id="button" value="�ύ" />
          </td>
        </tr>
      </table>
    </div>
  </form>
  <br />
  <br />
  <br/>
  <a href="/admin/index.php?t=item">��Ҫ���</a>
  <!--�����б�-->
  <div>
    <table width="100%" border="2">
      <tr align="center">
        <td width="10%">id</td>
        <td width="10%">����id</td>
        <td width="40%">��������</td>
        <td width="15%">����ͼƬ</td>
        <td width="10%">�����۸�</td>
        <td width="10%">����</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['prod_id']?></td>
        <td><a href="http://item.taobao.com/item.htm?id=<?=$row['item_id']?>"><?=$row['item_id']?></a></td>
        <td><?=$row['title']?></td>
        <td><img src="<?=$row['main_img']?>_100x100.jpg" /></td>
        <td><?=$row['price']?></td>
        <td><a href="/admin/index.php?t=item&act=edit&id=<?=$row['prod_id']?>">�޸�</a> <a href="/admin/index.php?t=item&act=del&id=<?=$row['prod_id']?>">ɾ��</a></td>
      </tr>
<?php 
	}
?>
    </table>
<?php 
	printPageInfo('/admin/index.php?t=item', $p, $rec);
?>
  </div>
<?php 
		break;
	case 'class':
		$sql = 'select * from vg_class order by class_id desc';
		$rec = true;
		$list = getPageData($sql, $p, $rec);
		
		$data = array();
		if ($act == 'edit') {
			$data = $db->getOne('select * from vg_class where class_id='.$id);
		}
?>
  <!--�����Ʒ������޸ķ���-->
  <form id="form1" name="form1" method="post" action="/admin/index.php?t=class">
  <input type="hidden" name="class_id" id="class_id" value="<?=$data['class_id']?>" />
    <div>
      <table width="600px" border="1">
        <tr>
          <td width="26%">�������ƣ�</td>
          <td width="32%"><input type="text" name="name" id="name" value="<?=$data['name']?>" /></td>
          <td width="42%">����</td>
        </tr>
        <tr>
          <td>����ͼƬ��</td>
          <td><input type="text" name="img" id="img" value="<?=$data['img']?>" /></td>
          <td></td>
        </tr>
        <tr>
          <td>��������</td>
          <td><input type="text" name="order" id="order" value="<?=$data['order']?>" /></td>
          <td>����</td>
        </tr>
        <tr>
          <td height="17" colspan="3"><input type="submit" name="button" id="button" value="�ύ" />
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
        <td width="19%">id</td>
        <td width="28%">�������</td>
        <td width="26%">����ͼƬ</td>
        <td width="9%">����</td>
        <td width="10%">����</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['class_id']?></td>
        <td><?=$row['name']?></td>
        <td><img src="<?=$row['img']?>_100x100.jpg" /></td>
        <td><?=$row['order']?></td>
        <td><a href="/admin/index.php?t=class&act=edit&id=<?=$row['class_id']?>">�޸�</a> <a href="/admin/index.php?t=class&act=del&id=<?=$row['class_id']?>">ɾ��</a></td>
      </tr>
<?php 
	}
?>
    </table>
<?php 
	printPageInfo('/admin/index.php?t=class', $p, $rec);
?>
  </div>

<?php 
		break;
	case 'art':
		$sql = 'select art_id,title,main_img,jump_url from vg_article order by art_id desc';
		$rec = true;
		$list = getPageData($sql, $p, $rec);
		
		$data = array();
		if ($act == 'edit') {
			$data = $db->getOne('select * from vg_article where art_id='.$id);
		}
?>
  <!--�������-->
  <!--����-->
  <form id="form1" name="form1" method="post" action="/admin/index.php?t=art">
  <input type="hidden" name="art_id" id="art_id" value="<?=$data['art_id']?>" />
    <div>
    <p>���´�(<b style="color: red">*</b>)��Ϊ������</p>
      <table width="100%" border="1">
        <tr>
          <td width="16%">���±���(<b style="color: red">*</b>):</td>
          <td width="82%"><input type="text" name="title" id="title"  size="100" value="<?=$data['title']?>" /></td>
        </tr>
        <tr>
          <td>��������(<b style="color: red">*</b>):</td>
          <td>
          <div class="kg_editorContainer"   data-config='{"width" : "800px" , "height": "250px" }'>
    <textarea name='text' class="ks-editor-textarea" tabindex="0" style="width:733px;height: 400px;">            
<?=htmlentities($data['text'])?>
    </textarea>    
</div></td>
         <!--<td><TEXTAREA name="text" id="text" rows=10 cols=100><?=htmlentities($data['text'])?></TEXTAREA></td>  --> 
        </tr>
        <tr>
          <td>ת���ַ��</td>
          <td><input type="text" name="jump_url" id="jump_url"  size="100" value="<?=$data['jump_url']?>" /></td>
        </tr>
        <tr>
          <td>ͼƬ��ַ��</td>
          <td><input type="text" name="main_img" id="main_img"  size="100" value="<?=$data['main_img']?>" /></td>
        </tr>
        <tr>
          <td height="17" colspan="3"><input type="submit" name="button" id="button" value="�ύ" /></td>
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
        <td width="30%">���±���</td>
        <td width="20%">��ת��ַ</td>
        <td width="20%">����ͼƬ</td>
        <td width="10%">����</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['art_id']?></td>
        <td><?=$row['title']?></td>
        <td><?=$row['jump_url']?></td>
        <td><img src="<?=$row['main_img']?>_100x100.jpg" /></td>
        <td><a href="/admin/index.php?t=art&act=edit&id=<?=$row['art_id']?>">�޸�</a> <a href="/admin/index.php?t=art&act=del&id=<?=$row['art_id']?>">ɾ��</a></td>
      </tr>
<?php 
	}
?>
    </table>
  </div>

<?php 
		break;
		case 'tag':
			$sql = 'select artpr_id,name from vg_art_property order by artpr_id desc';
			$rec = true;
			$list = getPageData($sql, $p, $rec);
		
			$data = array();
			if ($act == 'edit') {
				$data = $db->getOne('select * from vg_art_property where artpr_id='.$id);
			}

?>
<!-- -->
  <!--������·�����޸����·���-->
  <form id="form1" name="form1" method="post" action="/admin/index.php?t=tag">
 <!--  <input type="text" name="artpr_id" id="artpr_id" value="<?=$data['artpr_id']?>" /> -->
    <div>
      <table width="100%" border="1">
        <tr>
          <td width="26%">id(<b style="color: red">������</b>):</td>
          <td width="72%"><input type="hidden" name="artpr_id" id="artpr_id"  size="100" value="<?=$data['artpr_id']?>" /></td>
        </tr>
        <tr>
          <td>�������ƣ�</td>
          <td><input type="text" name="name" id="name"  size="100" value="<?=$data['name']?>" /></td>
        </tr>
        <tr>
          <td height="17" colspan="3"><input type="submit" name="button" id="button" value="�ύ" /></td>
        </tr>
      </table>
    </div>
  </form>
  <br /><br /><br />
   <!--���� �б�-->
  <div>
    <table width="100%" border="1">
      <tr align="center">
        <td width="30%" bgcolor="#CCCCCC">id</td>
        <td width="50%" bgcolor="#CCCCCC">��������</td>
        <td width="20%" bgcolor="#CCCCCC">����</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['artpr_id']?></td>
        <td><?=$row['name']?></td>     
        <td><a href="/admin/index.php?t=tag&act=edit&id=<?=$row['artpr_id']?>">�޸�</a> <a href="/admin/index.php?t=tag&act=del&id=<?=$row['artpr_id']?>">ɾ��</a></td>
      </tr>
<?php 
	}
?>
    </table>
  </div>



<?php 
		break;
}
?>

</div>
