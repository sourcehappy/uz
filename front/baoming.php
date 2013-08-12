<?php
require './common/header.php';
include("top/topclient.php"); //这里是引用tae的topclient
include("top/ItemGetRequest.php"); //这里是引用具体的Request类

?>
<div class="clearboth"></div>
<div class="baoming_main">
	<div class="bmtp">
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
		 <p><span style="margin:auto 62px auto 0px;">商品ID(<b style="color: red">*</b>):</span><input type="text" name="num_iid" id="num_iid" value="<?=$data['num_iid']?>" /><input type="button" name="get_item" id="get_item" style="margin:5px 0 0 30px;;width:30px;" value="获取商品"></p>
		 <p><span style="margin:auto 50px auto 0px;">商品地址(<b style="color: red">*</b>):</span><input type="text" name="detail_url" id="detail_url"  size="100" value="<?=$data['detail_url']?>" /></p>
		 <p><span style="margin:auto 50px auto 0px;">商品标题(<b style="color: red">*</b>):</span><input type="text" name="title" id="title"  size="100" value="<?=$data['title']?>" /></p>
		 <p><span style="margin:auto 50px auto 0px;">图片地址(<b style="color: red">*</b>):</span><input type="text" name="pic_url" id="pic_url"  size="100" value="<?=$data['pic_url']?>" /></p>
		 <p class="image"><img src="<?=$data['pic_url']?>" width="250px"></p>
		 <p><span style="margin:auto 74px auto 0px;">原价(<b style="color: red">*</b>):</span><input type="text" name="price" id="price"  value="<?=$data['price']?>" /></p>
		 <p><span style="margin:auto 74px auto 0px;">现价(<b style="color: red">*</b>):</span><input type="text" name="price_xian" id="price_xian" value="<?=$data['price_xian']?>" /><span style="color:red;">若有变动，必须更改</span></p>
		 <p><span style="margin:auto 93px auto 0px;">备注:</span><input type="text" name="beizhu" id="beizhu"  size="100" value="<?=$data['beizhu']?>" /></p>
		 <p><span style="margin:auto 74px auto 0px;">分类(<b style="color: red">*</b>):</span><input type="text" name="class_id" id="class_id"  size="50" value="<?=$data['class_id']?>" /></p>
		 <p><span style="margin:auto 74px auto 0px;">旺旺(<b style="color: red">*</b>):</span><input type="text" name="nick" id="nick"  size="50" value="<?=$data['nick']?>" /></p>
		 <p ><input type="submit" name="tijiao" id="tiaojiao" value="提交" style="margin:5px 0 0 250px;background:green;width:30px;color:#fff;" /></p>
		
		<!--  
		 <table width="100%">
		 <tr>
          <td width="16%" bgcolor="#eeeeee" align="center">商品ID(<b style="color: red">*</b>):</td>
          <td width="82%"><input type="text" name="num_iid" id="num_iid" value="<?=$data['num_iid']?>" /><input type="button" name="get_item" id="get_item" value="获取商品"></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">商品地址(<b style="color: red">*</b>):</td>
          <td><input type="text" name="detail_url" id="detail_url"  size="100" value="<?=$data['detail_url']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">商品标题(<b style="color: red">*</b>):</td>
          <td><input type="text" name="title" id="title"  size="100" value="<?=$data['title']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">图片地址(<b style="color: red">*</b>):</td>
          <td><input type="text" name="pic_url" id="pic_url"  size="100" value="<?=$data['pic_url']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">原价(<b style="color: red">*</b>):</td>
          <td><input type="text" name="price" id="price"  value="<?=$data['price']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">现价(<b style="color: red">*</b>):</td>
          <td><input type="text" name="price_xian" id="price_xian" value="<?=$data['price_xian']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">备注</td>
          <td><input type="text" name="beizhu" id="beizhu"  size="100" value="<?=$data['beizhu']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">分类(<b style="color: red">*</b>):</td>
          <td><input type="text" name="class_id" id="class_id"  size="50" value="<?=$data['class_id']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">旺旺(<b style="color: red">*</b>):</td>
          <td><input type="text" name="nick" id="nick"  size="50" value="<?=$data['nick']?>" /></td>
        </tr>
         <tr>
          <td align="center" bgcolor="#eee"><input type="button" name="tijiao" id="tiaojiao" value="提交" /></td>
        </tr>
		 </table>
		 -->
		</form>
	</div>
</div>
