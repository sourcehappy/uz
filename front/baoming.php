<?php
require './common/header.php';
include("top/topclient.php"); //����������tae��topclient
include("top/ItemGetRequest.php"); //���������þ����Request��
include '../common/global.inc.php';

$db = DB::instance();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$data = array();
	$flag = false;
	$id = intval($_POST['id']);
	$data['num_iid'] = intval($_POST['num_iid']);
	$data['detail_url'] = trim($_POST['detail_url']);
	$data['nick'] = trim($_POST['nick']);
	$data['title'] = trim($_POST['title']);
	$data['pic_url'] = trim($_POST['pic_url']);
	$data['price'] = $_POST['price'];
	$data['price_xian'] = $_POST['price_xian'];
	$data['beizhu'] = $_POST['beizhu'];
	$data['class_id'] = $_POST['select'];
	if (!$data['num_iid'])
	{
		$msg = '����������ƷID��';
		$flag = true;
	}
	if ( ! $data['title']) {
		$msg = '����������⡣';
		$flag = true;
	}
	if ( ! $data['detail_url']) {
		$msg = '�����������ӡ�';
		$flag = true;
	}
	if ( ! $data['pic_url']) {
		$msg = '��������ͼƬ·����';
		$flag = true;
	}
	if ( ! $data['nick']) {
		$msg = '���������ƹ��سơ�';
		$flag = true;
	}
	if(!$flag)
	{
			$data['up_time'] = new MySQLCode ( 'now()' );
// 			$data['up_time'] = '';
			$data['status'] = 0;
			$ret = $db->insert('item_baoming', $data);
		if ($ret !== false) {
			$msg = '�ύ�ɹ������ǽ�����24Сʱ����ˣ����ͨ�����Զ����ߡ�';
		}else{
			$msg = '�ύʧ�ܣ�';
		}
	}
		
}

?>
<?php 
// 		$data = array();
		$sqlparent = 'select class_id,name,parent_class_id from vg_class where parent_class_id=0 order by class_id';
		$options = array();
		$options = $db->getAll($sqlparent);
?>
<div class="clearboth"></div>
<div class="baoming_main">
	<div class="bmtp">
	<p><?php if ($msg) echo '<font color="red">'.$msg.'</font><br /><br />';?></p>
	<p style="color: red;font-size:18px;margin:5px 0 0 20px">������֪:</p>
	<p>1.������<b style="color:blue;">ϲ��Сվ</b>��</p>
	<p>2.�����Ҫ�μ��Ա����ƹ���Ŀ��Ӷ��������<b style="color: red;">5%</b>��</p>
	<p>3.��ƷͼƬ���뾫�������ô���<b style="color:blue;">ˮӡ</b>�����ó���<b style="color:red">ţƤѢͼƬ</b>��</p>
	<p>4.�������<b style="color:blue;">�����߱���</b>����</p>
	<p>5.��Ҽ���ٷ�QQȺ��<b style="color: red;">280509489</b>�����ţ�<b style="color:green">����</b></p>
	<p>6.�����а�Ҫ�����<b style="color:green;"> ������ </b>Uվ������������1�������ϣ�</p>
	<p><a href="http://bangpai.taobao.com/group/thread/15651242-284992144.htm?spm=0.0.0.0.q2wSZ9" target="_blank">����鿴����η��ö�����Uվ������</a></p>
	</div>
	<div class="bmbo">
		<form id="form1" name="form1" method="post" action="baoming.php">
		<input type="hidden" name="id" id="id" value="<?=$data['id']?>" />
		 <p>���´�(<b style="color: red">*</b>)��Ϊ������</p>
		 <p><span style="margin:auto 62px auto 0px;">��ƷID(<b style="color: red">*</b>):</span><input type="text" name="num_iid" id="num_iid" value="<?=$data['num_iid']?>" /><!-- <input type="button" name="get_item" id="get_item" style="margin:5px 0 0 30px;;width:30px;" value="��ȡ��Ʒ"> --></p>
		 <p>�ұ���Ʒ�����У���ɫ�ļ�Ϊ��Ʒid:    http://detail.tmall.com/item.htm?id=<span style="color:red;">21453704739</span></p>
		 <p><span style="margin:auto 50px auto 0px;">��Ʒ��ַ(<b style="color: red">*</b>):</span><input type="text" name="detail_url" id="detail_url"  size="100" value="<?=$data['detail_url']?>" /></p>
		 <p><span style="margin:auto 50px auto 0px;">��Ʒ����(<b style="color: red">*</b>):</span><input type="text" name="title" id="title"  size="100" value="<?=$data['title']?>" /></p>
		 <p><span style="margin:auto 50px auto 0px;">ͼƬ��ַ(<b style="color: red">*</b>):</span><input type="text" name="pic_url" id="pic_url"  size="100" value="<?=$data['pic_url']?>" /></p>
		 <p style="height:250px;text-align:center;"><img src="<?=$data['pic_url']?>" width="250px"></p>
		 <p><span style="margin:auto 74px auto 0px;">ԭ��(<b style="color: red">*</b>):</span><input type="text" name="price" id="price"  value="<?=$data['price']?>" /></p>
		 <p><span style="margin:auto 74px auto 0px;">�ּ�(<b style="color: red">*</b>):</span><input type="text" name="price_xian" id="price_xian" value="<?=$data['price_xian']?>" /><span style="color:red;">���б䶯���������</span></p>
		 <p><span style="margin:auto 93px auto 0px;">��ע:</span><input type="text" name="beizhu" id="beizhu"  size="100" value="<?=$data['beizhu']?>" /></p>

          <p><span style="margin:auto 74px auto 0px;">����(<b style="color: red">*</b>):</span>
          <select name="select">
          <?php foreach ($options as $op) { ?>
          <option value="<?=$op['class_id']?>" disabled="disabled"><?=$op['class_id']?>:<?=$op['name']?></option>
          <?php 
          	$sqlc = 'select class_id,name,parent_class_id from vg_class where parent_class_id ='.$op['class_id'];
          	$opc = array();
          	$opc = $db->getAll($sqlc);
          	foreach ($opc as $child){
          ?>         
          	<option value="<?=$child['class_id']?>">&nbsp;&nbsp;<?=$child['name']?></option>

          <?php }}?>
          </select></p>
       
		 <p><span style="margin:auto 74px auto 0px;">����(<b style="color: red">*</b>):</span><input type="text" name="nick" id="nick"  size="50" value="<?=$data['nick']?>" /></p>
		 <p ><input type="submit" name="button" id="button" value="�ύ" style="margin:5px 0 0 250px;background:green;width:50px;color:#fff;" /></p>
		
		</form>
	</div>
</div>
