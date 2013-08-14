<?php
require './common/header.php';
include("top/topclient.php"); //这里是引用tae的topclient
include("top/ItemGetRequest.php"); //这里是引用具体的Request类
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
		$msg = '必须输入商品ID。';
		$flag = true;
	}
	if ( ! $data['title']) {
		$msg = '必须输入标题。';
		$flag = true;
	}
	if ( ! $data['detail_url']) {
		$msg = '必须输入链接。';
		$flag = true;
	}
	if ( ! $data['pic_url']) {
		$msg = '必须输入图片路径。';
		$flag = true;
	}
	if ( ! $data['nick']) {
		$msg = '必须输入掌柜呢称。';
		$flag = true;
	}
	if(!$flag)
	{
			$data['up_time'] = new MySQLCode ( 'now()' );
// 			$data['up_time'] = '';
			$data['status'] = 0;
			$ret = $db->insert('item_baoming', $data);
		if ($ret !== false) {
			$msg = '提交成功！我们将会在24小时内审核，审核通过便自动上线。';
		}else{
			$msg = '提交失败！';
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
	<p style="color: red;font-size:18px;margin:5px 0 0 20px">报名须知:</p>
	<p>1.必须点击<b style="color:blue;">喜欢小站</b>；</p>
	<p>2.店家需要参加淘宝客推广项目，佣金必须大于<b style="color: red;">5%</b>；</p>
	<p>3.商品图片必须精美，不得打上<b style="color:blue;">水印</b>，不得出现<b style="color:red">牛皮癣图片</b>；</p>
	<p>4.必须加入<b style="color:blue;">消费者保障</b>服务；</p>
	<p>5.店家加入官方QQ群：<b style="color: red;">280509489</b>，暗号：<b style="color:green">豆腐</b></p>
	<p>6.店铺中按要求放置<b style="color:green;"> 豆腐网 </b>U站海报，并保持1个月以上；</p>
	<p><a href="http://bangpai.taobao.com/group/thread/15651242-284992144.htm?spm=0.0.0.0.q2wSZ9" target="_blank">点击查看“如何放置豆腐网U站海报”</a></p>
	</div>
	<div class="bmbo">
		<form id="form1" name="form1" method="post" action="baoming.php">
		<input type="hidden" name="id" id="id" value="<?=$data['id']?>" />
		 <p>以下带(<b style="color: red">*</b>)号为必填项</p>
		 <p><span style="margin:auto 62px auto 0px;">商品ID(<b style="color: red">*</b>):</span><input type="text" name="num_iid" id="num_iid" value="<?=$data['num_iid']?>" /><!-- <input type="button" name="get_item" id="get_item" style="margin:5px 0 0 30px;;width:30px;" value="获取商品"> --></p>
		 <p>右边商品链接中，红色的即为商品id:    http://detail.tmall.com/item.htm?id=<span style="color:red;">21453704739</span></p>
		 <p><span style="margin:auto 50px auto 0px;">商品地址(<b style="color: red">*</b>):</span><input type="text" name="detail_url" id="detail_url"  size="100" value="<?=$data['detail_url']?>" /></p>
		 <p><span style="margin:auto 50px auto 0px;">商品标题(<b style="color: red">*</b>):</span><input type="text" name="title" id="title"  size="100" value="<?=$data['title']?>" /></p>
		 <p><span style="margin:auto 50px auto 0px;">图片地址(<b style="color: red">*</b>):</span><input type="text" name="pic_url" id="pic_url"  size="100" value="<?=$data['pic_url']?>" /></p>
		 <p style="height:250px;text-align:center;"><img src="<?=$data['pic_url']?>" width="250px"></p>
		 <p><span style="margin:auto 74px auto 0px;">原价(<b style="color: red">*</b>):</span><input type="text" name="price" id="price"  value="<?=$data['price']?>" /></p>
		 <p><span style="margin:auto 74px auto 0px;">现价(<b style="color: red">*</b>):</span><input type="text" name="price_xian" id="price_xian" value="<?=$data['price_xian']?>" /><span style="color:red;">若有变动，必须更改</span></p>
		 <p><span style="margin:auto 93px auto 0px;">备注:</span><input type="text" name="beizhu" id="beizhu"  size="100" value="<?=$data['beizhu']?>" /></p>

          <p><span style="margin:auto 74px auto 0px;">分类(<b style="color: red">*</b>):</span>
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
       
		 <p><span style="margin:auto 74px auto 0px;">旺旺(<b style="color: red">*</b>):</span><input type="text" name="nick" id="nick"  size="50" value="<?=$data['nick']?>" /></p>
		 <p ><input type="submit" name="button" id="button" value="提交" style="margin:5px 0 0 250px;background:green;width:50px;color:#fff;" /></p>
		
		</form>
	</div>
</div>
