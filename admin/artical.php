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
			$data['author'] = trim($_POST['author']);
			$data['text'] = trim($_POST['text']);
			$data['jump_url'] = trim($_POST['jump_url']);
			$data['main_img'] = trim($_POST['main_img']);
			$data['artpr_id'] = intval($_POST['select']);
			$data['sort'] = intval($_POST['sort']);
			$tagId = array();
			$tagId = $_POST['tag_ids'];
			
			if ( ! $data['title']) {
				$msg = '����������⡣';
				$flag =true;
			}
			if ( ! $data['author']) {
				$msg = '�����������ߡ�';
				$flag =true;
			}
			else if ( ! $data['text']) {
				$msg = '�����������ݡ�';
				$flag =true;
			}
			else if ( ! $data['main_img']) {
				$msg = '����������ͼ��';

			}
			else if ( ! $data['artpr_id']) {
				$msg = '����������������id';
				$flag =true;
			}
			// 			$db->setDebug();

			if(!$flag)
			{
				if ($id) {
					$ret = $db->update('vg_article', $data, 'art_id='.$id);
				}else{
					$data['is_top'] = 0;
					$data['class_id'] = 0;
					$data['create_time'] = new MySQLCode('now()');
					$ret = $db->insert('vg_article', $data);
				}
				if ($ret !== false) {
					$sql = 'select art_id from vg_artical where title ='.$data['title'];
					$resultId = $db->getOne($sql);
					$d = array();
					foreach ($tagId as $ta){
						$d['tag_id'] = $ta;
						$d['art_id'] = $resultId['art_id'];
						$ret = $db->insert('vg_tag_art_list', $d);
					}
					
					$msg = '����ɹ���';
					$flag = false;
				}else {
					$msg = '����ʧ�ܡ�';
				}
				$flag = false;
			}
			
}else{
	if ($act == 'del') {
		
			$ret = $db->delete('vg_article', 'art_id='.$id);
			$ret = $db->delete('vg_tag_art_list', 'art_id='.$id);
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

 $sql = 'select art_id,artpr_id,title,author,sort,main_img,jump_url from vg_article order by art_id desc';
 $rec = true;
 $list = getPageData($sql, $p, $rec);
 
 $data = array();
 if ($act == 'edit') {
 	$data = $db->getOne('select * from vg_article where art_id='.$id);
 }
 
 $artpr_names = array();
 $sql = 'select * from vg_art_property order by artpr_id desc';
 $artpr_names = $db->getAll($sql);
 
 $tags = array();
 $sql = 'select * from vg_tag order by tag_id desc';
 $tags = $db->getAll($sql);
 ?>
 
 <!--�������-->
  <!--����-->
  <form id="form1" name="form1" method="post" action="/admin/artical.php">
  <input type="hidden" name="art_id" id="art_id" value="<?=$data['art_id']?>" />
    <div>
    <p>���´�(<b style="color: red">*</b>)��Ϊ������</p>
      <table width="100%" border="1" >
        <tr>
          <td width="16%" bgcolor="#eeeeee">���±���(<b style="color: red">*</b>):</td>
          <td width="82%"><input type="text" name="title" id="title"  size="100" value="<?=$data['title']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">����(<b style="color: red">*</b>):</td>
          <td><input type="text" name="author" id="author"  size="100" value="<?=$data['author']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">��������(<b style="color: red">*</b>):</td>
          <td>
          <div class="kg_editorContainer"   data-config='{"width" : "800px" , "height": "250px" }'>
    <textarea name='text' class="ks-editor-textarea" tabindex="0" style="width:733px;height: 400px;">            
<?=htmlentities($data['text'])?>
    </textarea>    
</div></td>
         <!--<td><TEXTAREA name="text" id="text" rows=10 cols=100><?=htmlentities($data['text'])?></TEXTAREA></td>  --> 
        </tr>
        <tr>
          <td bgcolor="#eeeeee">ת���ַ��</td>
          <td><input type="text" name="jump_url" id="jump_url"  size="100" value="<?=$data['jump_url']?>" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee">ͼƬ��ַ��</td>
          <td><input type="text" name="main_img" id="main_img"  size="100" value="<?=$data['main_img']?>" /></td>
        </tr>
         <tr>
          <td bgcolor="#eeeeee">����(���ִ�����)��</td>
          <td><input type="text" name="sort" id="sort"  size="100" value="<?=$data['sort']?>" /></td>
        </tr>
           <tr>
          <td width="16%" bgcolor="#eeeeee">��������:</td>
          <td width="82%"><!--  <input type="text" name="artpr_id" id="artpr_id"  size="100" value="<?=$data['artpr_id']?>" />-->
          <select name="select">
          <?php 
          		foreach ($artpr_names as $name){
          ?>
  		<option value ="<?=$name['artpr_id']?>"><?=$name['name']?></option>
  		<?php }?>
		</select></td>
        </tr>
        <tr>
          <td width="16%" bgcolor="#eeeeee">��ǩ:</td>
          <td width="82%">
          <select name="tag_ids[]" multiple="multiple">
          <?php 
          		foreach ($tags as $tag){
          ?>
  		<option value ="<?=$tag['tag_id']?>"><?=$tag['name']?></option>
  		<?php }?>
		</select></td>
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
        <td width="5%">��������</td>
        <td width="25%">���±���</td>
        <td width="15%">����</td>
        <td width="5%">����</td>
        <td width="20%">����ͼƬ</td>
        <td width="10%">����</td>
      </tr>
<?php 
	foreach ($list as $row) {
?>
      <tr align="center">
        <td><?=$row['art_id']?></td>
        <td><?=$row['artpr_id']?></td>
        <td><?=$row['title']?></td>
        <td><?=$row['author']?></td>
        <td><?=$row['sort']?>
        <td><img src="<?=$row['main_img']?>_100x100.jpg" /></td>
        <td><a href="/admin/artical.php?act=edit&id=<?=$row['art_id']?>">�޸�</a> <a href="/admin/artical.php?act=del&id=<?=$row['art_id']?>">ɾ��</a></td>
      </tr>
<?php 
	}
?>
    </table>
  </div>
 
 </div>
</div>