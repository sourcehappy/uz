<?php
require './common/header.php';
include("top/topclient.php"); //����������tae��topclient
include("top/ItemGetRequest.php"); //���������þ����Request��

?>
<div class="clearboth"></div>
<div class="baoming_main">
	<div class="bmtp">
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
		 <p><span style="margin:auto 62px auto 0px;">��ƷID(<b style="color: red">*</b>):</span><input type="text" name="num_iid" id="num_iid" value="<?=$data['num_iid']?>" /><input type="button" name="get_item" id="get_item" style="margin:5px 0 0 30px;;width:30px;" value="��ȡ��Ʒ"></p>
		 <p><span style="margin:auto 50px auto 0px;">��Ʒ��ַ(<b style="color: red">*</b>):</span><input type="text" name="detail_url" id="detail_url"  size="100" value="<?=$data['detail_url']?>" /></p>
		 <p><span style="margin:auto 50px auto 0px;">��Ʒ����(<b style="color: red">*</b>):</span><input type="text" name="title" id="title"  size="100" value="<?=$data['title']?>" /></p>
		 <p><span style="margin:auto 50px auto 0px;">ͼƬ��ַ(<b style="color: red">*</b>):</span><input type="text" name="pic_url" id="pic_url"  size="100" value="<?=$data['pic_url']?>" /></p>
		 <p class="image"><img src="<?=$data['pic_url']?>" width="250px"></p>
		 <p><span style="margin:auto 74px auto 0px;">ԭ��(<b style="color: red">*</b>):</span><input type="text" name="price" id="price"  value="<?=$data['price']?>" /></p>
		 <p><span style="margin:auto 74px auto 0px;">�ּ�(<b style="color: red">*</b>):</span><input type="text" name="price_xian" id="price_xian" value="<?=$data['price_xian']?>" /><span style="color:red;">���б䶯���������</span></p>
		 <p><span style="margin:auto 93px auto 0px;">��ע:</span><input type="text" name="beizhu" id="beizhu"  size="100" value="<?=$data['beizhu']?>" /></p>
		 <p><span style="margin:auto 74px auto 0px;">����(<b style="color: red">*</b>):</span><input type="text" name="class_id" id="class_id"  size="50" value="<?=$data['class_id']?>" /></p>
		 <p><span style="margin:auto 74px auto 0px;">����(<b style="color: red">*</b>):</span><input type="text" name="nick" id="nick"  size="50" value="<?=$data['nick']?>" /></p>
		 <p ><input type="submit" name="tijiao" id="tiaojiao" value="�ύ" style="margin:5px 0 0 250px;background:green;width:30px;color:#fff;" /></p>
		
		<!--  
		 <table width="100%">
		 <tr>
          <td width="16%" bgcolor="#eeeeee" align="center">��ƷID(<b style="color: red">*</b>):</td>
          <td width="82%"><input type="text" name="num_iid" id="num_iid" value="<?=$data['num_iid']?>" /><input type="button" name="get_item" id="get_item" value="��ȡ��Ʒ"></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">��Ʒ��ַ(<b style="color: red">*</b>):</td>
          <td><input type="text" name="detail_url" id="detail_url"  size="100" value="<?=$data['detail_url']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">��Ʒ����(<b style="color: red">*</b>):</td>
          <td><input type="text" name="title" id="title"  size="100" value="<?=$data['title']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">ͼƬ��ַ(<b style="color: red">*</b>):</td>
          <td><input type="text" name="pic_url" id="pic_url"  size="100" value="<?=$data['pic_url']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">ԭ��(<b style="color: red">*</b>):</td>
          <td><input type="text" name="price" id="price"  value="<?=$data['price']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">�ּ�(<b style="color: red">*</b>):</td>
          <td><input type="text" name="price_xian" id="price_xian" value="<?=$data['price_xian']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">��ע</td>
          <td><input type="text" name="beizhu" id="beizhu"  size="100" value="<?=$data['beizhu']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">����(<b style="color: red">*</b>):</td>
          <td><input type="text" name="class_id" id="class_id"  size="50" value="<?=$data['class_id']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee" align="center">����(<b style="color: red">*</b>):</td>
          <td><input type="text" name="nick" id="nick"  size="50" value="<?=$data['nick']?>" /></td>
        </tr>
         <tr>
          <td align="center" bgcolor="#eee"><input type="button" name="tijiao" id="tiaojiao" value="�ύ" /></td>
        </tr>
		 </table>
		 -->
		</form>
	</div>
</div>
