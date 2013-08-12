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
			$id = intval($_POST['art_id']);
			$data['title'] = trim($_POST['title']);
			$data['text'] = trim($_POST['text']);
			$data['jump_url'] = trim($_POST['jump_url']);
			$data['main_img'] = trim($_POST['main_img']);
			$data['artpr_id'] = intval($_POST['artpr_id']);
			if ( ! $data['title']) {
				$msg = '必须输入标题。';
				$flag =true;
			}
			else if ( ! $data['text']) {
				$msg = '必须输入内容。';
				$flag =true;
			}
			else if ( ! $data['main_img']) {
				$msg = '必须输入主图。';

			}
			else if ( ! $data['artpr_id']) {
				$msg = '必须输入文章类型id';
				$flag =true;
			}
			// 			$db->setDebug();
			if($data['artpr_id']>$db->getValue($sql))
			{
				$msg = '文章类型id输入有误';
				$flag = true;
			}
			if(!$flag)
			{
				if ($id) {
					$ret = $db->update('vg_article', $data, 'art_id='.$id);
				}else{
					$data['is_top'] = 0;
					$data['class_id'] = 0;
// 					$data['artpr_id'] = 0;
					$data['create_time'] = new MySQLCode('now()');
					$ret = $db->insert('vg_article', $data);
				
				}
				if ($ret !== false) {
					$msg = '保存成功。';
					$flag = false;
				}else {
					$msg = '保存失败。';
				}
				$flag = false;
			}
			
}else{
	if ($act == 'del') {
		
			$ret = $db->delete('vg_article', 'art_id='.$id);
			if ( ! $msg) {
				if ($ret !== false) {
					$msg = '删除成功。';
				}else{
					$msg = '保存失败。';
				}
			}
		}
		
}


?>
 <div class="admin_container">

 <?php 
 	if ($msg) echo '<font color="red">'.$msg.'</font><br /><br />';
 	
 $sql = 'select art_id,artpr_id,title,main_img,jump_url from vg_article order by art_id desc';
 $rec = true;
 $list = getPageData($sql, $p, $rec);
 
 $data = array();
 if ($act == 'edit') {
 	$data = $db->getOne('select * from vg_article where art_id='.$id);
 }
 
 $artpr_names = array();
 $sql = 'select * from vg_art_property order by artpr_id';
 $artpr_names = $db->getAll($sql);
 ?>
 
 <!--添加文章-->
  <!--文章-->
  <form id="form1" name="form1" method="post" action="/admin/artical.php">
  <input type="hidden" name="art_id" id="art_id" value="<?=$data['art_id']?>" />
    <div>
    <p>以下带(<b style="color: red">*</b>)号为必填项</p>
      <table width="100%" border="1" >
        <tr>
          <td width="16%" bgcolor="#eeeeee">文章标题(<b style="color: red">*</b>):</td>
          <td width="82%"><input type="text" name="title" id="title"  size="100" value="<?=$data['title']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">文章内容(<b style="color: red">*</b>):</td>
          <td>
          <div class="kg_editorContainer"   data-config='{"width" : "800px" , "height": "250px" }'>
    <textarea name='text' class="ks-editor-textarea" tabindex="0" style="width:733px;height: 400px;">            
<?=htmlentities($data['text'])?>
    </textarea>    
</div></td>
         <!--<td><TEXTAREA name="text" id="text" rows=10 cols=100><?=htmlentities($data['text'])?></TEXTAREA></td>  --> 
        </tr>
        <tr>
          <td bgcolor="#eeeeee">转向地址：</td>
          <td><input type="text" name="jump_url" id="jump_url"  size="100" value="<?=$data['jump_url']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">图片地址：</td>
          <td><input type="text" name="main_img" id="main_img"  size="100" value="<?=$data['main_img']?>" /></td>
        </tr>
           <tr>
          <td width="16%" bgcolor="#eeeeee">文章类型(<b style="color: red">*填对应数字</b>):</td>
          <td width="82%"><input type="text" name="artpr_id" id="artpr_id"  size="100" value="<?=$data['artpr_id']?>" /><select>
          <?php 
          		foreach ($artpr_names as $name){
          ?>
  		<option value ="<?=$name['artpr_id']?>"><?=$name['artpr_id']?>:<?=$name['name']?></option>
  		<?php }?>
		</select></td>
        </tr>
        <tr>
          <td height="25" colspan="5" align="center"><input type="submit" name="button" id="button" value="提交" size="20"/></td>
        </tr>
      </table>
    </div>
  </form>
  <br /><br /><br />
   <!--分类 列表-->
  <div>
    <table width="100%" border="1">
      <tr align="center">
        <td width="5%">id</td>
        <td width="5%">文章类型</td>
        <td width="25%">文章标题</td>
        <td width="20%">跳转地址</td>
        <td width="20%">文章图片</td>
        <td width="10%">操作</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['art_id']?></td>
        <td><?=$row['artpr_id']?></td>
        <td><?=$row['title']?></td>
        <td><?=$row['jump_url']?></td>
        <td><img src="<?=$row['main_img']?>_100x100.jpg" /></td>
        <td><a href="/admin/artical.php?act=edit&id=<?=$row['art_id']?>">修改</a> <a href="/admin/artical.php?act=del&id=<?=$row['art_id']?>">删除</a></td>
      </tr>
<?php 
	}
?>
    </table>
  </div>
 
 </div>
</div>